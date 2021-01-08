<section class="content-header">
      <h1>
        Laporan Simpanan Wajib
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Simpanan Wajib</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->view('alert');?>
     
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
             <?php $level = $this->session->userdata('Level');
                if($level == 1) {
             ?>   
              <a  data-toggle="modal" data-target="#addJadwal" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-download"></i> Export Excel</a>
                <?php } ?>
            </div>
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >

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
      
      <!-- MODAL -->
      <div class="modal modal-default fade" id="addJadwal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Pilih Tahun Laporan</h4>
            </div>
            <form action="Laporan_wajib/export" method="post">
              <div class="modal-body">

                <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control" name="tahun" id ="tahun" required>
                    <option>Tahun...</option>
                    <?php
                     foreach ($tahun as $row) {
                    ?>
                    <option value="<?php echo $row['tahun'];?>"><?php echo $row['tahun'];?></option>
                    <?php
                      }
                    ?>
                  </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Export Excel</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
   