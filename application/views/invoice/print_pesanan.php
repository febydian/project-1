<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card-header">
                            <div class="form">
                                    <tr>
                                        <td>Nama : </td>
                                        <td><?= $invoice->nama ?></td>
                                    </tr><br>
                                    <tr>
                                        <td>No Telepon : </td>
                                        <td><?= $invoice->no_telp ?></td>
                                    </tr><br>
                                    <tr>
                                        <td>Alamat : </td>
                                        <td><?= $invoice->alamat ?></td>
                                    </tr><br>
                                    <tr>
                                        <td>Bukti Pembayaran : </td>
                                        <img width="200px" src="<?= base_url('assets/bukti_pembayaran/').$invoice->bukti_pembayaran ?>">
                                    </tr>
                                    </div>
                                    <div class="col-md-6">
                                    <!-- <div class="form-group">
                                            <label>Bukti Pembayaran</label>
                                            <img width="300px" src="<?= base_url('assets/bukti_pembayaran/').$invoice->bukti_pembayaran ?>">
                                        </div> -->
                                    </div><br><br><br>
                            </div>
    <table>
        <tr>
            <th>Id Ikan</th>
            <th>Jenis Ikan</th>
            <th>Jumlah</th>
            <th>Harga satuan</th>
            <th>Sub Total</th>
        </tr>

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
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>