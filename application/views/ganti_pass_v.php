<section class="content-header">
      <h1>
       Ganti Password
        <small></small>
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
          <h3 class="box-title">  </h3>
          <div class="pull-right">
            
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php
                      
                    ?>
                    
                    <?php 
                     
                        echo form_open('ganti_pass/add');
                     
                    
                     ?>
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
   