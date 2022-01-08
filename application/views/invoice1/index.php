<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice Pemesanan Ikan</h1>
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
                <div class="card">
                  <!-- <div class="card-header">
                    <a href="<?= base_url('invoice/print') ?>" class="btn btn-danger"><i class="fa fa-print"> Print</i></a>  
                  </div> -->
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active show" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="false">Pesanan Masuk</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="proses-tab2" data-toggle="tab" href="#proses2" role="tab" aria-controls="proses" aria-selected="true">Diproses</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="true">Dikirim</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Selesai</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade active show" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="card">
                          <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                              <table id="example" class="table table-striped">
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
                                  <td><?= $in->penerima ?></td>
                                  <td><?= $in->alamat_penerima ?></td>
                                  <td><?= $in->hp_penerima ?></td>
                                  <td><?= $in->tgl_pesan ?></td>
                                  <th>
                                          <?php
                                          if($in->status_pembayaran =="0"){
                                              echo "<span class='btn btn-sm  btn-warning' disable>Di Proses</span>";
                                          } else {
                                              echo "<span class='btn btn-sm btn-success' disable>Konfirmasi Behasil</span>";
                                          }
                                          ?>
                                  </th>
                                  <td>
                                  <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
                                  </td>
                                  <td>
                                    <a href="<?php echo base_url('invoice1/detail/').$in->id_invoice ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo base_url('invoice1/edit_invoice/').$in->id_invoice ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <?php if($in->status_pembayaran == "1"){ ?>
                                      <a href="<?php echo base_url('invoice1/proses/').$in->id_invoice ?>" class="btn btn-sm btn-warning"><i class="fas fa-arrow-circle-right"></i></a>
                                    <?php } ?>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="proses2" role="tabpanel" aria-labelledby="proses-tab2">
                      <div class="card">
                          <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                              <table id="example" class="table table-striped">
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
                                  foreach($invoice_proses as $in) : ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $in->penerima ?></td>
                                    <td><?= $in->alamat_penerima ?></td>
                                    <td><?= $in->hp_penerima ?></td>
                                    <td><?= $in->tgl_pesan ?></td>
                                    <th>
                                            <?php
                                            if($in->status_order =="1"){
                                                echo "<span class='btn btn-sm  btn-success' disable>Diproses / Dikemas</span>";
                                            } else {
                                                echo "<span class='btn btn-sm btn-warning' disable>Belum di Proses</span>";
                                            }
                                            ?>
                                    </th>
                                    <td>
                                    <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
                                    </td>
                                    <td>
                                      <a href="<?php echo base_url('invoice1/detail/').$in->id_invoice ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                      <?php 
                                      if($in->status_order == "1"){ ?>
                                        <a href="<?php echo base_url('invoice1/kirim/').$in->id_invoice ?>" class="btn btn-sm btn-warning"><i class="fas fa-paper-plane"></i></a>
                                      <!-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#kirim<?= $in->id_invoice ?>"><i class="fas fa-paper-plane"></i></button> -->
                                      <?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                      <div class="card">
                          <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                              <table id="example" class="table table-striped">
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
                                  foreach($invoice_kirim as $in) : ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $in->penerima ?></td>
                                    <td><?= $in->alamat_penerima ?></td>
                                    <td><?= $in->hp_penerima ?></td>
                                    <td><?= $in->tgl_pesan ?></td>
                                    <th>
                                            <?php
                                            if($in->status_order =="2"){
                                                echo "<span class='btn btn-sm  btn-success' disable>pesanan sedang dikirim</span>";
                                            } else {
                                                echo "<span class='btn btn-sm btn-warning' disable>pesanan belum dikirim</span>";
                                            }
                                            ?>
                                    </th>
                                    <td>
                                    <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
                                    </td>
                                    <td>
                                      <a href="<?php echo base_url('invoice1/detail/').$in->id_invoice ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                      <?php 
                                      if($in->status_order == "1"){ ?>
                                        <a href="<?php echo base_url('invoice1/kirim/').$in->id_invoice ?>" class="btn btn-sm btn-warning"><i class="fas fa-paper-plane"></i></a>
                                      <!-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#kirim<?= $in->id_invoice ?>"><i class="fas fa-paper-plane"></i></button> -->
                                      <?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                      <div class="card">
                          <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                              <table id="example" class="table table-striped">
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
                                  foreach($teransaksi_berhasil as $in) : ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $in->penerima ?></td>
                                    <td><?= $in->alamat_penerima ?></td>
                                    <td><?= $in->hp_penerima ?></td>
                                    <td><?= $in->tgl_pesan ?></td>
                                    <th>
                                            <?php
                                            if($in->status_order =="3"){
                                                echo "<span class='btn btn-sm  btn-success' disable>teransaski selesai</span>";
                                            } else {
                                                echo "<span class='btn btn-sm btn-warning' disable>pesanan belum dikirim</span>";
                                            }
                                            ?>
                                    </th>
                                    <td>
                                    <img width="80px" src="<?= base_url('assets/bukti_pembayaran/').$in->bukti_pembayaran ?>" alt="">
                                    </td>
                                    <td>
                                      <a href="<?php echo base_url('invoice1/detail/').$in->id_invoice ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
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
                  </div>
                </div>
                
    </section>
</div>


