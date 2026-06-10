    <!-- کدهای محتوای صفحه (جدول و...) بین سایدبار و فوتر قرار می‌گیرند -->

    <!-- فوتر (FOOTER) -->
    <footer class="mt-auto border-t border-border/60 bg-transparent px-4 lg:px-10 py-6 flex flex-col md:flex-row justify-between items-center gap-3 text-sm text-muted">
        <p class="font-medium">توسعه و طراحی <span class="text-coral-500 text-lg"></span> توسط <strong class="text-ink font-bold">پرهام توانگر</strong></p>
        <p class="font-medium">تمامی حقوق برای باشگاه مشتریان محفوظ است. &copy; 1403</p>
    </footer>

</main> <!-- پایان بخش محتوای اصلی که در انتهای سایدبار باز شده بود -->

</body>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>
    alertify.set('notifier', 'position', 'top-right');

    <?php if (isset($_SESSION['success'])): ?>
        alertify.success("<?= $_SESSION['success'] ?>");
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        alertify.error("<?= $_SESSION['error'] ?>");
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</script>

</html>
