<!-- Container اصلی -->
<div class="p-4 sm:p-6 lg:p-8 w-full max-w-full mx-auto" dir="rtl">
    
    <!-- هدر صفحه -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-ink">ایجاد کاربر جدید</h1>
            <p class="text-sm text-muted mt-1">
                ثبت اطلاعات و تعیین دسترسی‌های کاربر جدید در سیستم
            </p>
        </div>
        <a href="#"
            class="inline-flex items-center gap-2 bg-bg hover:bg-gray-100 text-ink px-5 py-2.5 rounded-xl font-bold border border-border transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
            بازگشت به لیست
        </a>
    </div>

    <!-- فرم ایجاد کاربر -->
    <div class="bg-surface rounded-2xl shadow-soft border border-border overflow-hidden">
        <form action="#" method="POST" class="p-6 lg:p-8">
            
            <!-- بخش اول: اطلاعات فردی -->
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-8 rounded-lg bg-coral-500/10 text-coral-500 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </span>
                    <h2 class="text-lg font-bold text-ink">اطلاعات شناسایی</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- نام و نام خانوادگی -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">نام و نام خانوادگی <span class="text-danger">*</span></label>
                        <input type="text" name="full_name" required placeholder="مثال: محمد حسینی"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all" />
                    </div>

                    <!-- شماره موبایل -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">شماره موبایل <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" required placeholder="09120000000" dir="ltr"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all text-right" />
                    </div>

                    <!-- کد ملی -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">کد ملی</label>
                        <input type="text" name="national_code" placeholder="0012345678" dir="ltr"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all text-right" />
                    </div>

                    <!-- تاریخ تولد -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">تاریخ تولد</label>
                        <input type="text" name="birthday" placeholder="1370/01/01" dir="ltr"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all text-right" />
                    </div>

                    <!-- رمز عبور -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">رمز عبور <span class="text-danger">*</span></label>
                        <input type="password" name="password" required placeholder="••••••••" dir="ltr"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all text-right" />
                    </div>

                    <!-- تکرار رمز عبور -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">تکرار رمز عبور <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirm" required placeholder="••••••••" dir="ltr"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-coral-500/30 focus:border-coral-500 transition-all text-right" />
                    </div>
                </div>
            </div>

            <!-- بخش دوم: دسترسی و تنظیمات -->
            <div class="mb-10 pt-10 border-t border-border">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/10 text-indigo-500 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </span>
                    <h2 class="text-lg font-bold text-ink">تنظیمات سطح دسترسی</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- نقش کاربری -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">نقش کاربر</label>
                        <select name="role"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition-all appearance-none cursor-pointer">
                            <option value="user">کاربر عادی</option>
                            <option value="admin">مدیر سیستم</option>
                            <option value="support">پشتیبان</option>
                        </select>
                    </div>

                    <!-- سطح اشتراک -->
                    <div>
                        <label class="block text-xs font-bold text-muted mb-2">سطح (Tier)</label>
                        <select name="tier_id"
                            class="w-full bg-bg border border-border text-ink text-sm rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition-all appearance-none cursor-pointer">
                            <option value="1">برنزی (پیش‌فرض)</option>
                            <option value="2">نقره‌ای</option>
                            <option value="3">طلایی</option>
                        </select>
                    </div>

                    <!-- وضعیت حساب -->
                    <div class="flex items-end pb-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <div class="relative">
                                <input type="checkbox" name="is_active" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-success"></div>
                            </div>
                            <span class="text-sm font-bold text-ink">حساب کاربری فعال باشد</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- دکمه‌های عملیاتی -->
            <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6 border-t border-border">
                <button type="reset"
                    class="w-full sm:w-auto px-8 py-3 text-sm font-bold text-muted hover:text-ink transition-colors">
                    انصراف
                </button>
                <button type="submit"
                    class="w-full sm:w-auto bg-coral-500 hover:bg-coral-600 text-white px-10 py-3 rounded-xl font-bold shadow-glow-coral transition-all transform hover:-translate-y-0.5">
                    ذخیره و ایجاد کاربر
                </button>
            </div>
        </form>
    </div>
</div>
