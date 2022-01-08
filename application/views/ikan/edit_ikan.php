<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Ikan</h1>
        </div>

        <?php foreach($ikan as $ik) : ?>
        <form method="POST" action="<?= base_url('ikan/edit_ikan_aksi') ?>" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Ikan</label>
                                <input type="hidden" name="id_ikan" value="<?= $ik->id_ikan ?>">
                                <select name="jenis_ikan" class="form-control" required>
                                    <option value="<?= $ik->jenis_ikan ?>"><?= $ik->jenis_ikan ?></option>
                                    <?php foreach($jenis_ikan as$ji) : ?>
                                        <option value="<?= $ji->jenis_ikan ?>">
                                        <?= $ji->jenis_ikan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type Ikan</label>
                                <select name="type_ikan" class="form-control" required>
                                    <option value="<?= $ik->type_ikan ?>"><?= $ik->type_ikan ?></option>
                                    <?php foreach($type_ikan as$ji) : ?>
                                        <option value="<?= $ji->type_ikan ?>">
                                        <?= $ji->type_ikan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <input type="number" name="ukuran" class="form-control" value="<?= $ik->ukuran ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number" name="umur" class="form-control" value="<?= $ik->umur ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?= $ik->stok ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?= $ik->harga ?>" required>
                            </div>
                            <div class="form-group">
                                <label>deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" value="<?= $ik->deskripsi ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control" value="<?= $ik->gambar ?>" required>
                            </div>
                        </div>
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

