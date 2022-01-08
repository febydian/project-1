<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Jenis Ikan</th>
            <th>Type Ikan</th>
            <th>Ukuran</th>
            <th>Umur</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            
        </tr>

        <?php 
        $no=1;
        foreach($ikan as $in) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $in->jenis_ikan ?></td>
            <td><?= $in->type_ikan ?></td>
            <td><?= $in->ukuran ?></td>
            <td><?= $in->umur ?></td>
            <td><?= $in->stok ?></td>
            <td><?= $in->harga ?></td>
            <td><?= $in->deskripsi ?></td>
            <td>
                <img width="80px" src="<?= base_url('assets/upload/').$in->gambar ?>" alt="">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>