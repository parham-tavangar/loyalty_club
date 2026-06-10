<!-- Sidebar -->
<aside class="hidden lg:flex lg:flex-col w-72 bg-surface border-l border-border">
    <div class="px-6 py-5 border-b border-border">
        <!-- <p class="font-semibold leading-6">منوی کاربری</p> -->
        <p class="text-xs text-muted">دسترسی سریع به بخش‌ها</p>
    </div>

    <nav class="px-4 py-4 flex-1">
        <p class="px-3 pb-2 text-xs text-muted">منو</p>
        <ul class="space-y-1">
            <?php
            $menuItems = [
                ['title' => 'خانه (داشبورد)', 'path' => '', 'url' => URL_ROOT],
                ['title' => 'امتیازهای من', 'path' => 'points/my-points', 'url' => URL_ROOT . 'points/my-points'],
                ['title' => 'تاریخچه امتیازها', 'path' => 'points/history', 'url' => URL_ROOT . 'points/history'],
                ['title' => 'سطح کاربری', 'path' => 'users/tier', 'url' => URL_ROOT . 'users/tier'],
                ['title' => 'پروفایل', 'path' => 'users/profile', 'url' => URL_ROOT . 'users/profile']
            ];

            foreach ($menuItems as $item):
                $classes = getSidebarClasses($item['path']);
                ?>
                <li>
                    <a href="<?= $item['url'] ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl <?= $classes['a'] ?>">
                        <span class="h-2.5 w-2.5 rounded-full <?= $classes['span'] ?>"></span>
                        <?= $item['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <div class="px-6 py-5 border-t border-border">
        <form action="<?= URL_ROOT ?>users/logout" method="POST">
            <button type="submit"
                class="block w-full px-4 py-3 rounded-xl bg-ink text-white hover:opacity-95 transition font-medium text-center">
                خروج
            </button>
        </form>
    </div>

</aside>