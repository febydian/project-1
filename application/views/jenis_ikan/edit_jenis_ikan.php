<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Jenis Ikan</h1>
        </div>

        <?php foreach($jenis_ikan as $ji) : ?>
                <form method="POST" action="<?= base_url('jenis_ikan/edit_jenis_ikan_aksi') ?>" class="was-validated">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Ikan</label>
                                <input type="hidden" name="id_jenis_ikan" value="<?php echo $ji->id_jenis_ikan ?>">
                                <input type="text" id="jenis_ikan" name="jenis_ikan" class="form-control" value="<?php echo $ji->jenis_ikan ?>" required>
                                <div class="valid-feedback"></div>
	                            <div class="invalid-feedback">Wajib Di Isi  </div>
                            </div>

                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
        <?php endforeach ?>
    </section>
</div>




class="container-fluid">
    <div class="main-content">
        <div class="card card-body">
            <section class="section">
                <div class="row">
                    <div class="col-md 6">
                        <h3 class="card-title"><strong>Edit Jenis Ikan</strong></h3>
                    </div>
                </div>

                
            </section>
        </div>
    </div>
</div>