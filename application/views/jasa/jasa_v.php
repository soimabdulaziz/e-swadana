<section class="content-header">
      <h1>
        Jasa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jasa</li>
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
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
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
                    <?php if ($row['username'] != "admin") { ?>      
                  <tr>
                      <td><?php echo $row['id_anggota'] ?></td>
                      <td><?php echo $row['nama']?></td>
                      <td><?php echo number_format($row['jasa_perbulan'])?></td>
                      <?php
                          $level = $this->session->userdata('Level');
                          if ($level == "1") {                            
                      ?>
                      <td nowrap>
                          <a  <?php if ($row['jasa_perbulan'] != "0") { ?> href="Jasa/add/<?php echo ($row['id_anggota']) ?>/<?php echo ($row['nama']) ?>/tarik" <?php } ?> <?php if ($row['jasa_perbulan'] == "0") { ?> disabled <?php } ?>  class="btn btn-danger btn-sm position-sticky"><i class="fa fa-minus-circle"></i> Bayar</a>
                      <a   href="Jasa/detail/<?php echo($row['id_anggota']) ?>/<?php echo($row['nama']) ?>" class="btn btn-warning btn-sm position-sticky"><i class="fa fa-info"></i> Detail</a>
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
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
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
   