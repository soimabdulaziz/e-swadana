<section class="content-header">
      <h1>
        Detail Simpanan Wajib
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Simpanan Wajib</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->view('alert');?>
     

      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Januari</th>
                  <th>Februari</th>
                  <th>Maret</th>
                  <th>April</th>
                  <th>Mei</th>
                  <th>Juni</th>
                  <th>Juli</th>
                  <th>Agistus</th>
                  <th>September</th>
                  <th>Oktober</th>
                  <th>November</th>
                  <th>Desember</th>


                    <?php 
                        $level = $this->session->userdata('Level');
                        if ($level == 1) {
                    ?>
                        <?php } ?> 
                </tr>
                </thead>
                <tbody>
              
                </tbody>
                <tfoot>
                <tr>
                <th>Nama</th>
                  <th>Januari</th>
                  <th>Februari</th>
                  <th>Maret</th>
                  <th>April</th>
                  <th>Mei</th>
                  <th>Juni</th>
                  <th>Juli</th>
                  <th>Agistus</th>
                  <th>September</th>
                  <th>Oktober</th>
                  <th>November</th>
                  <th>Desember</th>

                 
                </tr>
                </tfoot>
              </table>
              </div>
              </div>
                <div class="widget-body-toolbar" align ="right" style="padding-right">
                <nav>
              
                </nav>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
   