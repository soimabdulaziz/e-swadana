<section class="content-header">
      <h1>
        Neraca
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Neraca</li>
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
             <a  href="Shu/export" class="btn btn-success" style="padding:2px 5px 2px 5px"><i class="fa fa-download"></i> Export Excel</a>
            
                
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
                  <?php 
                      foreach ($piutang as $row_p) {

                      }
                      $piutang = $row_p['penambahan'] - $row_p['pembayaran'];
                 
                     foreach ($simpanan_pokok as $row_simpok) {

                     }
                     $simpok = $row_simpok['simpok'];
                 
                     foreach ($simpanan_wajib as $row_simjib) {

                     }
                     $simjib = $row_simjib['pemasukan'] - $row_simjib['penarikan'];
               
                     foreach ($simpanan_sukarela as $row_suk) {

                     }
                     $sukarela = $row_suk['pemasukan'] - $row_suk['penarikan'];
                 
                     foreach ($jasa as $row_jasa) {

                     }
                     $jasa = $row_jasa['jasa'];

                     foreach ($shu as $row_shu) {

                     }
                     foreach ($takdibagi as $row_t) {

                     }
                     $shutakdibagi = @$row_t['shu_takdibagi'];
                     $pasiva = $shutakdibagi + $jasa + $row_shu['cadangan'] + $row_shu['dana_sosial'] + $sukarela + $simjib + $simpok;
                     $kas = $pasiva - $piutang;
                     $aktiva = $kas + $piutang;
                  ?>
                    <tr>
                        <td><b>No</b></td>
                        <td><b>Keterangan</b></td>
                        <td><b>jumlah</b></td>
                        <td><b>No</b></td>
                        <td><b>Keterangan</b></td>
                        <td><b>jumlah</b></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Harta</td>
                        <td></td>
                        <td>2</td>
                        <td>Simpanan(Utang)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>1.1 Kas</td>
                        <td>Rp.<?php echo number_format($kas) ?></td>
                        <td></td>
                        <td>2.1 Simpanan Pokok</td>
                        <td>Rp.<?php echo number_format($simpok) ?></td>
                    </tr>
                  
                    <tr>
                        <td></td>
                        <td>1.2 Piutang</td>
                        <td>Rp.<?php echo number_format(@$piutang) ?></td>
                        <td></td>
                        <td>2.2 Simpanan Wajib</td>
                        <td>Rp.<?php echo number_format($simjib) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.3 Simpanan Sukarela</td>
                        <td>Rp.<?php echo number_format($sukarela) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.4 Cadangan</td>
                        <td>Rp.<?php echo number_format($row_shu['cadangan']) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.5 Sosial</td>
                        <td>Rp.<?php echo number_format($row_shu['dana_sosial']) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.5 Pendapatan Jasa Sampai Bulan ini</td>
                        <td>Rp.<?php echo number_format($jasa) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.7 Shu Takdibagi Tahun Lalu</td>
                        <td>Rp.<?php echo number_format($shutakdibagi) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>Jumlah Harta</b></td>
                        <td><b>Rp.<?php echo number_format($aktiva) ?></b></td>
                        <td></td>
                        <td><b>Jumlah Pasiva</b></td>
                        <td><b>Rp.<?php echo number_format($pasiva) ?></b></td>
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