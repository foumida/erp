<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class="container">
   <div class="row">
                <div class="col-lg-12">
<div class="alert alert-danger" role="alert">Oops! You are not allowed to access this page.</div>
</div>
</div>
</div>
<?= $this->endSection() ?>