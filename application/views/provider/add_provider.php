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
              <h3 class="box-title">Tambah Data Provider</h3>
            <div class="pull-right">
              <a href ="<?=site_url('Provider') ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back
              </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Provider/add') ?>
                      <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                          <label>Nama Provider*</label>
                          <input type ="text" value = "<?php echo @$d['nama_provider'] ?>" name="nama" id="nama" class="form-control" require>
                          <?=form_error('nama')?>

                      </div>
                      <div class="form-group <?=form_error('alamat') ? 'has-error' : null ?>">
                          <label>Alamat*</label>
                          <input type ="text" value = "<?php echo @$d['alamat'] ?>" name="alamat" id="alamat" class="form-control" require>
                        <?=form_error('alamat')?>

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
