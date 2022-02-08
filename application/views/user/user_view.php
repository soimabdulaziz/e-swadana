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
              <h3 class="box-title">User List</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <?php if ($this->session->userdata('level') == '1') { ?>
            <a href="<?php echo site_url('User/add_view') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
               
            <?php } ?>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
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
                    foreach ($user as $data) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data['username'] ?> </td>
                      <td> <?php echo $data['Level'] ?> </td>

                      <?php
                          $level = $this->session->userdata('level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap>
                            <a  onclick="return konfirmasi('<?php echo $data['id_user'];?>')" href="<?php echo site_url('User/delete/'.$data['id_user'].'/') ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
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
                    <th>Nama</th>
                    <th>Level</th>
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
