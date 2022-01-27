<?php if(session()->has('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show rounded-0 py-1 ps-4" role="alert">
        <?= session('message') ?>
		<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if(session()->has('error')) : ?>
	<div class="alert alert-danger alert-dismissible fade show rounded-0 py-1 ps-4" role="alert">
        <?= session('error') ?>
		<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if(session()->has('errors')) : ?>
	<ul class="alert alert-danger alert-dismissible fade show rounded-0 py-1 ps-4">
        <?php foreach(session('errors') as $error) : ?>
			<li><?= $error ?></li>
			<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endforeach ?>
	</ul>
<?php endif ?>

<!--<ul class="alert alert-danger alert-dismissible fade show rounded-0 py-1 ps-4">

		<li>'sas'</li>
		<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>

</ul>-->