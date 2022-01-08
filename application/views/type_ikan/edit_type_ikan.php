<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Type Ikan</h1>
        </div>

        <?php foreach($type_ikan as $ti) : ?>
                <form method="POST" action="<?= base_url('type_ikan/edit_type_ikan_aksi') ?>" class="was-validated">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Type Ikan</label>
                                <input type="hidden" name="id_type_ikan" value="<?php echo $ti->id_type_ikan ?>" required>
                                <input type="text" id="type_ikan" name="type_ikan" class="form-control" value="<?php echo $ti->type_ikan ?>">
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
