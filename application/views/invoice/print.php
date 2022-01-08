<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Tanggal Pesan</th>
            <th>Status Bayar</th>
            <th>Bukti Pembayaran</th>
        </tr>

        <?php 
        $no=1;
        foreach($invoice as $in) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $in->nama ?></td>
            <td><?= $in->alamat ?></td>
            <td><?= $in->no_telp ?></td>
            <td><?= $in->tgl_pesan ?></td>
            <td><?= $in->status_pembayaran ?></td>
            <td>
                <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>