<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail invoice</h1>
        </div>


                <div class="card">
                    <div class="card-body">
                        <div class="card-header-action">
                            <div class="btn btn-sm btn-success" >NO invoice : <?= $invoice->id_invoice ?></div>
                            
                        </div>
                        <div class="card-header">
                            <div class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $invoice->nama ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" id="no_telp" name="no_telp" class="form-control" value="<?= $invoice->no_telp ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $invoice->alamat ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label>Bukti Pembayaran</label>
                                        <img width="520px" src="<?= base_url('assets/bukti_pembayaran/').$invoice ->bukti_pembayaran ?>">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table id="example" class="table table-bordered table-striped" style="margin-bottom: 20px; padding-top:500px; width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Id Ikan</th>
                                            <th>Jenis Ikan</th>
                                            <th>Jumlah</th>
                                            <th>Harga satuan</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $total = 0;
                                        foreach($pesanan as $ps) : 
                                            $subtotal = $ps->jumlah*$ps->harga;
                                            $total += $subtotal;
                                        ?>
                                        <tr>
                                            <td><?= $ps->id_ikan ?></td>
                                            <td><?= $ps->jenis_ikan ?></td>
                                            <td><?= $ps->jumlah ?></td>
                                            <td><?= number_format($ps->harga, 0,',','.') ?></td>
                                            <td><?= number_format($subtotal, 0,',','.') ?></td>
                                        </tr>

                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="4" align="right">Total</td>
                                            <td align="right">Rp. <?= number_format($total, 0,',','.') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="text-align: right;">
                                    <a href="<?= base_url('invoice/print_pesanan/').$ps->id_invoice ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"> Print</i></a>
                                    <a href="<?= base_url('invoice') ?>" class="btn btn-sm btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>




