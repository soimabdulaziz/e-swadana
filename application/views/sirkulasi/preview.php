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
              <a href="<?php echo site_url('Sirkulasi/export') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-download"></i> Export Excel</a>
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
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
   