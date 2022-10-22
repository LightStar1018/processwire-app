<?php

namespace ProcessWire;

$contact = pages(1112);

$imageTags = "FR-BE";

if (user()->language->id == 1033) $imageTags = "EN";
if (user()->language->id == 1185) $imageTags = "FR-FR";
?>

<main id="main">
	<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true; autoplay: true;">

		<ul class="uk-slider-items uk-grid uk-grid-line">
			<?php foreach ($page->images->find("tags~=$imageTags") as $key => $item) { ?>
				<li class="uk-width-1-1 uk-width-auto@s">
					<div class="uk-cover-container">
						<canvas width="980" height="720" class="uk-hidden@s"></canvas>
						<canvas width="980" height="460" class="uk-visible@s"></canvas>
						<img src='<?= $item->size(980, 460)->url ?>' uk-cover>
						<?php
						$url = parse_url($item->description, PHP_URL_HOST);

						if ($url) {
							// $target = in_array($url, config()->httpHosts) ? "" : "target='_blank'";
							$youtube = json_decode(file_get_contents("https://www.youtube.com/oembed?url={$item->description}"), true);

							if ($youtube["type"]) {
						?>
								<div uk-lightbox='video-autoplay: 1'>
									<a href='<?php echo $item->description ?>' class='uk-position-cover' target='_blank'>
										<div class="uk-position-center">
											<img src="<?= urls("templates") ?>images/play.svg">
										</div>
									</a>
								</div>
						<?php
							} else {
								echo "<a href='{$item->description}' class='uk-position-cover' target='_blank'></a>";
							}
						}
						?>
					</div>
				</li>
			<?php } ?>
		</ul>

		<div class="uk-position-cover uk-disabled uk-visible@m">
			<div class="uk-container">
				<img src="<?= urls("templates") ?>images/home-banner-overlay.png" alt="">
			</div>
		</div>

		<div class="uk-position-cover uk-container uk-visible@s uk-disabled">
			<a class="tm-slidenav tm-slidenav-large uk-position-center-left-out uk-position-small uk-enabled" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
			<a class="tm-slidenav tm-slidenav-large uk-position-center-right-out uk-position-small uk-enabled" href="#" uk-slidenav-next uk-slider-item="next"></a>
		</div>

		<div class="uk-overlay-primary uk-position-cover uk-hidden@s"></div>

		<div class="uk-position-bottom uk-position-small uk-hidden@s">
			<h2 class="tm-h2 uk-light uk-text-light"><?= $page->headline ?></h2>

			<a href="<?= $contact->url ?>" class="uk-button uk-button-light-outline uk-button-large uk-width-1-1"><?= $contact->title ?></a>
		</div>

		<!-- <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a> -->

	</div>

	<section class="uk-section uk-section-small">
		<div class="uk-container">
			<div class="uk-grid" uk-grid>

				<div class="uk-width-expand@m">

					<ul class="uk-list uk-list-divider uk-list-divider-home uk-text-secondary uk-visible@m">
						<?php foreach (pages(1038)->children as $key => $item) { ?>
							<li>
								<a href="<?= $item->url ?>" class="uk-link-heading uk-transition-toggle" uk-toggle="target: #toggle-<?= $item->id ?>; mode: hover">
									<div class="uk-flex uk-position-relative">
										<span class="uk-icon-button uk-icon-button-small uk-icon-button-primary uk-margin-small-right" uk-icon="chevron-right"></span>
										<h3 class="uk-text-uppercase uk-margin-remove"><?= $item->title ?></h3>
										<button class="uk-button uk-button-default uk-button-small uk-transition-fade uk-position-right">EN SAVOIR +</button>
									</div>
								</a>
							</li>
						<?php } ?>
					</ul>

					<ul class="uk-list uk-list-divider uk-accordion uk-accordion-divider uk-margin-remove-top uk-hidden@m" uk-accordion>
						<?php foreach (pages(1038)->children as $key => $item) { ?>
							<li>
								<a class="uk-accordion-title uk-text-uppercase" href="#"><?= $item->title ?></a>
								<div class="uk-accordion-content">
									<p><?= $item->summary ?></p>
									<a href="<?= $item->url ?>" class="uk-button uk-button-primary-outline uk-button-large uk-width-1-1"><?= setting('t')['Read More'] ?></a>
								</div>
							</li>
						<?php } ?>
					</ul>

					<div>
						<?php foreach (pages(1038)->children as $key => $item) { ?>
							<div id="toggle-<?= $item->id ?>" class="uk-width-1-1 uk-link-text" hidden>
								<?= $item->summary ?>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="uk-width-2-5@m uk-flex-first@m" uk-lightbox="video-autoplay: 1">
					<a href="<?= $page->settings->video ?>" target="_blank" data-attrs="width: 1280; height: 720;">
						<div class="uk-inline uk-cover-container">
							<?php
							echo $page->if("images2", function ($val) {
								return "<img src='{$val->first->url}' alt='{$val->first->description}'>";
							});
							?>
							<div class="uk-position-cover uk-overlay-primary"></div>
							<div class="uk-position-center">
								<img src="<?= urls("templates") ?>images/play.svg">
							</div>
						</div>
					</a>
					<?php echo $page->settings->video_text; ?>
					<div class="uk-margin uk-visible@m"></div>
				</div>

			</div>
		</div>
	</section>
</main>