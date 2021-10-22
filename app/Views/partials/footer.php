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
				<input type="email" placeholder="Enter your email" style="height:51px" class="mr-3 border-0 form-control"/>
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
				<div class="Footer_socialLinks__1Ix7R"><a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer"
				                                          href="https://flatlogic.com/">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
							      d="M17.4952 13.9805C16.8292 16.1225 15.1692 17.6055 12.9602 17.9325C9.58915 18.4315 6.27915 15.8755 6.01715 12.4755C5.74515 8.94749 8.52815 6.00049 12.0012 6.00049C12.8042 6.00049 13.5702 6.15849 14.2702 6.44449C14.5132 6.54349 14.7882 6.45849 14.9122 6.22849L16.3472 3.58149C16.4832 3.32849 16.3852 3.00249 16.1232 2.88449C14.8662 2.31649 13.4722 2.00049 12.0042 2.00049C6.38215 2.00049 1.84315 6.63649 2.00415 12.2935C2.15115 17.4545 6.41115 21.7725 11.5682 21.9915C17.1142 22.2255 21.7142 17.9455 21.9932 12.5225C22.0042 12.3245 22.0002 11.1715 21.9962 10.4955C21.9952 10.2195 21.7712 10.0005 21.4962 10.0005H12.4972C12.2212 10.0005 11.9972 10.2235 11.9972 10.5005V13.4805C11.9972 13.7555 12.2212 13.9805 12.4972 13.9805H17.4952Z"
							      fill="currentColor"></path>
							<mask id="mask333" mask-type="alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="21" height="21">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M17.4952 13.9805C16.8292 16.1225 15.1692 17.6055 12.9602 17.9325C9.58915 18.4315 6.27915 15.8755 6.01715 12.4755C5.74515 8.94749 8.52815 6.00049 12.0012 6.00049C12.8042 6.00049 13.5702 6.15849 14.2702 6.44449C14.5132 6.54349 14.7882 6.45849 14.9122 6.22849L16.3472 3.58149C16.4832 3.32849 16.3852 3.00249 16.1232 2.88449C14.8662 2.31649 13.4722 2.00049 12.0042 2.00049C6.38215 2.00049 1.84315 6.63649 2.00415 12.2935C2.15115 17.4545 6.41115 21.7725 11.5682 21.9915C17.1142 22.2255 21.7142 17.9455 21.9932 12.5225C22.0042 12.3245 22.0002 11.1715 21.9962 10.4955C21.9952 10.2195 21.7712 10.0005 21.4962 10.0005H12.4972C12.2212 10.0005 11.9972 10.2235 11.9972 10.5005V13.4805C11.9972 13.7555 12.2212 13.9805 12.4972 13.9805H17.4952Z"
								      fill="currentColor"></path>
							</mask>
							<g mask="url(#mask333)">
								<rect width="24" height="24" fill="currentColor"></rect>
							</g>
						</svg>
					</a><a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://twitter.com/flatlogic">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
							      d="M8.07693 20.0003C15.3229 20.0003 19.5149 14.3743 19.5149 9.03528C19.5149 8.88828 20.5449 8.00428 20.9859 6.16128C21.0759 5.78728 20.7119 5.49228 20.3689 5.64928C19.4889 6.05328 18.5959 5.73328 18.2079 5.27328C16.7159 3.64628 14.2209 3.56828 12.6339 5.09828C11.6109 6.08528 11.1769 7.55528 11.4939 8.95828C8.14293 9.19728 5.84193 7.60928 3.94993 5.43228C3.70593 5.14928 3.25293 5.29828 3.20193 5.67228C2.92193 7.75428 2.83393 12.8163 7.84993 15.7233C6.97893 16.9753 5.27393 17.7143 3.37593 18.0313C2.95593 18.1023 2.85593 18.6843 3.23993 18.8723C4.74393 19.6123 6.39693 19.9993 8.07693 19.9973"
							      fill="currentColor"></path>
							<mask id="mask331" mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="4" width="18" height="17">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M8.07693 20.0003C15.3229 20.0003 19.5149 14.3743 19.5149 9.03528C19.5149 8.88828 20.5449 8.00428 20.9859 6.16128C21.0759 5.78728 20.7119 5.49228 20.3689 5.64928C19.4889 6.05328 18.5959 5.73328 18.2079 5.27328C16.7159 3.64628 14.2209 3.56828 12.6339 5.09828C11.6109 6.08528 11.1769 7.55528 11.4939 8.95828C8.14293 9.19728 5.84193 7.60928 3.94993 5.43228C3.70593 5.14928 3.25293 5.29828 3.20193 5.67228C2.92193 7.75428 2.83393 12.8163 7.84993 15.7233C6.97893 16.9753 5.27393 17.7143 3.37593 18.0313C2.95593 18.1023 2.85593 18.6843 3.23993 18.8723C4.74393 19.6123 6.39693 19.9993 8.07693 19.9973"
								      fill="currentColor"></path>
							</mask>
							<g mask="url(#mask331)">
								<rect width="24" height="24" fill="currentColor"></rect>
							</g>
						</svg>
					</a>
					<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer"
				           href="https://www.linkedin.com/company/flatlogic/">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
							      d="M3.00003 5.25C3.00003 4.008 4.00803 3 5.25003 3C6.49203 3 7.50003 4.008 7.50003 5.25C7.50003 6.492 6.49203 7.5 5.25003 7.5C4.00803 7.5 3.00003 6.492 3.00003 5.25ZM15.1504 8.4004C11.9194 8.4004 9.29943 11.0044 9.29943 14.2144V20.0994C9.29943 20.5964 9.70343 21.0004 10.2004 21.0004H12.2994C12.7964 21.0004 13.2004 20.5964 13.2004 20.0994V14.2144C13.2004 13.0784 14.1844 12.1704 15.3524 12.2874C16.3664 12.3884 17.0994 13.3154 17.0994 14.3344V20.0994C17.0994 20.5964 17.5034 21.0004 18.0004 21.0004H20.0994C20.5964 21.0004 21.0004 20.5964 21.0004 20.0994V14.2144C21.0004 11.0044 18.3804 8.4004 15.1504 8.4004ZM6.59963 9.2998H3.90063C3.40363 9.2998 2.99963 9.7028 2.99963 10.1998V20.0998C2.99963 20.5968 3.40363 20.9998 3.90063 20.9998H6.59963C7.09663 20.9998 7.49963 20.5968 7.49963 20.0998V10.1998C7.49963 9.7028 7.09663 9.2998 6.59963 9.2998Z"
							      fill="currentColor"></path>
							<mask id="mask332" mask-type="alpha" maskUnits="userSpaceOnUse" x="2" y="3" width="20" height="19">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M3.00003 5.25C3.00003 4.008 4.00803 3 5.25003 3C6.49203 3 7.50003 4.008 7.50003 5.25C7.50003 6.492 6.49203 7.5 5.25003 7.5C4.00803 7.5 3.00003 6.492 3.00003 5.25ZM15.1504 8.4004C11.9194 8.4004 9.29943 11.0044 9.29943 14.2144V20.0994C9.29943 20.5964 9.70343 21.0004 10.2004 21.0004H12.2994C12.7964 21.0004 13.2004 20.5964 13.2004 20.0994V14.2144C13.2004 13.0784 14.1844 12.1704 15.3524 12.2874C16.3664 12.3884 17.0994 13.3154 17.0994 14.3344V20.0994C17.0994 20.5964 17.5034 21.0004 18.0004 21.0004H20.0994C20.5964 21.0004 21.0004 20.5964 21.0004 20.0994V14.2144C21.0004 11.0044 18.3804 8.4004 15.1504 8.4004ZM6.59963 9.2998H3.90063C3.40363 9.2998 2.99963 9.7028 2.99963 10.1998V20.0998C2.99963 20.5968 3.40363 20.9998 3.90063 20.9998H6.59963C7.09663 20.9998 7.49963 20.5968 7.49963 20.0998V10.1998C7.49963 9.7028 7.09663 9.2998 6.59963 9.2998Z"
								      fill="currentColor"></path>
							</mask>
							<g mask="url(#mask332)">
								<rect width="24" height="24" fill="currentColor"></rect>
							</g>
						</svg>
					</a>
						<a class="Footer_socialLink__2wEBV" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/flatlogic/">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
							      d="M17 3.5C17 3.224 16.775 3 16.5 3H14C11.238 3 9 5.015 9 7.5V10.2H6.5C6.224 10.2 6 10.424 6 10.7V13.3C6 13.576 6.224 13.8 6.5 13.8H9V20.5C9 20.776 9.224 21 9.5 21H12.5C12.775 21 13 20.776 13 20.5V13.8H15.619C15.844 13.8 16.041 13.65 16.102 13.434L16.823 10.834C16.912 10.516 16.672 10.2 16.342 10.2H13V7.5C13 7.003 13.447 6.6 14 6.6H16.5C16.775 6.6 17 6.376 17 6.1V3.5Z"
							      fill="currentColor"></path>
							<mask id="mask334" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="3" width="11" height="18">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M17 3.5C17 3.224 16.775 3 16.5 3H14C11.238 3 9 5.015 9 7.5V10.2H6.5C6.224 10.2 6 10.424 6 10.7V13.3C6 13.576 6.224 13.8 6.5 13.8H9V20.5C9 20.776 9.224 21 9.5 21H12.5C12.775 21 13 20.776 13 20.5V13.8H15.619C15.844 13.8 16.041 13.65 16.102 13.434L16.823 10.834C16.912 10.516 16.672 10.2 16.342 10.2H13V7.5C13 7.003 13.447 6.6 14 6.6H16.5C16.775 6.6 17 6.376 17 6.1V3.5Z"
								      fill="currentColor"></path>
							</mask>
							<g mask="url(#mask334)"><rect width="24" height="24" fill="currentColor"></rect></g>
						</svg>
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
				<p class="text-muted mb-0">© <?= Carbon::now()->year . " ~ " . Carbon::now()->addYear()->year?> powered by
					<span class="Footer_navigationLink__1OSze"><?= env('app.name', 'CosmicFashion.') ?></span>
				</p>
			</div>
		</div>
	</div>
</footer>