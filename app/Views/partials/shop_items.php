
<div class="row">
    <?php foreach($products as $product): ?>
        <div class="mb-4 Shop_product__1cFbR col-12 col-md-6 col-lg-4" data-aos="fade-up">
            <div class="position-relative">
                <a href="<?= route_to('shop.show', $product->id) ?>">
                    <div class="Shop_productImage__1ILty"
                         style="background-image: url(/images/products/<?= $product->image ?>)"></div>
                </a>
                <div class="d-flex flex-column justify-content-center position-absolute h-100 top-0 Shop_product__actions__1VOlb"
                     style="right:15px">
                    <button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
                        <div class="mb-4 Shop_product__actions__heart__sBlRs"></div>
                    </button>
                    <button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
                        <div class="mb-4 Shop_product__actions__max__gkHwK"></div>
                    </button>
                    <button type="button" class="p-0 bg-transparent border-0 btn btn-secondary">
                        <div class="mb-4 Shop_product__actions__cart__2rrU7"></div>
                    </button>
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