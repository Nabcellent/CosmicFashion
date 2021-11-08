<?= $this->section('links') ?>
	<link rel="stylesheet" href="/vendor/ionrangeslider/ion.rangeSlider.min.css">
<?= $this->endSection() ?>

	<div id="filters">
		<div class="Shop_filterTitle__3AbWn">
			<h5 class="fw-bold mb-5 text-uppercase">Categories</h5><span>✕</span>
		</div>

		<ul class="list-group list-group-flush accordion" id="categories-filter-parent">

            <?php $i = 0;
            foreach($categories as $category): ?>
				<li class="list-group-item accordion-item p-0 bg-transparent border-0">
					<h2 class="accordion-header" id="heading<?= $category->id ?>">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
						        data-bs-target="#collapse<?= $category->id ?>" aria-expanded="true">
                            <?= $category->name ?>
						</button>
					</h2>
					<div id="collapse<?= $category->id ?>"
					     class="accordion-collapse collapse <?= $i === 0
                             ? 'show'
                             : '' ?>"
					     aria-labelledby="heading<?= $category->id ?>" data-bs-parent="#categories-filter-parent">
						<div class="accordion-body">
                            <?php foreach($category->subCategories as $subCategory): ?>
								<div class="form-check">
									<input class="form-check-input filter-check" type="checkbox" value=""
									       id="check-<?= $subCategory->id ?>">
									<label class="form-check-label"
									       for="check-<?= $subCategory->id ?>"><?= $subCategory->name ?></label>
								</div>
                            <?php endforeach; ?>
						</div>
					</div>
				</li>
                <?php $i++;
            endforeach; ?>

		</ul>

		<h5 class="fw-bold mb-5 mt-5 text-uppercase">Price</h5>
		<div id="price-range">
			<div>
				<input type="text" class="js-range-slider" name="my_range" value="" aria-label/>
			</div>
			<div class="row align-items-center mt-1">
				<div class="col pe-1">
					<input type="number" id="minPrice" name="min" min="10" max="10000" aria-label
					       class="form-control text-center border-0 pr-0" value="{{ $minPrice }}">
				</div>
				-
				<div class="col ps-0">
					<input type="number" id="maxPrice" name="max" min="10" max="10000" aria-label
					       class="form-control text-center border-0" value="{{ $maxPrice }}">
				</div>
			</div>
		</div>

		<hr>

		<h5 class="fw-bold mb-5 mt-5 text-uppercase">Dates</h5>
		<div id="date-range">
			<label class="form-label" for="timepicker2">Select Date Range</label>
			<input class="form-control datetimepicker" id="timepicker2" type="text" placeholder="d/m/y to d/m/y"
			       data-options='{"mode":"range","dateFormat":"d/m/y","disableMobile":true}'/>
		</div>
	</div>

<?= $this->section('scripts') ?>
	<script src="/vendor/ionrangeslider/ion.rangeSlider.min.js"></script>
	<script>
        const minPrice = 10,
            maxPrice = 10000;

        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: minPrice,
            max: maxPrice,
            from: minPrice,
            to: maxPrice,
            force_edges: true,
            postfix: '/-',
            values_separator: ' * 👈 👉 * ',
            drag_interval: true,
            onChange: function (data) {
                $('#minPrice').val(data.from);
                $('#maxPrice').val(data.to);
            },
            onFinish: () => getProducts()
        });
	</script>
<?= $this->endSection() ?>