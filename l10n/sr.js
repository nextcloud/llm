OC.L10N.register(
    "llm",
    {
    "Formalize" : "Формализуј",
    "Rephrase the text to be more formal and polite instead of casual." : "Преформулише текст тако да неформални текст постане формалнији и учтивији.",
    "Simplify" : "Упрости",
    "Make the text easier to understand." : "Чини да текст постане лакше разумљив",
    "Local Large language model" : "Локални Велики језички модел",
    "TextProcessing provider using a Large Language Model that runs locally on CPU" : "Добављач TextProcessing услуге који користи Велики језички модел који се извршава на локалном CPU",
    "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta\n  * Languages: English\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon by Nomic AI\n  * Languages: English\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nRequirements:\n\n* x86 CPU\n* GNU lib C (musl is not supported)\n* Python 3.10+  (including python-venv)\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "Пружалац TextProcessing услуге Великог језичког модела који се извршава локално на CPU\n\nМодели се у потпуности извршавају на вашој машини. Ниаккви приватни подаци не напуштају ваше сервере.\n\nНакон инсталирања апликације, потребно је да извршите\n\n    occ llm:download-model\n\nМодели:\n\n* Llama 2 комапаније Meta\n  * Језици: енглески\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon компаније Nomic AI\n  * Језици: енглески\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nЗахтеви:\n\n* x86 CPU\n* GNU lib C (musl се не подржава)\n* Python 3.10+ (укључујући python-venv)\n\n## Етичко рангирање AI за „Llama 2” модел\n### Рангирање: 🟡\n\nПозитивне стране:\n* софтвер за тренирање и закључивање овог модела је отвореног кода\n* тренирани модел је у потпуности слободан, тако да се може извршавати на вашем хардверу\n\nЛоше стране:\n\n* подаци за тренрање нису потпуно доступни, тако да је могућност осталих да провере и исправе предрасуде или оптимизују преформансе модела и CO2 употребу.\n\n## Етичко рангирање AI за „GPT4All Falcon” модел\n### Рангирање: 🟢\n\nПозитивне стране:\n* софтвер за тренирање и закључивање овог модела је отвореног кода\n* тренирани модел је у потпуности слободан, тако да се може извршавати на вашем хардверу\n* подаци за тренрање су потпуности доступни, тако да постоји могућност да се провере и исправе предрасуде или оптимизују преформансе модела и CO2 употреба.\n\nСазнајте више о Nextcloud етичком рангирању AI [у нашем блогу](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).",
    "Status" : "Стање",
    "Machine learning model has been downloaded successfully." : "Успешно су преузети модел машинског учења.",
    "The machine learning model still needs to be downloaded (see below)." : "Још увек је потребно да се преузме модел машинског учења (погледајте испод).",
    "Could not execute python. You may need to set the path to a working executable manually. (See below.)" : "Не може да се изврши python извршни фајл. Вероватно је потребно да ручно поставите путању до исправног извршног фајла. (Погледајте испод.)",
    "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron." : "Позадински послови се не извршавају са cron. Ова апликација захтева да се позадински послови извршавају са cron.",
    "The app was installed successfully and will run prompts in background processes on request." : "Апликација је успешно инсталирана и на захтев ће у позадинским процесима да извршава одзиве.",
    "Model settings" : "Подешавања модела",
    "Choose the machine learning model to be used." : "Изаберите модел машинског учења који ће се користити.",
    "Llama2 7B (Recommended)" : "Llama2 7B (Препоручено)",
    "GPT4All Falcon" : "GPT4All Falcon",
    "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:" : "Да бисте преузели модел машинског учења, потребно је да у терминалу сервера извршите occ Nextcloud интерфејс у командној линији на следећи начин:",
    "Inference settings" : "Подешавања интерфејса",
    "The number of threads to use for inference (more is faster)" : "Број нити који се користи за закључивање (више је брже)",
    "Python" : "Python",
    "Checking Python" : "Проверава се Python",
    "Could not execute Python. You may need to set the path to a working executable manually." : "Не може да се покрене Python. Вероватно је потребно да ручно поставите путању до исправног извршног фајла.",
    "Python executable executed successfully and setup works." : "Python извршни фајл се успешно покренуо и ваша поставка функционише.",
    "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards." : "Ако се Python из неког разлога не пронађе аутоматски на вашем систему, овде можете ручно да поставите путању до Python извршног фајла. Ако промените ову вредност, обавезно након тога извршите команду occ maintenance:repair.",
    "Failed to load settings" : "Грешка у дохватању поставки",
    "Failed to save settings" : "Грешка приликом чувања поставки"
},
"nplurals=3; plural=(n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2);");
