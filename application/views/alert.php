<?php if ($this->session->has_userdata('success')) {?>
<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          <?=$this->session->flashdata('success');?>
    </div>
<?php }   ?>
<?php if ($this->session->has_userdata('delete')) {?>
<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-trash"></i> Success!</h4>
          <?=$this->session->flashdata('delete');?>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('warning')) {?>
<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Penarikan Gagal!</h4>
          <?=$this->session->flashdata('warning');?>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('gagal')) {?>
<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Transaksi Gagal!</h4>
          <?=$this->session->flashdata('gagal');?>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('pembayaran')) {?>
<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Pembayaran Gagal!</h4>
          <?=$this->session->flashdata('pembayaran');?>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('danger')) {?>
<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          <?=$this->session->flashdata('danger');?>
    </div>
<?php } ?>