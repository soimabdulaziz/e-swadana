<section class="content-header">
      <h1>
       Ganti Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Welcome</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

        <div class="box">
          <div class="box-header">
          <?php if ($this->session->userdata("new") == "Y") { ?>
          <h3 class="box-title"> <?php echo "Selamat Datang"; echo" "; echo $this->session->userdata('name'); echo " Di E-Swadana,
           silahkan"?> <a href="<?=site_url('ganti_pass')?>" >ganti password</a> <?php echo"anda terlebih dahulu..!" ?></h3>
           <?php } ?>
          <div class="pull-right">
           
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   