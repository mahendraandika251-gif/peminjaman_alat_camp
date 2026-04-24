<!-- navbar admin -->
<style>
.navbar {
    background: #1a1a1a;
    color: white;
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.brand {
    font-family: 'Sigmar', cursive;
}

.hamburger {
    position: relative;
    cursor: pointer;
}

.dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 40px;
    background: white;
    color: black;
    min-width: 220px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    z-index: 100;
}

.dropdown a {
    display: flex;
    gap: 10px;
    padding: 10px;
    text-decoration: none;
    color: black;
    align-items: center;
}

.dropdown a:hover {
    background: #eee;
}

.show {
    display: block;
}
</style>

<div class="navbar">
    <h1>Welcome Admin</h1>
    <h1 class="brand">CampingYuk!</h1>

    <div class="hamburger" id="hamburgerBtn">
        <i class="fa-solid fa-bars"></i>
        
        <div class="dropdown" id="menuDropdown">
            <a href="../v_Dashboard_admin.php">
                <i class="fa-solid fa-house-chimney"></i>
                <span>Dashboard</span>
            </a>
            <a href="../view_admin/data_user.php">
                <i class="fa-solid fa-users"></i>
                <span>Data User</span>
            </a>
            <a href="../view_admin/data_alat.php">
                <i class="fa-solid fa-tools"></i>
                <span>Data Alat</span>
            </a>
            <a href="../view_admin/peminjaman.php">
                <i class="fa-solid fa-hand-holding"></i>
                <span>Peminjaman</span>
            </a>
            <a href="../view_admin/pengembalian.php">
                <i class="fa-solid fa-reply"></i>
                <span>Pengembalian</span>
            </a>
            <a href="../view_admin/kategori.php">
                <i class="fa-solid fa-layer-group"></i>
                <span>Data Kategori</span>
            </a>
            <a href="../view_admin/log_aktivitas.php">
                <i class="fa-solid fa-user-clock"></i>
                <span>Log Aktivitas</span>
            </a>
            <a href="../../controller/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>

<script>
const hamburgerBtn = document.getElementById("hamburgerBtn");
const menuDropdown = document.getElementById("menuDropdown");

hamburgerBtn.addEventListener("click", function(e) {
    e.stopPropagation();
    menuDropdown.classList.toggle("show");
});

document.addEventListener("click", function(e) {
    if (!hamburgerBtn.contains(e.target)) {
        menuDropdown.classList.remove("show");
    }
});

menuDropdown.addEventListener("click", function(e) {
    e.stopPropagation();
});
</script>

