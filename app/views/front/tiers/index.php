<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سطح کاربری من</title>

    <!-- فونت وزیرمتن -->
    <!-- <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.0.0/Vazirmatn-font-face.css" rel="stylesheet"
        type="text/css" /> -->

    <!-- تیلویند -->
    <script src="<?= URL_ROOT ?>public/asset/css/tailwind.css"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Vazirmatn', 'sans-serif'],
                    },
                    colors: {
                        ink: '#1f2937',      // رنگ تیره اصلی
                        coral: {
                            500: '#f43f5e',  // رنگ دکمه‌ها و هایلایت (Rose/Coral)
                            600: '#e11d48',
                        },
                        muted: '#6b7280',    // متن‌های کم‌رنگ
                        surface: '#f9fafb',  // پس‌زمینه کارت‌ها
                        border: '#e5e7eb',   // حاشیه‌ها
                        gold: '#fbbf24',     // رنگ ویژه سطح طلایی
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans p-4 md:p-8">

    <!-- کانتینر اصلی -->
    <div class="w-full max-w-[1150px] mx-auto space-y-6">

        <!-- هدر بالای صفحه -->
        <div class="mt-8">
            <h1 class="text-xl font-bold leading-6 text-ink">سطح کاربری من</h1>
            <p class="text-sm text-muted mt-2">مشاهده وضعیت، مزایا و پیشرفت شما در باشگاه مشتریان</p>
        </div>

        <?php if ($currentTier->id == 1): ?>
            <!-- ==========================================
         ۱. سطح برنزی (Bronze)
    =========================================== -->
            <div
                class="relative bg-ink rounded-[2.5rem] p-8 md:p-10 shadow-lg overflow-hidden flex flex-col items-center justify-between gap-8 border border-gray-800">
                <!-- افکت درخشان پس‌زمینه (Glow) -->
                <div
                    class="absolute -top-32 -right-32 w-96 h-96 bg-orange-500/10 blur-[100px] rounded-full pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-32 -left-32 w-80 h-80 bg-red-500/10 blur-[100px] rounded-full pointer-events-none">
                </div>

                <!-- اطلاعات سطح کاربری -->
                <div class="relative z-10 w-full text-center space-y-4">
                    <div
                        class="inline-flex items-center justify-center p-3 bg-orange-500/20 rounded-2xl mb-2 border border-orange-500/30 shadow-[0_0_15px_rgba(249,115,22,0.2)]">
                        <!-- آیکون ستاره -->
                        <svg class="w-8 h-8 text-orange-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white">کاربر <span class="text-orange-400">برنزی</span>
                    </h1>
                    <p class="text-gray-400 text-sm md:text-base max-w-lg mx-auto">شروع یک مسیر هیجان‌انگیز! با انجام خرید و
                        فعالیت‌های بیشتر، امتیاز کسب کنید و به سطوح بالاتر برسید.</p>
                </div>

                <!-- نوار پیشرفت -->
                <div
                    class="relative z-10 w-full max-w-3xl mx-auto mt-4 bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl p-6">
                    <div class="flex justify-between items-end mb-3">
                        <div>
                            <span class="text-white font-bold text-xl"><?= number_format($currentPoint->points) ?></span>
                            <span class="text-gray-400 text-sm"> امتیاز فعلی</span>
                        </div>
                        <div class="text-left">
                            <span class="text-white font-bold text-xl"><?= number_format($nextTier->min_points) ?></span>
                            <span class="text-gray-400 text-sm"> امتیاز هدف</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-4 overflow-hidden shadow-inner">
                        <div class="bg-gradient-to-l from-orange-400 to-red-500 h-4 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(249,115,22,0.4)]"
                            style="width: <?= $progressPercentage ?>%"></div>
                    </div>
                    <div class="flex justify-between items-center mt-3 text-xs text-gray-400 font-medium">
                        <span>سطح فعلی: برنزی</span>
                        <span><?= $progressPercentage . "%" ?> تکمیل شده</span>
                        <span>سطح بعدی: نقره‌ای</span>
                    </div>
                </div>
            </div>

        <?php elseif ($currentTier->id == 2): ?>

            <!-- ==========================================
         ۲. سطح نقره‌ای (Silver)
    =========================================== -->
            <div
                class="relative bg-ink rounded-[2.5rem] p-8 md:p-10 shadow-lg overflow-hidden flex flex-col items-center justify-between gap-8 border border-gray-800">
                <!-- افکت درخشان پس‌زمینه (Glow) -->
                <div
                    class="absolute -top-32 -right-32 w-96 h-96 bg-slate-300/10 blur-[100px] rounded-full pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-32 -left-32 w-80 h-80 bg-blue-400/10 blur-[100px] rounded-full pointer-events-none">
                </div>

                <!-- اطلاعات سطح کاربری -->
                <div class="relative z-10 w-full text-center space-y-4">
                    <div
                        class="inline-flex items-center justify-center p-3 bg-slate-400/20 rounded-2xl mb-2 border border-slate-400/30 shadow-[0_0_15px_rgba(148,163,184,0.2)]">
                        <!-- آیکون سپر -->
                        <svg class="w-8 h-8 text-slate-300" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white">کاربر <span class="text-slate-300">نقره‌ای</span>
                    </h1>
                    <p class="text-gray-400 text-sm md:text-base max-w-lg mx-auto">شما در مسیر پیشرفت هستید! از مزایای ویژه
                        نقره‌ای لذت ببرید و برای رسیدن به بالاترین سطح آماده شوید.</p>
                </div>

                <!-- نوار پیشرفت -->
                <div
                    class="relative z-10 w-full max-w-3xl mx-auto mt-4 bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl p-6">
                    <div class="flex justify-between items-end mb-3">
                        <div>
                            <span class="text-white font-bold text-xl"><?= number_format($currentPoint->points) ?></span>
                            <span class="text-gray-400 text-sm"> امتیاز فعلی</span>
                        </div>
                        <div class="text-left">
                            <span class="text-white font-bold text-xl"><?= number_format($nextTier->min_points) ?></span>
                            <span class="text-gray-400 text-sm"> امتیاز هدف</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-4 overflow-hidden shadow-inner">
                        <div class="bg-gradient-to-l from-slate-300 to-slate-500 h-4 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(148,163,184,0.4)]"
                            style="width: <?= $progressPercentage ?>%"></div>
                    </div>
                    <div class="flex justify-between items-center mt-3 text-xs text-gray-400 font-medium">
                        <span>سطح فعلی: نقره‌ای</span>
                        <span>
                            <?= $progressPercentage . "%" ?> تکمیل شده
                        </span>
                        <span>سطح بعدی: طلایی</span>
                    </div>
                </div>
            </div>

        <?php elseif ($currentTier->id == 3): ?>

            <!-- ==========================================
         ۳. سطح طلایی (Gold) - بالاترین سطح
    =========================================== -->
            <div
                class="relative bg-ink rounded-[2.5rem] p-8 md:p-10 shadow-2xl overflow-hidden flex flex-col items-center justify-between gap-8 border border-gray-700">
                <!-- افکت درخشان پس‌زمینه (Glow) -->
                <div
                    class="absolute -top-32 -right-32 w-[28rem] h-[28rem] bg-gold/20 blur-[120px] rounded-full pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-32 -left-32 w-[28rem] h-[28rem] bg-orange-500/20 blur-[120px] rounded-full pointer-events-none">
                </div>

                <!-- افکت ستاره‌های ریز پس‌زمینه -->
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-50">
                </div>

                <!-- اطلاعات سطح کاربری -->
                <div class="relative z-10 w-full text-center space-y-4">
                    <div
                        class="inline-flex items-center justify-center p-3 bg-gold/20 rounded-2xl mb-2 border border-gold/40 shadow-[0_0_25px_rgba(251,191,36,0.4)] animate-pulse">
                        <!-- آیکون تاج -->
                        <svg class="w-8 h-8 text-gold" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white">کاربر <span
                            class="text-transparent bg-clip-text bg-gradient-to-l from-yellow-300 to-gold">طلایی
                            (VIP)</span></h1>
                    <p class="text-gray-300 text-sm md:text-base max-w-lg mx-auto font-medium">تبریک! شما در بالاترین سطح
                        باشگاه مشتریان قرار دارید و از تمامی امکانات و هدایای اختصاصی VIP برخوردار هستید.</p>
                </div>

                <!-- نوار پیشرفت (کامل شده) -->
                <div
                    class="relative z-10 w-full max-w-3xl mx-auto mt-4 bg-white/5 backdrop-blur-md border border-gold/20 rounded-3xl p-6 shadow-[0_0_30px_rgba(251,191,36,0.05)]">
                    <div class="flex justify-between items-end mb-3">
                        <div>
                            <span class="text-white font-bold text-xl"><?= number_format($currentPoint->points) ?></span>
                            <span class="text-gray-400 text-sm"> امتیاز فعلی</span>
                        </div>
                        <div class="text-left">
                            <span class="text-gold font-bold text-xl tracking-widest">MAX</span>
                            <span class="text-gray-400 text-sm"> بالاترین سطح</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-4 overflow-hidden shadow-inner">
                        <div class="bg-gradient-to-l from-yellow-300 via-gold to-yellow-600 h-4 rounded-full shadow-[0_0_15px_rgba(251,191,36,0.8)]"
                            style="width: 100%"></div>
                    </div>
                    <div class="flex justify-center items-center mt-3 text-sm text-gold font-bold">
                        <span>شما در قله ایستاده‌اید! 🌟</span>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!-- بخش پایین: مزایا و راهنمای سطوح -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-4">

            <!-- ستون سمت چپ: راهنمای سطوح کاربری -->
            <div class="lg:col-span-2 space-y-4">
                <h2 class="font-semibold text-lg text-ink">راهنمای سطوح کاربری</h2>

                <div class="bg-white border border-border rounded-[2rem] overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="bg-surface text-gray-500 text-sm border-b border-border">
                                    <th class="px-6 py-4 font-medium">نام سطح</th>
                                    <th class="px-6 py-4 font-medium">امتیاز مورد نیاز</th>
                                    <th class="px-6 py-4 font-medium">وضعیت شما</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border text-sm md:text-base">
                                <?php foreach ($tiers as $tier): ?>
                                    <?php
                                    if ($tier->min_points < $currentTier->min_points) {
                                        $status = 'passed';
                                        $statusText = 'عبور کرده';
                                        $statusBadgeClass = 'bg-gray-100 text-gray-500 font-medium';
                                    } elseif ($tier->min_points == $currentTier->min_points) {
                                        $status = 'current';
                                        $statusText = 'سطح فعلی شما';
                                    } else {
                                        $status = 'future';
                                        $statusText = 'در انتظار ...';
                                        $statusBadgeClass = 'bg-gray-100 text-gray-400 font-medium';
                                    }
                                    if ($tier->min_points < 100) {
                                        $tierName = $tier->name ?? 'برنزی';
                                        $textColorClass = 'text-orange-700';
                                        $dotBgClass = 'bg-orange-700';
                                        $rowBgClass = ($status === 'current') ? 'bg-orange-50/50 hover:bg-orange-50' : 'hover:bg-gray-50';
                                        if ($status === 'current')
                                            $statusBadgeClass = 'bg-orange-100 text-orange-800 border border-orange-200 font-bold';

                                    } elseif ($tier->min_points < 200) {
                                        $tierName = $tier->name ?? 'نقره‌ای';
                                        $textColorClass = 'text-gray-400';
                                        $dotBgClass = 'bg-gray-400';
                                        $rowBgClass = ($status === 'current') ? 'bg-slate-50/50 hover:bg-slate-50' : 'hover:bg-gray-50';
                                        if ($status === 'current')
                                            $statusBadgeClass = 'bg-slate-100 text-slate-700 border border-slate-200 font-bold';
                                    } else {
                                        $tierName = $tier->name ?? 'طلایی';
                                        $textColorClass = 'text-gold';
                                        $dotBgClass = 'bg-gold shadow-[0_0_8px_rgba(251,191,36,0.8)]';
                                        $rowBgClass = ($status === 'current') ? 'bg-yellow-50/50 hover:bg-yellow-50' : 'hover:bg-gray-50';
                                        if ($status === 'current')
                                            $statusBadgeClass = 'bg-yellow-100 text-yellow-700 border border-yellow-200 font-bold';
                                    }
                                    ?>
                                    <tr class="<?= $rowBgClass ?> transition-colors duration-200 relative">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2 font-bold <?= $textColorClass ?>">
                                                <div class="w-3 h-3 rounded-full <?= $dotBgClass ?>"></div>
                                                <?= $tierName ?>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-gray-600">
                                            <?php if (isset($tier->max_points) && $tier->max_points > 0): ?>
                                                از <?= number_format($tier->min_points) ?> تا
                                                <?= number_format($tier->max_points) ?>
                                            <?php else: ?>
                                                از <?= number_format($tier->min_points) ?> به بالا
                                            <?php endif; ?>
                                        </td>

                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs <?= $statusBadgeClass ?>">
                                                <?= $statusText ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>