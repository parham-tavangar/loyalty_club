<div class="p-4 sm:p-6 lg:p-8 w-full max-w-full mx-auto">
    <!-- هدر صفحه و دکمه ایجاد -->
    <div
        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-ink">لیست کاربران</h1>
            <p class="text-sm text-muted mt-1">
                مدیریت، جستجو و فیلتر کاربران سیستم
            </p>
        </div>
        <a
            href="#"
            class="inline-flex items-center gap-2 bg-coral-500 hover:bg-coral-600 text-white px-6 py-2.5 rounded-xl font-bold shadow-glow-coral transition-all transform hover:-translate-y-0.5">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="w-5 h-5">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            ایجاد کاربر جدید
        </a>
    </div>

    <!-- بخش فیلتر و جستجو -->
    <div
        class="bg-surface rounded-2xl shadow-soft p-5 sm:p-6 mb-8 border border-border">
        <form
            action="#"
            method="GET"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 items-end">
            <!-- نام و نام خانوادگی -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">نام و نام خانوادگی</label>
                <input
                    type="text"
                    name="name"
                    placeholder="مثال: علی رضایی"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors" />
            </div>

            <!-- موبایل -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">شماره موبایل</label>
                <input
                    type="text"
                    name="mobile"
                    placeholder="0912..."
                    dir="ltr"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors text-right" />
            </div>

            <!-- نقش -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">نقش کاربر</label>
                <select
                    name="role"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors appearance-none cursor-pointer">
                    <option value="">همه نقش‌ها</option>
                    <option value="admin">مدیر</option>
                    <option value="user">کاربر عادی</option>
                </select>
            </div>

            <!-- تاریخ تولد -->
            <div>
                <label class="block text-xs font-bold text-muted mb-2">تاریخ تولد</label>
                <input
                    type="text"
                    name="birthdate"
                    placeholder="1402/05/12"
                    dir="ltr"
                    class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-colors text-right" />
            </div>

            <!-- وضعیت (چک باکس ها) -->
            <div class="lg:col-span-3 flex flex-wrap items-center gap-6 mt-2">
                <span class="text-xs font-bold text-muted">وضعیت:</span>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input
                        type="checkbox"
                        name="status[]"
                        value="active"
                        checked
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span
                        class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">همه</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input
                        type="checkbox"
                        name="status[]"
                        value="inactive"
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span
                        class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">فعال</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer group">
                    <input
                        type="checkbox"
                        name="status[]"
                        value="inactive"
                        class="w-4 h-4 text-coral-500 bg-bg border-border rounded focus:ring-coral-500 focus:ring-2 transition-all cursor-pointer accent-coral-500" />
                    <span
                        class="text-sm font-bold text-ink group-hover:text-coral-600 transition-colors">غیرفعال</span>
                </label>
            </div>

            <!-- دکمه جستجو -->
            <div class="lg:col-span-1">
                <button
                    type="button"
                    class="w-full bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-bold py-2.5 px-4 rounded-xl shadow-glow-indigo transition-all">
                    جستجو و فیلتر
                </button>
            </div>
        </form>
    </div>

    <!-- جدول لیست کاربران -->
    <div
        class="bg-surface rounded-2xl shadow-soft border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse">
                <!-- هدر جدول -->
                <thead>
                    <tr class="bg-bg/50 border-b border-border">
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            ID
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            نام و نام خانوادگی
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            موبایل
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            امتیاز
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            سطح (ID)
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            نقش
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            وضعیت
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            تاریخ تولد
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            تاریخ ثبت‌نام
                        </th>
                        <th
                            class="px-5 py-4 text-xs font-bold text-muted whitespace-nowrap">
                            آخرین بروزرسانی
                        </th>
                    </tr>
                </thead>

                <!-- بدنه جدول -->
                <tbody class="divide-y divide-border">
                    <!-- ردیف نمونه 1 -->
                    <tr class="hover:bg-bg/40 transition-colors group">
                        <td
                            class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            #1024
                        </td>
                        <td
                            class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-coral-100 text-coral-600 flex items-center justify-center font-bold text-xs">
                                    ع‌ر
                                </div>
                                علی رضایی
                            </div>
                        </td>
                        <td
                            class="px-5 py-4 text-sm text-muted font-medium whitespace-nowrap"
                            dir="ltr">
                            0912 345 6789
                        </td>
                        <td
                            class="px-5 py-4 text-sm font-bold text-indigo-500 whitespace-nowrap">
                            1,250
                        </td>
                        <td class="px-5 py-4 text-sm text-ink whitespace-nowrap">
                            <span
                                class="bg-warning/20 text-warning px-2.5 py-1 rounded-lg text-xs font-bold">طلایی</span>
                            <span class="text-xs text-muted mr-1">(3)</span>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            <span
                                class="text-xs font-bold text-muted bg-bg px-2.5 py-1 rounded-lg border border-border">کاربر عادی</span>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex items-center gap-1.5 bg-success/10 text-success px-2.5 py-1 rounded-lg text-xs font-bold">
                                <span class="w-1.5 h-1.5 rounded-full bg-success"></span>
                                فعال
                            </span>
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            1375/08/12
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            1403/01/15
                        </td>
                        <td class="px-5 py-4 text-xs text-muted whitespace-nowrap">
                            2 ساعت پیش
                        </td>
                    </tr>

                    <!-- ردیف نمونه 2 -->
                    <tr class="hover:bg-bg/40 transition-colors group">
                        <td
                            class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            #1025
                        </td>
                        <td
                            class="px-5 py-4 text-sm font-bold text-ink whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                    م‌م
                                </div>
                                محمد محمدی
                            </div>
                        </td>
                        <td
                            class="px-5 py-4 text-sm text-muted font-medium whitespace-nowrap"
                            dir="ltr">
                            0935 111 2233
                        </td>
                        <td
                            class="px-5 py-4 text-sm font-bold text-indigo-500 whitespace-nowrap">
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
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- بخش Pagination -->
        <div
            class="p-4 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-4 bg-surface/50">
            <span class="text-xs font-bold text-muted">نمایش 1 تا 10 از 256 کاربر</span>
            <div class="flex gap-1">
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-bg text-muted hover:bg-coral-50 hover:text-coral-600 transition-colors border border-border">
                    &lt;
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-coral-500 text-white font-bold shadow-sm">
                    1
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-bg text-muted hover:bg-coral-50 hover:text-coral-600 transition-colors border border-border">
                    2
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-bg text-muted hover:bg-coral-50 hover:text-coral-600 transition-colors border border-border">
                    3
                </button>
                <button
                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-bg text-muted hover:bg-coral-50 hover:text-coral-600 transition-colors border border-border">
                    &gt;
                </button>
            </div>
        </div>
    </div>
</div>