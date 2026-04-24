<?php
require_once __DIR__ . '/../models/m_koneksi.php';
require_once __DIR__ . '/../models/m_data.p.php';

$database = new mysqli("localhost", "root", "", "peminjaman_alat");

if ($database->connect_error) {
    die("Koneksi gagal: " . $database->connect_error);
}

$model = new ModelPengembalian($database);
$data_menunggu = $model->getMenunggu();
$data_riwayat_all = $model->getAllRiwayat();
?>