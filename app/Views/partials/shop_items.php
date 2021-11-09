
<div class="row">
    <?php foreach($products as $product): ?>
        <div class="mb-4 index_product__2R5IL col-12 col-md-6 col-lg-4" data-aos="fade-up">
            <div class="position-relative">
                <a href="<?= route_to('shop.show', $product->id) ?>">
                    <div class="Shop_productImage__1ILty"
                         style="background-image: url(/images/products/<?= $product->image ?>)"></div>
                </a>
	            <div class="d-flex flex-column justify-content-center product-actions"
	                 style="position:absolute;height:100%;top:0;right:15px">
		            <a href="javascript:void(0)"
		               class="p-1 mb-4 product-action heart d-flex align-items-center justify-content-center">
			            <i class="bi bi-heart"></i>
		            </a>
		            <a href="javascript:void(0)"
		               class="p-1 mb-4 product-action zoom d-flex align-items-center justify-content-center">
			            <i class="bi bi-zoom-in"></i>
		            </a>
		            <a href="javascript:void(0)" data-id="<?= $product->id ?>"
		               class="p-1 mb-4 product-action cart d-flex align-items-center justify-content-center">
			            <i class="bi bi-cart-plus"></i>
		            </a>
	            </div>
            </div>
            <div class="Shop_productInfo__2QXeb">
                <div>
                    <a class="mt-3 text-muted mb-0 d-inline-block"
                       href="/category/3f3c4e7dc711"><?= $product->subCategory->name ?></a>
                    <a href="<?= route_to('shop.show', $product->id) ?>">
                        <h6 class="fw-bold font-size-base mt-1 fs-16"><?= $product->name ?></h6>
                    </a>
                    <h6 class="fs-16">KSH.<?= $product->price ?></h6>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>