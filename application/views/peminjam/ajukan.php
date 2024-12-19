<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="card">
    <form action="<?= base_url('index.php/peminjam/buku/pinjam') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <!-- Input Judul -->
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="<?= $buku->judul; ?>" readonly>
                <input type="hidden" name="bukuID" value="<?= $buku->bukuID; ?>">
            </div>

            <!-- Input Penulis -->
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" class="form-control" value="<?= $buku->penulis;?>" readonly>
            </div>

            <!-- Input Penerbit -->
            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" class="form-control" value="<?= $buku->penerbit; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <textarea class="form-control" readonly>   <?=$buku->sinopsis; ?></textarea>
            </div>
            <!-- Input Tahun Terbit -->
            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" value="<?= $buku->tahunTerbit; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" class="form-control" value="<?= $buku->namaKategori; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tanggalPeminjaman" class="form-control" required>
            </div>

           
           
        </div>

        <div class="modal-footer">
            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Ajukan</button>
        </div>
    </form>
</div>
