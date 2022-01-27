<?= $this->include('Admin/partials/navs/search') ?>

<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;" data-move-target="#navbarVerticalNav" data-navbar-top="combo">
	<button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse"
	        data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
		<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
	</button>

    <?= $this->include('Admin/partials/navs/repeats/top_nav_list') ?>
</nav>