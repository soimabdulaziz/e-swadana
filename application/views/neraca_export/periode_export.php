<section class="content-header">
<h1>
     
       Export Neraca
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Export Neraca</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

        <div class="box">
          <div class="box-header">
          <h3 class="box-title"> </h3>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php
                      
                    ?>
                    
                    <?php 
                      $trs = $this->uri->segment(5);
                      $id = $this->uri->segment(4);
                      $id_agt = $this->uri->segment(3);
                   
                        echo form_open('Export_neraca/Export/');
               
                    
                     ?>
                    <div class="form-group">
                        <label>Pilih Bulan</label>
                        <select class="form-control" name="bulan" id ="bulan" required>
                            <option value="" disabled selected>Bulan Periode...</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            
                        </select>
                </div>
                     
                <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control" name="tahun" id ="tahun" required>
                  <option value="" disabled selected>Tahun Periode...</option>
                    <?php
                     foreach ($tahun as $row) {
                    ?>
                    <option value="<?php echo $row['tahun'];?>"><?php echo $row['tahun'];?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
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
   