<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="card">
    <form action="<?= base_url('index.php/auth/updatePassword') ?>" method="post">
        <div class="modal-body">
            <!-- Input Password Baru -->
            <div class="mb-3">
                <label for="passwordBaru" class="form-label">Password Baru</label>
                <div class="input-group">
                    <input type="password" id="passwordBaru" name="passwordBaru" class="form-control" placeholder="Masukkan Password Baru" required>
                </div>
            </div>

            <!-- Input Konfirmasi Password -->
            <div class="mb-3">
                <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" id="konfirmasiPassword" name="konfirmasiPassword" class="form-control" placeholder="Konfirmasi Password Anda" required>
                </div>
            </div>
        </div>
        
        <!-- Tombol Simpan -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
