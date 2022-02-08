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
              <h3 class="box-title">Detail Survey</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th width="200px">Site ID </th>
                    <td width="600px"><?php echo $d['id_tower'] ?></td>
                </tr>

                <tr>
                    <th width="200px">tanggal </th>
                    <td width="600px"><?php echo date('d F Y', strtotime(''.$d['tanggal'].'')) ?></td>
                </tr>

                <tr>
                    <th width="200px">Alamat Site </th>
                    <td width="600px"><?php echo $d['alamat'] ?> </td>
                </tr>
                <tr>
                    <th width="200px">Longitude </th>
                    <td width="600px"><?php echo $d['long'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Latitude </th>
                    <td width="600px"><?php echo $d['lat'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Jenis </th>
                    <td width="600px"><?php echo $d['tipe_menara'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Tipe </th>
                    <td width="600px"><?php echo $d['tipe_site'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Pemilik Menara </th>
                    <td width="600px"><?php echo $d['provider'] ?></td>
                </tr>                
                </thead>
              </table>
              <h3 style="text-align:center;">Hasil Cek Kondisi Menara</h3>
              <table id="" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th width="200px">Lampu Penerangan</th>
                    <td width="600px"><?php echo $d['lampu_penerangan'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Gembok</th>
                    <td width="600px"><?php echo $d['gembok'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Jumlah Operator</th>
                    <td width="600px"><?php echo $d['jumlah_operator'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Kondisi Lingkungan</th>
                    <td width="600px"><?php echo $d['kondisi_lingkungan'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Tinggi </th>
                    <td width="600px"><?php echo $d['tinggi'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Wawancara Warga</th>
                    <td width="600px"><?php echo $d['wawancara_warga'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Rekomendasi Tim</th>
                    <td width="600px"><?php echo $d['rekomendasi_tim'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Surveyor 1</th>
                    <td width="600px"><?php echo $d['surveyor_1'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Surveyor 2</th>
                    <td width="600px"><?php echo $d['surveyor_2'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Surveyor 3</th>
                    <td width="600px"><?php echo $d['surveyor_3'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Foto Lokasi</th>
                    <td width="600px"><img src="<?=site_url('uploads/'.$d['image']) ?>" style="width:200px;">
                    <img src="<?=site_url('uploads/'.$d['nama_file']) ?>" style="width:200px;">
                  </td>
                </tr> 
                               
                </thead>
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
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo site_url('Survey/print/'.$this->uri->segment(3)) ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
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
