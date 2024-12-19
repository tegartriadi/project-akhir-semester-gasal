
<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="col-lg-4 col-md-6">
    <div class="mt-4 mb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Tambah Kategori
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('index.php/admin/kategori/simpan') ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="namaKategori" class="form-control" placeholder="Masukkan Nama Kategori" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Data Kategori</h5>
    <div class="table-responsive text-nowrap">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($kategori as $kate) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $kate['namaKategori']; ?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                               href="<?= base_url('index.php/admin/kategori/delete/' . $kate['kategoriID']) ?>" 
                               class="btn btn-sm btn-danger">Hapus</a>
                            <a href="<?= base_url('index.php/admin/kategori/edit/' . $kate['kategoriID']) ?>" 
                               class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
