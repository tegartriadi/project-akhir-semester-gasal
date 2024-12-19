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
                    <img src="<?= base_url('assets/frontend/')?>images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
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
                </div>
            </div>
        </nav>

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">

                        <h2 class="mb-0"><?= $judul; ?></h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding pb-0" id="section_2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title"><?= $detail->namaKategori; ?></h4>
                </div>

                <div class="row mb-4">
                    <!-- Bagian Gambar -->
                    <div class="col-lg-3 col-12">
                        <div class="custom-block-icon-wrap">
                            <div class="custom-block-image-wrap custom-block-image-detail-page">
                                <img src="<?= base_url('assets/upload/buku/'. $detail->foto)?>"
                                    class="custom-block-image img-fluid" alt="<?= $detail->namaKategori; ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Detail -->
                    <div class="col-lg-9 col-12">
                        <div class="custom-block-info">
                            <div class="custom-block-top d-flex mb-1">
                                <small class="me-4">
                                    <a href="#">
                                        <i class="bi-play"></i>
                                        <?= $detail->penulis; ?>
                                    </a>
                                </small>

                                <small>
                                    <i class="bi-clock-fill custom-icon"></i>
                                    <?= $detail->penerbit;?>
                                </small>

                                <small class="ms-auto">Stok<span class="badge"><?= $detail->stok; ?></span></small>
                            </div>

                            <h2 class="mb-2"><?= $detail->judul; ?></h2>
                            <p><?= $detail->sinopsis; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



        <section class="related-podcast-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Related episodes</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-page.html">
                                    <img src="<?= base_url('assets/frontend/')?>images/podcast/27376480_7326766.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                        Vintage Show
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="<?= base_url('assets/frontend/')?>images/profile/woman-posing-black-dress-medium-shot.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Elsa
                                        <strong>Influencer</strong>
                                    </p>
                                </div>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
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

