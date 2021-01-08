<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Anggota</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

        <div class="box">
          <div class="box-header">
          <h3 class="box-title">  Add Anggota </h3>
          <div class="pull-right">
            <a href="<?=site_url('anggota')?>" class="btn btn-warning btn-flat ">
            <i class="fa fa-undo"></i> Back
            </a>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php
                      
                    ?>
                    
                    <?php 
                      $id = $this->uri->segment(3);
                      if (empty($id)) {
                        echo form_open('anggota/add');
                      } else {
                        echo form_open('anggota/add/'.$id);
                      }
                    
                     ?>
                    <div class =" form-group <?=form_error('nama') ? 'has-error' : null?> ">
                            <label>Nama * </label>
                            <input type = "text" name = "nama" value ="<?= $this->uri->segment(3) ?  @$d['nama'] : set_value('nama')?>" class= "form-control">
                            <span class="help-block"> <?=form_error('nama')?> </span>
                    </div>
                    <div class =" form-group <?=form_error('username') ? 'has-error' : null?> ">
                            <label>Username * </label>
                            <input type = "text" name = "username" value ="<?= $this->uri->segment(3) ?  @$d['username'] : set_value('username')?>" class= "form-control">
                            <span class="help-block"> <?=form_error('username')?> </span>
                    </div>
                    <div class =" form-group <?=form_error('alamat') ? 'has-error' : null?> ">
                            <label>Alamat  </label>
                            <textarea name = "alamat"   class= "form-control"><?php if (!empty($this->uri->segment(3)))echo(@$d['username'])?><?php if (empty($this->uri->segment(3)))echo(set_value('alamat')) ?></textarea>
                            <span class="help-block"> <?=form_error('alamat')?> </span>
                    </div>
                    <div class =" form-group <?=form_error('pass') ? 'has-error' : null?> ">
                            <label>Password * </label>
                            <input type = "password" value ="<?=set_value('pass')?>" name = "pass" class= "form-control">
                            <span class="help-block"> <?=form_error('pass')?> </span>
                    </div>
                    <div class =" form-group <?=form_error('passconf') ? 'has-error' : null?> " >
                            <label>Konfirmasi Password * </label>
                            <input type = "password" value ="<?=set_value('passconf')?>" name = "passconf" class= "form-control">
                            <span class="help-block"> <?=form_error('passconf')?> </span>
                    </div>
                    <div class =" form-group <?=form_error('JK') ? 'has-error' : null?> ">
                          <label>Jenis Kelamin * </label>
                          <select name = " JK" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="1" <?=@$d['JK'] == 1 ? "selected" : null?>>Laki-Laki</option>
                            <option value="2" <?=@$d['JK'] == 2 ? "selected" : null?>>Perempuan</option>
                          </select>  
                          <span class="help-block"> <?=form_error('JK')?> </span> 
                    </div>
                    <div class =" form-group <?=form_error('Level') ? 'has-error' : null?> ">
                          <label>Level * </label>
                          <select name = "Level" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="1" <?=@$d['Level'] == 1 ? "selected" : null?>>Admin</option>
                            <option value="2" <?=@$d['Level'] == 2 ? "selected" : null?>>User</option>
                          </select>  
                          <span class="help-block"> <?=form_error('JK')?> </span> 
                    </div>
                    <div class="form-group">
                            <button type ="submit" class="btn btn-success btn-flat ">
                            <i class ="fa fa-paper-plane"></i>save</button>
                            <button type ="reset"  class="btn btn-danger btn-flat ">
                            Reset</button>
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
   