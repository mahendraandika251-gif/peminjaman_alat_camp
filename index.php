<?php
session_start();

// Jika sudah login, langsung arahkan ke dashboard
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    header("location: dashboard.php");
    exit;
}

// Mengambil pesan error dari session jika proses login gagal
$login_message = "";
if (isset($_SESSION['login_error'])) {
    $login_message = $_SESSION['login_error'];
    unset($_SESSION['login_error']); 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | LANGKAH RIMBA</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          container: { center: true, padding: '1rem' },
          fontFamily: {
            sans: ["Inter", "sans-serif"],
          },
        },
      },
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
  <header class="sticky top-0 z-50 bg-[#ab6821e4] dark:bg-gray-900/70 backdrop-blur border-b border-gray-200/70 dark:border-gray-800">
    <div class="container flex items-center justify-between py-3">
      <a href="#" class="text-lg font-semibold tracking-tight text-white">LANGKAH RIMBA</a>
      <div class="flex items-center gap-2">
        <button id="themeToggle" class="px-3 py-2 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm text-sm">
          <span class="md:inline">🌙/☀️</span>
        </button>
      </div>
    </div>
  </header>

  <main class="container py-10">
    <section class="grid md:grid-cols-2 gap-8 items-center">
      <div>
        <p class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400">login</p>
        <h1 class="mt-2 text-4xl md:text-5xl font-extrabold tracking-tight text-[#578330]">Selamat Datang Di LANGKAH RIMBA</h1>
        <p class="mt-3 text-gray-600 dark:text-gray-300">Platform Peminiaman Alat Camping</p>
        <div class="mt-6 flex flex-wrap gap-3">
          <a href="view/form_pendaftaran.php" class="inline-flex items-center px-4 py-2 rounded-2xl bg-[#578330] text-white shadow hover:bg-[#355618] active:scale-[.98] transition">
            DAFTAR SEKARANG!
          </a>
        </div>
      </div>

      <div class="p-6 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-800 shadow-sm">
        <h2 class="text-xl text-[#578330] font-semibold uppercase">Login</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-300">Masuk untuk melanjutkan</p>

        <!-- Alert Pesan Error -->
        <?php if (!empty($login_message)): ?>
            <div class="mt-4 p-3 rounded-lg bg-red-100 border border-red-200 text-sm font-medium text-red-600">
                <?= $login_message ?>
            </div>
        <?php endif; ?>

        <!-- Action form diganti ke controllers/login.php -->
        <form action="controller/login.php" method="POST" class="mt-4 grid gap-3">
          <div>
            <label class="text-sm font-medium">Username atau Email</label>
            <input type="text" name="username" placeholder="Username" class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 outline-none focus:ring-2 focus:ring-[#578330]" required />
          </div>
          
          <div>
            <label class="text-sm font-medium">Password</label>
            <input type="password" name="password" placeholder="••••••••" class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 outline-none focus:ring-2 focus:ring-[#578330]" required />
          </div>


          <button type="submit" name="masuk" class="mt-2 inline-flex items-center justify-center px-4 py-2 rounded-2xl bg-[#578330] text-white shadow hover:bg-[#355618] transition font-bold uppercase">Masuk</button>
        </form>
      </div>
    </section>
  </main>

  <script>
    const root = document.documentElement
    const stored = localStorage.getItem('theme')
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches
    
    if (stored === 'dark' || (!stored && prefersDark)) root.classList.add('dark')
    
    document.getElementById('themeToggle').addEventListener('click', () => {
      root.classList.toggle('dark')
      localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light')
    })
  </script>
</body>
</html>
