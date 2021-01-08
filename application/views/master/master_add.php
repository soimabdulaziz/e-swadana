<section class="content-header">
      <h1>
        Edit Data Master
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Edit Data Master</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

        <div class="box">
          <div class="box-header">
          <h3 class="box-title">  Edit Data Master </h3>
          <div class="pull-right">
            <a href="<?=site_url('master')?>" class="btn btn-warning btn-flat ">
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
                        echo form_open('master/add');
                      } else {
                        echo form_open('master/add/'.$id);
                      }
                    
                     ?>
                    <div class =" form-group <?=form_error('keterangan') ? 'has-error' : null?> ">
                            <label>Keterangan </label>
                            <input type = "text" disabled name = "keterangan" value ="<?= $this->uri->segment(3) ?  @$d['keterangan'] : set_value('nama')?>" class= "form-control">
                            <span class="help-block"> <?=form_error('keeterangan')?> </span>
                    </div>
                    <?php if($id != "3") { ?>
                    <div class =" form-group <?=form_error('rupiah') ? 'has-error' : null?> ">
                            <label>Jumlah * </label>
                            <input type = "text" class="form-control money" placeholder="Edit Master data..." id = "rupiah" name = "rupiah" value ="" class= "form-control">
                            <span class="help-block"> <?=form_error('rupiah')?> </span>
                    </div>
                    <?php } ?>
                    <?php if($id == "3") { ?>
                    <div class =" form-group <?=form_error('jumlah') ? 'has-error' : null?> ">
                            <label>Jumlah * </label>
                            <input type = "text" class="form-control money" placeholder="Edit Master data..." id = "jumlah" name = "jumlah" value ="" class= "form-control">
                            <span class="help-block"> <?=form_error('jumlah')?> </span>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                            <button type ="submit" class="btn btn-success btn-flat ">
                            <i class ="fa fa-paper-plane"></i>save</button>
                            <button type ="reset"  class="btn btn-danger btn-flat ">
                            Reset</button>
                    </div>
                   
                
                    </form>
                    <script type="text/javascript">
		
                        var rupiah = document.getElementById('rupiah');
                        rupiah.addEventListener('keyup', function(e){
                            // tambahkan 'Rp.' pada saat form di ketik
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            rupiah.value = formatRupiah(this.value, 'Rp. ');
                        });

                        /* Fungsi formatRupiah */
                        function formatRupiah(angka, prefix){
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if(ribuan){
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                        }
                    </script>
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
   