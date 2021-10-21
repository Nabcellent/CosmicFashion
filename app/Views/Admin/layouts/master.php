<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= env('app.name', 'CosmicFashion.') . ($title ?? '') ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../../assets/images/favicon.png"/>

    <?= $this->include('Admin/partials/links') ?>
</head>
<body>

<!--    ------------------------------------------------ preloader -->
<div class="preloader">
	<img src="/images/vetra/logo.svg" alt="logo">
	<div class="preloader-icon"></div>
</div>
<!--    ------------------------------------------------ ./ preloader -->

<!--    ------------------------------------------------ sidebars -->

<!-- notifications sidebar -->
<?= $this->include('Admin/partials/sidebars/notifications') ?>
<!-- ./ notifications sidebar -->

<!-- settings sidebar -->
<?= $this->include('Admin/partials/sidebars/settings') ?>
<!-- ./ settings sidebar -->

<!-- search sidebar -->
<?= $this->include('Admin/partials/sidebars/search') ?>
<!-- ./ search sidebar -->

<!--    ------------------------------------------------ ./ sidebars -->

<!-- menu -->
<?= $this->include('Admin/partials/menu') ?>
<!-- ./  menu -->

<?= $this->renderSection('content') ?>


<?= $this->include('Admin/partials/scripts') ?>
</body>
</html>
