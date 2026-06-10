<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>پنل کاربر | خانه</title>

    <!-- Tailwind CDN -->
    <script src="<?= URL_ROOT ?>public/asset/css/tailwind.css"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="<?= URL_ROOT ?>public/asset/css/main.css">


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
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Vazirmatn", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-bg text-ink">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="sticky top-0 z-30 bg-surface/80 backdrop-blur border-b border-border">
            <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-4">
                <a href="<?= URL_ROOT ?>">

                    <div class="flex items-center gap-3">
                        <button
                            class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-xl border border-border hover:bg-bg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-muted" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-3">

                            <div
                                class="h-10 w-10 rounded-xl bg-coral-100 text-ink flex items-center justify-center font-extrabold">
                                <img src="<?= URL_ROOT . "public/asset/image/honeymoonatr.png" ?>" alt="">

                            </div>
                            <div>
                                <p class="font-semibold leading-6">باشگاه مشتریان</p>
                                <p class="text-xs text-muted">پنل کاربر</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Search -->
                <!-- <div class="hidden md:flex flex-1 max-w-xl">
                    <div class="relative w-full">
                        <input type="text" placeholder="جستجو..."
                            class="w-full h-11 rounded-xl border border-border bg-surface px-4 pr-11 text-sm outline-none focus:ring-2 focus:ring-coral-200 focus:border-coral-300" />
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="M21 21l-4.3-4.3"></path>
                            </svg>
                        </span>
                    </div>
                </div> -->

                <!-- User -->
                <div class="flex items-center gap-3">

                    <a href="<?= URL_ROOT ?>points/my-points">
                        <div
                            class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-xl bg-coral-50 border border-coral-100">
                            <span class="text-xs text-muted">امتیاز</span>
                            <span class="font-bold"><?= $currentPoint->points ?></span>
                        </div>
                    </a>
                    <a href="<?= URL_ROOT ?>users/tier">
                        <div class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-xl bg-bg border border-border">
                            <span class="text-xs text-muted">سطح</span>
                            <span class="font-semibold">
                                <?= $currentTier->name ?>
                            </span>
                        </div>
                    </a>
                    <div class="flex items-center gap-3">
                        <a href="<?= URL_ROOT ?>users/profile">
                            <div class="h-10 w-10 rounded-xl bg-coral-100 flex items-center justify-center font-bold">
                                <img src="<?= URL_ROOT . "public/asset/image/profile.png" ?>" alt="">

                            </div>
                        </a>
                        <div class="hidden sm:block leading-5">
                            <p class="text-sm font-semibold"><?= $user->name ?></p>
                            <p class="text-xs text-muted"><?= $user->mobile ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- Main Layout -->
        <div class="flex flex-1">