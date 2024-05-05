<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - STIKOM Tunas Bangsa</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/files'); ?>/logo/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist'); ?>/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/mycss'); ?>/style.css">

</head>

<body>
    <!-- NAVBAR SECTION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- Logo -->
                <img style="height: 3rem;" src="<?php echo base_url('assets/files'); ?>/logo/siakad.svg" alt="siakad">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link me-5" href="#">Disabled</a>
                </div>
                <a href="<?php echo base_url('admin/auth'); ?>" class="btn btn-outline-secondary shadow-sm d-sm d-block">Login Sekarang!</a>
            </div>
        </div>
    </nav>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <!-- teks -->
                <div class="col-md-6">
                    <div class="text">
                        Sistem Informasi Akademik STIKOM Tunas Bangsa
                    </div>
                    <div class="buttons">
                        <a href="<?php echo base_url('admin/auth'); ?>" class="btn btn-primary">Login</a>
                        <a href="#" class="btn btn-outline-secondary ms-3">Daftar Kuliah</a>
                    </div>
                </div>
                <!-- gambar -->
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/files'); ?>/logo/hero.jpg" class="w-100" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- SETUP SECTION -->
    <section class="setup">
        <div class="container">
            <div class="text-header text-center">
                <h3>Lorem ipsum dolor sit amet.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="item text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icons">
                            <i class="bi bi-bag-heart-fill"></i>
                        </div>
                        <div class="desc">
                            <h5>Lorem, ipsum.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero reprehenderit ducimus, excepturi voluptas facere aliquid?</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icons">
                            <i class="bi bi-bag-heart-fill"></i>
                        </div>
                        <div class="desc">
                            <h5>Lorem, ipsum.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero reprehenderit ducimus, excepturi voluptas facere aliquid?</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icons">
                            <i class="bi bi-bag-heart-fill"></i>
                        </div>
                        <div class="desc">
                            <h5>Lorem, ipsum.</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero reprehenderit ducimus, excepturi voluptas facere aliquid?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- INFORMASI SECTION -->
    <section class="informasi">
        <div class="container">
            <div class="row info-1 mb-3">
                <!-- teks -->
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text-informasi">
                        <h5>Lorem ipsum dolor sit amet consectetur.</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim impedit fuga vero! Quod, natus optio.</p>
                    </div>
                </div>
                <!-- gambar -->
                <div class="col-md-6">
                    <img class="w-100" src="<?php echo base_url('assets/files'); ?>/logo/img1.jpg" alt="img-1">
                </div>
            </div>
            <div class="row info-2">
                <!-- gambar -->
                <div class="col-md-6">
                    <img class="w-100" src="<?php echo base_url('assets/files'); ?>/logo/img1.jpg" alt="img-1" alt="img-2">
                </div>
                <!-- teks -->
                <div class="col-md-6 d-flex  align-items-center">
                    <div class="text-informasi">
                        <h5>Lorem ipsum dolor sit.</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim impedit fuga vero! Quod, natus optio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER SECTION -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class=" text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class="text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class="text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class="text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class="text-decoration-none">Home</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy">
                    &copy;2024 by Rizal Efendi - img by freepik.com
                </div>
            </div>
        </div>
    </footer>
    <!-- SCRIPT -->
    <script src="<?php echo base_url('assets/dist'); ?>/assets/compiled/js/app.js"></script>
</body>

</html>