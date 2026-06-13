<!-- Container اصلی -->
<div class="max-w-5xl mx-auto mt-12 mb-20 px-4">
    <div class="relative overflow-hidden rounded-[2.25rem] border border-border bg-gradient-to-br from-white via-indigo-50/40 to-coral-50/60 shadow-soft">
        <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-coral-300/25 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-20 w-72 h-72 rounded-full bg-indigo-300/25 blur-3xl pointer-events-none"></div>

        <div class="relative p-7 md:p-10 pb-6">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-[1.4rem] bg-gradient-to-br from-coral-500 to-coral-600 text-white shadow-glow-coral flex items-center justify-center -rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-[2rem] leading-tight font-black text-ink">ایجاد کاربر جدید</h1>
                        <p class="text-muted mt-1 font-medium">اطلاعات کاربر را وارد کنید تا حساب جدید ساخته شود</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-white/75 border border-border shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <p class="text-xs font-black text-ink">ثبت امن و سریع</p>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= URL_ROOT ?>admin-panel/user_management/store" method="POST"
        class="mt-6 bg-surface rounded-[2rem] border border-border overflow-hidden shadow-soft">

        <div class="p-7 md:p-10 border-b border-border bg-white/60">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <p class="text-sm text-muted font-medium">فیلدهای زیر را تکمیل کنید. فیلدهای حساس با رمزنگاری ذخیره می‌شوند.</p>
                <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-white border border-border text-muted hover:text-indigo-600 hover:border-indigo-200 transition-all duration-300 group w-full md:w-auto">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                    <span class="text-sm font-black">بازگشت به لیست کاربران</span>
                </a>
            </div>
        </div>

        <div class="p-7 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-7">
                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">نام و نام خانوادگی</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" name="name" placeholder="مثلا: علی علوی"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm font-bold text-ink">
                    </div>
                    <?php if (isset($_SESSION['form_errors']['name'])): ?>
                        <p class="text-red-500 text-sm"><?= $_SESSION['form_errors']['name'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">شماره موبایل</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" name="mobile" placeholder="09123456789"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm text-left font-bold tracking-widest text-ink">
                    </div>
                    <?php if (isset($_SESSION['form_errors']['mobile'])): ?>
                        <p class="text-red-500 text-sm"><?= $_SESSION['form_errors']['mobile'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">رمز عبور</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm font-bold text-ink">
                    </div>
                    <?php if (isset($_SESSION['form_errors']['password'])): ?>
                        <p class="text-red-500 text-sm"><?= $_SESSION['form_errors']['password'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">تکرار رمز عبور</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm font-bold text-ink">
                    </div>
                    <?php if (isset($_SESSION['form_errors']['password_confirmation'])): ?>
                        <p class="text-red-500 text-sm"><?= $_SESSION['form_errors']['password_confirmation'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">نقش و سطح دسترسی</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors pointer-events-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <select name="role"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm font-black appearance-none cursor-pointer text-ink">
                            <option value="user">کاربر عادی (پنل مشتری)</option>
                            <option value="admin">مدیر سیستم (دسترسی کامل)</option>
                        </select>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none text-muted">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-black text-ink mr-1">تاریخ تولد</label>
                    <div class="relative group">
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-muted/60 group-focus-within:text-coral-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" name="birthday" placeholder="1380/01/01"
                            class="w-full pl-4 pr-12 py-3.5 bg-bg/75 border border-border rounded-xl focus:bg-white focus:border-coral-400 focus:ring-4 focus:ring-coral-500/10 transition-all outline-none text-sm font-bold text-ink">
                    </div>
                    <?php if (isset($_SESSION['form_errors']['birthday'])): ?>
                        <p class="text-red-500 text-sm"><?= $_SESSION['form_errors']['birthday'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="p-7 md:p-10 bg-gradient-to-r from-indigo-50/70 via-white to-coral-50/70 border-t border-border flex flex-col md:flex-row items-center justify-between gap-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center shadow-sm text-emerald-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-black text-ink">امنیت اطلاعات</p>
                    <p class="text-[11px] text-muted mt-0.5 font-medium">داده‌ها به‌صورت ایمن ذخیره می‌شوند</p>
                </div>
            </div>

            <button type="submit"
                class="w-full md:w-auto px-12 py-3.5 bg-coral-500 hover:bg-coral-600 text-white rounded-2xl font-black text-sm shadow-glow-coral transition-all active:scale-95 flex items-center justify-center gap-3">
                <span>ثبت کاربر جدید</span>
                <i class="fas fa-plus-circle text-lg"></i>
            </button>

            <?php if (isset($_SESSION['form_errors'])): ?>
                <?php unset($_SESSION['form_errors']); ?>
            <?php endif; ?>
        </div>
    </form>
</div>
