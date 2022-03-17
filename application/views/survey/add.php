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
              <h3 class="box-title">Isi Survey <?php echo $_GET['id']?></h3>
            <div class="pull-right">
              <a href ="<?=site_url('Survey/list_tower') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php echo validation_errors(); ?>
                    <?php if(!empty($this->uri->segment(4))) {
                      echo form_open_multipart('Survey/edit/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'');
                    } else {
                      echo form_open_multipart('Survey/do_upload/'.$this->uri->segment(3).'');
                    }?>
                    <div class ="form-group">
                    <label>Tanggal *</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="" value="<?php echo @$d['tanggal'] ?>" type="date" class="form-control datepicker" name="tgl" id="tgl" required>
                    </div>
                    </div>
                    <div class ="form-group <?=form_error('lampu_penerangan') ? 'has-error' : null ?>">
                          <label>Lampu Penerangan * </label>
                          <select class="form-control" name = "lampu_penerangan" id = "lampu_penerangan" required>
                            <option>--Pilih--</option>
                            <option value="Berfungsi" <?=@$d['lampu_penerangan'] == 'Berfungsi' ? "selected" : null?> >Berfungsi</option>
                            <option value="Mati" <?=@$d['lampu_penerangan'] == 'Mati' ? "selected" : null?> >Mati</option>
                            <option value="Tidak Ada" <?=@$d['lampu_penerangan'] == 'Tidak Ada' ? "selected" : null?>>Tidak Ada</option>

                          </select>  
                          <?=form_error('lampu_penerangan')?>

                          <span class="help-block"></span> 
                    </div>
                    <div class ="form-group <?=form_error('gembok') ? 'has-error' : null ?>">
                          <label>Gembok * </label>
                          <select name = "gembok" class="form-control">
                            <option selected>--Pilih--</option>
                            <option value="Terbuka" <?=@$d['gembok'] == 'Terbuka' ? "selected" : null?> >Terbuka</option>
                            <option value="Terkunci" <?=@$d['gembok'] == 'Terkunci' ? "selected" : null?> >Terkunci</option>
                            <option value="Tidak Ada" <?=@$d['gembok'] == 'Tidak Ada' ? "selected" : null?>>Tidak Ada</option>

                          </select>  
                          <?=form_error('gembok')?>

                          <span class="help-block"></span> 
                    </div>
                    <div class ="form-group <?=form_error('jumlah_operator') ? 'has-error' : null ?>">
                          <label>Jumlah Operator * </label>
                          <select name = "jumlah_operator" class="form-control">
                            <option selected>--Pilih--</option>
                            <option value="1" <?=@$d['jumlah_operator'] == 1 ? "selected" : null?> >1</option>
                            <option value="2" <?=@$d['jumlah_operator'] == 2 ? "selected" : null?> >2</option>
                            <option value="3" <?=@$d['jumlah_operator'] == 3 ? "selected" : null?>>3</option>
                            <option value="4" <?=@$d['jumlah_operator'] == 4 ? "selected" : null?>>4</option>

                          </select>  
                          <?=form_error('jumlah_operator')?>
                          <span class="help-block"></span> 
                    </div>
                    <div class ="form-group <?=form_error('kondisi_lingkungan') ? 'has-error' : null ?>">
                          <label>Kondisi Lingkungan * </label>
                          <select name = "kondisi_lingkungan" class="form-control">
                            <option selected>--Pilih--</option>
                            <option value="Rumput Tinggi" <?=@$d['kondisi_lingkungan'] == 'Rumput Tinggi' ? "selected" : null?> >Rumput Tinggi</option>
                            <option value="Banyak Sampah" <?=@$d['kondisi_lingkungan'] == 'Banyak Sampah' ? "selected" : null?> >Banyak Sampah</option>
                            <option value="Banyak ilalang" <?=@$d['kondisi_lingkungan'] == 'Banyak ilalang' ? "selected" : null?>>Banyak ilalang</option>
                            <option value="Terawat" <?=@$d['kondisi_lingkungan'] == 'Terawat' ? "selected" : null?>>Terawat</option>
                          </select>  
                          <?=form_error('kondisi_lingkungan')?>
                          <span class="help-block"></span> 
                    </div>
                    <div class="form-group <?=form_error('wawancara_warga') ? 'has-error' : null ?>">
                          <label>Wawancara Warga*</label>
                          <input type ="text" name="wawancara_warga" value= "<?php echo @$d['wawancara_warga'] ?>" id="wawancara_warga" class="form-control" require>
                          <?=form_error('wawancara_warga')?>

                      </div>
                      <div class="form-group <?=form_error('rekomendasi_tim') ? 'has-error' : null ?>">
                          <label>Rekomendasi Tim*</label>
                          <input type ="text" name="rekomendasi_tim" value= "<?php echo @$d['rekomendasi_tim'] ?>" id="rekomendasi_tim" class="form-control" require>
                          <?=form_error('rekomendasi_tim')?>

                      </div>            
                      <div class ="form-group <?=form_error('surveyor_1') ? 'has-error' : null ?>">
                          <label>Surveyor 1 * </label>
                          <select class="selectpicker"  data-live-search="true" name = "surveyor_1" id = "surveyor_1" required>
                            <?php foreach($username as $row) { ?>
                              <option  <?=@$d['surveyor_1'] == $row['username'] ? "selected" : null?>><?php echo $row['username'] ?></option>
                            <?php } ?>

                          </select>  
                          <?=form_error('surveyor_1')?>

                          <span class="help-block"></span> 
                    </div>
                    <div class ="form-group <?=form_error('surveyor_2') ? 'has-error' : null ?>">
                          <label>Surveyor 2 * </label>
                          <select class="selectpicker"  data-live-search="true" name = "surveyor_2" id = "surveyor_2" required>
                            <?php foreach($username as $row) { ?>
                              <option <?=@$d['surveyor_2'] == $row['username'] ? "selected" : null?>><?php echo $row['username'] ?></option>
                            <?php } ?>

                          </select>  
                          <?=form_error('surveyor_2')?>

                          <span class="help-block"></span> 
                    </div>
                    <div class ="form-group <?=form_error('surveyor_3') ? 'has-error' : null ?>">
                          <label>Surveyor 3 * </label>
                          <select class="selectpicker"  data-live-search="true" name = "surveyor_3" id = "surveyor_3" required>
                            <?php foreach($username as $row) { ?>
                              <option <?=@$d['surveyor_3'] == $row['username'] ? "selected" : null?>><?php echo $row['username'] ?></option>
                            <?php } ?>

                          </select>  
                          <?=form_error('surveyor_3')?>

                          <span class="help-block"></span> 
                    </div>
                    <?php $id= $this->uri->segment(3);
                    if(empty($id)) {
                    ?>
                      <div class="form-group">
                          <label>Image*</label>
                          <input type ="file" name="image" id="image" class="form-control" required>

                      </div>
                      <div class="form-group">
                          <label>Image*</label>
                          <input type ="file" name="image2" id="image2" class="form-control" required>

                      </div>
                      <?php } else { ?>
                       <div class="form-group">
                         <label>Foto Lokasi :</label>
                       <tr>
                          <td><img src="<?=site_url('uploads/'.@$d['image']) ?>" style="width:100px;">
                          </td>
                          <td><img src="<?=site_url('uploads/'.@$d['nama_file']) ?>" style="width:100px;">
                          </td>
                          
                        </tr> 
                       </div>
                        <?php } ?>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  $('.selectpicker).selectpicker();
</script>
   