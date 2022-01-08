<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail invoice</h1>
        </div>


                <div class="card">
                    <div class="card-body">
                        <div class="card-header-action">
                            <div class="btn btn-sm btn-success" >NO invoice : <?= $invoice->id_invoice ?></div>
                        </div><br>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penerima</label>
                                        <!-- <input type="hidden" name="id_invoice" value="<?= $ps->id_invoice ?>"> -->
                                        <input type="text" id="penerima" name="penerima" class="form-control" value="<?= $invoice->penerima ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" id="hp_penerima" name="hp_penerima" class="form-control" value="<?= $invoice->hp_penerima ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="number" id="kode_pos" name="kode_pos" class="form-control" value="<?= $invoice->kode_pos ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="textarea" id="alamat_penerima" name="alamat_penerima" class="form-control" value="<?= $invoice->alamat_penerima ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= $invoice->provinsi ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" id="kota" name="kota" class="form-control" value="<?= $invoice->kota ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Expedisi</label>
                                        <input type="text" name="expedisi" id="expedisi" class="form-control" value="<?= $invoice->expedisi ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pesan</label>
                                        <input type="text" id="tgl_pesan" name="tgl_pesan" class="form-control" value="<?= $invoice->tgl_pesan ?>" readonly>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Paket</label>
                                        <input type="text" name="paket" id="paket" class="form-control" value="<?= $invoice->paket ?>" required>
                                    </div> -->
                                </div>
                            </div>
                            <div class="container mt-3">
                                    <?php 
                                    if(empty($invoice->bukti_pembayaran)) { ?>
                                    <button class="btn btn-danger btn-block">Belum Mengirim Bukti Pembayaran</button>
                                    <?php } else { ?>
                                        <div class="row md-6 mb-5">
                                            <h5>Bukti Teransaksi :</h5>
                                            <img width="100%" src="<?= base_url('assets/bukti_pembayaran/').$invoice->bukti_pembayaran ?>" alt="">
                                        </div>
                                    <?php } ?>
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
                                    <!-- <a href="<?= base_url('invoice/print_pesanan/').$ps->id_invoice ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"> Print</i></a> -->
                                    <a href="<?= base_url('invoice1') ?>" class="btn btn-sm btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>




