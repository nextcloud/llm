OC.L10N.register(
    "llm",
    {
    "Formalize" : "Formalise",
    "Rephrase the text to be more formal and polite instead of casual." : "Rephrase the text to be more formal and polite instead of casual.",
    "Simplify" : "Simplify",
    "Make the text easier to understand." : "Make the text easier to understand.",
    "Local Large language model" : "Local Large language model",
    "TextProcessing provider using a Large Language Model that runs locally on CPU" : "TextProcessing provider using a Large Language Model that runs locally on CPU",
    "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta\n  * Languages: English\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon by Nomic AI\n  * Languages: English\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\n* Leo HessianAI by LAION LeoLM\n  * Languages: English/German\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/leo-hessianai-13B-chat-bilingual-GGUF/LICENSE)\nRequirements:\n\n* x86 CPU (with support for AVX instructions)\n* GNU lib C (musl is not supported)\n* Python 3.10+  (including python-venv)\n\n#### Nextcloud All-in-One:\nWith Nextcloud AIO, this app is not going to work because AIO uses musl. However you can use [this community container](https://github.com/nextcloud/all-in-one/tree/main/community-containers/local-ai) as replacement for this app.\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta\n  * Languages: English\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon by Nomic AI\n  * Languages: English\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\n* Leo HessianAI by LAION LeoLM\n  * Languages: English/German\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/leo-hessianai-13B-chat-bilingual-GGUF/LICENSE)\nRequirements:\n\n* x86 CPU (with support for AVX instructions)\n* GNU lib C (musl is not supported)\n* Python 3.10+  (including python-venv)\n\n#### Nextcloud All-in-One:\nWith Nextcloud AIO, this app is not going to work because AIO uses musl. However you can use [this community container](https://github.com/nextcloud/all-in-one/tree/main/community-containers/local-ai) as replacement for this app.\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).",
    "Status" : "Status",
    "Machine learning model has been downloaded successfully." : "Machine learning model has been downloaded successfully.",
    "The machine learning model still needs to be downloaded (see below)." : "The machine learning model still needs to be downloaded (see below).",
    "Could not execute python. You may need to set the path to a working executable manually. (See below.)" : "Could not execute Python. You may need to set the path to a working executable manually. (See below.)",
    "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron." : "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron.",
    "The app was installed successfully and will run prompts in background processes on request." : "The app was installed successfully and will run prompts in background processes on request.",
    "Model settings" : "Model settings",
    "Choose the machine learning model to be used." : "Choose the machine learning model to be used.",
    "Recommended" : "Recommended",
    "Bilingual: English/German" : "Bilingual: English/German",
    "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:" : "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:",
    "Inference settings" : "Inference settings",
    "The number of threads to use for inference (more is faster)" : "The number of threads to use for inference (more is faster)",
    "Python" : "Python",
    "Checking Python" : "Checking Python",
    "Could not execute Python. You may need to set the path to a working executable manually." : "Could not execute Python. You may need to set the path to a working executable manually.",
    "Python executable executed successfully and setup works." : "Python executable executed successfully and setup works.",
    "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards." : "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards.",
    "Failed to load settings" : "Failed to load settings",
    "Failed to save settings" : "Failed to save settings"
},
"nplurals=2; plural=(n != 1);");
