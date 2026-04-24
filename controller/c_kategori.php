<?php
include_once __DIR__ . '/../models/m_kategori.php';

$kategori = new kategori(); // Nama class di model adalah 'kategori'

try {
    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];

        if ($aksi == 'tambah') {
            $nama_kategori = $_POST['nama_kategori'];
            $result = $kategori_obj->tambah_kategori($nama_kategori);

            if ($result) {
                echo "<script>alert('Kategori Berhasil Ditambahkan'); window.location='../view/view_admin/kategori.php';</script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Kategori'); window.location='../view/view_admin/kategori.php';</script>";
            }
        } 
        
        elseif ($aksi == 'hapus') {
            $id = $_GET['id_kategori'];
            $kategori_obj->hapus_kategori($id);
            header("Location: ../view/view_admin/kategori.php");
        }
    }

    // Selalu ambil data untuk ditampilkan di view
    $data_kategori = $kategori->tampil_data();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
