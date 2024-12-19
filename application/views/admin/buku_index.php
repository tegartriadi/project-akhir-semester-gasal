<?php
// Display session notifications
if ($this->session->flashdata('notifikasi', TRUE)) {
    echo $this->session->flashdata('notifikasi', TRUE);
}
?>

<div class="col-lg-4 col-md-6">
    <div class="mt-4 mb-3">
        <?php if ($this->session->userdata('role') == 'Admin') { ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Tambah Buku
        </button>
        <?php } ?>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('index.php/admin/buku/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- Input Judul -->
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required autocomplete="off">
                            </div>

                            <!-- Input Penulis -->
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis" required autocomplete="off">
                            </div>

                            <!-- Input Penerbit -->
                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit" required autocomplete="off">
                            </div>

                            <!-- Input Sinopsis -->
                            <div class="mb-3">
                                <label class="form-label">Sinopsis</label>
                                <textarea name="sinopsis" class="form-control" placeholder="Masukkan Sinopsis"></textarea>
                            </div>

                            <!-- Input Foto -->
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <!-- Input Tahun Terbit dan Stok -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Terbit</label>
                                    <select name="tahunTerbit" class="form-control">
                                        <?php for($tahun =1990; $tahun <= date('Y'); $tahun++) { ?>
                                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" min="1" name="stok" class="form-control" placeholder="Masukkan Stok" required autocomplete="off">
                                </div>
                            </div>

                            <!-- Pilihan Kategori -->
                             <div class="row">
                                <div class="col-mb-3">
                                    <label class="form-label">Kategori</label>
                                    <div class="form-control" style="max-height: 100px; overflow-y:auto;">
                                    <?php foreach ($kategori as $kk) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="kategoriID" value="<?= $kk['kategoriID'] ?>">
                                            <label class="form-check-label"><?= $kk['namaKategori'] ?></label>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
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
    <h5 class="card-header">Data Buku</h5>
    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Sinopsis</th>
                    <th>Kategori</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($buku as $book) {
                    $sinopsisPendek = mb_substr($book['sinopsis'], 0, 20) . (strlen($book['sinopsis']) > 20 ? '...' : '');
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['penulis']; ?></td>
                        <td><?= $book['penerbit']; ?></td>
                        <td><?= $sinopsisPendek; ?></td>
                        <td><?= $book['namaKategori']; ?></td>
                        <td><?= $book['tahunTerbit']; ?></td>
                        <td><?= $book['stok']; ?></td>
                        <td>
                            <a href="<?= base_url('assets/upload/buku/' . $book['foto']) ?>" target="_blank">
                                <span class="badge bg-primary"><i class="tf-icons bx bx-search"></i> Lihat</span>
                            </a>
                        </td>
                        <td><?= $book['status']; ?></td>
                        <td>
                        <div class="d-flex gap-2">
                            <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                                href="<?= base_url('index.php/admin/buku/delete/' . $book['bukuID']) ?>" 
                                class="btn btn-sm btn-danger">Hapus</a>
                                <a href="<?= base_url('index.php/admin/buku/edit/' . $book['bukuID']) ?>" 
                                class="btn btn-sm btn-warning">Edit</a>
                            <?php } ?>
                            <a href="<?= base_url('index.php/admin/buku/ulasan/' . $book['bukuID']) ?>"
                            class="btn btn-sm btn-success">Ulasan</a>
                        </div>
                    </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
