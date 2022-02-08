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
              <h3 class="box-title">Tambah Data User</h3>
            <div class="pull-right">
              <a href ="<?=site_url('User') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('User/add') ?>
                      <div class="form-group">
                          <label>Username*</label>
                          <input type ="text" value = "<?php echo @$d['Username'] ?>" name="username" id="username" class="form-control" required>

                      </div>
                      <div class ="form-group">
                          <label>Level * </label>
                          <select name = "level" class="form-control">
                            <option value="1" <?=@$d['level'] == '1' ? "selected" : null?> >admin</option>
                            <option value="2" <?=@$d['level'] == '2' ? "selected" : null?> >user</option>
             
                          </select>  

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
