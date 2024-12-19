<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="card">
    <form action="<?= base_url('index.php/admin/buku/update') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <!-- Input Judul -->
             <div class="row">
             <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" value="<?= $buku->judul; ?>" required>
                <input type="hidden" name="bukuID" value="<?= $buku->bukuID; ?>">
                <input type="hidden" name="foto_lama" value="<?= $buku->foto; ?>">
            </div>

             </div>
           
            <!-- Input Penulis -->
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis" value="<?= $buku->penulis;?>" required>
            </div>

            <!-- Input Penerbit -->
            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit" value="<?= $buku->penerbit; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <textarea name="sinopsis" class="form-control" placeholder="Masukkan sinopsis buku" required><?=$buku->sinopsis; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Buku</label>
                <input type="file" name="foto" class="form-control" accept="gambar/jpeg, gambar/png">
            </div>

            <!-- Input Tahun Terbit -->
            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tahun Terbit</label>
                                    <select name="tahunTerbit" class="form-control">
                                        <?php for($tahun =1990; $tahun <= date('Y'); $tahun++) { ?>
                                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                            <?php } ?>
                                            <option selected value="<?= $buku->tahunTerbit; ?>"><?= $buku->tahunTerbit; ?></option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" min="1" name="stok" class="form-control" required value="<?= $buku->stok; ?>" autocomplete="off">
                                </div>
                            </div>

            <!-- Pilihan Kategori -->
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategoriID" class="form-control" required>
                    <?php foreach ($kategori as $kk) { ?>
                        <option value="<?= $kk['kategoriID'] ?>" 
                            <?php if($buku->kategoriID==$kk['kategoriID']) { echo "selected"; } ?>>
                            <?= $kk['namaKategori'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
