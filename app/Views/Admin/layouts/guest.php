<!DOCTYPE html>
<html lang="en-GB">
<head>
	<!-- ===============================================-->
	<!--    Favicons-->
	<!-- ===============================================-->
	<link rel="apple-touch-icon" sizes="180x180" href="/images/dash/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/dash/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/dash/favicons/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="/images/dash/favicons/favicon.ico">
	<link rel="manifest" href="/images/dash/favicons/manifest.json">
	<meta charset="UTF-8">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="msapplication-TileImage" content="/images/dash/favicons/mstile-150x150.png">
	<meta name="theme-color" content="#ffffff">

	<!-- ===============================================-->
	<!--    Document Title-->
	<!-- ===============================================-->
	<title><?= env('app.name', 'CosmicFashion.') . ($title ?? '') ?></title>
	<script src="/js/admin/config.js"></script>
	<script src="/vendor/admin/overlayscrollbars/OverlayScrollbars.min.js"></script>

	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- ===============================================-->
	<!--    Stylesheets-->
	<!-- ===============================================-->
    <?= $this->include('Admin/partials/links') ?>

	<link rel="stylesheet" href="">

	<script src="/vendor/jquery/jquery.js"></script>
	<script src="/vendor/toastify/toastify.min.js"></script>
	<script>
        let isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            let linkDefault = document.getElementById('style-default');
            let userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            let linkRTL = document.getElementById('style-rtl');
            let userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
	</script>
</head>
<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<?= $this->renderSection('content') ?>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?= $this->include('Admin/partials/navs/customize') ?>

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->

<?= $this->include('Admin/partials/scripts') ?>

</body>
</html>
