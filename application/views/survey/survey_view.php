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
              <h3 class="box-title">Survey</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <?php if ($this->session->userdata('level') == '1') { ?>
            <a href="<?php echo site_url('Survey/list_tower') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Survei</a>
          <a href="<?php echo site_url('Survey/export/'.$this->uri->segment(3)) ?>" target="_blank" class="btn btn-success"><i class="fa fa-download"></i> Export Exel</a>
               
            <?php } ?>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>ID Tower</th>
                    <th>Provider</th>
                    <th>Alamat</th>
                    <th>Foto 1</th>
                    <th>Foto 2</th>
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
                    foreach ($survey as $data) { ?>
                    <tr>
                      <td><?php echo $data['id_survei'] ?></td>
                      <?php $tanggal = $data['tanggal']; ?>
                      <td><?php echo date('d F Y', strtotime(''.$tanggal.''));?> </td>
                      <td> <?php echo $data['id_tower'] ?> </td>
                      <td> <?php echo $data['provider'] ?> </td>
                      <td> <?php echo $data['alamat'] ?> </td>
                      <td> <img src="<?=site_url('uploads/'.$data['image']) ?>" style="width:100px;"> </td>
                      <td> <img src="<?=site_url('uploads/'.$data['nama_file']) ?>" style="width:100px;"> </td>


                      <?php
                          $level = $this->session->userdata('level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('Survey/detail/'.$data['id_survei']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-file"></i>Detail</a>
                            <a href="<?php echo site_url('Survey/add/'.$data['id_survei'].'/'.$data['id_foto']) ?>" class="btn btn-warning btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                            <a  onclick="return konfirmasi('<?php echo $data['id_survei'];?>')" href="<?php echo site_url('Survey/delete/'.$data['id_survei'].'/'.$data['id_foto']) ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
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
                    <th>Tanggal</th>
                    <th>ID Tower</th>
                    <th>Provider</th>
                    <th>Alamat</th>
                    <th>Foto 1</th>
                    <th>Foto 2</th>
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
