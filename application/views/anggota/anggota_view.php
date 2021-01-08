<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Anggota</a></li>
        <li class="active">Data tables</li>
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
              <a href="<?php echo site_url('anggota/add') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-plus"></i> Add New Row</a>
                <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
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
                foreach ($table_data->result_array() as $row) {
                ?>    
                    <?php if ($row['Level'] != "1") { ?>      
                        <tr>
                            <td><?php echo $row['id_anggota'] ?> </td>
                            <td><?php echo $row['nama'] ?> </td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['alamat'] ?></td>
                            <?php
                                $level = $this->session->userdata('Level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('anggota/add/'.$row['id_anggota']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                            <a  onclick="return konfirmasi('<?php echo $row['username'];?>')" href="<?php echo site_url('anggota/delete/'.$row['id_anggota']) ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
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
                  <th>Username</th>
                  <th>Alamat</th>
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
   