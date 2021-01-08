<section class="content-header">
      <h1>
        Piutang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"></a></li>
        <li class="active">Piutang</li>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID Anggota</th>
                  <th>nama</th>
                  <th>Saldo</th>
                  <th>Aksi</th>
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
                      <td><?php echo number_format($row['saldo_piutang'])?></td>
                      <?php
                          $level = $this->session->userdata('Level');
                          if ($level == "1") {                            
                      ?>
                      <td nowrap><a href="Piutang/add/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>/tambah" class="btn btn-success btn-sm position-sticky"><i class="fa fa-plus-circle"></i> Tambah</a>
                      <?php if ($row['saldo_piutang'] != 0) { ?>
                      <a   href="Piutang/add/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>/tarik" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-minus-circle"></i> Bayar</a>
                      <?php } elseif($row['saldo_piutang'] == 0) { ?>
                        <a disabled class="btn btn-danger btn-sm position-sticky"><i class="fa fa-minus-circle"></i> Bayar</a>
                      <?php } ?>
                      <a   href="Piutang/detail/<?php echo($row['id_anggota']) ?>/<?php echo($row['nama']) ?>" class="btn btn-warning btn-sm position-sticky"><i class="fa fa-info"></i> Detail</a>
                      </td>
                          <?php } ?>
                  </tr>
                <?php
                }
              }     
               ?>
            
            
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Saldo</th>
                  <th>Aksi</th>
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
   