<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Type Ikan</h1>
        </div>


        <?php echo $this->session->flashdata('pesan') ?>
        <div class="section-body">
            <div class="card card-body">
            <div class="section" style="text-align: right;">
            <a href="<?= base_url('type_ikan/tambah_type_ikan') ?>" class="btn btn-primary mb-3">Tambah Data</a>
            </div>
            <table class="table table-hover table-striped table-borderd">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type Ikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($type_ikan as $ti) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ti->type_ikan ?></td>
                            <td>
                                <!-- <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a> -->
                                <a href="<?php echo base_url('type_ikan/edit_type_ikan/').$ti->id_type_ikan ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('type_ikan/hapus_type_ikan/').$ti->id_type_ikan ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

