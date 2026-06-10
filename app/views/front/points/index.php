<!-- Page Content (My Scores) -->
<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">

  <!-- Page Heading -->
  <section class="mb-6 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
    <div>
      <h1 class="text-lg font-semibold leading-6 text-ink">امتیازهای من</h1>
      <p class="text-sm text-muted mt-1">مدیریت امتیازهای شما در باشگاه مشتریان</p>
    </div>
  </section>

  <!-- Hero Score Card (Creative Section) -->
  <section class="mb-6 relative rounded-3xl overflow-hidden bg-ink border border-ink shadow-sm">
    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-coral-500/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-64 h-64 rounded-full bg-coral-300/10 blur-3xl"></div>

    <div class="relative z-10 p-6 sm:p-10 flex flex-col lg:flex-row items-center justify-between gap-8 text-white">
      <div class="text-center lg:text-right flex-1">
        <p class="text-coral-200 text-sm font-medium mb-3">موجودی قابل استفاده شما</p>
        <div class="flex items-baseline justify-center lg:justify-start gap-2">
          <span class="text-5xl sm:text-6xl font-black tracking-tight"><?= number_format($currentPoint->points) ?></span>
          <span class="text-lg text-coral-100 font-medium">امتیاز</span>
        </div>
        <p class="mt-4 text-sm text-gray-300 max-w-md leading-6 mx-auto lg:mx-0">
          امتیازهای شما معادل
          <span class="font-bold text-white bg-white/10 px-2 py-0.5 rounded"><?= number_format($rialPoint) . " تومان" ?></span> تخفیف در سبد خرید بعدی است.
        </p>
      </div>

      <div class="flex flex-col sm:flex-row lg:flex-col gap-3 w-full lg:w-48 shrink-0">
        <a href="<?= URL_ROOT ?>users/tier" class="w-full px-5 py-3.5 rounded-xl bg-coral-500 text-white font-bold hover:bg-coral-400 transition shadow-lg shadow-coral-500/30 text-center flex items-center justify-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14zm0 0v6"></path>
          </svg>
          سطح کاربری
        </a>


        <a href="<?= URL_ROOT ?>points/history" class="w-full px-5 py-3.5 rounded-xl bg-surface/10 backdrop-blur border border-surface/20 text-white font-medium hover:bg-surface/20 transition text-center">
          تاریخچه امتیاز ها
        </a>
      </div>
    </div>
  </section>

  <!-- Quick Stats Grid -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="rounded-2xl border border-border bg-surface p-5 flex items-center gap-4 hover:border-coral-200 transition duration-300">
      <div class="h-12 w-12 rounded-full bg-coral-50 flex items-center justify-center text-coral-500 shrink-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <div>
        <p class="text-sm text-muted">کل امتیازات کسب شده</p>
        <p class="text-xl font-bold mt-1 text-ink"><?= number_format($totalEarned) . " " ?><span class="text-xs font-normal text-muted">امتیاز</span></p>
      </div>
    </div>

    <div class="rounded-2xl border border-border bg-surface p-5 flex items-center gap-4 hover:border-coral-200 transition duration-300">
      <div class="h-12 w-12 rounded-full bg-bg border border-border flex items-center justify-center text-muted shrink-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <div>
        <p class="text-sm text-muted">امتیازات مصرف شده</p>
        <p class="text-xl font-bold mt-1 !text-red-500"><?= substr(number_format($totalDeducted), 1) . " " ?><span class="text-xs font-normal text-muted">امتیاز</span></p>
      </div>
    </div>

    <div class="rounded-2xl border border-border bg-surface p-5 flex items-center gap-4 hover:border-coral-200 transition duration-300">
      <div class="h-12 w-12 rounded-full bg-coral-100 flex items-center justify-center text-coral-600 shrink-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <div>
        <p class="text-sm text-muted">خریدهای موفق با امتیاز</p>
        <p class="text-xl font-bold mt-1 text-ink">هنوز داینامیک نشده <span class="text-xs font-normal text-muted">سفارش</span></p>
      </div>
    </div>
  </section>

  <!-- Recent Activity -->
  <section>
    <div class="flex items-center justify-between mb-4">
      <h2 class="font-semibold text-lg text-ink">فعالیت‌های اخیر شما</h2>
      <a href="<?= URL_ROOT ?>points/history" class="text-sm font-medium text-coral-500 hover:text-coral-600 transition">مشاهده تاریخچه کامل &larr;</a>
    </div>


    <!-- جدول تراکنش‌ها یا وضعیت خالی -->
    <div class="bg-white border border-border rounded-[2rem] overflow-hidden shadow-sm">
      <?php if (!empty($pointLogs)): ?>
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
              <?php foreach ($pointLogs as $pointLog): ?>
                <!-- ردیف‌ها (کد قبلی خودت اینجا قرار می‌گیرد) -->
                <?php if ($pointLog->points_change > 0): ?>
                  <tr class="bg-green-50/40 hover:bg-green-50 transition-colors duration-200">
                    <td class="px-5 py-3.5 text-gray-500"><?= "#" . $pointLog->id ?></td>
                    <td class="px-5 py-3.5 font-bold text-gray-600 text-sm"><?= translatePointType($pointLog->type) ?></td>
                    <td class="px-5 py-3.5 text-gray-600 text-sm"><?= toShamsi($pointLog->created_at) ?></td>
                    <td class="px-5 py-3.5 text-gray-600 text-sm"><?= substr($pointLog->created_at, 11, 12) ?></td>
                    <td class="px-5 py-3.5 text-ink"><?= $pointLog->description ?></td>
                    <td class="px-5 py-3.5 font-bold text-green-600 dir-ltr text-right"><?= $pointLog->points_change . "+" ?></td>
                  </tr>
                <?php else: ?>
                  <tr class="bg-red-50/40 hover:bg-red-50 transition-colors duration-200">
                    <td class="px-5 py-3.5 text-gray-500"><?= "#" . $pointLog->id ?></td>
                    <td class="px-5 py-3.5 font-bold text-gray-600 text-sm"><?= translatePointType($pointLog->type) ?></td>
                    <td class="px-5 py-3.5 text-gray-600 text-sm"><?= toShamsi($pointLog->created_at) ?></td>
                    <td class="px-5 py-3.5 text-gray-600 text-sm"><?= substr($pointLog->created_at, 11, 12) ?></td>
                    <td class="px-5 py-3.5 text-ink"><?= $pointLog->description ?></td>
                    <td class="px-5 py-3.5 font-bold text-red-500 dir-ltr text-right"><?= substr($pointLog->points_change, 1) . "-" ?></td>
                  </tr>
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <!-- شروع حالت خالی (Empty State) -->
        <div class="py-20 px-6 flex flex-col items-center justify-center text-center">

          <!-- آیکون ساعت مطابق با استایل Quick Stats -->
          <div class="relative mb-6">
            <div class="h-20 w-20 rounded-full bg-coral-50 flex items-center justify-center text-coral-500 relative z-10">
              <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <!-- افکت سایه ملایم زیر آیکون -->
            <div class="absolute inset-0 bg-coral-500/10 blur-2xl rounded-full"></div>
          </div>

          <h3 class="text-xl font-bold text-ink mb-2">تاریخچه‌ای یافت نشد</h3>
          <p class="text-muted text-sm max-w-xs mx-auto mb-8 leading-relaxed">
            هنوز تراکنشی برای امتیازهای شما ثبت نشده است. پس از اولین فعالیت، جزئیات آن در اینجا نمایش داده می‌شود.
          </p>
        </div>
        <!-- پایان حالت خالی -->

        <!-- پایان حالت خالی -->
      <?php endif; ?>
    </div>

    </div>
  </section>



</main>