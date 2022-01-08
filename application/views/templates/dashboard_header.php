<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BalaiBenih</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/bootstrap_4.6/') ?>css/bootstrap.min.css" crossorigin="anonymous"> -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?= base_url('assets/template2/'); ?>css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- custom js file link  -->
    <script src="<?= base_url('assets/template2/'); ?>js/script.js" defer></script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body">


<!DOCTYPE html>

    <!-- header section starts  -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <li>
          <!-- <img src="<?= base_url('assets/template2/images/logo.png') ?>"  style="width: 45px; height:45px" alt=""> -->
            <a data-aos="zoom-in-left" data-aos-delay="150" href="<?= base_url('dashboard') ?>" class="logo">UPDT sleman</a>
        </li>

        <nav class="navbar">
            <!-- <li><a data-aos="zoom-in-left" data-aos-delay="300" href="<?= base_url('dashboard') ?>">home</a></li> -->
            <li><a data-aos="zoom-in-left" data-aos-delay="600" href="<?= base_url('dashboard/#ikan') ?>">Ikan</a></li>
            <li><a data-aos="zoom-in-left" data-aos-delay="600" href="<?= base_url('teransaksi') ?>">Teransaksi</a></li>
            <li><a data-aos="zoom-in-left" data-aos-delay="900" href="<?= base_url('dashboard/#gallery') ?>">Gallery</a></li>
            <li><a data-aos="zoom-in-left" data-aos-delay="900" href="<?= base_url('dashboard/#map') ?>">Map</a></li>
            <div class="nav navbar-nav navbar-right" data-aos="zoom-in-left" style="padding-left: 90px;">
            <li>
              <?php
                $keranjang ='<i class="fas fa-cart-plus"></i> '.$this->cart->total_items().' ikan'
              ?>
              <?php echo anchor('dashboard/detail_keranjang', $keranjang)  ?>
            </li>
          </div>
        </nav>

        <div class="navbar">
          
        </div>


        <nav class="dropdown">
          <?php if($this->session->userdata('nama')) { ?>
            <a data-aos="zoom-in-left" data-aos-delay="450" href="#profil"><i class="fas fa-user"></i> Hi, <?= $this->session->userdata('nama') ?> <i class="fas fa-caret-down"></i></a>
            <ul class="dropdown1">
                <li><a data-aos="zoom-in-left" data-aos-delay="450" href="#about">Edit</a></li>
                <!-- <li><a data-aos="zoom-in-left" data-aos-delay="450" href="<?= base_url('auth/ganti_password') ?>">Ganti Password</a></li> -->
                <li><a data-aos="zoom-in-left" data-aos-delay="450" href="<?= base_url('auth/logout') ?>">Logout</a></li>
            </ul>
            <?php } else { ?>
              <a data-aos="zoom-in-left" data-aos-delay="1300" href="<?= base_url('auth/login') ?>" class="btn">Login</a>
            <?php } ?>
        </nav>
    </header>

    <!-- header section ends -->