<!--
SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
SPDX-License-Identifier: CC0-1.0
-->

![](https://raw.githubusercontent.com/nextcloud/llm/main/screenshots/Logo.png)

# A large language model in Nextcloud

This app ships a TextProcessing provider using a Large Language Model that runs locally on CPU

The models run completely on your machine. No private data leaves your servers.

Models:

* Llama 2 by Meta
  * Languages: English
  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)
* GPT4All Falcon by Nomic AI
  * Languages: English
  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)
* Leo HessianAI by LAION LeoLM
  * Languages: English/German
  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/leo-hessianai-13B-chat-bilingual-GGUF/LICENSE)

Requirements:

* x86 CPU
* GNU lib C (musl is not supported)
* Python 3.10+ (including python-venv)

#### Nextcloud All-in-One:
With Nextcloud AIO, this app is not going to work because AIO uses musl. However you can use [this community container](https://github.com/nextcloud/all-in-one/tree/main/community-containers/local-ai) as replacement for this app.


## Ethical AI Rating
### Rating: 🟢

Positive:
* the software for training and inference of this model is open source
* the trained model is freely available, and thus can be run on-premises
* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.

Learn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).

## Install

Make sure to have the submodules checked out:

	git submodule update --init

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make

This requires the following things to be present:
* make
* which
* tar: for building the archive
* curl: used if phpunit and composer are not installed to fetch them from the web
* npm: for building and testing everything JS, only required if a package.json is placed inside the **js/** folder
