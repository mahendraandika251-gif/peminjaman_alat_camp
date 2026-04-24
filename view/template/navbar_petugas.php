<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="koneksi.php">
</head>

<body>
   <div class="navbar">
    <h1>Welcome Petugas</h1>
    <h1 class="brand">CampingYuk!</h1>

    <div class="hamburger" id="hamburgerBtn">
        <i class="fa-solid fa-bars"></i>
        
        <div class="dropdown" id="menuDropdown">
              <a href="../v_Dashboard_petugas.php">
                <i class="fa-solid fa-house-chimney"></i>
                <span>Dashboard</span>
            </a>
            
            
            <a href="../../controller/logout.php">
                <i class="fa-duotone fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>

</div>

<script>
const hamburgerBtn = document.getElementById("hamburgerBtn");
const menuDropdown = document.getElementById("menuDropdown");

// 1. Toggle tampil/sembunyi saat icon diklik
hamburgerBtn.addEventListener("click", function(e) {
    e.stopPropagation(); // Mencegah event klik menjalar ke document
    menuDropdown.classList.toggle("show");
});

// 2. Sembunyikan jika klik di luar area hamburger
document.addEventListener("click", function(e) {
    if (!hamburgerBtn.contains(e.target)) {
        menuDropdown.classList.remove("show");
    }
});

// 3. Mencegah dropdown tertutup jika area di dalam dropdown diklik (opsional)
menuDropdown.addEventListener("click", function(e) {
    e.stopPropagation();
});
</script>

</body>

</html>