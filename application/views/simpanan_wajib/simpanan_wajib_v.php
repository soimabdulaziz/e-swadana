<section class="content-header">
      <h1>
        Simpanan Wajib
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Simpanan Wajib</a></li> -->
        <li class="active">Simpanan Wajib</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->view('alert');?>
     
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
          
          <div class="box">
            <div class="box-header">
             <?php $level = $this->session->userdata('Level');
                if($level == 1) {
             ?>   
             
                <?php } ?>
            </div>
         <!--    <div class="box-header">
             <?php $level = $this->session->userdata('Level');
                if($level == 1) {
             ?>   
              <a href="<?php echo site_url('anggota/add') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-plus"></i> Add New Row</a>
                <?php } ?>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
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
                foreach ($table_data as $row) {
                ?>    
                    <?php if ($row['Level'] != "1") { ?>      
                        <tr>
                            <td><?php echo $row['id_anggota'] ?> </td>
                            <td><?php echo $row['nama'] ?> </td>
                            <td><?php echo number_format($row['saldo_wajib']) ?></td>
                            <td><?php echo date('d F Y', strtotime(''.$row['tanggal'].''));?> </td>
                            
                            <?php
                                $level = $this->session->userdata('Level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap>
                            <a 
                            <?php 
                                $date = date('Y-m-d');
                                $bulan_now = strtolower(date('m',strtotime($date)));
                                $tahun_now = strtolower(date('Y',strtotime($date)));
                                $tgl1 = $bulan_now . $tahun_now;
                                $bulan = strtolower(date('m',strtotime($row['tanggal'])));
                                $tahun = strtolower(date('Y',strtotime($row['tanggal']))); 
                                $tgl2 = $bulan . $tahun;
                            ?>
                            <?php if ($tgl1 != $tgl2) { ?> href="Simpanan_wajib/add/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>/tambah" <?php } ?>
                            <?php if ($tgl1 == $tgl2) { ?> disabled <?php } ?>
                             class="btn btn-success btn-sm position-sticky"><i class="fa fa-plus-circle"></i> Tambah</a>
                            <a   href="Simpanan_wajib/add/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>/tarik" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-minus-circle"></i> Tarik</a>
                            <a   href="Simpanan_wajib/detail/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>" class="btn btn-warning btn-sm position-sticky"><i class="fa fa-info"></i> Detail</a>

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
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <?php 
                    $level = $this->session->userdata('Level');
                    if ($level == 1) {
                  ?>
                  <th>Action</th>
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
   