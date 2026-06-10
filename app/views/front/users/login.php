<!doctype html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ورود | باشگاه مشتریان</title>

  <!-- Tailwind CDN -->
    <script src="<?= URL_ROOT ?>public/asset/css/tailwind.css"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
  <link rel="stylesheet" href="<?= URL_ROOT ?>public/asset/css/main.css">




  <!-- Theme -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bg: "#F8FAFC",
            surface: "#FFFFFF",
            ink: "#0F172A",
            muted: "#475569",
            border: "#E2E8F0",
            coral: {
              50: "#FFF1EE",
              100: "#FFE4DE",
              200: "#FEC6B8",
              300: "#FCA08B",
              400: "#F37861",
              500: "#E85B44",
            },
          },
        },
      },
    };
  </script>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: "Vazirmatn", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }
  </style>
</head>

<body class="bg-bg text-ink">
  <main class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-10">
    <section class="w-full max-w-md">

      <div class="rounded-3xl border border-border bg-surface overflow-hidden shadow-sm">
        <!-- Accent -->
        <div class="h-2 bg-coral-400"></div>

        <div class="p-6 sm:p-10">
          <!-- Brand -->
          <div class="text-center mb-8">
            <div
              class="inline-flex items-center justify-center h-16 w-16 rounded-2xl bg-coral-50 border border-coral-100 mb-4">
              <span class="text-xl font-extrabold text-coral-500">
                <img src="<?= URL_ROOT . "public/asset/image/honeymoonatr.png" ?>" alt="">

              </span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold">ورود</h1>
            <p class="mt-2 text-sm text-muted">به حساب کاربری خود وارد شوید</p>
          </div>

          <!-- Form -->
          <form action="<?= URL_ROOT ?>users/login" method="post" class="space-y-5">
            <!-- Mobile -->
            <div>
              <label for="mobile" class="block text-sm font-medium mb-2">شماره موبایل</label>
              <input type="text" id="mobile" name="mobile" placeholder="مثلاً: 09123456789" inputmode="numeric"
                autocomplete="tel" class="w-full h-12 rounded-xl border border-border bg-white px-4 text-sm outline-none
                       focus:ring-2 focus:ring-coral-200 focus:border-coral-300" />
              <?php if (isset($_SESSION['form_errors']['mobile'])): ?>
                <p class="text-red-500 text-sm mt-1">
                  <?= $_SESSION['form_errors']['mobile'] ?>
                </p> <?php endif ?>
            </div>

            <!-- Password -->
            <div>
              <label for="password" class="block text-sm font-medium mb-2">رمز عبور</label>
              <input type="password" id="password" name="password" placeholder="رمز عبور"
                autocomplete="current-password" class="w-full h-12 rounded-xl border border-border bg-white px-4 text-sm outline-none
                       focus:ring-2 focus:ring-coral-200 focus:border-coral-300" />
              <?php if (isset($_SESSION['form_errors']['password'])): ?>
                <p class="text-red-500 text-sm mt-1">
                  <?= $_SESSION['form_errors']['password'] ?>
                </p>
              <?php endif ?>

            </div>

            <!-- Submit -->
            <button type="submit"
              class="w-full h-12 rounded-xl bg-coral-400 text-white font-semibold hover:bg-coral-500 transition">
              ورود
            </button>
            <?php if (isset($_SESSION['form_errors'])): ?>
              <?php unset($_SESSION['form_errors']) ?>
            <?php endif ?>
          </form>

          <!-- Bottom text -->
          <div class="mt-6 text-center">
            <p class="text-sm text-muted">
              اکانت ندارید؟
              <a href="<?= URL_ROOT ?>users/register"
                class="font-semibold text-coral-500 hover:text-coral-400 transition">
                اول ثبت‌نام کن
              </a>
            </p>
          </div>

          <!-- Small footer -->
          <div class="mt-10 text-center text-xs text-muted">
            © باشگاه مشتریان
          </div>
        </div>
      </div>

    </section>
  </main>
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
</body>

</html>