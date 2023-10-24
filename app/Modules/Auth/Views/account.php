<?= $this->extend($config->viewLayout2) ?>
<?= $this->section('main');
?>

<h1 align="center"><?= lang('Auth.accountSettings') ?></h1>

<?= view('Auth\Views\_notifications') ?>
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
<!-- start form -->
<!-- change password -->
<div class="row">
	<div class="col-md-6">
		<form method="POST" action="<?= site_url('change-password'); ?>" accept-charset="UTF-8"
	onsubmit="changePassword.disabled = true; return true;" style="border: 2px solid black;padding: 10px;">

	<?= csrf_field() ?>
	
    <legend>Change password</legend>
	<p>
		<label><?= lang('Auth.currentPassword') ?></label><br />
		<input required type="password" minlength="5" name="password" value="" />
	</p>
	<p>
		<label><?= lang('Auth.newPassword') ?></label><br />
		<input required type="password" minlength="5" name="new_password" value="" />
	</p>
	<p>
		<label><?= lang('Auth.newPasswordAgain') ?></label><br />
		<input required type="password" minlength="5" name="new_password_confirm" value="" />
	</p>
    <p>
        <button name="changePassword" type="submit" class="btn btn-primary"><?= lang('Auth.update') ?></button>
    </p>

</form>

	
</div>
<!-- change password end -->

<!-- change email start -->
<div class="col-md-6">
<form method="POST" action="<?= site_url('account'); ?>" accept-charset="UTF-8"style="border: 2px solid black;padding: 10px;">
	<?= csrf_field() ?>
	<p><legend>Change Email</legend><br>
		<label><?= lang('Auth.name') ?></label><br />

		<input required type="text" name="name" value="<?= $userData['name'];?>" />
	</p>
	<p>
		<label><?= lang('Auth.email') ?></label><br />
		<input disabled type="text" value="<?= $userData['email'];?>" />
	</p><br><br>
    <p>
        <button type="submit" class="btn btn-primary"><?= lang('Auth.update') ?></button>
    </p>
</form>
</div>
</div>
<!-- change email end -->

<!-- form end -->
              </div>
          </div>
      </div>
  </div>
</div>
</div>

<?= $this->endSection() ?>