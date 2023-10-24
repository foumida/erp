<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
		<?= view('Auth\Views\_notifications') ?>
                <h1>Reset Password</h1>
		<form method="POST" action="<?= site_url('forgot-password'); ?>" accept-charset="UTF-8"
	onsubmit="submitButton.disabled = true; return true;">
	<?= csrf_field() ?>
                <p class="text-muted">Forgotten password?</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend"><span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg></span></div>
                  <input class="form-control" type="text" placeholder="Enter your e-mail address">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Submit</button>
                  </div>
                  <div class="col-6 text-right">
                  </div>
                </div>
		</form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>CMS Business Administration</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?= $this->endSection() ?>