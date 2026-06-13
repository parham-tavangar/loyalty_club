<!-- پس‌زمینه تیره برای موبایل هنگام باز بودن سایدبار -->
<div x-show="sidebarOpen" class="fixed inset-0 z-40 bg-ink/40 backdrop-blur-sm lg:hidden transition-opacity"
    @click="sidebarOpen = false" x-transition.opacity></div>

<aside :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 right-0 z-50 w-72 bg-surface border-l border-white flex flex-col transition-transform duration-300 ease-in-out shadow-soft lg:static lg:w-72 m-0 lg:my-4 lg:ml-0 lg:mr-4 lg:rounded-3xl">

    <!-- لوگو و عنوان سایدبار -->
    <div class="flex items-center justify-between h-24 px-6 border-b border-border/50">
        <div class="flex items-center gap-3">
            <a href="<?= URL_ROOT ?>admin-panel">
                <div
                    class="w-11 h-11 rounded-2xl hover:opacity-80 bg-gradient-to-br from-coral-400 to-coral-600 text-white flex items-center justify-center shadow-glow-coral">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                        </path>
                    </svg>
                </div>
            </a>
            <div>
                <h1 class="font-extrabold text-lg leading-tight text-ink">باشگاه مشتریان</h1>
                <span class="text-[11px] text-muted font-bold tracking-wide">پنل مدیریت ادمین</span>
            </div>
        </div>
        <button @click="sidebarOpen = false"
            class="lg:hidden p-2 text-muted hover:text-danger hover:bg-red-50 rounded-xl transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>

    <!-- منوهای سایدبار -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2 relative">

        <!-- عنوان 1: خانه -->
        <?php $active = getSidebarStatus('admin-panel')['isActive']; ?>
        <a href="<?= URL_ROOT ?>admin-panel"
            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition-all duration-300 hover:scale-[1.02] <?= $active ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'text-muted hover:bg-indigo-50 hover:text-indigo-600' ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-bold">خانه (داشبورد)</span>
        </a>

        <!-- عنوان 2: مدیریت کاربران -->
        <?php
        // اصلاح منطق باز ماندن منوی مادر: 
        // اگر در صفحه مدیریت کاربران یا زیرمجموعه‌های آن (مثل ایجاد کاربر) بودیم، منو باز بماند.
        $isUserMgmtParentActive = getSidebarStatus('admin-panel/user_management')['isActive'] ||
            getSidebarStatus('admin-panel/user_management/create_user')['isActive'] ||
            getSidebarStatus('admin-panel/user_management/users_list')['isActive'];
        ?>

        <div x-data="{ open: <?= $isUserMgmtParentActive ? 'true' : 'false' ?> }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-200 group <?= $isUserMgmtParentActive ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'hover:bg-indigo-50 text-muted hover:text-indigo-600' ?>">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 transition-colors <?= $isUserMgmtParentActive ? '' : 'group-hover:text-indigo-500' ?>"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <span class="font-semibold">مدیریت کاربران</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 transition-transform <?= $isUserMgmtParentActive ? '' : 'text-muted group-hover:text-indigo-500' ?>"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" x-collapse class="pl-4 pr-11 mt-1 space-y-1">

                <!-- زیرمنوی لیست کاربران -->
                <?php $subList = getSidebarStatus('admin-panel/user_management/users_list')['isActive']; ?>
                <a href="<?= URL_ROOT ?>admin-panel/user_management/users_list"
                    class="block py-2 text-sm font-medium transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:rounded-full before:transition-all <?= $subList ? 'text-indigo-600 before:bg-indigo-500 before:scale-150' : 'text-muted hover:text-indigo-600 before:bg-border hover:before:bg-indigo-500 hover:before:scale-150' ?>">
                    لیست کاربران
                </a>

                <!-- زیرمنوی ایجاد کاربر (اصلاح شده با آیکون و وضعیت فعال) -->
                <?php $subCreate = getSidebarStatus('admin-panel/user_management/create_user')['isActive']; ?>
                <a href="<?= URL_ROOT ?>admin-panel/user_management/create_user"
                    class="block py-2 text-sm font-medium transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:rounded-full before:transition-all <?= $subCreate ? 'text-indigo-600 before:bg-indigo-500 before:scale-150' : 'text-muted hover:text-indigo-600 before:bg-border hover:before:bg-indigo-500 hover:before:scale-150' ?>">
                    ایجاد کاربر
                </a>
            </div>
        </div>

        <!-- عنوان 3: تاریخچه سفارشات -->
        <?php $active = getSidebarStatus('admin-panel/orders')['isActive']; ?>
        <div x-data="{ open: <?= $active ? 'true' : 'false' ?> }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-200 group <?= $active ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'hover:bg-indigo-50 text-muted hover:text-indigo-600' ?>">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 transition-colors <?= $active ? '' : 'group-hover:text-indigo-500' ?>"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span class="font-semibold">تاریخچه سفارشات</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 transition-transform <?= $active ? '' : 'text-muted group-hover:text-indigo-500' ?>"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-collapse class="pl-4 pr-11 mt-1 space-y-1">
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">لیست
                    تراکنش امتیازات</a>
            </div>
        </div>

        <!-- عنوان 4: جوایز و کد تخفیف -->
        <?php $active = getSidebarStatus('admin-panel/rewards')['isActive']; ?>
        <div x-data="{ open: <?= $active ? 'true' : 'false' ?> }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-200 group <?= $active ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'hover:bg-indigo-50 text-muted hover:text-indigo-600' ?>">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 transition-colors <?= $active ? '' : 'group-hover:text-indigo-500' ?>"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <span class="font-semibold">جوایز و کد تخفیف</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 transition-transform <?= $active ? '' : 'text-muted group-hover:text-indigo-500' ?>"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-collapse class="pl-4 pr-11 mt-1 space-y-1">
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">لیست
                    کد های تخفیف</a>
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">ایجاد
                    کد تخفیف</a>
            </div>
        </div>

        <!-- عنوان 5: مدیریت سطوح مشتریان -->
        <?php $active = getSidebarStatus('admin-panel/tiers')['isActive']; ?>
        <div x-data="{ open: <?= $active ? 'true' : 'false' ?> }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-200 group <?= $active ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'hover:bg-indigo-50 text-muted hover:text-indigo-600' ?>">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 transition-colors <?= $active ? '' : 'group-hover:text-indigo-500' ?>"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                        </path>
                    </svg>
                    <span class="font-semibold">مدیریت سطوح</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 transition-transform <?= $active ? '' : 'text-muted group-hover:text-indigo-500' ?>"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-collapse class="pl-4 pr-11 mt-1 space-y-1">
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">سطح
                    های مشتریان</a>
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">ایجاد
                    سطح</a>
            </div>
        </div>

        <!-- عنوان 6: تنظیمات باشگاه -->
        <?php $active = getSidebarStatus('admin-panel/settings')['isActive']; ?>
        <div x-data="{ open: <?= $active ? 'true' : 'false' ?> }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-200 group <?= $active ? 'bg-gradient-to-r from-coral-500 to-coral-400 text-white shadow-glow-coral' : 'hover:bg-indigo-50 text-muted hover:text-indigo-600' ?>">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 transition-colors <?= $active ? '' : 'group-hover:text-indigo-500' ?>"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-semibold">تنظیمات باشگاه</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''"
                    class="w-4 h-4 transition-transform <?= $active ? '' : 'text-muted group-hover:text-indigo-500' ?>"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-collapse class="pl-4 pr-11 mt-1 space-y-1">
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">تنظیمات
                    امتیاز ها</a>
                <a href="#"
                    class="block py-2 text-sm font-medium text-muted hover:text-indigo-600 transition-colors relative before:content-[''] before:absolute before:right-[-16px] before:top-1/2 before:w-1.5 before:h-1.5 before:bg-border before:rounded-full hover:before:bg-indigo-500 hover:before:scale-150 before:transition-all">تنظیمات
                    سطح ها</a>
            </div>
        </div>

    </nav>
</aside>
<main class="flex-1 flex flex-col h-screen overflow-y-auto overflow-x-hidden relative">