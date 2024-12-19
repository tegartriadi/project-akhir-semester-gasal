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
                    <th>Tanggal Peminjaman</th>
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
                        <td><?= $book['tanggalPeminjaman']; ?></td>
                        <td>
                            <?php if($book['statusPeminjaman']=='Proses'){
                                echo "Menunggu Verifikasi";
                            } else{
                                echo $book['statusPeminjaman']; } ?>  
                        </td>
                        <td>
                            <!-- Tombol Hapus dan Edit -->
                          
                           <?php if($book['statusPeminjaman']=='Proses'){ ?>
                            <a onclick="return confirm('Apakah anda yakin ingin membatalkan peminjaman buku ini?');" 
                               href="<?= base_url('index.php/peminjam/peminjaman/batal/' . $book['peminjamanID']) ?>" 
                               class="btn btn-sm btn-danger">Batalkan</a>
                               <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
