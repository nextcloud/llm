OC.L10N.register(
    "llm",
    {
    "Formalize" : "Formalizar",
    "Rephrase the text to be more formal and polite instead of casual." : "Reformular o texto para que sexa máis formal e educado no canto de casual.",
    "Simplify" : "Simplificar",
    "Make the text easier to understand." : "Facilitar a comprensión do texto.",
    "Local Large language model" : "Gran modelo lingüístico local",
    "TextProcessing provider using a Large Language Model that runs locally on CPU" : "Fornecedor de procesamento de texto que utiliza o gran modelo lingüístico que se executa localmente na CPU",
    "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta\n  * Languages: English\n  * [LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon by Nomic AI\n  * Languages: English\n  * [Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nRequirements:\n\n* x86 CPU\n* GNU lib C (musl is not supported)\n* Python 3.10+\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "Un Gran modelo lingüístico do provedor de TextProcessing que se executa localmente na CPU\n\nOs modelos funcionan completamente na súa máquina. Ningún dato privado sae dos seus servidores.\n\nApós instalar esta aplicación, terá que executar\n\n    occ llm:download-model\n\nModelos:\n\n* Llama 2 de Meta\n  *Idiomas: Inglés\n  *[Licenza comunitaria LLAMA 2](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)\n* GPT4All Falcon de Nomic AI\n  Idiomas: Ingles\n  [Licenza Apache 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)\nRequisitos:\n\n* CPU x86\n* GNU lib C (musl non é compatible)\n* Python 3.10+\n\n## Avaliación ética da IA para o ​​modelo «Llama 2»\n### Avaliación: 🟡\n\nPositiva:\n* O software para adestramento e inferencia deste modelo é de código aberto\n* O modelo adestrado está dispoñíbel de xeito libre e, polo tanto, pódese executar en instalacións\n\nNegativa:\n* Os datos de adestramento non están dispoñíbeis de xeito libre, o que limita a capacidade de partes externas para comprobar e corrixir nesgos ou optimizar o rendemento do modelo e o uso de CO2.\n\n## Avaliación ética da IA para o modelo «GPT4All Falcon».\n### Avaliación: 🟢\n\nPositiva:\n* O software para adestramento e inferencia deste modelo é de código aberto\n* O modelo adestrado está dispoñíbel de xeito libre e, polo tanto, pódese executar en instalacións\n* Os datos de adestramento están dispoñíbeis de xeito libre, o que permite comprobar e corrixir nesgos ou optimizar o rendemento do modelo e o uso de CO2.\n\nObteña máis información sobre a avaliación de IA Ética de Nextcloud [no noso blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/).",
    "Status" : "Estado",
    "Machine learning model has been downloaded successfully." : "O modelo de aprendizaxe automática foi descargado correctamente.",
    "The machine learning model still needs to be downloaded (see below)." : "Aínda hai que descargar o modelo de aprendizaxe automática. (vexa embaixo.)",
    "Could not execute python. You may need to set the path to a working executable manually. (See below.)" : "Non foi posíbel executar Python. Quizais necesite estabelecer manualmente a ruta a un executábel que funcione. (vexa embaixo.)",
    "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron." : "Os traballos en segundo plano non se executan mediante cron. Esta aplicación precisa que se executen traballos en segundo plano mediante cron.",
    "The app was installed successfully and will run prompts in background processes on request." : "A aplicación foi instalada correctamente e executará solicitudes en procesos en segundo plano cando o solicite.",
    "Model settings" : "Axustes do modelo",
    "Choose the machine learning model to be used." : "Escolla o modelo de aprendizaxe automática que se utilizará.",
    "Llama2 7B (Recommended)" : "Llama2 7B (Recomendado)",
    "GPT4All Falcon" : "GPT4All Falcon",
    "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:" : "Para descargar o modelo de aprendizaxe automática, debe executar a interface de liña de ordes occ de Nextcloud no terminal do seu servidor coa seguinte orde:",
    "Inference settings" : "Axustes de inferencia",
    "The number of threads to use for inference (more is faster)" : "O número de fíos que se van usar para a inferencia (máis é máis rápido)",
    "Python" : "Python",
    "Checking Python" : "Comprobación de Python",
    "Could not execute Python. You may need to set the path to a working executable manually." : "Non foi posíbel executar Python. Quizais necesite estabelecer manualmente a ruta a un executábel que funcione.",
    "Python executable executed successfully and setup works." : "O executábel de Python executouse con éxito e a configuración funciona.",
    "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards." : "Se non se atopa automaticamente Python no seu sistema por algún motivo, pode estabelecer aquí unha ruta ao executábel de Python. Se cambia este valor, asegúrese de executar occ maintenance:repair após.",
    "Failed to load settings" : "Produciuse un fallo ao cargar os axustes",
    "Failed to save settings" : "Produciuse un fallo ao gardar os axustes"
},
"nplurals=2; plural=(n != 1);");
