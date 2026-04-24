<?php

include_once '../../controller/c_peminjaman.php'; 
include_once '../template/navbar_petugas.php';


$data_menunggu = array_filter($data_peminjam, function($item) {
    return $item['status'] == 'Menunggu';
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen & Laporan | LANGKAH RIMBA</title>
  <link rel="stylesheet" href="../template/style.css">
  <link rel="stylesheet" href="../template/dashboard_adm.css">
  <link rel="stylesheet" href="../template/petugas.css">
  
</head>
<body>
  
  <div class="main-content">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <h2>Manajemen Peminjaman Alat</h2>
    </div>
    <hr>

    <h3 class="section-title judul-menunggu">
      <i class="fas fa-clock"></i> Menunggu Persetujuan 
      <span class="count-badge"><?= count($data_menunggu) ?></span>
    </h3>
    <div class="table-container tabel-menunggu">
      <table border="1" width="100%" style="border-collapse: collapse;">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Peminjam</th>
            <th>Alat</th>
            <th>Tgl Pinjam</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($data_menunggu)): ?>
            <?php foreach ($data_menunggu as $row): ?>
            <tr>
              <td style="text-align: center;"><?= $row['kode_pinjam'] ?></td>
              <td><?= $row['nama_peminjam'] ?></td>
              <td><?= $row['nama_alat'] ?></td>
              <td style="text-align: center;"><?= date('d/m/Y', strtotime($row['tanggal_meminjam'])) ?></td>
              <td style="text-align: center;"><?= $row['jumlah'] ?></td>
              <td style="text-align: center;"> 
                <button type="button" class="btn-action btn-setuju" onclick="konfirmasiAksi('<?= $row['kode_pinjam'] ?>', 'setujui')">Setujui</button>
                <button type="button" class="btn-action btn-tolak" onclick="konfirmasiAksi('<?= $row['kode_pinjam'] ?>', 'tolak')">Tolak</button>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="6" style="text-align: center; padding: 15px; color: #999;">Tidak ada permintaan baru.</td></tr>
          <?php endif; ?>
        </tbody>
      </table> 
    </div>

  <script>
    function konfirmasiAksi(id, aksi) {
      let pesan = (aksi === 'setujui') ? "Setujui peminjaman ini?" : "Tolak peminjaman ini?";
      if (confirm(pesan)) {
        window.location.href = "../../controller/c_peminjaman.php?aksi=update_status&id=" + id + "&status=" + aksi;
      }
    }
  </script>
</body>
</html>
