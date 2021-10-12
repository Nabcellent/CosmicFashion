<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= env('app.name', 'CosmicFashion.') . ($title ?? '') ?></title>

	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <?= $this->include('partials/links') ?>
	<link rel="stylesheet" href="/css/second.css">
	<link rel="stylesheet" href="/css/shop.css">
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/style.css">

	<script src="/vendor/jquery/jquery.js"></script>
	<script src="/vendor/toastify/toastify.min.js"></script>
</head>
<body>

<div id="__next">
    <?= $this->include('partials/navbar') ?>
	<main>
		<div class="container">
            <?= $this->renderSection('content') ?>
		</div>
	</main>
    <?= $this->include('partials/footer') ?>
</div>

<!-- SCRIPTS -->

<?= $this->include('partials/scripts') ?>

<!-- -->

</body>
</html>
