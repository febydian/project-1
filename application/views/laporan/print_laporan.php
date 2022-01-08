<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Cetak Laporan Pemesanan Ikan</h1>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="col-lg-12">
                        <div class="invoice-title" style="padding-top: 30px;">
                        <div class="invoice-number">Date : <?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?> </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Ikan</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($laporan as $lp) : 
                                        // $ikan = $this->ikan_model->detail_ikan1($items['id']);
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            
                                            <td><?= $lp['jenis_ikan'] ?></td>
                                            <td><?= $lp['jumlah'] ?></td>
                                            <td align="right">Rp. <?= number_format($lp['harga'], 0,',','.') ?></td>
                                            <td align="right">Rp. <?= number_format($lp['subtotal'], 0,',','.') ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <!-- <tr>
                                            <td colspan="4"></td>
                                            <td align="right">Rp. <?= number_format($this->cart->total(), 0,',','.') ?></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <!-- <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button> -->
                    </div>
                        <button onclick="window.print()" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </section>
</div>