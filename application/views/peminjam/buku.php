<?= $this->session->flashdata('notifikasi', TRUE) ?>

<div class="card">
    <h5 class="card-header">Data Buku</h5>
    <!-- Membungkus tabel dalam div class table-responsive -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Sinopsis</th>
                    <th>Kategori</th>
                    <th>Tahun Terbit</th>
                    <th>Foto Buku</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($buku as $book) {
                    // Memotong sinopsis menjadi maksimal 100 karakter
                    $sinopsisPendek = mb_substr($book['sinopsis'], 0, 50);
                    if (strlen($book['sinopsis']) > 50) {
                        $sinopsisPendek .= '...';
                    }
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['penulis']; ?></td>
                        <td><?= $book['penerbit']; ?></td>
                        <td><?= $sinopsisPendek; ?></td>
                        <td><?= $book['namaKategori']; ?></td>
                        <td><?= $book['tahunTerbit']; ?></td>
                        <td>
                            <a href="<?= base_url('assets/upload/buku/' . $book['foto']) ?>" target="_blank">
                                <span class="badge bg-primary"><i class="tf-icons bx bx-search"></i> Lihat Foto</span>
                            </a>
                        </td>
                        <td><?= $book['status']; ?></td>
                        <td>
                            <!-- Tombol Hapus dan Edit -->
                            <a onclick="return confirm('Apakah anda yakin ingin menambahkan ke favorit?');" 
                            href="<?= base_url('index.php/peminjam/buku/addKoleksi/' . $book['bukuID']) ?>" class="btn btn-sm btn-danger">Add Favorite</a> 
                           <?php if($book['status']=='Tersedia'){ ?>
                            <a href="<?= base_url('index.php/peminjam/buku/ajukan/' . $book['bukuID']) ?>" 
                               class="btn btn-sm btn-warning">Pinjam</a>
                               <?php } ?>
                            <a href="<?= base_url('index.php/peminjam/buku/ulasan/' . $book['bukuID']) ?>" class="btn btn-sm btn-success">Ulasan</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
