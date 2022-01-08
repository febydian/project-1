<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Invoice</h1>
        </div>

        <?php foreach($edit_invoice as $in) : ?>
        <form method="POST" action="<?= base_url('invoice/edit_invoice_aksi') ?>" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id_invoice" value="<?= $in->id_invoice ?>">
                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $in->nama ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" id="no_telp" name="no_telp" class="form-control" value="<?php echo $in->no_telp ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="textarea" id="alamat" name="alamat" class="form-control" value="<?php echo $in->alamat ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Pesan</label>
                                <input type="text" id="tgl_pesan" name="tgl_pesan" class="form-control" value="<?php echo $in->tgl_pesan ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Batas Bayar</label>
                                <input type="text" id="batas_bayar" name="batas_bayar" class="form-control" value="<?php echo $in->batas_bayar ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <input type="number" id="status_pembayaran" name="status_pembayaran" class="form-control" value="<?php echo $in->status_pembayaran ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" value="<?= $in->bukti_pembayaran ?>" required>
                            </div>
                        </div>
                    </div> 
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('invoice')?>">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
        
        <?php endforeach ?>
    </section>
</div>

