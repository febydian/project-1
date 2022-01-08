<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice Pemesanan Ikan</h1>
        </div>


        <?php echo $this->session->flashdata('pesan') ?>
              <div class="card">
                <div class="card-header">
                      <!-- <a href="<?= base_url('invoice/print') ?>" class="btn btn-danger"><i class="fa fa-print"> Print</i></a>  
                      <a href="<?= base_url('invoice/excel') ?>" class="btn btn-warning"><i class="fas fa-file-csv"> Excel</i></a> -->
                </div>
                
                <!-- <di class="col-md-6">
                  <form action="post">
                    <div class="input-group mb-3">
                      <input type="text" name="keyword" class="form-control" placeholder="Search" autocomplete="off" autofocus>
                      <div class="input-group-append">
                        <input type="submit" name="submit" class="btn btn-success"></input>
                      </div>
                    </div>
                  </form>
                </div>v -->


                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <div class="container">
                    <table id="example" class="table table-bordered table-striped" style="margin-bottom: 20px; padding-top:500px; width: 100%">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pengiriman</th>
                        <th>no tlpn</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status Pemesanaan</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($invoice as $in) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $in->nama ?></td>
                            <td><?= $in->alamat ?></td>
                            <td><?= $in->no_telp ?></td>
                            <td><?= $in->tgl_pesan ?></td>
                            <th>
                                    <?php
                                    if($in->status_pembayaran =="0"){
                                        echo "<span class='btn btn-sm  btn-warning' disable>Di Proses</span>";
                                    } else {
                                        echo "<span class='btn btn-sm btn-success' disable>Teransaksi Behasil</span>";
                                    }
                                    ?>
                            </th>
                            <td>
                              <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
                            </td>
                            <td>
                              <a href="<?php echo base_url('invoice/detail/').$in->id_invoice ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo base_url('invoice/edit_invoice/').$in->id_invoice ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                  </div>
                </div>
              </div>
    </section>
</div>


