<?php

namespace ProcessWire;

if ($page->parent->id == 1 && !$page->body) {
	session()->redirect($page->child->url);
}
?>

<?php if ($page->parent->id == 1038 && count($page->children())) { ?>
	<div id="content-body" pw-append>
		<ul class="uk-text-uppercase tm-letter-spacing-tiny">
			<?php foreach ($page->children() as $key => $item) { ?>
				<li>
					<a href="#<?php echo $item->name ?>" uk-scroll><?php echo $item->title ?></a>
				</li>
			<?php } ?>
		</ul>

		<?php foreach ($page->children() as $item) : ?>
			<h4 id="<?php echo $item->name ?>" class="uk-text-uppercase"><?php echo $item->title ?></h4>
			<?php foreach ($item->children() as $product) : ?>
				<a href="<?php echo $product->url ?>" class="uk-link-toggle uk-panel uk-display-block uk-margin-medium">
					<div class="uk-grid uk-grid-medium uk-margin-small" uk-grid>
						<div class="uk-width-1-3 uk-width-auto@s">
							<?php if (count($product->images4)) : ?>
								<div class="uk-inline uk-cover-container">
									<canvas width="170" height="120"></canvas>
									<img src="<?php echo $product->images4->first->size(0, 260)->url ?>" uk-cover>
								</div>
							<?php endif ?>
		
						</div>
						<div class="uk-width-expand">
							<h5 class="uk-text-primary uk-margin-remove"><?php echo $product->title ?></h5>
							<div class="uk-text-small"><?php echo $product->summary ?></div>
							
							<div class="uk-margin-small-top uk-text-right uk-visible@s">
								<span class="uk-icon-button uk-icon-button-default uk-icon-button-large" uk-icon="icon: chevron-right; ratio: 1.4"></span>
							</div>
						</div>
					</div>
					<button class="uk-button uk-button-default-outline uk-width-1-1 uk-margin-small uk-hidden@s">EN SAVOIR PLUS</button>
				</a>
			<?php endforeach ?>
		<?php endforeach ?>
	</div>
<?php } ?>

<aside id='sidebar' pw-prepend>
	<?php
	echo ukNav(page()->rootParent(), [
		"type" => "striped",
		"class" => "uk-text-uppercase",
		"header" => false,
		"divider" => false,
	]);
	?>
</aside>