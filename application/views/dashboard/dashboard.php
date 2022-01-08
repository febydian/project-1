

    <!-- home section starts  -->

    <section class="home" id="home">
        <div class="content">
            <span data-aos="fade-up" data-aos-delay="150">Perikanan</span>
            <h3 data-aos="fade-up" data-aos-delay="300">UTPD BalaiaBenih Sleman</h3>
            <p data-aos="fade-up" data-aos-delay="450">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quia illum quod perspiciatis harum in possimus? Totam consequuntur officia quia?</p>
            <a data-aos="fade-up" data-aos-delay="600" href="#" class="btn">Klik More</a>
        </div>
    </section>

    <!-- home section ends -->

    <!-- booking form section starts  -->

    <!-- <section class="book-form" id="book-form">
        <form action="">
            <div data-aos="zoom-in" data-aos-delay="150" class="inputBox">
                <span>where to?</span>
                <input type="text" placeholder="place name" value="" />
            </div>
            <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
                <span>when?</span>
                <input type="date" value="" />
            </div>
            <div data-aos="zoom-in" data-aos-delay="450" class="inputBox">
                <span>how many?</span>
                <input type="number" placeholder="number of travelers" value="" />
            </div>
            <input data-aos="zoom-in" data-aos-delay="600" type="submit" value="find now" class="btn" />
        </form>
    </section> -->

    <!-- booking form section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">
        <div class="video-container" data-aos="fade-right" data-aos-delay="300">
            <video src="<?= base_url('assets/template2/') ?>images/ikan6.mp4" muted autoplay loop class="video"></video>
            <div class="controls">
                <span class="control-btn" data-src="<?= base_url('assets/template2/') ?>images/ikan.mp4"></span>
                <span class="control-btn" data-src="<?= base_url('assets/template2/') ?>images/ikan2.mp4"></span>
                <span class="control-btn" data-src="<?= base_url('assets/template2/') ?>images/ikan5.mp4"></span>
            </div>
        </div>

        <div class="content" data-aos="fade-left" data-aos-delay="600">
            <span>Apa itu UPTD Perikanan ?</span>
            <h3>UPTD Perikanan Sleman</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde fugit repellat error deserunt nam aperiam odit libero quos provident. Nostrum?</p>
        </div>
    </section>

    <!-- about section ends -->

    <!-- destination section starts  -->

    <section class="destination" id="ikan">
        <div class="heading">
            <span>Ikan</span>
            <h1>Daftar Ikan</h1>
        </div>

        <div class="box-container">
          <div class="row">
          <?php foreach($ikan as $ih) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="box" data-aos="fade-up" data-aos-delay="150">
                  <div class="image">
                      <img src="<?= base_url('assets/upload/').$ih->gambar ?>" alt="" />
                  </div>
                  <div class="content">
                      <h3><?= $ih->jenis_ikan ?></h3>
                      <table class="table" style="color: white; font-size:15px;">
                              <tr>
                                <td>Type Ikan</td>
                                <td><?= $ih->type_ikan ?></td>
                              </tr>
                              <tr>
                                <td>Ukuran</td>
                                <td><?= $ih->ukuran ?> Cm</td>
                              </tr>
                              <tr>
                                <td>Harga</td>
                                <td>Rp. <?= number_format($ih->harga, 0,',','.' ) ?></td>
                              <tr>
                                <td>Stok</td>
                                <td><?= $ih->stok ?></td>
                              </tr>
                              <tr>
                                <td>Deskripsi</td>
                                <td><?= $ih->deskripsi ?></td>
                              </tr>
                            </table>
                                <div class="row" style="text-align: right;" >
                                    <div class="col-md-6"><?php
                                        if($ih->stok =="0"){
                                            echo "<span class='btn btn-danger' disable>Stok Habis</span>";
                                        } else {
                                        echo anchor('dashboard/tambah_ke_Keranjang/'.$ih->id_ikan,'<div class="btn btn-primary">tambah ke keranjang</div>');
                                        // redirect('teransaksi');
                                        }
                                        ?>
                                        <?php ?></div>
                                    <div class="col-md-6">
                                    <a href="<?= base_url('dashboard/detail_ikan/').$ih->id_ikan ?>" class="btn btn-warning" style="font-size:11px; margin-left: 5px">Detail</a>
                                    </div>
                                </div>
                            
                  </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>

            
        </div>
    </section>

    <!-- destination section ends -->

    <!-- services section starts  -->

    <!-- <section class="services" id="services">
        <div class="heading">
            <span>Pelayanan</span>
            <h1>Macam macam Barang</h1>
        </div>

        <div class="box-container">
            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <i class="fas fa-globe"></i>
                <h3>worldwide</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <i class="fas fa-utensils"></i>
                <h3>food & drinks</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="600">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="750">
                <i class="fas fa-wallet"></i>
                <h3>affordable price</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="900">
                <i class="fas fa-headset"></i>
                <h3>24/7 support</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>
        </div>
    </section> -->

    <!-- services section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">
        <div class="heading">
            <span>Galery Kami</span>
            <h1>Kegiatan Kami</h1>
        </div>

        <div class="box-container">
            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-1.jpg" alt="" />
                <span>travel spot</span>
                <h3>iceland</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-2.jpg" alt="" />
                <span>travel spot</span>
                <h3>greenland</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-3.jpg" alt="" />
                <span>travel spot</span>
                <h3>alaska</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-4.jpg" alt="" />
                <span>travel spot</span>
                <h3>thailand</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-5.jpg" alt="" />
                <span>travel spot</span>
                <h3>brazil</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-6.jpg" alt="" />
                <span>travel spot</span>
                <h3>maldive</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-7.jpg" alt="" />
                <span>travel spot</span>
                <h3>iceland</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-8.jpg" alt="" />
                <span>travel spot</span>
                <h3>alaska</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="<?= base_url('assets/template2/') ?>images/gallery-img-9.jpg" alt="" />
                <span>travel spot</span>
                <h3>maldive</h3>
            </div>
        </div>
    </section>

    <!-- gallery section ends -->

    <!-- banner section starts  -->

    <div class="banner" id="map">
        <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
            <span>start your adventures</span>
            <h3>Let's Explore This World</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum voluptatum praesentium amet quibusdam quam officia suscipit odio.</p>
            <a href="#book-form" class="btn">book now</a>
            <iframe src="https://www.google.com/maps/d/embed?mid=199C8SGJld-zeyUpFv9ZoQbh-9vo&hl=en&ehbc=2E312F" width="640" height="480"></iframe>
        </div>
    </div>

    <!-- banner section ends -->

    <!-- footer section starts  -->

    