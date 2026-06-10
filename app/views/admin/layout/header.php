<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت | باشگاه مشتریان</title>

    <!-- Alpine.js Plugins (برای انیمیشن نرم دراپ داون ها) -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine.js Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="<?= URL_ROOT ?>public/asset/css/main.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- پیکربندی رنگ‌ها و استایل‌های لوکس (Premium) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: "#F4F7FE", // پس‌زمینه مدرن‌تر و روشن‌تر
                        surface: "#FFFFFF",
                        ink: "#1E293B",
                        muted: "#64748B",
                        border: "#E9EDF4",
                        coral: {
                            50: "#FFF1EE",
                            100: "#FFE4DE",
                            200: "#FEC6B8",
                            300: "#FCA08B",
                            400: "#F37861",
                            500: "#E85B44",
                            600: "#D64A35",
                        },
                        indigo: {
                            400: "#818CF8",
                            500: "#6366F1",
                            600: "#4F46E5"
                        }, // رنگ مکمل جذاب
                        success: "#05CD99",
                        warning: "#FFCE20",
                        danger: "#EE5D50",
                    },
                    fontFamily: {
                        sans: ['Vazirmatn', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0px 18px 40px rgba(112, 144, 176, 0.08)',
                        'glow-coral': '0px 8px 20px rgba(232, 91, 68, 0.3)',
                        'glow-indigo': '0px 8px 20px rgba(99, 102, 241, 0.3)',
                        'glow-success': '0px 8px 20px rgba(5, 205, 153, 0.3)',
                    }
                }
            }
        }
    </script>

    <style>
        @font-face {
            font-family: 'Vazirmatn';
            /* مسیر فایل فونت خود را در اینجا قرار دهید */
            src: url('<?= URL_ROOT ?>public/asset/fonts/Vazirmatn-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        /* در صورت نیاز به وزن‌های دیگر (مثل ضخیم): */
        @font-face {
            font-family: 'Vazirmatn';
            src: url('<?= URL_ROOT ?>public/asset/fonts/Vazirmatn-Bold.woff2') format('woff2');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }


        /* استایل‌های اختصاصی برای اسکرول بار جذاب تر */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* افکت شیشه‌ای مدرن */
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-bg text-ink" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex flex-col">

    <!-- هدر بالایی (Top Header) - با افکت شیشه ای مدرن -->
    <header class="h-20 lg:h-24 glass-effect border-b border-white/60 flex items-center justify-between px-4 lg:px-10 z-30 sticky top-0">
        <!-- موبایل تاگل + مسیر جاری -->
        <div class="flex items-center gap-4">
            <button @click="sidebarOpen = true" class="lg:hidden p-2.5 bg-white rounded-xl shadow-sm border border-gray-100 text-muted hover:text-coral-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="hidden sm:flex flex-col">
                <h2 class="text-2xl font-black text-ink tracking-tight">داشبورد مدیریت</h2>
                <p class="text-sm font-medium text-muted mt-0.5">خلاصه وضعیت امروز باشگاه مشتریان</p>
            </div>
        </div>

        <!-- اطلاعات کاربر سمت چپ هدر -->
        <div class="flex items-center gap-4 lg:gap-6">
            <!-- دکمه اعلان ها (آیکون زنگوله) -->
            <button class="relative p-3 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md text-muted hover:text-indigo-500 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-coral-500 rounded-full ring-4 ring-white animate-pulse"></span>
            </button>

            <!-- باکس اطلاعات کاربر -->
            <div class="flex items-center gap-3 p-1.5 pr-4 bg-white border border-gray-100 shadow-sm rounded-full hover:shadow-md hover:border-coral-200 transition-all cursor-pointer">
                <div class="hidden sm:flex flex-col text-left mr-2">
                    <div class="flex items-center justify-end gap-2">
                        <span class="text-sm font-extrabold text-ink"><?= $user->name ?? 'کاربر' ?></span>
                        <span class="px-2 py-0.5 text-[10px] font-bold bg-coral-50 text-coral-500 rounded-md"><?= $user->role ?? 'مدیر' ?></span>
                    </div>
                    <span class="text-[11px] font-medium text-muted text-right tracking-widest mt-0.5"><?= $user->mobile ?? '09120000000' ?></span>
                </div>
                <img src="https://ui-avatars.com/api/?name=User&background=E85B44&color=fff&font-size=0.33" alt="پروفایل" class="w-11 h-11 rounded-full shadow-sm border-2 border-white">
            </div>
        </div>
    </header>

    <div class="flex flex-1">