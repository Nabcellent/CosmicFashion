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
	<title><?= env('app.name.short', 'CF.') ?><?= $this->renderSection('title') ?></title>

	<!-- ===============================================-->
	<!--    Stylesheets-->
	<!-- ===============================================-->
    <?= $this->include('Admin/partials/links') ?>

	<script src="/vendor/jquery/jquery.js"></script>
	<script src="/vendor/toastify/toastify.min.js"></script>
	<script src="/js/admin/config.js"></script>
	<script src="/vendor/admin/overlayscrollbars/OverlayScrollbars.min.js"></script>
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
<main class="main" id="top">
	<div class="container" data-layout="container">
		<script>
            let isFluid = JSON.parse(localStorage.getItem('isFluid'));

            if (isFluid) {
                let container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
		</script>

        <?= $this->include('Admin/partials/navs/vertical_top') ?>

		<div class="content">

            <?= $this->include('Admin/partials/navs/combo_top') ?>
			<script>
                let navbarPosition = localStorage.getItem('navbarPosition');
                let navbarVertical = document.querySelector('.navbar-vertical');
                let navbarTopVertical = document.querySelector('.content .navbar-top');
                let navbarTop = document.querySelector('[data-layout] .navbar-top');
                let navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

                if (navbarPosition === 'top') {
                    navbarTop.removeAttribute('style');
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarVertical.remove(navbarVertical);
                    navbarTopCombo.remove(navbarTopCombo);
                } else if (navbarPosition === 'combo') {
                    navbarVertical.removeAttribute('style');
                    navbarTopCombo.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopVertical.remove(navbarTopVertical);
                } else {
                    navbarVertical.removeAttribute('style');
                    navbarTopVertical.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopCombo.remove(navbarTopCombo);
                }
			</script>
			<!-- ===============================================-->
			<!--    Main Content-->
			<!-- ===============================================-->
            <?= $this->renderSection('content') ?>
			<!-- ===============================================-->
			<!--    End of Main Content-->
			<!-- ===============================================-->

            <?= $this->include('Admin/partials/footer') ?>

		</div>
	</div>
</main>
<?= $this->include('Admin/partials/navs/customize') ?>

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<?= $this->include('partials/javascript') ?>

<?= $this->include('Admin/partials/scripts') ?>

</body>
</html>
