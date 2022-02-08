
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/AdminLTE.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           Hasil Survey </br>
          <small ></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">

    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table style="border : 1px solid black;  border-collapse: collapse;" class="table table-bordered table-striped">
        <thead>
              
              <tr>
                  <th width="200px">Site ID </th>
                  <td colspan="2"><?php echo $d['id_tower'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Alamat Site </th>
                  <td colspan="2"><?php echo $d['alamat'] ?> </td>
              </tr>
              <tr>
                  <th width="200px">Longitude </th>
                  <td colspan="2"><?php echo $d['long'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Latitude </th>
                  <td colspan="2"><?php echo $d['lat'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Tinggi </th>
                  <td colspan="2"><?php echo $d['tinggi'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Jenis </th>
                  <td colspan="2"><?php echo $d['tipe_menara'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Tipe </th>
                  <td colspan="2"><?php echo $d['tipe_menara'] ?></td>
              </tr>
              <tr>
                  <th width="200px">Pemilik Menara </th>
                  <td colspan="2"><?php echo $d['provider'] ?></td>
              </tr>                
              </thead>
        </table>
        <h4 style="text-align:center;">Hasil Cek Kondisi Menara</h4>
              <table id="" class="table table-bordered table-striped">
              <thead>
              
                <tr>
                    <th width="200px">Lampu Penerangan</th>
                    <td colspan="3"><?php echo $d['lampu_penerangan'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Gembok</th>
                    <td colspan="3"><?php echo $d['gembok'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Jumlah Operator</th>
                    <td colspan="3"><?php echo $d['jumlah_operator'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Kondisi Lingkungan</th>
                    <td colspan="3"><?php echo $d['kondisi_lingkungan'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Tinggi </th>
                    <td colspan="3"><?php echo $d['tinggi'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Wawancara Warga</th>
                    <td colspan="3"><?php echo $d['wawancara_warga'] ?></td>
                </tr>
                <tr>
                    <th width="200px">Rekomendasi Tim</th>
                    <td colspan="3"><?php echo $d['rekomendasi_tim'] ?></td>
                </tr>
                </thead>
              </table>

              <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="6" style="text-align:center">Foto Lokasi</th>
            

                </tr>
                <tr>
                    <td width="500px" style="text-align:center">
                        <img src="<?=site_url('uploads/'.$d['image']) ?>" style="width:100px;">
                    </td>
                    <td colspan="3" style="text-align:center">
                        <img src="<?=site_url('uploads/'.$d['nama_file']) ?>" style="width:100px;">
                    </td>
              
                </tr>  
                <tr>
                  <td>Surveyor</td>

                  <td colspan ="3" align="right">Tanda Tangan</td>

                </tr> 
                <tr>
                  <td>a.<?php echo $d['surveyor_1'] ?></td>
                  <td colspan ="3"></td>
                </tr> 
                <tr>
                  <td>b.<?php echo $d['surveyor_2'] ?></td>
                  <td colspan ="3"></td>
                </tr>  
                <tr>
                  <td>c.<?php echo $d['surveyor_3'] ?></td>
                  <td colspan ="3"></td>
                </tr>  
                </thead>
              </table>              
             
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
     
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
