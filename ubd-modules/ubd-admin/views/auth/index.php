<div class="login-box">

	<?php if ($this->session->flashdata()): ?>
	<div class="alert alert-<?=$this->session->flashdata('ResponColor');?> alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> <?= $this->session->flashdata('ResponTitle'); ?></h4>
		<?= $this->session->flashdata('ResponMesage'); ?>
	</div>
	<?php endif ?>

  <div class="login-logo">
    <a href=""><b>UBD</b> - CMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?=base_url('ubd-admin/auth/check_login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
      	<?php echo $captcha; ?>&nbsp;&nbsp;
      	<a href=""><i class="glyphicon glyphicon-refresh"></i></a>
      </div>

      <div class="form-group has-feedback">
      	<input type="text" name="captcha" class="form-control" placeholder="Captcha">
      	<span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>

<!-- jQuery 2.2.3 -->
<script src="<?= $this->ubd_adminassetspath->assets('plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= $this->ubd_adminassetspath->assets('js/bootstrap.min.js') ?>"></script>