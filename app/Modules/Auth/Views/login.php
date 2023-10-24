<?= $this->extend($config->viewSingle) ?>
<?= $this->section('main') ?>
<div class="login_container">
		<div class="block_container blue_d">
			<?= view('Auth\Views\_notifications') ?>
			<form method="POST" action="<?= site_url('admin/login'); ?>" accept-charset="UTF-8">
		<?= csrf_field() ?>
				<div class="block_form">
					<ul>
						<li class="login_user">
						<input name="email" value="" type="text" required placeholder="Email">
						</li>
						<li class="login_pass">
						<input  name="password" type="password" placeholder="Password" value="" required>
						</li>
					</ul>
					<input class="login_btn blue_lgel" name="" value="Login" type="submit">
				</div>
				<ul class="login_opt_link">
					<li><a href="#">Forgot Password?</a></li>
					<li class="remember_me right">
					<input name="" class="rem_me" type="checkbox" value="checked">
					Remember Me</li>
				</ul>
			</form>
		</div>
	</div>
<?= $this->endSection() ?>