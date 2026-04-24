<!-- untuk mengambil data pengembalian dari database -->
<?php
class ModelPengembalian {
    private $db;

    public function __construct($database_connection) {
        $this->db = $database_connection;
    }

    public function getMenunggu() {
        $sql = "SELECT p.*, a.nama_alat 
                FROM peminjaman_alat p
                LEFT JOIN peralatan a ON p.id_alat = a.id_alat
                WHERE p.status = 'Menunggu'"; 
        
        $query = $this->db->query($sql);
        $result = []; 
        if ($query) {
            while ($obj = $query->fetch_object()) {
                $result[] = $obj; 
            }
        }
        return $result;
    }

    public function getAllRiwayat() {
        
        $sql = "SELECT r.*, a.nama_alat 
                FROM riwayat_peminjaman r
                LEFT JOIN pengembalian pb ON r.id_sewa = pb.id_sewa
                LEFT JOIN peminjaman_alat p ON pb.kode_pinjam = p.kode_pinjam
                LEFT JOIN peralatan a ON p.id_alat = a.id_alat";
        
        $query = $this->db->query($sql);
        $result = [];
        if ($query) {
            while ($obj = $query->fetch_object()) {
                $result[] = $obj;
            }
        }
        return $result;
    }
}
?>