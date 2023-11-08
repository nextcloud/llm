OC.L10N.register(
    "llm",
    {
    "Formalize" : "Formalisieren",
    "Rephrase the text to be more formal and polite instead of casual." : "Formulieren Sie den Text förmlicher und höflicher statt salopp.",
    "Simplify" : "Vereinfachen",
    "Make the text easier to understand." : "Machen Sie den Text verständlicher.",
    "Local Large language model" : "Lokales großes Sprachmodell",
    "TextProcessing provider using a Large Language Model that runs locally on CPU" : "Textverarbeitungsanbieter, der ein großes Sprachmodell verwendet, das lokal auf der CPU ausgeführt wird",
    "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta\n  * Languages: English\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon by Nomic AI\n  * Languages: English\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nRequirements:\n\n* x86 CPU\n* GNU lib C (musl is not supported)\n* Python 3.10+  (including python-venv)\n\n#### Nextcloud All-in-One:\nWith Nextcloud AIO, this app is not going to work because AIO uses musl. However you can use [this community container](https://github.com/nextcloud/all-in-one/tree/main/community-containers/local-ai) as replacement for this app.\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "Ein großes Sprachmodell eines Textverarbeitungsanbieters-Anbieters, das lokal auf der CPU ausgeführt wird\n\nDie Modelle laufen komplett auf Ihrer Maschine. Keine privaten Daten verlassen Ihre Server.\n\nNach der Installation dieser App müssen Sie folgendes  ausführen:\n\n    occ llm:download-model\n\nModelle:\n\n* Lama 2 von Meta\n  * Sprachen: Englisch\n  * [LLAMA 2 Community-Lizenz](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon von Nomic AI\n  * Sprachen: Englisch\n  * [Apache-Lizenz 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nAnforderungen:\n\n* x86-CPU\n* GNU lib C (musl wird nicht unterstützt)\n* Python 3.10+ inklusive python-venv\n\n### Nextcloud All-in-One: Mit Nextcloud AIO, funktioniert diese App nicht, da AIO musl verwendet. Sie können jedoch [diesen Community-Container](https://github.com/nextcloud/all-in-one/tree/main/community-containers/local-ai) als Ersatz für die App verwenden.\n\n## Ethische KI-Bewertung „Llama 2“-Modell\n### Bewertung: 🟡\n\nPositiv:\n* Die Software für Training und Inferenz dieses Modells ist Open Source\n* Das trainierte Modell ist frei verfügbar und kann daher lokal ausgeführt werden\n\nNegativ:\n\n* Die Trainingsdaten sind nicht frei verfügbar, was die Möglichkeiten Externer einschränkt, die Leistung des Modells und den CO2-Verbrauch zu überprüfen und Verzerrungen zu korrigieren oder sie zu optimieren.\n\n## Ethische KI-Bewertung für das Modell „GPT4All Falcon“.\n### Bewertung: 🟢\n\nPositiv:\n* Die Software für Training und Inferenz dieses Modells ist Open Source\n* Das trainierte Modell ist frei verfügbar und kann daher lokal ausgeführt werden\n* Die Trainingsdaten sind frei verfügbar und ermöglichen die Überprüfung oder Korrektur von Verzerrungen sowie die Optimierung der Leistung und des CO2-Verbrauchs.\n\nErfahren Sie mehr über das Nextcloud Ethical AI Rating [in unserem Blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).",
    "Status" : "Status",
    "Machine learning model has been downloaded successfully." : "Das Modell für maschinelles Lernen wurde erfolgreich heruntergeladen.",
    "The machine learning model still needs to be downloaded (see below)." : "Das Machine-Learning-Modell muss noch heruntergeladen werden (siehe unten).",
    "Could not execute python. You may need to set the path to a working executable manually. (See below.)" : "Python konnte nicht ausgeführt werden. Möglicherweise müssen Sie den Pfad zu einer funktionierenden ausführbaren Datei manuell festlegen. (Siehe unten.)",
    "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron." : "Hintergrundaufgaben werden nicht über Cron ausgeführt. Für diese App müssen Hintergrundaufgaben über Cron ausgeführt werden.",
    "The app was installed successfully and will run prompts in background processes on request." : "Die App wurde erfolgreich installiert und führt Eingaben in Hintergrundprozessen aus.",
    "Model settings" : "Modelleinstellungen",
    "Choose the machine learning model to be used." : "Wählen Sie das zu verwendende Modell für maschinelles Lernen.",
    "Recommended" : "Empfohlen",
    "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:" : "Um das Modell des maschinellen Lernens herunterzuladen, müssen Sie die occ-Befehlszeilenschnittstelle von Nextcloud auf Ihrem Serverterminal mit dem folgenden Befehl ausführen:",
    "Inference settings" : "Inferenzeinstellungen",
    "The number of threads to use for inference (more is faster)" : "Die Anzahl der Threads, die für die Inferenz verwendet werden sollen (mehr ist schneller)",
    "Python" : "Python",
    "Checking Python" : "Überprüfe Python",
    "Could not execute Python. You may need to set the path to a working executable manually." : "Python konnte nicht ausgeführt werden. Möglicherweise müssen Sie den Pfad zu einer funktionierenden ausführbaren Datei manuell festlegen.",
    "Python executable executed successfully and setup works." : "Die ausführbare Python-Datei wurde erfolgreich ausgeführt und das Setup funktioniert.",
    "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards." : "Wenn Python aus irgendeinem Grund nicht automatisch auf Ihrem System gefunden wird, können Sie hier den Pfad zur ausführbaren Python-Datei festlegen. Wenn Sie diesen Wert ändern, führen Sie anschließend unbedingt occ maintenance:repair aus.",
    "Failed to load settings" : "Einstellungen konnten nicht geladen werden",
    "Failed to save settings" : "Einstellungen konnten nicht gespeichert werden"
},
"nplurals=2; plural=(n != 1);");
