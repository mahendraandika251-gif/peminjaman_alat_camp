<?php
include_once 'm_koneksi.php';

class kategori {
    private $conn;

    public function __construct() {
        $db = new koneksi();
        $this->conn = $db->koneksi;
    }

    function tampil_data() {
        $sql = "SELECT * FROM kategori";
        $query = mysqli_query($this->conn, $sql);

        $result = [];
        if ($query && mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
        return []; // Kembalikan array kosong jika tidak ada data
    }
    
    function tambah_kategori($nama_kategori) {
        $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
        return mysqli_query($this->conn, $sql);
    }

    function hapus_kategori($id) {
        $sql = "DELETE FROM kategori WHERE id_kategori = '$id'";
        return mysqli_query($this->conn, $sql);
    }
}
?>
