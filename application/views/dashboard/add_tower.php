    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>advanced tables</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Tower</h3>
            <div class="pull-right">
              <a href ="<?=site_url('Dashboard') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php// echo validation_errors(); ?>
                    <form action="" method="post">
                      <div class="form-group <?=form_error('id_tower') ? 'has-error' : null ?> ">
                          <label>ID Tower*</label>
                          <input type ="text" name="id_tower" value= "<?php echo @$d['id_tower'] ?>"id="id_tower" class="form-control" require>
                        <span class="help-block"><?=form_error('id_tower')?></span>
                      </div>
                      <div class="form-group <?=form_error('long') ? 'has-error' : null ?>">
                          <label>Longitude*</label>
                          <input type ="text" name="long" value= "<?php echo @$d['long'] ?>" id="long" class="form-control" require>
                          <?=form_error('long')?>

                      </div>
                      <div class="form-group <?=form_error('lat') ? 'has-error' : null ?>">
                          <label>Latitude*</label>
                          <input type ="text" name="lat" value= "<?php echo @$d['lat'] ?>" id="lat" class="form-control" require>
                        <?=form_error('lat')?>

                      </div>
                      <div class="form-group <?=form_error('alamat') ? 'has-error' : null ?>">
                          <label>Alamat*</label>
                          <input type ="text" name="alamat" value= "<?php echo @$d['alamat'] ?>" id="alamat" class="form-control" require>
                          <?=form_error('alamat')?>

                      </div>
                      <div class="form-group <?=form_error('desa') ? 'has-error' : null ?>">
                          <label>Desa*</label>
                          <input type ="text" name="desa" id="desa" value= "<?php echo @$d['desa'] ?>" class="form-control" require>
                          <?=form_error('desa')?>

                      </div>
                      <div class="form-group <?=form_error('kec') ? 'has-error' : null ?>">
                          <label>Kecamatan*</label>
                          <input type ="text" name="kec" value= "<?php echo @$d['kecamatan'] ?>" id="kec" class="form-control" require>
                          <?=form_error('kec')?>
                      </div>
                        <div class =" form-group <?=form_error('provider') ? 'has-error' : null ?>">
                            <label>Pemilik Site * </label>
                            <select name = "provider" class="form-control">
                              <option >--Pilih--</option>
                              <?php foreach($provider as $row) { ?>
                              <option value="<?php echo $row['nama_provider'] ?>" <?=@$d['provider'] == $row['nama_provider'] ? "selected" : null?>><?php echo $row['nama_provider'] ?></option>
                             <?php } ?>
                            </select>  
                            <?=form_error('provider')?>
                            <span class="help-block"></span> 
                      </div>
                      <div class="form-group <?=form_error('tinggi') ? 'has-error' : null ?>">
                          <label>Tinggi*</label>
                          <input type ="text" name="tinggi" value= "<?php echo @$d['tinggi'] ?>" id="tinggi" class="form-control" require>
                          <?=form_error('tinggi')?>
                          
                      </div>
                      <div class="form-group <?=form_error('tipe_men') ? 'has-error' : null ?>">
                          <label>Tipe Menara*</label>
                          <input type ="text" name="tipe_men" value= "<?php echo @$d['tipe_menara'] ?>" id="tipe_men" class="form-control" require>
                          <?=form_error('tipe_men')?>

                      </div>
                      <div class="form-group <?=form_error('tipe_site') ? 'has-error' : null ?>">
                          <label>Tipe Site*</label>
                          <input type ="text" name="tipe_site" value= "<?php echo @$d['tipe_site'] ?>" id="tipe_site" class="form-control" require>
                          <?=form_error('tipe_site')?>

                      </div>
                      <div class="form-group <?=form_error('luas') ? 'has-error' : null ?>">
                          <label>Luas Tanah*</label>
                          <input type ="text" name="luas" id="luas" value= "<?php echo @$d['luas_tanah'] ?>" class="form-control" require>
                          <?=form_error('luas')?>

                      </div>
                      <div class =" form-group <?=form_error('lokasi') ? 'has-error' : null ?>">
                          <label>Lokasi * </label>
                          <select name = "lokasi" class="form-control">
                            <option selected>--Pilih--</option>
                            <option value="1"<?=@$d['lokasi'] == 1 ? "selected" : null?>>Pemukiman</option>
                            <option value="2" <?=@$d['lokasi'] == 2 ? "selected" : null?> >Persawahan</option>
                          </select>  
                          <?=form_error('lokasi')?>
                          <span class="help-lokasi"></span> 
                    </div>
                    <div class ="form-group <?=form_error('penggunaan') ? 'has-error' : null ?>">
                          <label>Penggunaan * </label>
                          <select name = "penggunaan" class="form-control">
                            <option selected>--Pilih--</option>
                            <option value="1" <?=@$d['penggunaan'] == 1 ? "selected" : null?> >Bersama</option>
                            <option value="2" <?=@$d['penggunaan'] == 2 ? "selected" : null?> >Mandiri</option>
                            <option value="3" <?=@$d['penggunaan'] == 3 ? "selected" : null?>>Off</option>

                          </select>  
                          <?=form_error('penggunaan')?>

                          <span class="help-block"></span> 
                    </div>
                      <div class="form-group">
                        <button type= "submit" class="btn btn-success">
                          <i class="fa fa-paper-plane"></i>Save
                          </button>
                        <button type= "reset" class="btn btn-danger">Reset</button>

                      </div>
                    </form>
                  </div>
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
    <!-- /.content -->
