<?php 
include_once 'm_koneksi.php';

class pengembalian {
    private $conn;

    public function __construct() {
        $db = new koneksi();
        $this->conn = $db->koneksi;
    }

    // FUNGSI UNTUK VIEW PETUGAS
    public function tampil_data_petugas() {
        $data = [];
        $sql = "SELECT 
                    p.Id_sewa,
                    p.status AS status_pengembalian, 
                    pa.kode_pinjam,
                    pa.nama_peminjam, 
                    pa.tanggal_meminjam, 
                    pa.batas_pengembalian,
                    a.nama_alat
                FROM pengembalian p
                LEFT JOIN peminjaman_alat pa ON p.kode_pinjam = pa.kode_pinjam
                LEFT JOIN alat a ON pa.id_alat = a.id_alat
                ORDER BY p.Id_sewa DESC";

        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_object($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // FUNGSI UNTUK VIEW USER
    public function tampil_riwayat($id_user) {
        $data = [];
        $sql = "SELECT * FROM riwayat_peminjaman WHERE id_user = ? ORDER BY tanggal_pengembalian DESC";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // FUNGSI PROSES PINDAH DATA (DENGAN PERBAIKAN FOREIGN KEY)
    public function pindah_data($id, $status_req) {
        // 1. Ambil data gabungan dari pengembalian & peminjaman_alat
        // Kita wajib mengambil id_sewa yang asli agar Foreign Key di riwayat_peminjaman terpenuhi
        $sql_cari = "SELECT p.Id_sewa, pa.id_user, pa.nama_peminjam, pa.tanggal_meminjam 
                     FROM pengembalian p
                     JOIN peminjaman_alat pa ON p.kode_pinjam = pa.kode_pinjam
                     WHERE p.kode_pinjam = ?";
        
        $stmt_cari = mysqli_prepare($this->conn, $sql_cari);
        mysqli_stmt_bind_param($stmt_cari, "s", $id);
        mysqli_stmt_execute($stmt_cari);
        $result = mysqli_stmt_get_result($stmt_cari);
        $data = $result->fetch_assoc();

        if ($data) {
            $tgl_kembali = date('Y-m-d');
            
            // 2. Insert ke riwayat_peminjaman
            // Pastikan kolom id_sewa diisi dengan $data['id_sewa'] yang valid
            $sql_ins = "INSERT INTO riwayat_peminjaman (id_user, Id_sewa, nama_peminjam, tanggal_peminjaman, tanggal_pengembalian) 
                        VALUES (?, ?, ?, ?, ?)";
            
            $stmt_ins = mysqli_prepare($this->conn, $sql_ins);
            mysqli_stmt_bind_param($stmt_ins, "iisss", 
                $data['id_user'], 
                $data['Id_sewa'], 
                $data['nama_peminjam'], 
                $data['tanggal_meminjam'], 
                $tgl_kembali
            );
            
            if (mysqli_stmt_execute($stmt_ins)) {
            // MATIKAN pengecekan kunci agar bisa menghapus
            mysqli_query($this->conn, "SET FOREIGN_KEY_CHECKS = 0");

            $id_clean = mysqli_real_escape_string($this->conn, $id);
            mysqli_query($this->conn, "DELETE FROM pengembalian WHERE kode_pinjam = '$id_clean'");
            $del = mysqli_query($this->conn, "DELETE FROM peminjaman_alat WHERE kode_pinjam = '$id_clean'");

            // HIDUPKAN kembali pengecekan (Wajib!)
            mysqli_query($this->conn, "SET FOREIGN_KEY_CHECKS = 1");

            return $del;
        }
    }
    return false;
}
}