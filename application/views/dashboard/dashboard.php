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
              <h3 class="box-title">Data Tower</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <?php if ($this->session->userdata('level') == '1') { ?>
            <a href="<?php echo site_url('dashboard/add') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-plus"></i> Tambah Data Tower</a>
                <?php } ?>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Alamat</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Tinggi</th>
                    <th>Tipe Menara</th>
                    <th>Tipe Site</th>
                    <th>Luas Tanah</th>
                    <th>Lokasi</th>
                    <th>Penggunaan</th>
                    <th>Provider</th>
                    <?php
                      $level = $this->session->userdata('level');
                          if ($level == "1") {                            
                    ?>
                    <th>Aksi</th>
                    <?php }
                     ?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;                  
                  foreach ($tower as $data) { ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td> <?php echo $data['id_tower'] ?> </td>
                      <td> <?php echo $data['long'] ?> </td>
                      <td> <?php echo $data['lat'] ?> </td>
                      <td> <?php echo $data['alamat'] ?> </td>
                      <td> <?php echo $data['desa'] ?> </td>
                      <td> <?php echo $data['kecamatan'] ?> </td>
                      <td> <?php echo $data['tinggi'] ?> </td>
                      <td> <?php echo $data['tipe_menara'] ?> </td>
                      <td> <?php echo $data['tipe_site'] ?> </td>
                      <td> <?php echo $data['luas_tanah'] ?> </td>
                      <td> <?php echo $data['lokasi'] ?> </td>
                      <td> <?php echo $data['penggunaan'] ?> </td>
                      <td> <?php echo $data['provider'] ?> </td>
                      <?php
                          $level = $this->session->userdata('level');
                                if ($level == "1") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('Dashboard/add/'.$data['id_tower']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                            <a  onclick="return konfirmasi('<?php echo $data['id_tower'];?>')" href="<?php echo site_url('Dashboard/delete/'.$data['id_tower']) ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                      <?php } ?>

                    </tr>
                  <?php $no++;
                } ?>
                
               
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Alamat</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Tinggi</th>
                    <th>Tipe Menara</th>
                    <th>Tipe Site</th>
                    <th>Luas Tanah</th>
                    <th>Lokasi</th>
                    <th>Penggunaan</th>
                    <th>Provider</th>
                    <?php
                      $level = $this->session->userdata('level');
                          if ($level == "1") {                            
                    ?>
                    <th>Aksi</th>
                    <?php }
                     ?>
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
