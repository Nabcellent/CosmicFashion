<?php

use Carbon\Carbon;

?>
<footer class="Footer_footer__3eK23">
	<div class="container">
		<div class="justify-content-between row">
			<div class="col-md-5 col-xl-5"><h5 class="text-white fw-bold">Subscribe</h5>
				<p class="text-muted mt-3">Do you want to receive exclusive email offers? Subscribe to our newsletter! You will receive a unique
					promo code which gives you a 20% discount on all our products in 10 minutes.</p></div>
			<div class="d-flex align-items-center col-md-7 col-xl-5">
				<input type="email" placeholder="Enter your email" style="height:40px" class="me-3 border-0 form-control"/>
				<button class="fw-bold btn btn-primary">Subscribe</button>
			</div>
		</div>
		<hr class="Footer_footer__hr__12sEu"/>
		<div class="my-5 justify-content-between row">
			<div class="d-flex flex-column justify-content-between col-md-3 col-xl-5">
				<div>
					<h5 class="text-white fw-bold mb-4"><?= env('app.name', 'CosmicFashion.') ?></h5>
					<p class="text-white fw-thin mb-0">Lorem Ipsum has been the industry&#x27;s standard dummy text ever since the 1500s,</p>
				</div>
				<div class="Footer_socialLinks__1Ix7R">
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<i class="fab fa-google fs-20"></i>
					</a>
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<i class="fab fa-twitter fs-20"></i>
					</a>
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<i class="fab fa-linkedin-in fs-20"></i>
					</a>
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<i class="fab fa-facebook fs-20"></i>
					</a>
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<i class="fab fa-github fs-20"></i>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-9 col-xl-7">
				<div class="Footer_linksRow__sSh1A row">
					<div class="col-12 col-sm-6 col-md-4">
						<h5 class="text-white fw-bold text-uppercase mb-4">company</h5>
						<h6 class="mb-3 Footer_navigationLink__1OSze">What We Do</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Available Services</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Latest Posts</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">FAQs</h6></div>
					<div class="col-12 col-sm-6 col-md-4">
						<h5 class="text-white fw-bold text-uppercase mb-4">my account</h5>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Sign In</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze"><a href="<?= route_to('cart') ?>">View Cart</a></h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze"><a href="<?= route_to('user.account') ?>">Account</a></h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Help &amp; Support</h6></div>
					<div class="col-12 col-sm-6 col-md-4">
						<h5 class="text-white fw-bold text-uppercase text-nowrap mb-4">customer service</h5>
						<h6 class="mb-3 Footer_navigationLink__1OSze"><a href="<?= route_to('contact_us') ?>">Help &amp; Contact Us</a></h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Returns &amp; Refunds</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Online Stores</h6>
						<h6 class="mb-3 Footer_navigationLink__1OSze">Terms &amp; Conditions</h6></div>
				</div>
			</div>
		</div>
		<hr class="Footer_footer__hr__12sEu mb-0"/>
		<div style="padding:30px 0" class="row">
			<div class="col-sm-12">
				<p class="text-muted mb-0">© <?= Carbon::now()->year . " ~ " . Carbon::now()->addYear()->year ?> powered by
					<span class="Footer_navigationLink__1OSze"><?= env('app.name', 'CosmicFashion.') ?></span>
				</p>
			</div>
		</div>
	</div>
</footer>