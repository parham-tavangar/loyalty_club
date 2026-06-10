<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>صفحه پیدا نشد | 404</title>

    <!-- Tailwind CDN -->
    <script src="<?= URL_ROOT ?>public/asset/css/tailwind.css"></script>

    <!-- Tailwind config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: "#F8FAFC",
                        surface: "#FFFFFF",
                        ink: "#0F172A",
                        muted: "#475569",
                        border: "#E2E8F0",

                        coral: {
                            50: "#FFF1EE",
                            100: "#FFE4DE",
                            200: "#FEC6B8",
                            300: "#FCA08B",
                            400: "#F37861",
                            500: "#E85B44",
                        },

                        success: "#16A34A",
                        warning: "#F59E0B",
                        danger: "#DC2626",
                    },
                },
            },
        };
    </script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Vazirmatn", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }
    </style>
</head>

<!-- اضافه شدن min-h-screen و flex برای وسط‌چین کردن کامل در کل صفحه -->
<body class="bg-bg text-ink min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- حباب‌های تزئینی تار در پس‌زمینه برای زیبایی بیشتر -->
    <div class="absolute top-[-10%] right-[-5%] w-80 h-80 bg-coral-200 rounded-full mix-blend-multiply filter blur-[80px] opacity-40"></div>
    <div class="absolute bottom-[-10%] left-[-5%] w-80 h-80 bg-coral-300 rounded-full mix-blend-multiply filter blur-[80px] opacity-30"></div>

    <!-- استفاده از -mt-16 برای متمایل کردن کادر به سمت بالای کادر (از لحاظ بصری بهتر است) -->
    <main class="w-full px-4 sm:px-6 lg:px-8 relative z-10 -mt-16 sm:-mt-24">
        <section class="max-w-lg mx-auto">
            <!-- اضافه شدن سایه بزرگ و نرم به کادر -->
            <div class="rounded-[2rem] border border-border bg-surface overflow-hidden shadow-2xl shadow-coral-500/10 transition-all hover:shadow-coral-500/20">
                <!-- نوار بالای کادر با افکت گرادیانت -->
                <div class="h-2.5 bg-gradient-to-l from-coral-300 via-coral-400 to-coral-500"></div>

                <div class="p-8 sm:p-12 text-center">
                    
                    <!-- بخش عدد 404 با طراحی مدرن‌تر -->
                    <div class="relative inline-flex items-center justify-center mb-8">
                        <!-- هاله رنگی زیر آیکون -->
                        <div class="absolute inset-0 bg-coral-200 rounded-full blur-xl opacity-50"></div>
                        
                        <div class="relative flex items-center justify-center h-28 w-28 rounded-3xl bg-coral-50 border-2 border-coral-100 rotate-3 hover:rotate-0 transition-transform duration-300">
                            <span class="text-5xl font-black text-coral-500 tracking-tighter">404</span>
                        </div>
                    </div>

                    <!-- عنوان -->
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-ink mb-4">
                        اوه! صفحه پیدا نشد
                    </h1>
                    
                    <!-- متن توضیحات -->
                    <p class="text-muted text-sm sm:text-base mb-8 leading-relaxed px-4">
                        آدرسی که به دنبال آن هستید وجود ندارد، نام آن تغییر کرده یا موقتاً از دسترس خارج شده است.
                    </p>

                    <!-- دکمه‌ها -->
              <!-- دکمه‌ها -->
<div class="flex flex-col sm:flex-row items-center justify-center gap-3">

    <!-- دکمه بازگشت به خانه -->
    <a href="http://127.0.0.1:8080/loyalty_club/"
        class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-coral-400 text-white font-semibold hover:bg-coral-500 hover:-translate-y-0.5 shadow-lg shadow-coral-400/30 transition-all w-full sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        بازگشت به خانه
    </a>

    <!-- دکمه بازگشت به پنل ادمین -->
    <a href="http://127.0.0.1:8080/loyalty_club/admin-panel"
        class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-slate-800 text-white font-semibold hover:bg-slate-900 hover:-translate-y-0.5 shadow-lg shadow-slate-800/30 transition-all w-full sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4" />
        </svg>
        بازگشت به پنل ادمین
    </a>

</div>

                    
                </div>
            </div>
        </section>
    </main>
</body>

</html>
