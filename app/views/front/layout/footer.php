</div>

<!-- Footer -->
<footer class="bg-surface border-t border-border">
    <div class="px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2">
        <p class="text-xs text-muted">© باشگاه مشتریان — همه حقوق محفوظ است.</p>
        <div class="flex items-center gap-3 text-xs">
            <a href="#" class="text-muted hover:text-ink transition">حریم خصوصی</a>
            <span class="text-border">|</span>
            <span class="text-muted">نسخه 1.0.0</span>
        </div>
    </div>
</footer>

</div>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>


</body>
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