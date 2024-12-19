<div class="card">
<form action="<?= base_url('index.php/admin/kategori/update') ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="namaKategori" class="form-control" value="<?= $kategori->namaKategori; ?>" required>
                                <input type="hidden" name="kategoriID" value="<?= $kategori->kategoriID; ?>" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
</div>