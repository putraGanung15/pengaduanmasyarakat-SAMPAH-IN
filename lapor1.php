<?php
include 'header.php';
?>

<div class="container" style="margin-top:60px; margin-bottom:100px;">
  <h2 class="text-center"
    style="font-weight:bold; color:#28a745; border-bottom:4px solid #28a745; display:inline-block; padding-bottom:8px;">
    Sampaikan Laporan Anda
  </h2>


  <div class="row justify-content-center mt-4">
    <div class="col-md-8">
      <div class="card shadow-sm" style="border-radius:15px; border:none;">
        <div class="card-body">
          <form method="post" action="proses_lapor.php" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label><strong>Pilih Klasifikasi Laporan:</strong></label>
              <select name="klasifikasi" class="form-control" required>
                <option value="">-- Pilih Klasifikasi --</option>
                <option value="Sampah Jalan">Sampah Jalan</option>
                <option value="TPS / Tempat Pembuangan">TPS / Tempat Pembuangan</option>
                <option value="Sampah Rumah Tangga">Sampah Rumah Tangga</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label><strong>Judul Laporan Anda *</strong></label>
              <input type="text" name="judul" class="form-control" placeholder="Ketik judul laporan" required>
            </div>

            <div class="form-group mb-3">
              <label><strong>Isi Laporan Anda *</strong></label>
              <textarea name="isi" class="form-control" rows="5" placeholder="Ketik isi laporan" required></textarea>
            </div>

            <div class="form-group mb-3">
              <label><strong>Tanggal Kejadian *</strong></label>
              <input type="date" name="tanggal_kejadian" class="form-control" required>
            </div>

            <div class="form-group mb-3">
              <label><strong>Lokasi Kejadian *</strong></label>
              <input type="text" name="lokasi" class="form-control" placeholder="Ketik lokasi kejadian" required>
            </div>

            <div class="form-group mb-3">
              <label><strong>Instansi Tujuan</strong></label>
              <input type="text" name="instansi" class="form-control" placeholder="Contoh: Dinas Lingkungan Hidup">
            </div>

            <div class="form-group mb-3">
              <label><strong>Upload Lampiran</strong></label>
              <input type="file" name="lampiran" class="form-control">
            </div>

            <div class="form-check mb-3">
              <input type="checkbox" name="anonim" value="1" class="form-check-input" id="anonimCheck">
              <label class="form-check-label" for="anonimCheck">Kirim sebagai Anonim / Rahasia</label>
            </div>

            <button type="submit" class="btn btn-success btn-block"
              style="border-radius:25px; padding:12px; font-weight:600;">
              Tulis Laporan
            </button>
          </form>
        </div>
      </div>

      <div class="alert alert-info mt-4" style="border-left:5px solid #28a745;">
                <strong>Info:</strong> Laporan anda akan kami cek sesuai urutan.
            </div>
        </div>
    </div>
</div>

<style>
  .form-control {
    border-radius: 12px;
    border: 1px solid #28a745;
  }

  .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.4);
  }

  .btn-success {
    background-color: #28a745;
    border: none;
  }

  .btn-success:hover {
    background-color: #19692c;
  }

  .alert-info {
    background-color: #d4edda;
    color: #155724;
  }
</style>

<?php include 'footer.php'; ?>