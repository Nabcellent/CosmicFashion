<div class="Sidebar_sidebarClose__3lZVO Sidebar_sidebarWrapper__2MEYt">
	<nav class="Sidebar_root__3jtoJ">
		<header class="Sidebar_logo__3dQYJ"><span class="Sidebar_logoStyle__2aDEc mx-1">Flatlogic<i>.</i></span></header>
		<ul class="Sidebar_nav__B5P8m">
			<li class="link-wrapper LinksGroup_headerLink__3Z-8d"><a href="index.html"><span class="LinksGroup_iconWrapper__OROnE"></span>Home
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
	<div class="container"><a class="navbar-brand"><span class="Header_logoStyle__1knHi"><?= env('app.name') ?></span></a>
		<nav class="Header_nav__csVkV">
			<ul class="Header_nav__menu__JHVR4">
				<li class="Header_nav__menuItem__2jcMl" style="width: 90px;"><span class="Header_dropdownItem__6boOk">Home</span></li>
				<li class="Header_nav__menuItem__2jcMl" style="width: 90px;"><span class="Header_dropdownItem__6boOk">Shop</span></li>
				<li class="Header_nav__menuItem__2jcMl"><span class="Header_dropdownItem__6boOk">About Us</span></li>
			</ul>
		</nav>
		<ul class="nav">
			<li class="d-flex align-items-center nav-item">
				<div type="button" class=" border-0 p-3">
					<i class="fas fa-search"></i>
				</div>
				<div type="button" class=" border-0 p-3">
					<i class="fab fa-opencart"></i>
				</div>
				<div class=" border-0 p-3 dropstart">
					<a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-user"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li><a class="dropdown-item" href="#">Account</a></li>
						<li><a class="dropdown-item" href="#">Wishlist</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="<?= route_to('logout') ?>">Sign Out</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>