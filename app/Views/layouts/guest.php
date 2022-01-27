<!doctype html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= env('app.name', 'CosmicFashion.') . ($title ?? '') ?></title>

	<link rel="apple-touch-icon" sizes="180x180" href="/images/dash/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/dash/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/dash/favicons/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="/images/dash/favicons/favicon.ico">
	<link rel="manifest" href="/images/dash/favicons/manifest.json">

    <?= $this->include('partials/links') ?>

	<link rel="stylesheet" href="/css/auth.css">

	<script src="/vendor/jquery/jquery.js"></script>
	<script src="/vendor/toastify/toastify.min.js"></script>
</head>
<body>

<div id="__next">
	<div style="height:100vh" class="no-gutters row">

        <?= $this->renderSection('content') ?>

	</div>
</div>

<?= $this->include('partials/javascript') ?>

<!-- SCRIPTS -->
<script>
    $(document).on('click', '.show-password', function() {
        if($(this).prev().prop('type') === 'password') {
            $(this).html(`<i class="bi bi-eye-slash-fill"></i>`)
            $(this).prev().prop('type', 'text')
        } else {
            $(this).html(`<i class="bi bi-eye"></i>`)
            $(this).prev().prop('type', 'password')
        }
    })
</script>

<?= $this->include('partials/scripts') ?>
<!-- -->

</body>
</html>