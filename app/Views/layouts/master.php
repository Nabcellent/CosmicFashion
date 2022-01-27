<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= env('app.name', 'CosmicFashion.') . ($title ?? '') ?></title>

	<link rel="apple-touch-icon" sizes="180x180" href="/images/dash/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/dash/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/dash/favicons/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="/images/dash/favicons/favicon.ico">
	<link rel="manifest" href="/images/dash/favicons/manifest.json">

	<link rel="stylesheet" href="/css/second.css">
	<link rel="stylesheet" href="/css/shop.css">
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/style.css">

	<!-- STYLES -->
    <?= $this->include('partials/links') ?>

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

<?= $this->include('partials/javascript') ?>
<?= $this->include('partials/scripts') ?>

<!-- -->

</body>
</html>
