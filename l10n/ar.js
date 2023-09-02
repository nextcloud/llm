OC.L10N.register(
    "llm",
    {
    "Formalize" : "ترسيم formalize",
    "Rephrase the text to be more formal and polite instead of casual." : "أعِد صياغة النص ليكون أكثر رسميّةً و تهذيباً مما هو عليه.",
    "Simplify" : "بَسِّط",
    "Make the text easier to understand." : "إجعَل النص أسهل فهماً.",
    "Local Large language model" : "نموذج لُغَوِي محلّي ضخم",
    "TextProcessing provider using a Large Language Model that runs locally on CPU" : "مُزوّد لمعالجة النصوص باستعمال نموذج لُغَوِي يعمل على وحدة المعالجة المركزية CPU المحلية",
    "A TextProcessing provider Large Language Model that runs locally on CPU\n\nThe models run completely on your machine. No private data leaves your servers.\n\nAfter installing this app you will need to run\n\n    occ llm:download-model\n\nModels:\n\n* Llama 2 by Meta ([LLAMA 2 Community License](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE))\n* GPT4All Falcon by Nomic AI ([Apache License 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE))\n\nRequirements:\n\n* x86 CPU\n* GNU lib C (musl is not supported)\n* Python 3.10+\n\n## Ethical AI Rating \"Llama 2\" model\n### Rating: 🟡\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n\nNegative:\n\n* the training data is not freely available, limiting the ability of external parties to check and correct for bias or optimise the model’s performance and CO2 usage.\n\n## Ethical AI Rating for \"GPT4All Falcon\" model\n### Rating: 🟢\n\nPositive:\n* the software for training and inference of this model is open source\n* the trained model is freely available, and thus can be run on-premises\n* the training data is freely available, making it possible to check or correct for bias or optimise the performance and CO2 usage.\n\nLearn more about the Nextcloud Ethical AI Rating [in our blog](https://nextcloud.com/blog/nextcloud-ethical-ai-rating/)." : "مُزوّدمعالجة النصوص TextProcessing provider هو نموذج لُغَوِي ضخمٌ يتم تشغيله على وحدة المعالجة المركزية المحلّية. \n\nتعمل النماذج بشكل كامل على جهازك. \nلا توجد بيانات خاصة تترك خوادمك. \nبعد تثبيت هذا التطبيق سوف تحتاج إلى إعطاء الأمر السطري التالي:\nocc llm:download-model \nالنماذج: \n* Llama 2 بواسطة Meta ( [ترخيص مجتمعي LLAMA 2](https://download.nextcloud.com/server/apps/llm/llama-2-7b-chat-ggml/LICENSE)) \n* GPT4All Falcon بواسطة Nomic AI ( [ترخيص Apache 2.0](https://download.nextcloud.com/server/apps/llm/LICENSE)) \n\nالمتطلبات: \n* وحدة المعالجة المركزية x86 *\n GNU lib C (musl غير مدعوم) \n* بايثون 3.10+ \n\n## تقييم الذكاء الاصطناعي الأخلاقي لنموذج \"Llama 2\" \n\n### التقييم: 🟡 \n\nالإيجابيّات: \n* برنامج التدريب والاستدلال لهذا النموذج مفتوح المصدر \n* النموذج المدرب متاح مجانًا، و بالتالي يمكن تشغيله محليّاً \n\nالسلبيّات: \n* بيانات التدريب غير متاحة مجانًا، مما يحد من قدرة الأطراف الخارجية على التحقق من التحيز و تصحيحه أو تحسين أداء النموذج و من استهلاك ثاني أكسيد الكربون OC2. \n\n## تقييم الذكاء الاصطناعي الأخلاقي لنموذج \"GPT4All Falcon\" \n\n### التقييم: 🟢 \nالإيجابيّات: \n* برنامج التدريب والاستدلال لهذا النموذج مفتوح المصدر \n* النموذج المدرب متاح مجانًا، و بالتالي يمكن تشغيله محليًا \n* بيانات التدريب متاحة مجانًا، مما يجعل من الممكن التحقق من التحيز أو تصحيحه أو تحسين الأداء و من استهلاك ثاني أكسيد الكربون OC2. \n\nتعرّف على المزيد حول تصنيف Nextcloud Ethical AI [في مدونتنا]('https://nextcloud.com/blog/nextcloud-ethical-ai-rating/').",
    "Status" : "الحاله",
    "Machine learning model has been downloaded successfully." : "نماذج التعلّم الآلي تمّ تنزيلها بنجاحٍ.",
    "The machine learning model still needs to be downloaded (see below)." : "نموذج التعلُّم الآلي لم يتمّ تنزيله بعدُ (أنظُر أدناه).",
    "Could not execute python. You may need to set the path to a working executable manually. (See below.)" : "تعذر تنفيذ بيثون. قد تحتاج إلى تعيين المسار إلى ملف قابل للتنفيذ يعمل يدويًا. (انظر أدناه.)",
    "Background Jobs are not executed via cron. This app requires background jobs to be executed via cron." : "مهام الخلفية لا تعمل حاليّاً عبر cron. هذا التطبيق يستلزم تشغيل مهام الخلفية عبر cron.",
    "The app was installed successfully and will run prompts in background processes on request." : "تم تثبيت التطبيق بنجاح وسيتم تشغيل المطالبات في العمليات الخلفية عند الطلب.",
    "Model settings" : "إعدادات النموذج",
    "Choose the machine learning model to be used." : "إختَر نموذج التعلُّم الآلي الذي ترغب في استخدامه.",
    "Llama2 7B (Recommended)" : "Llama2 7B (يُوصى به)",
    "GPT4All Falcon" : "GPT4All Falcon",
    "To download the machine learning model, you need to excecute the occ command line interface of Nextcloud on your server terminal with the following command:" : "لتنزيل نموذج التعلٌّم الآلي، تحتاج إلى تنفيذ أمر نكست كلاود السطري occ التالي على جهاز خادومك:",
    "Inference settings" : "إعدادات الاستدلال inference",
    "The number of threads to use for inference (more is faster)" : "عدد الخيوط threads المراد استخدامها للاستدلال (كلما زاد عددها، زادت سرعة الأداء)",
    "Python" : "Python",
    "Checking Python" : "إختبار بايتون ",
    "Could not execute Python. You may need to set the path to a working executable manually." : "تعذر تنفيذ بايثون. قد تحتاج إلى تعيين المسار إلى ملف قابل للتنفيذ يعمل يدويًا.",
    "Python executable executed successfully and setup works." : "تم تنفيذ برنامج Python بنجاح، و الإعداد يعمل.",
    "If Python is not found automatically on your system for some reason you can set the path to the Python executable here. If you change this value, make sure to run occ maintenance:repair afterwards." : "إذا لم يتم العثور على Python تلقائيًا على نظامك لسببٍ ما، يمكنك تعيين المسار إلى Python التنفيذي هنا. إذا قمت بتغيير هذه القيمة، فقم لاحقاً بتشغيل الأمر السطري: \nocc maintenance:repair ",
    "Failed to load settings" : "إخفاق في تحميل الإعدادات",
    "Failed to save settings" : "إخفاق في حفظ الإعدادات"
},
"nplurals=6; plural=n==0 ? 0 : n==1 ? 1 : n==2 ? 2 : n%100>=3 && n%100<=10 ? 3 : n%100>=11 && n%100<=99 ? 4 : 5;");
