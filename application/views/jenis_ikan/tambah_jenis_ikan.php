<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Jenis Ikan</h1>
        </div>

        <form method="POST" action="<?= base_url('jenis_ikan/tambah_jenis_ikan_aksi') ?>" class="was-validated" >
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Ikan</label>
                                <input type="text" name="jenis_ikan" class="form-control" required>
                                <div class="valid-feedback"></div>
	                            <div class="invalid-feedback">Wajib Di Isi  </div>
                                <?php echo form_error('jenis_ikan', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
    </section>
</div>

