<div class="container" style="margin-top:100px; margin-bottom:80px; ">
    <div class="card">
        <div class="card-body">
            <?php foreach($detail as $dt) : ?>
                <div class="row">
                    <div class="col-md-5">
                        <img width="450px" height="340px" src="<?= base_url('assets/upload/').$dt->gambar ?>">
                    </div>
                    <div class="col-md-7">
                    <table class="table table-hover table-striped table-borderd">
                            <tr>
                                <td>Jenis Ikan</td>
                                <td><?= $dt ->jenis_ikan ?></td>
                            </tr>
                            <tr>
                                <td>Type Ikan</td>
                                <td><?= $dt ->type_ikan ?></td>
                            </tr>
                            <tr>
                                <td>Ukuran</td>
                                <td><?= $dt ->ukuran ?> Cm</td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><?= $dt ->umur ?></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><?= $dt ->stok ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>Rp. <?= number_format($dt ->harga, 0,',','.') ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><?= $dt ->deskripsi ?></td>
                            </tr>
                        </table>
                        <div align="right">
                        <?php
                        
                                if($dt->stok =="0"){
                                    echo "<span class='btn btn-danger' disable>Stok Habis</span>";
                                } else {
                                  echo anchor('dashboard/tambah_ke_Keranjang/'.$dt->id_ikan,'<div class="btn btn-primary">tambah ke keranjang</div>');
                                }
                                ?>
                                <?php ?>
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

