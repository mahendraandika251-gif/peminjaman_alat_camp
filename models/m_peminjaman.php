<!-- berfungsi untuk mengelola data peminjaman alat di database -->
<?php 
include_once 'm_koneksi.php';

class peminjaman {
    private $conn;

    public function __construct() {
        $db = new koneksi();
        $this->conn = $db->koneksi;
    }

    function tambah_data_peminjam($id_user, $id_alat, $nama_peminjam, $tgl_pinjam, $tgl_kembali, $jumlah) {
        $sql = "INSERT INTO peminjaman_alat (id_user, id_alat, nama_peminjam, tanggal_meminjam, batas_pengembalian, jumlah, status) 
                VALUES ('$id_user', '$id_alat', '$nama_peminjam', '$tgl_pinjam', '$tgl_kembali', '$jumlah', 'Menunggu')";
        return mysqli_query($this->conn, $sql);
    }

    function tampil_data_peminjam($id_user = null) {
        $sql = "SELECT p.*, a.nama_alat FROM peminjaman_alat p 
                INNER JOIN peralatan a ON p.id_alat = a.id_alat";
        if ($id_user !== null) {
            $sql .= " WHERE p.id_user = '$id_user'";
        }
        $query = mysqli_query($this->conn, $sql);
        $result = [];
        while ($data = mysqli_fetch_assoc($query)) {
            $result[] = $data;
        }
        return $result;
    }
    
    function update_status_peminjaman($id, $status) {
    if ($status === 'setujui') {
      
        $sql_cari = "SELECT id_user FROM peminjaman_alat WHERE kode_pinjam = '$id'";
        $res_cari = mysqli_query($this->conn, $sql_cari);
        $data = mysqli_fetch_assoc($res_cari);

        if ($data) {
            $id_user = $data['id_user'];
            
           
            $sql_pindah = "INSERT INTO pengembalian (id_user, kode_pinjam) VALUES ('$id_user', '$id')";
            mysqli_query($this->conn, $sql_pindah);

           
            $sql_update = "UPDATE peminjaman_alat SET status = 'Disetujui' WHERE kode_pinjam = '$id'";
            return mysqli_query($this->conn, $sql_update);
        }
    } else {
        
        return mysqli_query($this->conn, "DELETE FROM peminjaman_alat WHERE kode_pinjam = '$id'");
    }
    return false;
}


    function hapus_data($id) {
        $sql = "DELETE FROM peminjaman_alat WHERE id_alat = '$id'";
        return mysqli_query($this->conn, $sql);
    }
}
?>
