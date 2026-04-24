<?php 
include_once 'm_koneksi.php';

class alat {
    private $conn;

    public function __construct() {
        $db = new koneksi();
        $this->conn = $db->koneksi;
    }

    function tampil_data_alat() {
        // JOIN untuk mengambil nama_kategori dari tabel kategori
        $sql = "SELECT peralatan.*, kategori.nama_kategori 
                FROM peralatan 
                INNER JOIN kategori ON peralatan.id_kategori = kategori.id_kategori";
        $query = mysqli_query($this->conn, $sql);
        $result = [];
        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result;
    }

    function tampil_kategori() {
        $sql = "SELECT * FROM kategori";
        $query = mysqli_query($this->conn, $sql);
        $result = [];
        while ($data = mysqli_fetch_object($query)) {
            $result[] = $data;
        }
        return $result;
    }

    function tambah_data_alat($nama, $jumlah, $foto, $id_kategori, $harga) {
        $sql = "INSERT INTO peralatan (nama_alat, jumlah, foto_alat, id_kategori, harga) 
                VALUES ('$nama', '$jumlah', '$foto', '$id_kategori', '$harga')";
        return mysqli_query($this->conn, $sql);
    }

    function edit_alat($id, $nama, $jumlah, $foto, $id_kategori, $harga) {
        $sql = "UPDATE peralatan SET 
                nama_alat = '$nama', 
                jumlah = '$jumlah', 
                foto_alat = '$foto',
                id_kategori = '$id_kategori',
                harga = '$harga'
                WHERE id_alat = '$id'";
        return mysqli_query($this->conn, $sql);
    }

    function hapus_data_alat($id) {
        $sql = "DELETE FROM peralatan WHERE id_alat = '$id'";
        return mysqli_query($this->conn, $sql);
    }
}
?>