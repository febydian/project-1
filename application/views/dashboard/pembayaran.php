<div class="container" style=" margin-top: 100px; margin-bottom: 120px; background-color: white; padding: 40px 20px;">
    <div class="invoice">
        <div class="invoice-print">
                    <div class="col-md-12">
                        <h1 class="section-title mb-5 nav justify-content-center">Check Out Pemesanan ikan</h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Ikan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($this->cart->contents() as $items) : 
                                    // $ikan = $this->ikan_model->detail_ikan1($items['id']);
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $items['name'] ?></td>
                                        <td><?= $items['qty'] ?></td>
                                        <td align="right">Rp. <?= number_format($items['price'], 0,',','.') ?></td>
                                        <td align="right">Rp. <?= number_format($items['subtotal'], 0,',','.') ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td align="right">Rp. <?= number_format($this->cart->total(), 0,',','.') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="text-center">
                                <?php
                                    $grand_total = 0;
                                    if($keranjang = $this->cart->contents())
                                    {
                                        foreach($keranjang as $items)
                                        {
                                            $grand_total = $grand_total + $items['subtotal'];
                                        }
                                        echo "<H5 class='alert alert-success'>Total Belanja Anda : Rp. ".number_format($grand_total,0,',','.');
                                    
                                ?>
                                    </div>
                                    Tujuan :
                                    <div class="card-body">
                                        <form method="POST" action="<?= base_url('dashboard/proses_pesanan') ?>">
                                        <input type="hidden" name="id_user" class="form-control" value="<?= $this->session->userdata('id_user') ?>">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <select name="provinsi"  class="form-control" required></select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Expedisi</label>
                                                        <select name="expedisi" id="expedisi" class="form-control"></select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Provinsi</label>
                                                        <select name="provinsi" class="form-control" ></select>
                                                        <?= form_error('provinsi', '<small class="text-danger pl-3">','</small>') ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Expedisi</label>
                                                        <select name="expedisi" id="expedisi" class="form-control" required>
                                                            <option selected>-- Expedisi --</option>
                                                            <option>JNE</option>
                                                            <option>TIKI</option>
                                                            <option>Pos indonesia</option>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kota</label>
                                                        <select name="kota" id="kota" class="form-control" required></select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Paket</label>
                                                        <select name="paket" id="paket" class="form-control" required></select>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Kode Pos</label>
                                                            <input type="number" name="kode_pos" id="kode_pos" class="form-control" required></input>
                                                        </div>
                                                        <!-- <label for="inputState">Paket</label>
                                                        <select name="paket" id="paket" class="form-control" required>
                                                            <option selected>-- Paket --</option>
                                                            <option>Semarang</option>
                                                            <option>medan</option>
                                                        </select> -->
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alamat Penerima</label>
                                                        <input type="text" name="alamat_penerima" id="alamat_penerima" class="form-control" required></input>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Kode Pos</label>
                                                        <input type="number" name="kode_pos" id="kode_pos" class="form-control" required></input>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Penerima</label>
                                                        <input type="text" name="penerima" id="penerima" class="form-control" required></input>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No Hp Penerima</label>
                                                        <input type="number" name="hp_penerima" id="hp_penerima" class="form-control" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <?php
                                
                                    } else {
                                        echo '<div class="col-lg-8"><h5 class="alert alert-danger">Keranjang Belanja Masih Kosong</h5></div>';
                                        // '<div class="col-lg-8"> echo "<H5 class='alert alert-danger' >Keranjang Belanja Masih Kosong"</div>';
                                        '</div>';
                                        '</div>';
                                    }
                                ?>    
                                <div class="col-lg-4 ">
                                    <div class="card text-center">
                                        <div class="card-header text-white bg-dark">
                                            Informasi Pembayaran
                                        </div>
                                        
                                        <div class="card-body">
                                            <p>Silahkan Melakukan Pembayaran Melalui Nomor Rekening Dibawah Ini : </p>
                                            <hr>
                                            <h5 class="card-title">BNI  -  1978xxxxxxxxxxxxxx</h5>
                                            <hr>
                                            <h5 class="card-title">BRI  -  8756xxxxxxxxxxxxxx</h5>
                                            <hr>
                                            <h5 class="card-title">BCA  -  9577xxxxxxxxxxxxxx</h5>
                                            <hr>
                                            <p class="card-text">Pastikan Anda Sudah Melakukan Teransaksi Pembayaran</p><hr>
                                            <button type="submit" class="btn btn-sm btn-success">Konfirmasi Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                    <hr>
                <div class="text-md-right mb-50">
                            <div class="float-lg-left mb-lg-10 mb-3">
                            <a href ="<?= base_url('dashboard/detail_keranjang')?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-backward"></i> Kembali</a>
                            <!-- <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button> -->
                            </div>
                            <!-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> -->
                </div>
        </div>
    </div>
</div>




<!-- <script>
    $(document).ready(function(){
        $.ajax ({
            type : 'post',
            url : '<?= base_url('updt/provinsi') ?>',
            success : function(hasil_provinsi)
            {
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        })
    })
</script>  -->
<script>
    $(document).ready(function() {
        // GET DATA PROFINSI 
        $.ajax({
            type : "POST",
            url : "<?= base_url('updt/provinsi') ?>",
            success : function(hasil_provinsi){
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // GET DATA KOTA
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("Option:Selected", this).attr("id_provinsi");
            $.ajax({
                type : "POST",
                url : "<?= base_url('updt/kota') ?>",
                data : 'id_provinsi=' + id_provinsi_terpilih,
                success : function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            })
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type : "POST",
                url : "<?= base_url('updt/expedisi') ?>",
                success : function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            })
        });

        
    });
</script>








