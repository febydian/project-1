<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Ikan</h1>
        </div>

        <?php foreach($ikan as $ik) : ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img width="300px" src="<?= base_url('assets/upload/').$ik ->gambar ?>">
                    </div>
                    <div class="col-md-7" style="font-size: 2px;">
                        <table class="table table-hover table-striped table-borderd">
                            <tr>
                                <td>Jenis Ikan</td>
                                <td><?= $ik ->jenis_ikan ?></td>
                            </tr>
                            <tr>
                                <td>Type Ikan</td>
                                <td><?= $ik ->type_ikan ?></td>
                            </tr>
                            <tr>
                                <td>Ukuran</td>
                                <td><?= $ik ->ukuran ?> Cm</td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><?= $ik ->umur ?> Bulan</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><?= $ik ->stok ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>Rp. <?= $ik ->harga ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><?= $ik ->deskripsi ?></td>
                            </tr>
                        </table>
                        <div style="text-align: right;">
                            <a class="btn btn-primary btn-sm ml-4" href="<?= base_url('ikan/edit_ikan/').$ik->id_ikan ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('ikan')?>">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach ?>
    </section>
</div>




