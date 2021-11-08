<div id="filters">
	<div class="Shop_filterTitle__3AbWn">
		<h5 class="fw-bold mb-5 text-uppercase">Categories</h5><span>✕</span>
	</div>

	<ul class="list-group list-group-flush accordion" id="categories-filter-parent">

        <?php $i = 0; foreach($categories as $category): ?>
			<li class="list-group-item accordion-item p-0 bg-transparent border-0">
				<h2 class="accordion-header" id="heading<?= $category->id ?>">
					<button class="accordion-button" type="button" data-bs-toggle="collapse"
					        data-bs-target="#collapse<?= $category->id ?>" aria-expanded="true">
                        <?= $category->name ?>
					</button>
				</h2>
				<div id="collapse<?= $category->id ?>"
				     class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>"
				     aria-labelledby="heading<?= $category->id ?>" data-bs-parent="#categories-filter-parent">
					<div class="accordion-body">
                        <?php foreach($category->subCategories as $subCategory): ?>
							<div class="d-flex align-items-center">
								<label style="display:flex;align-items:center">
									<span><span><input type="checkbox" name="" value=""/></span></span>
									<span style="margin-left:5px"><span
												class="d-inline-block ml-1 mb-0"><?= $subCategory->name ?></span></span>
								</label>
							</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</li>
        <?php $i++; endforeach; ?>

	</ul>

	<h5 class="fw-bold mb-5 mt-5 text-uppercase">Price</h5>
	<p>Price Range: $0 - $1500</p>
	<div aria-disabled="false" class="input-range"><span class="input-range__label input-range__label--min"><span
					class="input-range__label-container">0 $</span></span>
		<div class="input-range__track input-range__track--background">
			<div style="left:0%;width:66.66666666666666%" class="input-range__track input-range__track--active"></div>
		</div>
		<span class="input-range__label input-range__label--max">
			<span class="input-range__label-container">1500 $</span>
		</span>
	</div>

	<hr>

	<h5 class="fw-bold mb-5 mt-5 text-uppercase">Dates</h5>
	<div id="date-range">
		<label class="form-label" for="timepicker2">Select Date Range</label>
		<input class="form-control datetimepicker" id="timepicker2" type="text" placeholder="d/m/y to d/m/y"
		       data-options='{"mode":"range","dateFormat":"d/m/y","disableMobile":true}'/>
	</div>
</div>