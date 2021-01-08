<section class="content-header">
      <h1>
        Detail Jasa <?php echo urldecode($this->uri->segment(4)) ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Jasa</a></li>
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
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                    <?php 
                        $level = $this->session->userdata('Level');
                        if ($level == 1) {
                    ?>
                  <th>Action</th>
                        <?php } ?> 
                </tr>
                </thead>
                <tbody>
               <?php
                foreach ($data_jasa->result_array() as $row) {
                ?>    
                    <?php if ($row['username'] != "admin") { ?>      
                        <tr>
                            <td><?php echo $row['id_jasa'] ?> </td>
                            <?php $tanggal = $row['tanggal']; ?>
                            <td><?php echo date('d F Y', strtotime(''.$tanggal.''));?> </td>
                            <td><?php echo number_format($row['jumlah']) ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <?php
                            $sd = $row['saldo_jasa'];
                                $level = $this->session->userdata('Level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap><a target="_blank" href="<?php echo site_url('jasa/invoice/'.$row['id_jasa']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-print"></i> Cetak</a>
                            </td>
                                <?php } ?>
                        </tr>
                    <?php } ?>
                <?php
                }
               ?>
            
                </tbody>
                <tfoot>
                <tr>
              
                  <th>Total Jasa</th>
                  <th></th>
                  <th></th>
                  <?php foreach ($data_jasa->result_array() as $row) { ?>
                    <?php $saldo = number_format($row['saldo_jasa']) ?>
                  <?php } ?>
                  <th><?php echo("Rp."); echo $saldo ?></th>
                  <th></th>
                  <th></th>
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
   