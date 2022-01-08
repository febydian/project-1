<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Pemesanan Ikan</h1>
        </div>

        <!-- <div class="card">
            <div class="card-header">
                <h4>Data Ikan</h4>
                <div class="card-header-action">
                <a href="<?= base_url('ikan/tambah_ikan') ?>" class="btn btn-primary"  style="text-align: right;">Tambah Data</a>
                </div>
            </div> -->
            <form method="POST" action="<?= base_url('laporan/laporan_aksi') ?>">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Harian</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <select name="tanggal" class="form-control">
                                        <?php 
                                            $mulai = 1;
                                            for($i = $mulai; $i < $mulai + 31; $i++) {
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select name="bulan" class="form-control colorpickerinput">
                                        <?php 
                                            $mulai = 1;
                                            for($i = $mulai; $i < $mulai + 12; $i++) {
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tahunn</label>
                                    <select name="tahun" class="form-control colorpickerinput">
                                        <?php 
                                            $mulai = date('Y') - 1;
                                            for($i = $mulai; $i < $mulai + 7; $i++) {
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block">Cetak Laporan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- <form action="POST" action="<?= base_url('laporan/laporan_aksi') ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Harian</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <select name="tanggal" type="text" class="form-control">
                                                <?php 
                                                    $mulai = 1;
                                                    for($i = $mulai; $i < $mulai + 31; $i++) {
                                                        echo '<option value=".$i.">'.$i.'</option>';
                                                    }
                                                ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" type="text" class="form-control colorpickerinput"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" type="text" class="form-control colorpickerinput"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Harian</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Simple</label>
                                <input type="text" class="form-control colorpickerinput">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Harian</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Simple</label>
                                <input type="text" class="form-control colorpickerinput">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> -->
        <!-- </div> -->
    </section>
</div>