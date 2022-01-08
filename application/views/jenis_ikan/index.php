<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jenis Ikan</h1>
        </div>


        <?php echo $this->session->flashdata('pesan') ?>
        <div class="section-body">
            <div class="card card-body">
            <div class="section" style="text-align: right;">
                <a href="<?= base_url('jenis_ikan/tambah_jenis_ikan') ?>" class="btn btn-primary mb-3">Tambah Data</a>
            </div>
            <table class="table table-hover table-striped table-borderd" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Ikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($jenis_ikan as $ji) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ji->jenis_ikan ?></td>
                            <td>
                                <a href="<?php echo base_url('jenis_ikan/edit_jenis_ikan/').$ji->id_jenis_ikan ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash"></i></button> -->
                                <a href="<?php echo base_url('jenis_ikan/hapus_jenis_ikan/').$ji->id_jenis_ikan ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>




<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Menghapus Data Jenis Ikan ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" href="<?php echo base_url('jenis_ikan/hapus_jenis_ikan/').$ji->id_jenis_ikan ?>">Save changes</button>
      </div>
    </div>
  </div>
</div> -->