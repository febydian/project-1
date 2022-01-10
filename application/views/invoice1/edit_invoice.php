<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Invoice</h1>
        </div>

        <?php foreach($edit_invoice as $in) : ?>
        <form method="POST" action="<?= base_url('invoice1/edit_invoice_aksi') ?>" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penerima</label>
                                <input type="hidden" name="id_invoice" value="<?= $in->id_invoice ?>">
                                <input type="text" id="penerima" name="penerima" class="form-control" value="<?php echo $in->penerima ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" id="hp_penerima" name="hp_penerima" class="form-control" value="<?php echo $in->hp_penerima ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="number" id="kode_pos" name="kode_pos" class="form-control" value="<?php echo $in->kode_pos ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="textarea" id="alamat_penerima" name="alamat_penerima" class="form-control" value="<?php echo $in->alamat_penerima ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pesan</label>
                                <input type="text" id="tgl_pesan" name="tgl_pesan" class="form-control" value="<?php echo $in->tgl_pesan ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?php echo $in->provinsi ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" id="kota" name="kota" class="form-control" value="<?php echo $in->kota ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Expedisi</label>
                                <input type="text" name="expedisi" id="expedisi" class="form-control" value="<?= $in->expedisi ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" value="<?= $in->bukti_pembayaran ?>" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Paket</label>
                                <input type="text" name="paket" id="paket" class="form-control" value="<?= $in->paket ?>" required>
                            </div> -->
                        </div>
                    </div> 
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('invoice1')?>">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
        
        <?php endforeach ?>
    </section>
</div>

