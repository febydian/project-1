<div class="container-fluid" style="margin-bottom: 122px;">
    <div class="container" style="padding: 5px 5px;">
    <div class="card mx-auto" style="margin: 120px 0px; padding:15px 0px;">
    <?php echo $this->session->flashdata('pesan') ?>
        <div class="card-header">
            <h1>Data Teransaksi Anda</h1>
        </div>
        <!-- <div class="section-body"> -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Order</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="proses-tab" data-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="true">Di Proses</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Di Kirim</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Selesai</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" style="padding: 5px 5px">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Expedisi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($teransaksi as $tr) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tr->penerima ?></td>
                                            <td><?= $tr->tgl_pesan ?></td>
                                            <td><?= $tr->expedisi ?></td>
                                            <td>
                                            <?php
                                                if($tr->status_pembayaran =="0"){
                                                    echo "<span class='btn btn-sm  btn-warning' disable>Sedang Di Proses</span>";
                                                } else {
                                                    echo "<span class='btn btn-sm btn-success' disable>Konfirmasi Behasil</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('teransaksi/detail/').$tr->id_invoice ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Expedisi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($teransaksi_proses as $tr) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tr->penerima ?></td>
                                            <td><?= $tr->tgl_pesan ?></td>
                                            <td><?= $tr->expedisi ?></td>
                                            <td>
                                            <?php
                                                if($tr->status_order =="1"){
                                                    echo "<span class='btn btn-sm  btn-success' disable>dikemas / Proses</span>";
                                                } else {
                                                    echo "<span class='btn btn-sm btn-warning' disable>belum di proses</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('teransaksi/detail/').$tr->id_invoice ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Expedisi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($teransaksi_kirim as $tr) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tr->penerima ?></td>
                                            <td><?= $tr->tgl_pesan ?></td>
                                            <td><?= $tr->expedisi ?></td>
                                            <td>
                                            <?php
                                                if($tr->status_order =="2"){
                                                    echo "<span class='btn btn-sm  btn-success' disable>sedang dikirim</span>";
                                                } else {
                                                    echo "<span class='btn btn-sm btn-warning' disable>belum di proses</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('teransaksi/detail/').$tr->id_invoice ?>" class="btn  btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="<?php echo base_url('teransaksi/teransaksi_berhasil/').$tr->id_invoice ?>" class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i> Diterima</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Expedisi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($teransaksi_berhasil as $tr) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tr->penerima ?></td>
                                            <td><?= $tr->tgl_pesan ?></td>
                                            <td><?= $tr->expedisi ?></td>
                                            <td>
                                            <?php
                                                if($tr->status_order =="3"){
                                                    echo "<span class='btn btn-sm  btn-success' disable>Teransaksi selesai</span>";
                                                } else {
                                                    echo "<span class='btn btn-sm btn-warning' disable>belum di proses</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('teransaksi/detail/').$tr->id_invoice ?>" class="btn  btn-success"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    </div>
</div>