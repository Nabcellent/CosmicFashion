<?= $this->extend('layouts/master') ?>
<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/admin/flatpickr/flatpickr.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div id="shop">
		<div class="container">
			<div>
				<nav style="margin-top:60px;border-bottom:;margin-bottom:0" aria-label="breadcrumb">
					<div class="breadcrumb"></div>
				</nav>
			</div>
		</div>

		<div style="margin-top:32px" class="mb-5 container">
			<div class="row">

				<div class="Shop-filter-column  col-sm-3">
                    <?= $this->include('partials/filters') ?>
				</div>

				<div class="col-sm-9">
					<div class="d-flex justify-content-between align-items-center" style="margin-bottom:50px">
						<div class="d-flex align-items-center">
							Showing
							<select name="per_page" id="per_page" class="form-control mx-1" style="appearance: none;" aria-label>
								<option value="10">10</option>
								<option selected value="<?= $products->count() ?>"><?= $products->count() ?></option>
								<option value="20">20</option>
								<option value="50">50</option>
							</select>
							of
							<span class="fw-bold text-primary mx-1"><?= $products->total() ?></span> Products
						</div>
						<div class="d-flex align-items-center">
							<h6 class="text-nowrap me-3 mb-0">Sort by:</h6>
							<select id="sort-by" style="width:180px" class="form-control" aria-label="">
								<option selected hidden value="">Sort By...</option>
								<option value="oldest">Oldest first</option>
								<option value="newest">Newest first</option>
								<option value="price_asc">Price: low to high</option>
								<option value="price_desc">Price: high to low</option>
							</select>
						</div>
					</div>

					<div id="products">

						<?= $this->include('partials/shop_items') ?>

					</div>
				</div>
			</div>
		</div>

        <?= $this->include('partials/info_block') ?>
        <?= $this->include('partials/social') ?>
	</div>

<?= $this->section('scripts') ?>
	<script src="/js/admin/flatpickr.js"></script>
	<script>
        /**==============================================================================  Pagination   */
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let ajaxUrl = '/get-filtered-products?page=' + page;
            getProducts(ajaxUrl);
        });

        /**==============================================================================  Sorting   */
        $(document).on('change', '#sort-by', function () {
            getProducts('<?= route_to('shop.filter') ?>?page=1');
        });

        /**==============================================================================  Filter Categories   */
        $(document).on('click', '.filter-check', function () {
            getProducts();
        });

        /**=======================================================================  Change Products Per Page   */
        $(document).on('change', '#per_page', () => {
            getProducts();
        });

        const getProducts = (url = '<?= route_to('shop.filter') ?>') => {
            $('#loader').show();

            let sort = $('#sort-by').val(),
	            perPage = parseInt($('#per_page').val());

            let category = getFilterText('category'),
	            subCategory = getFilterText('sub-category'),
	            priceRange = [parseInt($('#minPrice').val()), parseInt($('#maxPrice').val())];

            $.ajax({
                data: {
                    sort,
                    perPage,
                    category,
                    subCategory,
                    priceRange,
                },
                type: 'GET',
                url: url,
	            dataType: 'json',
                success: function (response) {
                    console.log(response)
	                return;
                    $('#product_section').html(response.view);
                    $('#productCount span').text(response.count);
                    $('#loader').hide();

                    if ($('.product_check:checked').length > 0) {
                        $('#textChange').text('Filtered Products');
                    } else {
                        $('#textChange').text('All Products');
                    }
                }
            })
        }

        function getFilterText(text_id) {
            let filterData = [];

            $('.fil-' + text_id + ':checked').each(function () {
                filterData.push($(this).val());
            });
            return filterData;
        }
	</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>