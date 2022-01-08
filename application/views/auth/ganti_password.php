    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla'); ?>/node_modules/selectric/public/selectric.css">

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
                <div class="login-brand">
                <img src="<?= base_url('assets/stisla'); ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                <div class="card-header"><h4>Ganti Password</h4></div>

                <div class="card-body">
                    <form class="user" method="POST" action="<?= base_url('auth/ganti_password_aksi');?>">
                        <div class="form-group">
                            <label for="pass_baru">Password Baru</label>
                            <input id="pass_baru" type="password" class="form-control" name="pass_baru" autofocus placeholder="password baru" value="<?= set_value('pass_baru') ?>">
                            <?= form_error('pass_baru', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kon_pass">Konfirmasi Password Baru</label>
                            <input id="kon_pass" type="password" class="form-control" name="kon_pass" autofocus placeholder="konfirmasi password" value="<?= set_value('kon_pass') ?>">
                            <?= form_error('kon_pass', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Ganti Password
                            </button>
                        </div>
                    </form>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/login');?>">Kembali</a>
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
    <script src="<?= base_url('assets/stisla'); ?>/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url('assets/stisla'); ?>/node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/stisla'); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/stisla'); ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/stisla'); ?>/assets/js/page/auth-register.js"></script>
    </body>
    </html>
