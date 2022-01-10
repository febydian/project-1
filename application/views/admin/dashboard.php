
      

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-receipt"></i>
                </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Masuk</h4>
                    </div>
                    <div class="card-body">
                    <?php 
                      $this->db->select('status_pembayaran');
                      $this->db->where('status_pembayaran', '0');
                      $query = $this->db->get('invoice1')->num_rows();
                      echo $query;
                      ?>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Diproses</h4>
                    </div>
                    <div class="card-body">
                    <?php 
                      $this->db->select('status_order');
                      $this->db->where('status_order', '1');
                      $query = $this->db->get('invoice1')->num_rows();
                      echo $query;
                      ?>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-paper-plane"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pesanan Dikirim</h4>
                  </div>
                  <div class="card-body">
                  <?php 
                    $this->db->select('status_order');
                    $this->db->where('status_order', '2');
                    $query = $this->db->get('invoice1')->num_rows();
                    echo $query;
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-check-circle"></i>
                </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Teransaksi Berhasil</h4>
                    </div>
                    <div class="card-body">
                    <?php 
                      $this->db->select('status_order');
                      $this->db->where('status_order', '3');
                      $query = $this->db->get('invoice1')->num_rows();
                      echo $query;
                      ?>
                    </div>
                  </div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="card">
                <div class="card-header">
                  <h4>Budget vs Sales</h4>
                </div>
                <div class="card-body">
                <?php 
                $this->load->view('templates/chart');
                ?>
                </div>
              </div>
            </div>
            
          </div>
          
          
        </section>
      </div>
      