<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="card">
            <div class="container">
                <form method="POST" action="<?= base_url('admin/edit') ?>" enctype="multipart/form-data">
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" readonly>
                                <?= form_error('email', '<small class="text-danger pl-3">','</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" >
                                <?= form_error('nama', '<small class="text-danger pl-3">','</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?= $user['no_telp'] ?>" >
                                <?= form_error('no_telp', '<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="textarea" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat'] ?>" >
                                <?= form_error('alamat', '<small class="text-danger pl-3">','</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="image" id="image" class="form-control" value="<?= $user['image'] ?>" >
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>




