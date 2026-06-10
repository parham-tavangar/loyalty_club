  <!-- ========================================== -->
  <!-- بدنه اصلی (شامل هدر و محتوا) -->
  <!-- ========================================== -->
  <div class="flex-1 flex flex-col min-w-0">
<body class="bg-bg text-ink font-sans antialiased h-screen overflow-hidden flex" x-data="{ sidebarOpen: false }">

      <!-- هدر (HEADER) - با افکت شیشه ای مدرن -->
    

      <!-- محتوای اصلی (MAIN) -->
      <main class="flex-1 overflow-y-auto p-4 lg:p-10 scroll-smooth">

          <?php
            // دریافت فیلتر فعلی از URL (پیش‌فرض 'all')
            $currentFilter = $_GET['filter'] ?? 'all';

            // تعریف کلاس‌های استایل برای حالت فعال و غیرفعال
            $activeClass = "flex-1 md:flex-none whitespace-nowrap px-6 py-2.5 bg-gradient-to-r from-coral-500 to-coral-400 rounded-xl text-sm font-bold text-white shadow-glow-coral transition-all";
            $inactiveClass = "flex-1 md:flex-none whitespace-nowrap px-6 py-2.5 rounded-xl text-sm font-bold text-muted hover:text-ink transition-colors";
            ?>

          <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
              <div class="flex bg-white p-1.5 rounded-2xl shadow-sm border border-white w-full md:w-auto overflow-x-auto">
                  <a href="?filter=all" class="<?= $currentFilter === 'all' ? $activeClass : $inactiveClass ?>">همه</a>
                  <a href="?filter=today" class="<?= $currentFilter === 'today' ? $activeClass : $inactiveClass ?>">امروز</a>
                  <a href="?filter=month" class="<?= $currentFilter === 'month' ? $activeClass : $inactiveClass ?>">این ماه</a>
                  <a href="?filter=year" class="<?= $currentFilter === 'year' ? $activeClass : $inactiveClass ?>">سال جاری</a>
              </div>
              <!-- دکمه دریافت گزارش... -->
          </div>


          <!-- ۳ کارت آماری (طبق درخواست جدید) -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mb-8">

              <!-- کارت 1: مجموع امتیازات توزیع شده -->
              <div
                  class="bg-surface p-6 lg:p-8 rounded-3xl border border-white shadow-soft relative overflow-hidden group hover:-translate-y-1 hover:shadow-glow-coral transition-all duration-300">
                  <div
                      class="absolute -left-6 -top-6 w-32 h-32 bg-coral-50 rounded-full group-hover:scale-150 transition-transform duration-700 opacity-50 pointer-events-none">
                  </div>
                  <div class="flex justify-between items-start relative z-10 mb-4">
                      <div
                          class="w-14 h-14 rounded-2xl bg-gradient-to-br from-coral-400 to-coral-500 flex items-center justify-center text-white shadow-glow-coral">
                          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              </path>
                          </svg>
                      </div>
                      <!-- <span
                          class="text-success flex items-center bg-green-50 px-2.5 py-1 rounded-lg text-sm font-bold">
                          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                          </svg>
                          ۱۲٪ رشد
                      </span> -->
                  </div>
                  <p class="text-sm font-bold text-muted mb-1 relative z-10">مجموع امتیازات توزیع شده</p>
                  <h3 class="text-4xl font-black text-ink relative z-10"><?= number_format($allTotalEarned) ?></h3>
              </div>

              <!-- کارت 2: تعداد کل کاربران -->
              <div
                  class="bg-surface p-6 lg:p-8 rounded-3xl border border-white shadow-soft relative overflow-hidden group hover:-translate-y-1 hover:shadow-glow-indigo transition-all duration-300">
                  <div
                      class="absolute -left-6 -top-6 w-32 h-32 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-700 opacity-50 pointer-events-none">
                  </div>
                  <div class="flex justify-between items-start relative z-10 mb-4">
                      <div
                          class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white shadow-glow-indigo">
                          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                              </path>
                          </svg>
                      </div>
                      <!-- <span
                          class="text-indigo-600 flex items-center bg-indigo-50 px-2.5 py-1 rounded-lg text-sm font-bold">
                          + ۴۵ کاربر جدید
                      </span> -->
                  </div>
                  <p class="text-sm font-bold text-muted mb-1 relative z-10">تعداد کل کاربران</p>
                  <h3 class="text-4xl font-black text-ink relative z-10"><?= $totalRegisteredUsers ?></h3>
              </div>

              <!-- کارت 3: مجموع امتیازات مصرف شده -->
              <div
                  class="bg-surface p-6 lg:p-8 rounded-3xl border border-white shadow-soft relative overflow-hidden group hover:-translate-y-1 hover:shadow-glow-success transition-all duration-300">
                  <div
                      class="absolute -left-6 -top-6 w-32 h-32 bg-green-50 rounded-full group-hover:scale-150 transition-transform duration-700 opacity-50 pointer-events-none">
                  </div>
                  <div class="flex justify-between items-start relative z-10 mb-4">
                      <div
                          class="w-14 h-14 rounded-2xl bg-gradient-to-br from-success to-green-400 flex items-center justify-center text-white shadow-glow-success">
                          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                      </div>
                      <!-- <span
                          class="text-success flex items-center bg-green-50 px-2.5 py-1 rounded-lg text-sm font-bold">
                          ٪۵۲ نرخ مصرف
                      </span> -->
                  </div>
                  <p class="text-sm font-bold text-muted mb-1 relative z-10">مجموع امتیازات مصرف شده</p>
                  <h3 class="text-4xl font-black text-ink relative z-10"><?= $getAllTotalDeductedPoints ?></h3>
              </div>

          </div>

          <!-- بخش نمودار و لیست آخرین فعالیت‌ها -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 mb-8">

              <!-- نمودار فرضی (بخش سمت راست، عریض‌تر) -->
              <div class="lg:col-span-2 bg-surface p-6 lg:p-8 rounded-3xl border border-white shadow-soft">
                  <div class="flex justify-between items-center mb-8">
                      <div>
                          <h3 class="font-black text-xl text-ink">روند کسب و مصرف امتیاز</h3>
                          <p class="text-sm text-muted font-medium mt-1">گزارش آماری ماهانه</p>
                      </div>
                      <!-- <button
                          class="p-2.5 bg-gray-50 hover:bg-coral-50 rounded-xl text-muted hover:text-coral-500 transition-colors">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                              </path>
                          </svg>
                      </button> -->
                  </div>

                  <!-- نمودار ستونی لوکس با CSS -->
                  <div class="h-64 w-full flex items-end justify-between gap-2 sm:gap-6 border-b border-border pb-4 relative">
                      <!-- خطوط راهنما -->
                      <div class="absolute inset-0 flex flex-col justify-between pt-2 pb-4 pointer-events-none">
                          <div class="border-b border-border border-dashed w-full opacity-40"></div>
                          <div class="border-b border-border border-dashed w-full opacity-40"></div>
                          <div class="border-b border-border border-dashed w-full opacity-40"></div>
                          <div class="border-b border-border border-dashed w-full opacity-40"></div>
                      </div>

                      <!-- ========================================== -->
                      <!-- شروع منطق داینامیک سازی ستون‌های نمودار -->
                      <!-- ========================================== -->
                      <?php
                        // پیدا کردن بیشترین مقدار برای محاسبه تناسب ارتفاع ستون‌ها
                        // اگر آرایه خالی بود عدد ۱ در نظر گرفته می‌شود تا خطای تقسیم بر صفر ندهد
                        $maxChartValue = !empty($chartData) ? max($chartData) : 1;

                        // استایل‌های رنگی که شما برای ستون‌ها نوشته بودید
                        // استایل‌های رنگی جدید، پررنگ‌تر و جذاب‌تر
                        $barThemes = [
                            "bg-gradient-to-t from-coral-500 to-coral-400 shadow-sm hover:scale-y-105 origin-bottom transition-all duration-300",
                            "bg-gradient-to-t from-indigo-500 to-indigo-400 shadow-sm hover:scale-y-105 origin-bottom transition-all duration-300",
                            "bg-gradient-to-t from-coral-600 to-coral-500 shadow-sm hover:scale-y-105 origin-bottom transition-all duration-300",
                            "bg-gradient-to-t from-blue-500 to-blue-400 shadow-sm hover:scale-y-105 origin-bottom transition-all duration-300",
                            "bg-gradient-to-t from-coral-400 to-coral-300 shadow-sm hover:scale-y-105 origin-bottom transition-all duration-300"
                        ];

                        $themeIndex = 0;
                        ?>

                      <?php if (!empty($chartData)): ?>
                          <?php foreach ($chartData as $label => $value): ?>
                              <?php
                                // محاسبه درصد ارتفاع ستون
                                $heightPercent = ($value / $maxChartValue) * 100;
                                $heightPercent = max($heightPercent, 5); // حداقل ۵ درصد ارتفاع

                                // انتخاب چرخشی تم رنگی
                                $currentTheme = $barThemes[$themeIndex % count($barThemes)];
                                $themeIndex++;
                                ?>

                              <!-- کانتینر ستون + متن زیر آن -->
                              <div class="flex flex-col items-center justify-end h-full w-full">

                                  <!-- خود ستون -->
                                  <div class="w-full <?= $currentTheme ?> rounded-t-xl transition-colors relative group" style="height: <?= $heightPercent ?>%;">
                                      <!-- تولتیپ هاور (فقط مقدار امتیاز) -->
                                      <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-ink text-white font-bold text-[11px] py-1 px-3 rounded-lg hidden group-hover:block shadow-lg whitespace-nowrap z-50">
                                          <?= number_format($value) ?> امتیاز
                                      </span>
                                  </div>

                                  <!-- لیبل تاریخ/زمان زیر ستون -->
                                  <span class="mt-2 text-[10px] sm:text-[11px] font-bold text-muted text-center whitespace-nowrap">
                                      <?= $label ?>
                                  </span>

                              </div>

                          <?php endforeach; ?>
                      <?php else: ?>
                          <div class="w-full flex items-center justify-center h-full text-muted text-sm font-bold z-10">
                              داده‌ای برای نمایش وجود ندارد
                          </div>
                      <?php endif; ?>

                      <!-- ========================================== -->
                      <!-- پایان منطق داینامیک سازی ستون‌های نمودار -->
                      <!-- ========================================== -->
                  </div>

              </div>
              <!-- لیست آخرین کاربران ثبت نامی -->
              <div class="bg-surface p-6 lg:p-8 rounded-3xl border border-white shadow-soft flex flex-col">
                  <h3 class="font-black text-xl text-ink mb-6">آخرین کاربران ثبت نامی</h3>
                  <div class="space-y-4 flex-1">

                      <!-- کاربر ۱ -->
                      <?php
                        // آرایه تم‌های رنگی بر اساس نمونه‌های شما
                        $colorThemes = [
                            ['avatar_bg' => 'E85B44', 'badge_text' => 'text-coral-500', 'badge_bg' => 'bg-coral-50'],
                            ['avatar_bg' => '6366F1', 'badge_text' => 'text-indigo-500', 'badge_bg' => 'bg-indigo-50'],
                            ['avatar_bg' => '05CD99', 'badge_text' => 'text-success', 'badge_bg' => 'bg-green-50'],
                            ['avatar_bg' => 'FFCE20', 'badge_text' => 'text-warning', 'badge_bg' => 'bg-yellow-50'],
                        ];
                        ?>

                      <?php foreach ($lastUsers as $index => $lastUser): ?>
                          <?php
                            // انتخاب رنگ به صورت چرخشی با استفاده از باقیمانده تقسیم
                            $theme = $colorThemes[$index % count($colorThemes)];

                            // تبدیل نام کاربر برای قرارگیری در URL آواتار (تبدیل فاصله به +)
                            $avatarName = urlencode($lastUser->name);
                            ?>
                          <div class="flex gap-4 items-center p-2 -mx-2 hover:bg-gray-50 rounded-2xl transition-colors cursor-pointer">

                              <img src="https://ui-avatars.com/api/?name=<?= $avatarName ?>&background=<?= $theme['avatar_bg'] ?>&color=fff"
                                  alt="Avatar" class="w-10 h-10 rounded-full shadow-sm border-2 border-white">

                              <div class="flex-1 min-w-0">
                                  <p class="text-sm font-bold text-ink truncate"><?= $lastUser->name ?></p>
                                  <span class="text-[11px] font-medium text-muted"><?= $lastUser->mobile ?></span>
                              </div>

                              <span class="text-[11px] font-bold <?= $theme['badge_text'] ?> <?= $theme['badge_bg'] ?> px-2.5 py-1 rounded-md">
                                  <!-- زمان باید از دیتابیس خوانده شود. در اینجا متن تستی قرار دادم -->
                                  <?= timeAgo($lastUser->created_at) ?>
                              </span>

                          </div>
                      <?php endforeach; ?>

                  </div>
                  <button
                      class="w-full mt-6 py-3 border border-border rounded-xl text-sm font-bold text-indigo-500 hover:bg-indigo-50 hover:border-indigo-100 transition-all">لیست
                      کامل کاربران</button>
              </div>

          </div>

      </main>