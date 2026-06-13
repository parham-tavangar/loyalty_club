<!-- کانتینر اصلی -->
<div class="w-full max-w-[1300px] mx-auto space-y-5 mt-8">

    <!-- هدر بالای صفحه -->
    <div>
        <h1 class="text-lg font-semibold leading-6 text-ink">امتیازهای من</h1>
        <p class="text-sm text-muted mt-1">مدیریت امتیازهای شما در باشگاه مشتریان</p>
    </div>

    <!-- هدر تیره و جذاب (Hero Section) -->
    <div
        class="relative bg-ink rounded-[2.5rem] p-8 md:p-10 shadow-lg overflow-hidden flex flex-col xl:flex-row items-center justify-between gap-8 border border-gray-800">
        <!-- افکت درخشان پس‌زمینه (Glow) -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-coral-500/20 blur-[100px] rounded-full pointer-events-none">
        </div>
        <div
            class="absolute -bottom-32 -left-32 w-80 h-80 bg-blue-500/10 blur-[100px] rounded-full pointer-events-none">
        </div>

        <!-- عنوان -->
        <div class="relative z-10 space-y-3 text-center xl:text-right">
            <h1 class="text-3xl md:text-4xl font-bold text-white">تاریخچه امتیازات</h1>
            <p class="text-gray-400 text-base md:text-lg">گزارش کامل دریافت و مصرف امتیازات شما</p>
        </div>

        <!-- باکس‌های آماری -->
        <div class="relative z-10 flex flex-wrap justify-center gap-4">
            <!-- امتیاز فعلی -->
            <div
                class="bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl p-5 text-center min-w-[150px] transition-transform hover:scale-105">
                <span class="block text-gray-400 text-sm font-medium mb-1">امتیاز فعلی</span>
                <span
                    class="block text-2xl md:text-3xl font-bold text-white"><?= number_format($currentPoint->points) ?></span>
            </div>
            <!-- کل کسب‌شده -->
            <div
                class="bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl p-5 text-center min-w-[150px] transition-transform hover:scale-105 shadow-[0_0_20px_rgba(255,107,107,0.1)]">
                <span class="block text-gray-400 text-sm font-medium mb-1">کل کسب‌ شده</span>
                <span
                    class="block text-2xl md:text-3xl font-bold text-coral-500"><?= number_format($totalEarned) ?></span>
            </div>
            <!-- کل تراکنش‌ها -->
            <div
                class="bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl p-5 text-center min-w-[150px] transition-transform hover:scale-105">
                <span class="block text-gray-400 text-sm font-medium mb-1">تعداد کل تراکنش‌ها</span>
                <div class="flex items-baseline justify-center gap-1">
                    <span class="block text-2xl md:text-3xl font-bold text-white"><?= $totalLogsPoint ?></span>
                    <span class="text-gray-400 text-sm">ردیف</span>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش پایین: عنوان، فیلترها و جدول -->
    <div class="pt-2 space-y-4">
        <!-- عنوان بالای جدول -->
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-ink">تاریخچه تراکنش های شما</h2>
        </div>

        <!-- بخش فیلترها و تب‌ها -->
        <!-- <div class="flex items-center gap-3 overflow-x-auto pb-2"> -->
        <!-- دکمه فعال -->
        <!-- <button class="px-8 py-3 rounded-2xl bg-coral-500 text-white text-base font-medium shadow-md shrink-0 hover:bg-coral-600 hover:-translate-y-0.5 hover:shadow-lg transition-all duration-300">
                همه تراکنش‌ها
            </button>
            <button class="px-8 py-3 rounded-2xl bg-white text-green-600 border border-border text-base font-medium shrink-0 hover:bg-green-50 hover:border-green-200 hover:-translate-y-0.5 hover:shadow-sm transition-all duration-300">
                کسب‌ شده
            </button>
            <button class="px-8 py-3 rounded-2xl bg-white text-red-500 border border-border text-base font-medium shrink-0 hover:bg-red-50 hover:border-red-200 hover:-translate-y-0.5 hover:shadow-sm transition-all duration-300">
                مصرف‌ شده
            </button>
        </div> -->

        <!-- جدول تراکنش‌ها -->
        <?php if (!empty($pointLogs)): ?>
            <div class="bg-white border border-border rounded-[2rem] overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="bg-surface text-gray-500 text-sm border-b border-border">
                                <th class="px-5 py-4 font-medium w-24">شناسه</th>
                                <th class="px-5 py-4 font-medium">نوع تراکنش</th>
                                <th class="px-5 py-4 font-medium">تاریخ</th>
                                <th class="px-5 py-4 font-medium">زمان</th>
                                <th class="px-5 py-4 font-medium">توضیحات</th>
                                <th class="px-5 py-4 font-medium">مقدار امتیاز</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border text-sm md:text-base">
                            <!-- ردیف امتیاز مثبت (کسب‌شده) -->
                            <?php foreach ($pointLogs as $pointLog): ?>
                                <?php if ($pointLog->points_change > 0): ?>
                                    <tr class="bg-green-50/40 hover:bg-green-50 transition-colors duration-200">
                                        <td class="px-5 py-3.5 text-gray-500"><?= "#" . $pointLog->id ?></td>
                                        <td class="px-5 py-3.5 font-bold text-gray-600 text-sm">
                                            <?= translatePointType($pointLog->type) ?></td>

                                        <td class="px-5 py-3.5 text-gray-600 text-sm"><?= toShamsi($pointLog->created_at) ?></td>
                                        <td class="px-5 py-3.5 text-gray-600 text-sm"><?= substr($pointLog->created_at, 11, 12) ?>
                                        </td>
                                        <td class="px-5 py-3.5 text-ink"><?= $pointLog->description ?></td>

                                        <td class="px-5 py-3.5 font-bold text-green-600 dir-ltr text-right">
                                            <?= $pointLog->points_change . "+" ?></td>
                                    </tr>
                                <?php else: ?>
                                    <tr class="bg-red-50/40 hover:bg-red-50 transition-colors duration-200">
                                        <td class="px-5 py-3.5 text-gray-500"><?= "#" . $pointLog->id ?></td>
                                        <td class="px-5 py-3.5 font-bold text-gray-600 text-sm">
                                            <?= translatePointType($pointLog->type) ?></td>
                                        <td class="px-5 py-3.5 text-gray-600 text-sm"><?= toShamsi($pointLog->created_at) ?></td>
                                        <td class="px-5 py-3.5 text-gray-600 text-sm"><?= substr($pointLog->created_at, 11, 12) ?>
                                        </td>
                                        <td class="px-5 py-3.5 text-ink"><?= $pointLog->description ?></td>
                                        <td class="px-5 py-3.5 font-bold text-red-500 dir-ltr text-right">
                                            <?= substr($pointLog->points_change, 1) . "-" ?></td>
                                    </tr>

                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- صفحه‌بندی -->
                <div
                    class="px-6 py-4 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-b-[2rem]">

                    <!-- متن داینامیک نمایش اطلاعات -->
                    <span class="text-sm text-gray-500">
                        نمایش <?= ($totalLogsPoint == 0) ? 0 : (($currentPage - 1) * $logsPerPage) + 1 ?>
                        تا <?= min($currentPage * $logsPerPage, $totalLogsPoint) ?>
                        از <?= $totalLogsPoint ?> تراکنش
                    </span>

                    <div class="flex items-center gap-2">

                        <!-- دکمه قبلی (راست - چون قالب فارسی است) -->
                        <?php if ($currentPage > 1): ?>
                            <a href="<?= URL_ROOT ?>points/history?page=<?= $currentPage - 1 ?>"
                                class="p-2 rounded-xl border border-border text-gray-600 hover:text-ink hover:bg-gray-100 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        <?php else: ?>
                            <button
                                class="p-2 rounded-xl border border-border text-gray-400 disabled:opacity-50 disabled:bg-transparent cursor-not-allowed"
                                disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </button>
                        <?php endif; ?>

                        <!-- شماره صفحات -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php if ($i == $currentPage): ?>
                                <a href="<?= URL_ROOT ?>points/history?page=<?= $i ?>"
                                    class="w-9 h-9 rounded-xl bg-coral-500 text-white font-medium flex items-center justify-center shadow-sm text-sm hover:bg-coral-600 transition-colors duration-200">
                                    <?= $i ?>
                                </a>
                            <?php else: ?>
                                <a href="<?= URL_ROOT ?>points/history?page=<?= $i ?>"
                                    class="w-9 h-9 rounded-xl bg-white border border-border text-gray-600 hover:bg-gray-100 hover:text-ink font-medium flex items-center justify-center transition-colors duration-200 text-sm">
                                    <?= $i ?>
                                </a>
                            <?php endif ?>
                        <?php endfor ?>

                        <!-- دکمه بعدی (چپ) -->
                        <?php if ($currentPage < $totalPages): ?>
                            <a href="<?= URL_ROOT ?>points/history?page=<?= $currentPage + 1 ?>"
                                class="p-2 rounded-xl border border-border text-gray-600 hover:text-ink hover:bg-gray-100 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                            </a>
                        <?php else: ?>
                            <button
                                class="p-2 rounded-xl border border-border text-gray-400 disabled:opacity-50 disabled:bg-transparent cursor-not-allowed"
                                disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                            </button>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php else: ?>
            <div class="py-20 px-6 flex flex-col items-center justify-center text-center">

                <div class="relative mb-6">
                    <div
                        class="h-20 w-20 rounded-full bg-coral-50 flex items-center justify-center text-coral-500 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="absolute inset-0 bg-coral-500/10 blur-2xl rounded-full"></div>
                </div>

                <h3 class="text-xl font-bold text-ink mb-2">تاریخچه‌ای یافت نشد</h3>
                <p class="text-muted text-sm max-w-xs mx-auto mb-8 leading-relaxed">
                    هنوز تراکنشی برای امتیازهای شما ثبت نشده است. پس از اولین فعالیت، جزئیات آن در اینجا نمایش داده می‌شود.
                </p>
            </div>
        <?php endif; ?>

    </div>

</div>