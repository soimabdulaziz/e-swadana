<section class="content-header">
      <h1>
        Master Data
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Data Master</li>
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
                  <th>Keterangan</th>
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
                foreach ($table_data->result_array() as $row) {
                ?>    
           
                        <tr>
                            <td><?php echo $row['keterangan'] ?> </td>
                            <?php if ($row['id_master'] == "3") { ?>
                              <td><?php echo ($row['jumlah']) ?> % </td>
                            <?php } ?>
                            <?php if ($row['id_master'] != "3") { ?>
                            <td><?php echo number_format($row['jumlah']) ?></td>
                            <?php } ?>
                            <?php
                                $level = $this->session->userdata('username');
                                if ($level == "admin" OR $level == "admin1") {                            
                            ?>
                            <td nowrap><a href="<?php echo site_url('master/add/'.$row['id_master']) ?>" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                           
                            </td>
                                <?php } ?>
                        </tr>

                <?php
                }
               ?>
            
            
                </tbody>
                <tfoot>
                <tr>
                  <th>Keterangan</th>
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
   