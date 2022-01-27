<div class="Sidebar_sidebarClose__3lZVO Sidebar_sidebarWrapper__2MEYt">
	<nav class="Sidebar_root__3jtoJ">
		<header class="Sidebar_logo__3dQYJ"><span class="Sidebar_logoStyle__2aDEc mx-1">Flatlogic<i>.</i></span>
		</header>
		<ul class="Sidebar_nav__B5P8m">
			<li class="link-wrapper LinksGroup_headerLink__3Z-8d"><a href="index.html"><span
							class="LinksGroup_iconWrapper__OROnE"></span>Home
				</a></li>
			<li class="link-wrapper LinksGroup_headerLink__3Z-8d"><a class="d-flex" style="padding-left:33px"><span
							class="icon LinksGroup_icon__d1a94"><i class="fi undefined"></i></span>Pages <b
							class="la la-angle-left LinksGroup_caret__2n6pe"></b></a>
				<div class="LinksGroup_panel__-o532 collapse">
					<ul>
						<li><a href="about.html">About Us </a></li>
						<li><a href="about-team.html">About Team </a></li>
						<li><a href="contact.html">Contact Us </a></li>
						<li><a href="faq.html">FAQ </a></li>
						<li><a href="error.html">404 </a></li>
						<li><a href="wishlist.html">Wishlist </a></li>
						<li><a href="login.html">Login </a></li>
					</ul>
				</div>
			</li>
			<li class="link-wrapper LinksGroup_headerLink__3Z-8d"><a class="d-flex" style="padding-left:33px"><span
							class="icon LinksGroup_icon__d1a94"><i class="fi undefined"></i></span>Shop <b
							class="la la-angle-left LinksGroup_caret__2n6pe"></b></a>
				<div class="LinksGroup_panel__-o532 collapse">
					<ul>
						<li><a href="shop.html">Shop </a></li>
						<li><a href="categories.html">Categories </a></li>
						<li><a href="account.html">Account </a></li>
					</ul>
				</div>
			</li>
			<li class="link-wrapper LinksGroup_headerLink__3Z-8d"><a class="d-flex" style="padding-left:33px"><span
							class="icon LinksGroup_icon__d1a94"><i class="fi undefined"></i></span>Blog <b
							class="la la-angle-left LinksGroup_caret__2n6pe"></b></a>
				<div class="LinksGroup_panel__-o532 collapse">
					<ul>
						<li><a href="blog.html">Blog </a></li>
						<li><a href="blog/article.html">Article </a></li>
					</ul>
				</div>
			</li>
		</ul>
		<div class="Sidebar_accountBtn__3HGK_"><a href="account.html">My Account</a></div>
	</nav>
</div>

<nav class="Header_header__4PQyW navbar">
	<div class="container">
		<div class="d-flex align-items-center">
			<img class="me-2" src="/images/dash/icons/spot-illustrations/falcon.png" alt="" width="25">
			<a href="<?= route_to('home') ?>" class="navbar-brand">
				<span class="Header_logoStyle__1knHi"><?= env('app.name', 'CosmicFashion.') ?></span>
			</a>
		</div>
		<nav class="Header_nav__csVkV">
			<ul class="Header_nav__menu__JHVR4">
				<li class="Header_nav__menuItem__2jcMl" style="width: 90px;">
					<a href="<?= route_to('home') ?>" class="Header_dropdownItem__6boOk">Home</a>
				</li>
				<li class="Header_nav__menuItem__2jcMl" style="width: 90px;">
					<a href="<?= route_to('shop.index') ?>" class="Header_dropdownItem__6boOk">Shop</a>
				</li>
			</ul>
		</nav>
		<ul class="nav">
			<li class="d-flex align-items-center nav-item">
				<div class="border-0 p-3"><i class="fas fa-search"></i></div>
				<div class="border-0 p-3 position-relative cart-total" title="Total ~ KSH.<?= cartDetails('total') ?>"
				     data-bs-toggle="tooltip" data-bs-placement="bottom">
					<span class="position-absolute top-0 fs-10 end-0 pt-2 pe-2 cart-count">
						<?= cartDetails('count') ?: '' ?>
					</span>
					<a href="<?= route_to('cart') ?>"><i class="fab fa-opencart"></i></a>
				</div>
                <?php if(logged_in()): ?>
					<div class="border-0 p-3 dropstart">
						<a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-user" title="<?= user()->first_name . " " . user()->last_name ?>"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?= route_to('user.index') ?>">Profile</a></li>
							<li><a class="dropdown-item" href="<?= route_to('user.account') ?>">Account</a></li>
							<li><a class="dropdown-item" href="<?= route_to('orders.index') ?>">Checkout</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
                            <?php if(isAdmin()): ?>
								<li><a class="dropdown-item" href="<?= route_to('dashboard') ?>">Dashboard</a></li>
                            <?php endif ?>
							<li><a class="dropdown-item" href="<?= route_to('logout') ?>">Sign Out</a></li>
						</ul>
					</div>
                <?php else: ?>
					<a href="<?= route_to('login') ?>" class="link-primary ms-2">Sign In</a>
                &nbsp; |
					<a href="<?= route_to('register') ?>" class="link-primary ms-2">Sign Up</a>
                <?php endif; ?>
			</li>
		</ul>
	</div>
</nav>