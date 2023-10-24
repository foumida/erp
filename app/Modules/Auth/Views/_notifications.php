<?php if (session()->has('success')) : ?>
	<ul class="noty_elem">
    	<li class="i_noty">
    	<p>
    		<?= session('success') ?>
    	</p>
    	</li>
	</ul>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <ul class="noty_elem">
    	<li class="i_noty">
    	<p>
    		<?= session('error') ?>
    	</p>
    	</li>
	</ul>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <ul class="noty_elem">
    <?php foreach (session('errors') as $error) : ?>
        <li class="i_noty">
    	<p><?= $error ?></p>
    	</li>
    <?php endforeach ?>
    </ul>
<?php endif ?>
