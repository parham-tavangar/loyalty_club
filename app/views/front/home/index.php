<!-- Page Content -->
<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">

  <!-- Page Heading -->
  <section class="mb-6">
    <h1 class="text-lg font-semibold leading-6">خانه</h1>
    <p class="text-sm text-muted mt-1">خلاصه وضعیت امتیاز، سطح کاربری و آخرین فعالیت‌ها</p>
  </section>

  <!-- Cards -->
  <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

    <div class="rounded-2xl border border-border bg-surface p-5">
      <p class="text-sm text-muted">امتیاز فعلی</p>
      <div class="mt-2 flex items-end justify-between">
        <p class="text-3xl font-extrabold"><?= $currentPoint->points ?></p>
        <span class="text-xs px-2 py-1 rounded-lg bg-coral-50 text-ink border border-coral-100">
          <?php if ($user->is_blocked == 0): ?>
            فعال
          <?php else: ?>
            غیر فعال
        </span>
      <?php endif ?>
      </div>
      <div class="mt-4 h-2 rounded-full bg-border/60 overflow-hidden">
        <div class="h-full bg-coral-400 rounded-full" style="width: <?= $progressPercentage ?>%;"></div>
      </div>

      <p class="mt-2 text-xs text-muted">
        <?php if ($PNFNT == 0): ?>
          <?= "سطح : آخرین سطح باشگاه" ?>
        <?php else: ?>
          <?= "تا سطح بعدی : " . $PNFNT . " امتیاز" ?>
      </p>
    <?php endif ?>
    </div>

    <div class="rounded-2xl border border-border bg-surface p-5">
      <p class="text-sm text-muted">سطح کاربری</p>
      <div class="mt-2 flex items-center justify-between">
        <p class="text-2xl font-bold"><?= $currentTier->name ?></p>
        <span class="text-xs px-2 py-1 rounded-lg bg-bg text-muted border border-border">Tier</span>
      </div>
      <p class="mt-4 text-sm text-muted leading-6">
        مزایا: امتیاز بیشتر روی خریدها + دسترسی به پیشنهادها
      </p>
    </div>

    <div class="rounded-2xl border border-border bg-surface p-5">
      <p class="text-sm text-muted">نحوه کسب امتیاز</p>
      <p class="mt-2 text-base font-semibold">
        هر 100,000 تومان = <span class="text-coral-500 font-extrabold">10 امتیاز</span>
      </p>
      <p class="mt-3 text-sm text-muted leading-6">
        امتیاز فقط برای سفارش‌های نهایی‌شده ثبت می‌شود.
      </p>
    </div>

  </section>

  <!-- Birthday Gift -->
  <?php if (isset($isBirthday) && $isBirthday && isset($hasClaimedBirthdayBonus) && !$hasClaimedBirthdayBonus): ?>
    <section class="mt-6 rounded-2xl border border-coral-200 bg-coral-50 overflow-hidden">
      <div class="px-5 py-4 flex items-start sm:items-center justify-between gap-3">
        <div>
          <h2 class="font-semibold">هدیه تولد شما</h2>
          <p class="mt-1 text-sm text-muted leading-6">
            تولدت مبارک! امروز <span class="font-semibold text-ink">50 امتیاز</span> به اعتبار شما اضافه می‌شود.
          </p>
          <p class="mt-1 text-xs text-muted">
            (این بخش فقط در روز تولد نمایش داده می‌شود و یک‌بار قابل دریافت است.)
          </p>
        </div>

        <form action="<?= URL_ROOT ?>claim-birthday-bonus" method="post" class="shrink-0">
          <button type="submit"
            class="px-4 py-3 rounded-xl bg-coral-400 text-white font-semibold hover:bg-coral-500 transition">
            دریافت هدیه
          </button>
        </form>
      </div>
    </section>
  <?php endif ?>

  <!-- History -->

  <section class="mt-6 rounded-2xl border border-border bg-surface overflow-hidden">
    <div class="px-5 py-4 flex items-center justify-between border-b border-border">
      <h2 class="font-semibold">آخرین تاریخچه امتیازها</h2>
      <a href="<?= URL_ROOT ?>points/history" class="text-sm font-medium text-coral-500 hover:text-coral-400 transition">
        مشاهده همه
      </a>
    </div>
    <?php if (count($pointLogs) > 0): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-bg">
            <tr class="text-right text-muted">
              <th class="px-5 py-3 font-medium">تاریخ</th>
              <th class="px-5 py-3 font-medium">زمان</th>
              <th class="px-5 py-3 font-medium">نوع</th>
              <th class="px-5 py-3 font-medium">توضیح</th>
              <th class="px-5 py-3 font-medium">امتیاز</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-border">
            <?php foreach ($pointLogs as $pointLog): ?>
              <tr class="hover:bg-coral-50/40 transition">
                <td class="px-5 py-4 text-muted"><?= toShamsi($pointLog->created_at) ?></td>
                <td class="px-5 py-4 text-muted"><?= substr($pointLog->created_at, 11, 12) ?></td>
                <td class="px-5 py-4 text-muted"><?= translatePointType($pointLog->type) ?></td>
                <td class="px-5 py-4 text-muted"><?= $pointLog->description ?></td>
                <td class="px-5 py-4">
                  <span class="inline-flex items-center px-2 py-1 rounded-lg bg-coral-50 border border-coral-100">
                    <?php if ($pointLog->points_change > 0): ?>
                      <span class="font-semibold text-success">
                        <?= "+" . $pointLog->points_change ?>
                      </span>
                    <?php else: ?>
                      <span class="font-semibold text-danger">
                        <?= $pointLog->points_change ?>
                      </span>
                    <?php endif ?>

                  </span>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div
        class="flex flex-col items-center justify-center py-16 px-4 border-2 border-dashed border-border rounded-xl bg-bg/50 text-center">
        <div class="w-16 h-16 mb-4 rounded-full bg-coral-50/50 flex items-center justify-center text-muted">
          <!-- آیکون ساعت/تاریخچه -->
          <svg class="w-8 h-8 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-lg font-medium text-muted mb-2">تاریخچه‌ای وجود ندارد</h3>
        <p class="text-sm text-muted opacity-80">تا این لحظه هیچ امتیازی در حساب شما ثبت نشده است.</p>
      </div> <?php endif ?>
  </section>

  <!-- Tier + Shortcuts -->
  <section class="mt-6 grid grid-cols-1 xl:grid-cols-3 gap-4">
    <div class="xl:col-span-2 rounded-2xl border border-border bg-surface p-5">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold">مسیر ارتقا سطح</h2>
        <!-- <span class="text-xs px-2 py-1 rounded-lg bg-coral-50 border border-coral-100">Tier</span> -->
      </div>

      <div class="mt-4 space-y-4">
        <?php foreach ($tiers as $tier): ?>
          <div class="flex items-center gap-3">

            <?php if ($currentPoint->points >= $tier->min_points and $currentPoint->points <= $tier->max_points): ?>
              <div
                class="h-9 w-9 rounded-xl bg-coral-100 border border-coral-200 flex items-center justify-center font-bold">
                <?= $tier->id ?>
              </div>
            <?php else: ?>
              <div
                class="h-9 w-9 rounded-xl bg-bg border border-border flex items-center justify-center font-bold text-muted">
                <?= $tier->id ?>
              </div>
            <?php endif ?>
            <div class="flex-1">
              <p class="text-sm font-semibold"><?= $tier->name ?></p>
              <?php if ($tier->min_points < 200): ?>
                <p class="text-xs text-muted"><?= $tier->min_points . " تا " . $tier->max_points . " امتیاز" ?></p>
              <?php else: ?>
                <p class="text-xs text-muted"><?= $tier->min_points . " امتیاز به بالا " ?></p>
              <?php endif ?>
            </div>

            <?php if ($currentPoint->points >= $tier->min_points and $currentPoint->points <= $tier->max_points): ?>
              <span class="text-xs px-2 py-1 rounded-lg bg-coral-50 border border-coral-100">فعلی</span>
            <?php endif ?>
          </div>

          <div class="h-px bg-border"></div>
        <?php endforeach ?>
      </div>
    </div>

    <div class="rounded-2xl border border-border bg-surface p-5">
      <h2 class="font-semibold">میانبرها</h2>

      <div class="mt-4 space-y-3">
        <a href="<?= URL_ROOT ?>points/my-points"
          class="block w-full text-center px-4 py-3 rounded-xl bg-coral-400 text-white font-semibold hover:bg-coral-500 transition">
          امتیازهای من
        </a>

        <a href="<?= URL_ROOT ?>points/history"
          class="block w-full text-center px-4 py-3 rounded-xl bg-bg border border-border text-ink font-medium hover:bg-bg/60 transition">
          تاریخچه امتیازها
        </a>
      </div>

      <div class="mt-6 rounded-xl bg-bg border border-border p-4">
        <p class="text-sm font-semibold">نکته</p>
        <p class="mt-1 text-sm text-muted leading-6">
          امتیاز فقط برای سفارش‌های <span class="font-semibold text-ink">نهایی‌شده</span> ثبت می‌شود و سفارش لغوشده
          امتیازی ندارد.
        </p>
      </div>
    </div>
  </section>

</main>