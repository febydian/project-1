
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/stisla'); ?>/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/stisla'); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/stisla'); ?>/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
    <div class="container mt-2">
            <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-4 offset-xl-4">
                <!-- <div class="login-brand">
                <img src="<?= base_url('assets/stisla'); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div> -->

                <div class="card card-primary" style="margin-top: 90px;">
                  <div class="card-header"><h4>LOGIN</h4></div>

                    <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form method="POST" action="<?php base_url('auth/login') ?>">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                        <div class="invalid-feedback">
                          Please fill in your email
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="d-block">
                          <label for="password" class="control-label">Password</label>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                          please fill in your password
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                          Login
                        </button>
                      </div>
                      <!-- <button href="index.html" class="btn btn-primary btn-user btn-block" >Login</button> -->
                      <!-- <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">Login</button> -->
                    </form>

                    <div class="mt-5 text-center">
                      Don't have an account? <a href="<?= base_url('register');?>">Create new one</a>
                    </div>
                  </div>
                </div>
                <div class="simple-footer">
                Copyright &copy; Stisla 2018
                </div>
            </div>
            </div>
        </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/stisla'); ?>/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets/stisla'); ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url('assets/stisla'); ?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>



<!-- 
<div class="container">
        <div class="img">
            <img src="<?= base_url('assets/sb_admin/')?>/img/amikom.jpg" alt="">
        </div>
        <div class="login-content">
            <h4 class="text-center">login</h4>

            <?= $this->session->flashdata('pesan'); ?>
            <form method="post" action="<?php base_url('auth') ?>">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                </div>

                <button href="index.html" class="btn btn-primary btn-user btn-block">Login</button>
            </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth/regis');?>">Create an Account!</a>
                </div>
        </div>
    </div> -->
