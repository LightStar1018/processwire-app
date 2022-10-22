<?php

namespace ProcessWire;
?>

<div id="content-body" pw-append>
	<div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-3@m" uk-grid uk-lightbox>
		<?php foreach ($page->images as $key => $item) { ?>
			<div>
				<a href="<?= $item->url ?>">
					<div class="uk-cover-container">
						<canvas width="320" height="200"></canvas>
						<img src="<?= $item->size(0,260)->url ?>" alt="<?= $item->description ?>" uk-cover>
					</div>
				</a>
			</div>
		<?php } ?>
	</div>
</div>