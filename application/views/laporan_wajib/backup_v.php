<section class="content-header">
      <h1>
        Laporan Simpanan Wajib
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Simpanan Wajib</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php $this->view('alert');?>
     

      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">

          
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Januari</th>
                  <th>Februari</th>
                  <th>Maret</th>
                  <th>April</th>
                  <th>Mei</th>
                  <th>Juni</th>
                  <th>Juli</th>
                  <th>Agistus</th>
                  <th>September</th>
                  <th>Oktober</th>
                  <th>November</th>
                  <th>Desember</th>


                    <?php 
                        $level = $this->session->userdata('Level');
                        if ($level == 1) {
                    ?>
                        <?php } ?> 
                </tr>
                </thead>
                <tbody>
                <tbody>
              
             <?php foreach ($data_anggota as $nama) { ?>
            
             <?php if ($nama['nama'] != "admin") { ?>
                
                <tr>
                    <td><?php echo $nama['nama'] ?></td>
                    <?php $no ="0" ;
                    foreach ($cek01 as $anggota)  { ?>
                    <?php if ($nama['id_anggota'] == $anggota['id_anggota']) { ?>
                    <?php if (strtolower(date('m',strtotime($anggota['tanggal']))) == "5") { ?>
                    <td><?php echo $anggota['jumlah']; $no = $no + "1"; ?></td>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php if ($no == 0) { ?>
                    <td>-</td>
                    <?php } ?>
             
                </tr>
                <?php } ?>
             <?php } ?>
       
                </tbody>
                </tbody>
                <tfoot>
                <tr>
                <th>Nama</th>
                  <th>Januari</th>
                  <th>Februari</th>
                  <th>Maret</th>
                  <th>April</th>
                  <th>Mei</th>
                  <th>Juni</th>
                  <th>Juli</th>
                  <th>Agistus</th>
                  <th>September</th>
                  <th>Oktober</th>
                  <th>November</th>
                  <th>Desember</th>

                 
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
   