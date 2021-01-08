<section class="content-header">
      <h1>
        Sirkulasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sirkulasi</li>
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
             <a  data-toggle="modal" data-target="#export" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-download"></i> Export Excel</a>
                <?php } ?>
            </div>
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID Anggota</th>
                  <th>nama</th>
                  <th>Saldo Simpanan Wajib</th>
                  <th>Saldo Simpanan Sukarela</th>
                  <th>Total Piutang</th>
                  <th>Total Jasa</th>
                    <?php 
                        $level = $this->session->userdata('Level');
                        if ($level == 1) {
                    ?>
                  
                        <?php } ?> 
                </tr>
                </thead>
                <tbody>
                 <?php
                foreach ($table_data as $row) {
                ?>    
                    <?php if ($row['username'] != "admin") { ?>      
                  <tr>
                      <td><?php echo $row['id_anggota'] ?></td>
                      <td><?php echo $row['nama']?></td>
                      <td><?php echo number_format($row['saldo_wajib'])?></td>
                      <td><?php echo number_format($row['saldo_sukarela'])?></td>
                      <td><?php echo number_format($row['saldo_piutang'])?></td>
                      <td><?php echo number_format($row['saldo_jasa'])?></td>
                  </tr>
                <?php
                }
              }     
               ?>
            
            
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Saldo Simpanan Wajib</th>
                  <th>Saldo Simpanan Sukarela</th>
                  <th>Total Piutang</th>
                  <th>Total Jasa</th>
                  <?php 
                    $level = $this->session->userdata('Level');
                    if ($level == 1) {
                  ?>
                 
                    <?php } ?>
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

       <!-- MODAL -->
       <div class="modal modal-default fade" id="export">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Pilih Tahun Laporan</h4>
            </div>
            <form action="Sirkulasi/export" method="post">
              <div class="modal-body">  
              <div class="form-group">
                  <label>Pilih Bulan</label>
                  <select class="form-control" name="bulan" id ="bulan" required>
                    <option>Bulan...</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                    
                  </select>
            </div>
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
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
   