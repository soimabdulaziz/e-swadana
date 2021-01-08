
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
        <img src="<?php echo base_url(); ?>assets/img/LOGO_VIGARA.jpg">
           KOPERASI Swadana </br>
          <small ></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
      From
        <address>
          <strong>Koperasi Swadana</strong><br>
          <br>
          SMA N 1 Prambanan Sleman Yogyakarta<br/>
          Phone: <br/>
          Email: 
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo($d['nama']); ?></strong><br>
          <?php echo(@$d['alamat']); ?><br>
          
        </address>
      </div>
      <!-- /.col -->
    
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead> <h1></h1>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th></th>
            <th>Deskripsi</th>
          </tr>
          </thead>
          <tbody>
          <tr>
          <td><?php  
            echo date('d F Y', strtotime(''.@$d['tanggal'].'')); ?></td>
            
            <td><?php echo("Rp."); echo number_format((@$d['jumlah'])) ?></td>
            <td></td>
            <?php if(@$d['status'] == "Penambahan") { ?>
            <td>Piutang</td>
            <?php } if(@$d['status'] == "Pembayaran") { ?>
            <td>Pembayaran Piutang</td>
            <?php } ?>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th>Sisa Piutang</th>
            <th><?php echo("Rp."); echo number_format((@$d['saldo_piutang'])) ?></th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Mengetahui</th>
          </tr>
          <tr><td></td></tr>
          <tr>
            <td></td>
            <td></td>  
            <td></td>
            <th>Bendahara</th>
          </tr>
          </tbody>
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
