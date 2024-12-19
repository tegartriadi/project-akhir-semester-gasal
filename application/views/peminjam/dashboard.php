<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>
    <style>
        .owl-carousel-image {/* Atur lebar gambar */
        height: 400px; /* Atur tinggi gambar */
        object-fit: cover; /* Memotong gambar sesuai ukuran tanpa mengubah rasio */
        border-radius: 8px; /* Opsional: Menambahkan sudut membulat */
        margin: 0 auto; /* Memastikan gambar rata tengah */


}

    </style>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/') ?>css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/frontend/') ?>css/owl.theme.default.min.css">
    <link href="<?=base_url('assets/frontend/') ?>css/templatemo-pod-talk.css" rel="stylesheet">
    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.html">
                    <img src="<?= base_url('assets/frontend/') ?>images/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                            aria-label="Search">

                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('index.php/peminjam/dashboard') ?>">Home</a>
                        </li>
                    </ul>

                    <div class="ms-4">
                        <a href="<?= base_url('index.php/auth/login') ?>" class="btn custom-btn custom-border-btn smoothscroll">Login</a>
                    </div>
                </div>
            </div>
        </nav>

    <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Selamat Datang di Library Digital</h1>

                            <p class="text-white"><?= $this->session->userdata('namaLengkap') ?></p>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <?php foreach($buku as $bk) {?>
                            <div class="owl-carousel-info-wrap item">
                                <img src="<?= base_url('assets/upload/buku/' . $bk['foto']) ?>"
                                    class="owl-carousel-image" alt="">

                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">
                                        <?= $bk['judul'] ?>
                                    </h4>

                                    <span class="badge"><?= $bk['namaKategori'] ?></span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

        <section class="trending-podcast-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Books</h4>
                        </div>
                    </div>

                    <?php foreach($buku as $bu){ ?>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="<?= base_url('index.php/peminjam/detail') ?>">
                                    <img src="<?= base_url('assets/upload/buku/' . $bu['foto']) ?>" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="<?= base_url('index.php/peminjam/detail') ?>">
                                       <?= $bu['judul'] ?>
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <p><?= $bu['penulis']?></p>
                                </div>
                                <h5><?= $bu['namaKategori'] ?></h5>

                                <p class="mb-0"><?= substr($bu['sinopsis'], 0, 30) ?>...</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-star me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>  
                    <?php } ?>

                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url('assets/frontend/')?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/frontend/')?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/frontend/')?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/frontend/')?>js/custom.js"></script>

</body>

</html> 