<div class="container" style="padding:10px 10px; margin-top: 150px; margin-bottom: 290px; background-color: white;">
    <h2>Keranjang Belanja</h2><br>
    
    <table class="table table-bordered table-striped table-hover" >
        <thead>
        <tr>
            <th>No</th>
            <th>Jenis Ikan</th>
            <!-- <th>Type Ikan</th> -->
            <!-- <th>Ukuran</th> -->
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-total</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($this->cart->contents() as $items) : 
            // $ikan = $this->ikan_model->detail_ikan1($items['id']);
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items['name'] ?></td>
                <!-- <td><?= $ikan->harga ?></td> -->
                <!-- <td><?= $items['ukuran'] ?></td> -->
                <td><?= $items['qty'] ?></td>
                <td align="right">Rp. <?= number_format($items['price'], 0,',','.') ?></td>
                <td align="right">Rp. <?= number_format($items['subtotal'], 0,',','.') ?></td>
                <td class="text-center">
                    <a href="<?= base_url('dashboard/delete/').$items['rowid'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4"></td>
                <td align="right">Rp. <?= number_format($this->cart->total(), 0,',','.') ?></td>
            </tr>
        </tbody>
    </table>

    <div align="right">
        <a href="<?= base_url('dashboard/hapus_keranjang') ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Clear Cart</a>
        <a href="<?= base_url('dashboard/#ikan') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Kembali</a>
        <a href="<?= base_url('dashboard/pembayaran') ?>" class="btn btn-success"><i class="fas fa-shopping-cart"></i> CheckOut</a>
    </div>
</div>