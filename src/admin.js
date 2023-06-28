// SPDX-FileCopyrightText: Nextcloud contributors
// SPDX-License-Identifier: AGPL-3.0-or-later
import Vue from 'vue'
import Tooltip from '@nextcloud/vue/dist/Directives/Tooltip.js'
import App from './components/ViewAdmin.vue'
import AppGlobal from './mixins/AppGlobal.js'

Vue.mixin(AppGlobal)
Vue.directive('tooltip', Tooltip)

global.Llm = new Vue({
	el: '#llm',
	render: h => h(App),
})
