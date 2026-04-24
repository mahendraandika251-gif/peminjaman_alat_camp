<!-- navbar user -->
<?php
$base = "/CRUD_OOP(ASLI)11/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NAVBAR LANGKAH RIMBA</title>
</head>
<body>
  
  <body class="antialiased min-h-screen bg-slate-50 text-gray-900 bg-gradient-to-bl from-amber-50 via-slate-50 to-slate-100 dark:bg-gray-900 dark:text-gray-100 dark:from-slate-800 dark:via-gray-900 dark:to-gray-900">

  <header class="sticky top-0 z-50 bg-[#ab6821] dark:bg-gray-950 backdrop-blur border-b border-white/10 dark:border-gray-800 shadow-md">
    <div class="container flex items-center justify-between py-3">
      <a href="dashboard.php" class="text-xl font-extrabold tracking-tighter text-white">LANGKAH RIMBA</a>
      
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-white/90">

      <a href="<?= $base ?>view/v_Dashboard_user.php">Beranda</a>
      <a href="<?= $base ?>view/view_user/daftar_peminjaman.php">Peminjaman</a>
      <a href="<?= $base ?>view/view_user/riwayat_peminjaman.php">Riwayat</a>  


      </nav>

      <div class="flex items-center gap-3">
        <div class="hidden sm:flex flex-col items-end leading-tight text-white mr-2">
            <span class="text-[10px] uppercase tracking-widest opacity-70">Welcome back,</span>
            <?php echo htmlspecialchars($nama_user ?? 'User'); ?>
        </div>
        
        <button id="themeToggle" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 text-white transition">
          🌓
        </button>

        <a href="<?= $base ?>controller/logout.php" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white text-xs font-bold transition shadow-lg">
          Logout
        </a>
      </div>
    </div>
  
</body>
</html>