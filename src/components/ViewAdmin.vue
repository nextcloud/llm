<!--
  - Copyright (c) 2023. The llm contributors.
  -
  - This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
  -->

<template>
	<div id="llm">
		<figure v-if="loading" class="icon-loading loading" />
		<figure v-if="!loading && success" class="icon-checkmark success" />
		<NcSettingsSection :title="t('llm', 'Status')">
			<NcNoteCard v-if="modelsDownloaded" show-alert type="success">
				{{ t('llm', 'Machine learning models have been downloaded successfully.') }}
			</NcNoteCard>
			<NcNoteCard v-else type="error">
				{{ t('llm', 'The machine learning models still need to be downloaded (see below).') }}
			</NcNoteCard>
			<NcNoteCard v-if="python === false" type="error">
				{{ t('llm', 'Could not execute python. You may need to set the path to a working executable manually. (See below.)') }}
			</NcNoteCard>
			<NcNoteCard v-if="cron !== undefined && cron !== 'cron'" type="error">
				{{ t('llm', 'Background Jobs are not executed via cron. This app requires background jobs to be executed via cron.') }}
			</NcNoteCard>
			<template v-if="python && cron === 'cron'">
				<NcNoteCard show-alert type="success">
					{{ t('llm', 'The app was installed successfully and will transcribe files in background processes on request.') }}
				</NcNoteCard>
			</template>
		</NcSettingsSection>
		<NcSettingsSection :title="t('llm', 'Inference settings')">
			<p>
				<NcTextField :value.sync="settings['threads']"
					:label-visible="true"
					:label="t('llm', 'The number of threads to use')"
					@update:value="onChange" />
			</p>
		</NcSettingsSection>
		<NcSettingsSection :title="t('llm', 'Python')">
			<p v-if="python === undefined">
				<span class="icon-loading-small" />&nbsp;&nbsp;&nbsp;&nbsp;{{ t('llm', 'Checking Python') }}
			</p>
			<NcNoteCard v-else-if="python === false" type="error">
				{{ t('llm', 'Could not execute python. You may need to set the path to a working executable manually.') }}
			</NcNoteCard>
			<NcNoteCard v-else type="success">
				{{ t('llm', 'Python executable executed successfully and setup works.') }}
			</NcNoteCard>
			<p>
				{{ t('llm', 'If python is not found automatically on your system for some reason you can set the path to the python executable here. If you change this value, make sure to run occ maintenance:repair afterwards.') }}
			</p>
			<p>
				<input v-model="settings['python_binary']" type="text" @change="onChange">
			</p>
		</NcSettingsSection>
	</div>
</template>

<script>
import { NcNoteCard, NcSettingsSection, NcTextField } from '@nextcloud/vue'
import axios from '@nextcloud/axios'
import { generateUrl } from '@nextcloud/router'
import { loadState } from '@nextcloud/initial-state'

const SETTINGS = [
	'python_binary',
	'threads',
]

export default {
	name: 'ViewAdmin',
	components: { NcSettingsSection, NcNoteCard, NcTextField },

	data() {
		return {
			loading: false,
			success: false,
			error: '',
			countJobs: null,
			settings: SETTINGS.reduce((obj, key) => ({ ...obj, [key]: '' }), {}),
			timeout: null,
			python: undefined,
			threads: undefined,
			cron: undefined,
			modelsDownloaded: null,
		}
	},

	watch: {
		error(error) {
			if (!error) return
			OC.Notification.showTemporary(error)
		},
	},
	async created() {
		this.modelsDownloaded = loadState('llm', 'modelsDownloaded')
		this.getCronStatus()
		this.getPythonStatus()

		setInterval(async () => {
			this.getCountJobs()
		}, 5 * 60 * 1000)

		try {
			const settings = loadState('llm', 'settings')
			for (const setting of SETTINGS) {
				this.settings[setting] = JSON.parse(settings[setting])
			}
		} catch (e) {
			this.error = this.t('llm', 'Failed to load settings')
			throw e
		}
	},

	methods: {
		async getCronStatus() {
			const resp = await axios.get(generateUrl('/apps/llm/admin/cron'))
			const { cron } = resp.data
			this.cron = cron
		},
		async getPythonStatus() {
			const resp = await axios.get(generateUrl('/apps/llm/admin/python'))
			const { python } = resp.data
			this.python = python
		},
		onChange() {
			if (this.timeout) {
				clearTimeout(this.timeout)
			}
			setTimeout(() => {
				this.submit()
			}, 1000)
		},

		async submit() {
			this.loading = true
			for (const setting in this.settings) {
				await this.setValue(setting, this.settings[setting])
			}
			this.loading = false
			this.success = true
			setTimeout(() => {
				this.success = false
			}, 3000)
		},

		async setValue(setting, value) {
			try {
				value = JSON.stringify(value)
				await axios.put(generateUrl(`/apps/llm/admin/settings/${setting}`), {
					value,
				})
			} catch (e) {
				this.error = this.t('llm', 'Failed to save settings')
				throw e
			}
		},

		async getValue(setting) {
			try {
				const res = await axios.get(generateUrl(`/apps/llm/admin/settings/${setting}`))
				if (res.status !== 200) {
					this.error = this.t('llm', 'Failed to load settings')
					console.error('Failed request', res)
					return
				}
				return res.data.value
			} catch (e) {
				this.error = this.t('llm', 'Failed to load settings')
				throw e
			}
		},
	},
}
</script>
<style>
figure[class^='icon-'] {
	display: inline-block;
}

#llm {
	position: relative;
}

#llm .loading,
#llm .success {
	position: fixed;
	top: 70px;
	right: 20px;
}

#llm label {
	margin-top: 10px;
	display: flex;
}

#llm label > * {
	padding: 8px 0;
	padding-left: 6px;
}

#llm input[type=text], #llm input[type=password] {
	width: 50%;
	min-width: 300px;
	display: block;
}

#llm a:link, #llm a:visited, #llm a:hover {
	text-decoration: underline;
}
</style>
