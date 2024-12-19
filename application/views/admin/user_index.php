<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="col-lg-4 col-md-6">
    <div class="mt-4 mb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Tambah user
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('index.php/admin/user/simpan') ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="namaLengkap" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                    <option value="Peminjam">Peminjam</option>
                                </select>
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
    <h5 class="card-header">Data User</h5>
    <div class="table-responsive text-nowrap">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($user as $users) { ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $users['username']; ?></td>
                        <td><?= $users['namaLengkap']; ?></td>
                        <td><?= $users['email']; ?></td>
                        <td><?= $users['alamat']; ?></td>
                        <td><?= $users['role']; ?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                               href="<?= base_url('index.php/admin/user/delete/' . $users['userID']) ?>" 
                               class="btn btn-sm btn-danger">Hapus</a>
                            <a href="<?= base_url('index.php/admin/user/edit/' . $users['userID']) ?>" 
                               class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
