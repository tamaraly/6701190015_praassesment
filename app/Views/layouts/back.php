<?php
$uri = current_url(true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo (isset($title) ? $title . ' -' : ''); ?>Aplikasi Penerimaan Pos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="<?php echo base_url('assets/img/favicon.png'); ?>" rel="icon">
    <link href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/icofont/icofont.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/venobox/venobox.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <style type="text/css">
        .MyHide {
            -webkit-animation: seconds 3s forwards;
            -webkit-animation-iteration-count: 1;
            -webkit-animation-delay: 3s;
            animation: seconds 3s forwards;
            animation-iteration-count: 1;
            animation-delay: 3s;
            position: relative;
        }

        @-webkit-keyframes seconds {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                left: -9999px;
                position: absolute;
            }
        }

        @keyframes seconds {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                left: -9999px;
                position: absolute;
            }
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="<?php echo base_url(); ?>">Aplikasi Penerimaan Pos</a></h1>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>" class="text-danger">
                            Home
                        </a>
                    </li>
                    <li class="<?php echo ($uri->getSegment(2) == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="<?php echo ($uri->getSegment(2) == 'karyawan' ? 'active' : ''); ?>">
                        <a href="<?php echo base_url('karyawan'); ?>">Karyawan</a>
                    </li>
                    <li class="<?php echo ($uri->getSegment(2) == 'penghuni' ? 'active' : ''); ?>">
                        <a href="<?php echo base_url('penghuni'); ?>">Penghuni</a>
                    </li>
                    <li class="<?php echo ($uri->getSegment(2) == 'paket' ? 'active' : ''); ?>">
                        <a href="<?php echo base_url('paket'); ?>">Paket</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout'); ?>" onclick="return confirm('ANDA YAKIN INGIN KELUAR DARI SISTEM INI?');">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php echo $this->renderSection('content') ?>

    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>6701190015</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery.easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/owl.carousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/venobox/venobox.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/aos/aos.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>

</html>