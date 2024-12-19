<?= $this->session->flashdata('notifikasi', TRUE) ?>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#smallModal">
    Laporan Peminjaman Buku
</button>
<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form action="<?= base_url('index.php/admin/peminjaman/laporan') ?>" method="get" target="_blank">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Laporan Peminjaman Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal1"/>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="form-label">Tanggal Berakhir</label>
                        <input type="date" class="form-control" name="tanggal2"/>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="-">Semua</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                            <option value="Proses">Menunggu Verifikasi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Data Pengajuan Peminjaman Buku</h5>
    <!-- Membungkus tabel dalam div class table-responsive -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Peminjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($buku as $book) { ?>

                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['namaLengkap']; ?></td>
                        <td><?= $book['tanggalPeminjaman']; ?></td>
                        <td><?= $book['tanggalPengembalian']; ?></td>
                        <td>
                            <?php if ($book['statusPeminjaman'] == 'Proses') {
                                echo "Menunggu Verifikasi";
                            } else {
                                echo $book['statusPeminjaman'];
                            } ?>
                        </td>
                        <td>

                            <?php if ($book['statusPeminjaman'] == 'Proses') { ?>
                                <a onclick="return confirm('Apakah anda yakin ingin menyetujui peminjaman buku ini?');"
                                    href="<?= base_url('index.php/admin/peminjaman/terima/' . $book['peminjamanID'] . '/' . $book['bukuID']) ?>"
                                    class="btn btn-sm btn-success">Terima</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menolak peminjaman buku ini?');"
                                    href="<?= base_url('index.php/admin/peminjaman/tolak/' . $book['peminjamanID']) ?>"
                                    class="btn btn-sm btn-danger">Tolak</a>
                            <?php } ?>

                            <?php if ($book['statusPeminjaman'] == 'Dipinjam') { ?>
                                <a onclick="return confirm('Apakah peminjam sudah mengembalikan peminjaman buku ini?');"
                                    href="<?= base_url('index.php/admin/peminjaman/kembali/' . $book['peminjamanID'] . '/' . $book['bukuID']) ?>"
                                    class="btn btn-sm btn-success">Kembalikan</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>