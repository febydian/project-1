<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
        </div>

        <?php echo $this->session->flashdata('pesan') ?>
        <div class="card mb-3" style="width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <?php
                    if(empty($user['image'])) { ?>
                    <img src="<?= base_url('assets/stisla/')?>/assets/img/avatar/avatar-1.png" class="card-img" >
                <?php } else { ?>
                    <img src="<?= base_url('assets/upload/').$user['image'] ?>" class="card-img" >
                <?php } ?>
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <p class="card-text"><?= $user['no_telp'] ?></p>
                    <p class="card-text"><?= $user['alamat'] ?></p>
                    <p class="card-text">Member since <?= date('d F Y', $user['date_created']) ?></p>
                    <a href="<?= base_url('admin/edit') ?>" class="btn btn-success"  style="text-align: right;">Edit Profile</a>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
                </div>
            </div>
        </div>


        
    </section>
</div>

