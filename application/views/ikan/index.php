<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ikan</h1>
        </div>

            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card">
              <div class="card-header">
                  <h4>Data Ikan</h4>
                  <div class="card-header-action">
                  <!-- <a href="<?= base_url('ikan/print') ?>" class="btn btn-danger"><i class="fa fa-print"> Print</i></a> -->
                  <a href="<?= base_url('ikan/tambah_ikan') ?>" class="btn btn-primary"  style="text-align: right;">Tambah Data</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <div class="container">
                    <table id="example" class="table table-bordered table-striped display nowrap" style="margin-bottom: 20px;">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Hias</th>
                            <th>Tipe Ikan</th>
                            <th>stok</th>
                            <th>harga</th>
                            <th>Deskripsi</th>
                            <th>gambar</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($ikan as $ik) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ik->jenis_ikan ?></td>
                            <td><?= $ik->type_ikan ?></td>
                            <td><?= $ik->stok ?></td>
                            <td>Rp. <?= number_format($ik->harga, 0,',','.') ?></td>
                            <td><?= $ik->deskripsi ?></td>
                            <td>
                                <img width="80px" src="<?= base_url('assets/upload/').$ik->gambar ?>" alt="">
                            </td>
                            <td>
                                <a href="<?php echo base_url('ikan/detail_ikan/').$ik->id_ikan ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo base_url('ikan/edit_ikan/').$ik->id_ikan ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('ikan/hapus_ikan/').$ik->id_ikan ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                  </div>
                </div>
              </div>
    </section>
</div>




