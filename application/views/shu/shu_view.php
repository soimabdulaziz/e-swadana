<section class="content-header">
      <h1>
        Preview SHU
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Preview SHU</li>
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
            
           
                
             <?php } ?>
            </div>
            
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                    <?php 
                        $level = $this->session->userdata('Level');
                        if ($level == 1) {
                    ?>
                  
                        <?php } ?> 
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($total_jasa as $rowjasa) { ?> 
                    <?php } ?>
                    <?php foreach ($shutakdibagi as $rowshutakdibagi) { ?>
                    <?php } ?>
               <tr>
                 <td colspan="3"><b>Pendapatan</b></td>
                
               </tr>  
                <tr>
                  <td>Total Jasa</td>
                  <td>Rp.<?php echo number_format(@$rowjasa['jumlah']) ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Shu Tak Dibagi Tahun Lalu</td>
                  <td>Rp.<?php echo number_format(@$rowshutakdibagi['shu_takdibagi'])?></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td><b>Jumlah Pendapatan</b></td>
                <?php $total_pendapatan = @$rowjasa['jumlah'] + @$rowshutakdibagi['shu_takdibagi']?>
                  <td><b>Rp <?php echo number_format(@$total_pendapatan) ?></b></td>
                </tr>
                <tr>
                  <td colspan="3"><b>Beban - Beban</b></td>
                 
              
                </tr>
                <?php $total_beban = 0 ?>
               <?php foreach ($pengeluaran as $row_beban) { ?>
                <tr>
                  <td><?php echo @$row_beban['Keterangan'] ?></td>
                  <td>Rp.<?php echo number_format(@$row_beban['jumlah']) ?></td>
                  <td></td>
                </tr>
                <?php $total_beban = $total_beban + $row_beban['jumlah'] ?>
               <?php } ?>
                <tr>
                  <td></td>
                  <td><b>Jumlah Beban</b></td>
                  
                  <td><b>Rp.<?php echo number_format(@$total_beban) ?></b></td>
                </tr>
                <tr>
                  <td colspan="3"><b>SHU</b></td>
                </tr>
                <tr>
                  <td>Total SHU</td>
                  <td></td>
                  <?php $total_shu = @$total_pendapatan - @$total_beban ?>
                  <td>Rp.<?php echo number_format(@$total_pendapatan - @$total_beban) ?></td>
                </tr>
                <?php foreach ($takdibagi_now as $row_now) { ?>
                <?php } ?>
                <tr>
                  <td>SHU Tak Dibagi Tahun ini</td>
                  <td> <?php if (empty(@$row_now['shu_takdibagi'])) { ?>
                  <a  href="<?=site_url('Shu/Preview/shutakdibagi')?>" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-times-circle"></i> SHU Tak Dibagi</a>
                  <?php } else if (!empty(@$row_now['shu_takdibagi'])) { ?>  
                    Rp.<?php echo number_format(@$row_now['shu_takdibagi']) ?></td>
                  <?php } ?>
                  <td></td>
                </tr>
                <?php foreach ($shu_dibagi as $row_shu) { ?>
                <?php } ?>
                <tr>
                  <td></td>
                  <td><b>SHU Dibagi Tahun ini</b></td>
                  <td><b>Rp. <?php echo number_format(@$row_shu['shu_dibagi']) ?></b></td>
                </tr>
            
                </tbody>
                <tfoot>
                <tr>
              
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

                 <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                    
                </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($shu as $rowshu) {

                    }
                  ?>
                <tr>
                  <td colspan="4"><b>Pembagian SHU</b></td>
                </tr>
                <tr>
                <td>Dana Cadangan</td>
                  <td>10%</td>
                  <td>Rp.<?php echo number_format(@$row_shu['shu_dibagi']) ?></td>
                  <td>Rp.<?php echo number_format(@$rowshu['cadangan']) ?></td>
                </tr>
                <tr>
                <td>Jasa Simpanan</td>
                  <td>35%</td>
                  <td>Rp.<?php echo number_format(@$row_shu['shu_dibagi']) ?></td>
                  <td>Rp.<?php echo number_format(@$rowshu['jasa_simpanan']) ?></td>
                </tr>
                <tr>
                <td>Jasa Anggota</td>
                  <td>40%</td>
                  <td>Rp.<?php echo number_format(@$row_shu['shu_dibagi']) ?></td>
                  <td>Rp.<?php echo number_format(@$rowshu['jasa_anggota']) ?></td>
                </tr>
                <tr>
                <td>Jasa Pengurus</td>
                  <td>10%</td>
                  <td>Rp.<?php echo number_format(@$row_shu['shu_dibagi']) ?></td>
                  <td>Rp.<?php echo number_format(@$rowshu['jasa_pengurus']) ?></td>
                </tr>
                <tr>
                <td>Dana Sosial</td>
                  <td>5%</td>
                  <td>Rp.<?php echo number_format(@$row_shu['shu_dibagi']) ?></td>
                  <td>Rp.<?php echo number_format(@$rowshu['dana_sosial']) ?></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
              
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
                <div class="widget-body-toolbar" align="right" style="padding-right">
                <nav>
            
                 
              
                </nav>
              </div>
            <!-- /.box-body -->
        
              <!-- /.box-header -->
              <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                    
                </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($shu as $rowshu) {

                    }
                  ?>
                <tr>
                  <td colspan="4"><b>Total</b></td>
                </tr>
                <tr>
                <td>Total Dana Cadangan</td>
                  <td>Rp.<?php echo number_format(@$rowshu['total_dana_cadangan']) ?></td>
                </tr>
                <tr>
                <td>Total Jasa Simpanan</td>
                  <td>Rp.<?php echo number_format(@$rowshu['total_jasa_simpanan']) ?></td>
                </tr>
                <tr>
                <td>Total Jasa Anggota</td>
                  <td>Rp.<?php echo number_format(@$rowshu['total_jasa_anggota']) ?></td>
                </tr>
                <tr>
                <td>Total Jasa Pengurus</td>
                  <td>Rp.<?php echo number_format(@$rowshu['total_jasa_pengurus']) ?></td>
                </tr>
                <tr>
                <td>Total Dana Sosial</td>
                  <td>Rp.<?php echo number_format(@$rowshu['total_dana_sosial']) ?></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
              
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
                <div class="widget-body-toolbar" align="right" style="padding-right">
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

       <!-- MODAL -->
       <div class="modal modal-default fade" id="export">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Pilih Tahun Laporan</h4>
            </div>
            <form action="Sirkulasi/export" method="post">
              <div class="modal-body">  
              <div class="form-group">
                  <label>Pilih Bulan</label>
                  <select class="form-control" name="bulan" id ="bulan" required>
                    <option>Bulan...</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                    
                  </select>
            </div>
            <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control" name="tahun" id ="tahun" required>
                    <option>Tahun...</option>
                    <?php
                     foreach ($tahun as $row) {
                    ?>
                    <option value="<?php echo $row['tahun'];?>"><?php echo $row['tahun'];?></option>
                    <?php
                      }
                    ?>
                  </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Export Excel</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
    </section>
    <script type="text/javascript" language="JavaScript">
     function konfirmasi(id){
    tanya = confirm("Apakah anda yakin untuk menghapus "+id+" ?");
    if (tanya == true) 
      return true;
    else return false;
    }
    </script>