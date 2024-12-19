<?= $this->session->flashdata('notifikasi', TRUE) ?>
<div class="row">
    <div class="col-md-6">
        <!-- input ulasan -->
        <div class="card">
            <form action="<?= base_url('index.php/peminjam/buku/submitUlasan') ?>" method="post">
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
                        <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis" value="<?= $buku->penulis; ?>" readonly>
                    </div>

                    <!-- Input Sinopsis -->
                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>
                        <textarea name="sinopsis" class="form-control" placeholder="Masukkan sinopsis buku" readonly><?= $buku->sinopsis; ?></textarea>
                    </div>

                    <!-- Input Tahun Terbit -->
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <!-- Input Ulasan -->
                    <div class="mb-3">
                        <label class="form-label">Ulasan</label>
                        <textarea name="ulasan" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Berikan ulasan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
    <?php foreach ($ulasan as $ulsn) { ?>
    <div class="card mb-1">
        <div class="d-flex align-items-start row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3"><?= $ulsn['namaLengkap'] ?></h5>
                    <p class="mb-6"><?= $ulsn['ulasan'] ?></p>
                    
                    <!-- Tampilkan bintang berdasarkan rating -->
                    <div class="mb-3">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <?php if ($i <= $ulsn['rating']) { ?>
                                <span class="text-warning">★</span>
                            <?php } else { ?>
                                <span class="text-muted">★</span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <?php if($ulsn['userID']==$this->session->userdata('userID')){ ?>
                    <a href="<?= base_url('index.php/peminjam/buku/ulasanHapus/'.$ulsn['bukuID']) ?>" class="btn btn-sm btn-outline-primary">Hapus</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>
