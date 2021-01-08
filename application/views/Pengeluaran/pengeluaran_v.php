<section class="content-header">
      <h1>
        Tabel Pengeluaran
        <small>Koperasi Swadana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengeluaran</li>
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
              <a href="<?php echo site_url('Pengeluaran/add') ?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-plus"></i> Tambah</a>
                <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID pengeluaran</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Sumber Dana</th>
                  <th>Sisa Dana Cadangan</th>
                  <th>Sisa Dana Sosial</th>
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
                        <tr>
                            <td><?php echo $row['id_pengeluaran'] ?> </td>
                            <td><?php echo number_format($row['jumlah']) ?></td>
                            <td><?php echo $row['Keterangan'] ?> </td>
                            <td><?php echo $row['tanggal'] ?></td>
                            <td><?php echo $row['sumber_pengeluaran'] ?> </td>
                            <td><?php echo number_format($row['sisa_dana_cadangan']) ?> </td>
                            <td><?php echo number_format($row['sisa_dana_sosial']) ?> </td>

                            <?php
                                $level = $this->session->userdata('username');
                                if ($level == "admin") {                            
                            ?>
                            <td nowrap><!-- <a href="<?php echo site_url('Pengeluaran/add/'.$row['id_pengeluaran']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a> -->
                            <!-- <a  onclick="return konfirmasi('<?php echo $row['id_pengeluaran'];?>')" href="<?php echo site_url('pengeluaran/delete/'.$row['id_pengeluaran']) ?>" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a> -->
                            </td>
                                <?php } ?>
                        </tr>
                <?php
                }
               ?>
            
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Pengeluaran</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Sumber Dana</th>
                  <th>Sisa Dana Cadangan</th>
                  <th>Sisa Dana Sosial</th>
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
   