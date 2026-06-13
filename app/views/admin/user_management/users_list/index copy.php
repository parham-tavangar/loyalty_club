<div class="p-4 sm:p-6 lg:p-8 w-full max-w-full mx-auto">
    <!-- هدر صفحه و دکمه ایجاد -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-ink">لیست کاربران</h1>
            <p class="text-sm text-muted mt-1">
                مدیریت، جستجو و فیلتر کاربران سیستم
            </p>
        </div>
        <a href="#"
            class="inline-flex items-center gap-2 bg-coral-500 hover:bg-coral-600 text-white px-6 py-2.5 rounded-xl font-bold shadow-glow-coral transition-all transform hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            ایجاد کاربر جدید
        </a>
    </div>

    <!-- بخش فیلتر و جستجو -->
    <div class="bg-surface rounded-2xl shadow-soft p-5 sm:p-6 mb-8 border border-border">
        <form action="<?= URL_ROOT ?>admin-panel/user_management/users_list/search" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 items-end">
            <!-- نام و نام خانوادگی -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">نام و نام خانوادگی</label>
                <input type="text" name="name" placeholder="مثال: علی رضایی"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors" />
            </div>

            <!-- موبایل -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">شماره موبایل</label>
                <input type="text" name="mobile" placeholder="0912..." dir="ltr"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors text-right" />
            </div>

            <!-- نقش -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">نقش کاربر</label>
                <select name="role"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors appearance-none cursor-pointer">
                    <option value="">همه نقش‌ها</option>
                    <option value="admin">مدیر</option>
                    <option value="user">کاربر عادی</option>
                </select>
            </div>

            <!-- تاریخ تولد -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">تاریخ تولد</label>
                <input type="text" name="birthdate" placeholder="1402/05/12" dir="ltr"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors text-right" />
            </div>

            <!-- وضعیت (چک باکس ها) -->
            <div class="lg:col-span-3 flex flex-wrap items-center gap-6 mt-2">
                <span class="text-xs font-bold text-muted">وضعیت:</span>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="active" checked
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">همه</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="inactive"
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">فعال</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="status[]" value="inactive"
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">غیرفعال</span>
                </label>
            </div>

            <!-- دکمه جستجو -->
            <div class="lg:col-span-1">
                <button type="submit"
                    class="w-full bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-bold py-2.5 px-4 rounded-xl shadow-glow-indigo transition-all">
                    جستجو و فیلتر
                </button>
            </div>
        </form>
    </div>

    <!-- جدول لیست کاربران -->
    <div class="bg-surface rounded-2xl shadow-soft border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse">
                <!-- هدر جدول -->
                <thead>
                    <tr class="bg-bg/50 border-b border-border">
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            ID
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            نام و نام خانوادگی
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            موبایل
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            امتیاز
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            سطح (ID)
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            نقش
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            وضعیت
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            تاریخ تولد
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            تاریخ ثبت‌نام
                        </th>
                        <th class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            آخرین بروزرسانی
                        </th>
                    </tr>
                </thead>

                <!-- بدنه جدول -->
                <tbody class="divide-y divide-border">
                    <?php foreach ($UsersDetails as $UsersDetail): ?>
                        <!-- ردیف نمونه 1 -->
                        <tr class="hover:bg-bg/40 transition-colors group">
                            <td class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                                <?= $UsersDetail->id ?>
                            </td>
                            <td class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <?= $UsersDetail->name ?>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-sm text-muted font-medium whitespace-nowrap" dir="ltr">
                                <?= $UsersDetail->mobile ?>
                            </td>
                            <td class="px-5 py-4 text-sm font-bold text-indigo-500 whitespace-nowrap">
                                <?= number_format($UsersDetail->total_points) ?>
                            </td>

                            <td class="px-5 py-4 text-sm text-ink whitespace-nowrap">
                                <span
                                    class="text-xs font-bold text-muted bg-bg px-2.5 py-1 rounded-lg border border-border"><?= $UsersDetail->tier_name ?></span>
                                <span class="text-xs text-muted mr-1"><?= $UsersDetail->tier_id ?></span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <?php if ($UsersDetail->role == 'user'): ?>
                                    <span
                                        class="text-xs font-bold text-muted bg-bg px-2.5 py-1 rounded-lg border border-border">
                                        <?= translateUserRole($UsersDetail->role) ?>
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg border border-indigo-100">
                                        <?= translateUserRole($UsersDetail->role) ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <?php if ($UsersDetail->is_blocked === 0): ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-success/10 text-success px-2.5 py-1 rounded-lg text-xs font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-success"></span>
                                        فعال
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-danger/10 text-danger px-2.5 py-1 rounded-lg text-xs font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-danger"></span>
                                        غیرفعال
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                                <?= str_replace('-', '/', $UsersDetail->birthday) ?>
                            </td>
                            <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                                <?= toShamsi($UsersDetail->created_at) ?>
                            </td>
                            <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                                <?= toShamsi($UsersDetail->updated_at) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <!-- ردیف نمونه 2 -->
                    <!-- <tr class="hover:bg-bg/40 transition-colors group">
                        <td class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            #1025
                        </td>
                        <td class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                    م‌م
                                </div>
                                محمد محمدی
                            </div>
                        </td>
                        <td class="px-5 py-4 text-sm text-muted font-medium whitespace-nowrap" dir="ltr">
                            0935 111 2233
                        </td>
                        <td class="px-5 py-4 text-sm font-bold text-indigo-500 whitespace-nowrap">
                            4,500
                        </td>
                        <td class="px-5 py-4 text-sm text-ink whitespace-nowrap">
                            <span
                                class="bg-coral-100 text-coral-600 px-2.5 py-1 rounded-lg text-xs font-bold">وی‌آی‌پی</span>
                            <span class="text-xs text-muted mr-1">(5)</span>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            <span
                                class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg border border-indigo-100">مدیر</span>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex items-center gap-1.5 bg-danger/10 text-danger px-2.5 py-1 rounded-lg text-xs font-bold">
                                <span class="w-1.5 h-1.5 rounded-full bg-danger"></span>
                                غیرفعال
                            </span>
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            1368/02/05
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            1402/10/01
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            1403/05/20
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <!-- بخش Pagination -->
        <div
            class="p-4 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-4 bg-surface/50">
            <span class="text-xs font-bold text-muted">نمایش <?= $startItem ?> تا <?= $endItem ?> از <?= $totalUsers ?>
                کاربر</span>
            <div class="flex gap-1">

                <?php if ($currentPage > 1): ?>
                    <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list?page=<?= $currentPage - 1 ?>"
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list?page=<?= $i ?>"
                            class="w-9 h-9 rounded-xl bg-coral-500 text-white font-medium flex items-center justify-center shadow-sm text-sm hover:bg-coral-600 transition-colors duration-200">
                            <?= $i ?>
                        </a>
                    <?php else: ?>
                        <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list?page=<?= $i ?>"
                            class="w-9 h-9 rounded-xl bg-white border border-border text-gray-600 hover:bg-gray-100 hover:text-ink font-medium flex items-center justify-center transition-colors duration-200 text-sm">
                            <?= $i ?>
                        </a>
                    <?php endif; ?>
                <?php endfor ?>

                <?php if ($currentPage < $totalPages): ?>

                    <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list?page=<?= $currentPage + 1 ?>"
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
</div>