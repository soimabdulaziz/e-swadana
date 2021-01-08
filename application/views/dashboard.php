<section class="content-header">
      <h1>
        DASHBOARD
        <small>Koperasi Swadana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <!-- Main content -->
  <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <?php foreach ($saldo_w as $wajib) {

              } ?>
              <span class="info-box-text">Saldo SW</span>
              <span class="info-box-number">Rp.<small><?php if (!empty(@$wajib['saldo_wajib'])) { 
                echo number_format(@$wajib['saldo_wajib']);
                } else echo "0";  ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <?php foreach($saldo_s as $sukarela) {

              } ?> 
              <span class="info-box-text">Saldo SSR</span>
              <span class="info-box-number">Rp.<small><?php if (!empty(@$sukarela['saldo_sukarela'])) { 
                echo number_format(@$sukarela['saldo_sukarela']);
                } else echo "0";  ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-balance-scale"></i></span>

            <div class="info-box-content">
              <?php foreach($saldo_p AS $piutang) {

              } ?>
              <?php if($this->session->userdata('Level') == 1) { ?>
                <span class="info-box-text">Piutang</span>
              <?php } elseif($this->session->userdata('Level') == 2) { ?>
              <span class="info-box-text">Hutang</span>
              <?php } ?>
              <span class="info-box-number">Rp.<small><?php if (!empty(@$piutang['saldo_piutang'])) { 
                echo number_format(@$piutang['saldo_piutang']);
                } else echo "0";  ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  fa-bank"></i></span>

            <div class="info-box-content">
              <?php foreach($saldo_j as $jasa) ?>
              <?php if($this->session->userdata("Level") == 1) { ?>
              <span class="info-box-text">Jasa</span>
              <?php } elseif($this->session->userdata("Level") == 2) { ?>
              <span class="info-box-text">Tagihan Jasa</span>
              <?php } ?>
              <span class="info-box-number">Rp.<small><?php if (!empty(@$jasa['jasa'])) { 
                echo number_format(@$jasa['jasa']);
                } else echo "0";  ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- Main row -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
      
    </section>
   