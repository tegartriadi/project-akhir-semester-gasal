<?= $this->session->flashdata('notifikasi', TRUE) ?>
<div class="row">
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
    <?php } 
    if($ulasan==NULL){echo"Belum ada ulasan";}
    ?>
</div>

</div>
