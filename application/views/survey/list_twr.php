    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <small>advanced tables</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('alert');?>
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Survey</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th>No</th>
                    <th>ID Tower</th>
                    <th>Nama Provider</th>
                    <th>Alamat</th>
                    <?php
                      $level = $this->session->userdata('level');
                            if ($level == "1") {                            
                        ?>
                    <th>Aksi</th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($list_tower as $data) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data['id_tower'] ?></td>
                      <td> <?php echo $data['provider'] ?> </td>
                      <td> <?php echo $data['alamat'] ?> </td>
                      <?php
                          $level = $this->session->userdata('level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('Survey/add/?id='.$data['id_tower']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-file"></i> Isi Survey</a>
                            </td>
                      <?php } ?>
                    </tr>
                  <?php 
                    $no++;
                    } ?>
                
               
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Provider</th>
                    <th>Alamat</th>
                    <?php
                      $level = $this->session->userdata('level');
                            if ($level == "1") {                            
                        ?>
                    <th>Aksi</th>
                    <?php }?>

                  </tr>
                </tfoot>
              </table>
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
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus id "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>
    <!-- /.content -->
