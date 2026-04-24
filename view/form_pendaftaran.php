<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    container: { center: true, padding: '1rem' },
                    fontFamily: {
                        sans: ["Inter", "ui-sans-serif", "system-ui"]
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

            <button id="themeToggle" class="px-3 py-2 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm text-sm">
                🌙/☀️
            </button>
        </div>
    </header>

    <main class="container py-10">
        <section class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400">Daftar</p>
                <h1 class="mt-2 text-4xl md:text-5xl font-extrabold tracking-tight text-[#578330]">
                    Selamat Datang di LANGKAH RIMBA
                </h1>
                <p class="mt-3 text-gray-600 dark:text-gray-300">
                    Platform PEMINJAMAN ALAT CAMP
                </p>
            <div class="mt-6 flex flex-wrap gap-3">
              <a href="../index.php" class="inline-flex items-center px-4 py-2 rounded-2xl bg-[#578330] text-white shadow hover:bg-[#355618] active:scale-[.98] transition">
            SUDAH PUNYA AKUN? AYO LOGIN
          </a>
        </div>
            </div>

            <div class="p-6 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-800 shadow-sm">
                <h2 class="text-xl font-semibold text-[#578330] mb-4">Daftar</h2>

                <form action="../controller/c_pelanggan.php?aksi=register" method="post" class="grid gap-3">
                    <label class="text-sm font-medium">
                        Username
                        <input type="text" name="username" placeholder="masukkan username" class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </label>

                    <label class="text-sm font-medium">
                        Email
                        <input type="email" name="email" placeholder="masukkan email" class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </label>

                    <label class="text-sm font-medium">
                        Password
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="masukkan password" class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 pr-10 outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <button type="button" onclick="togglePassword()" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                                👁
                            </button>
                        </div>
                    </label>

                    <label class="text-sm font-medium">
                        
                        <input type="hidden" name="role" placeholder="" readonly class="mt-1 w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 px-3 py-2 outline-none cursor-not-allowed"e-none focus:ring-2 focus:ring-indigo-500" required value="user" placeholder="">
                    </label>

                    <button type="submit" class="mt-2 inline-flex items-center justify-center px-4 py-2 rounded-2xl bg-[#578330] text-white shadow hover:bg-[#355618] transition active:scale-95 font-semibold">
                        Tambah
                    </button>
                </form>
            </div>
        </section>
    </main>

    <script>
        const root = document.documentElement;
        const stored = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (stored === 'dark' || (!stored && prefersDark)) {
            root.classList.add('dark');
        }

        document.getElementById('themeToggle').addEventListener('click', () => {
            root.classList.toggle('dark');
            localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light');
        });

        function togglePassword() {
            const password = document.getElementById("password");
            password.type = password.type === "password" ? "text" : "password";
        }
    </script>

</body>
</html>
