<?php

namespace ProcessWire;

$home = pages("/");
$news = pages(1014);
$contact = pages(1112);
?>
<!DOCTYPE html>
<html lang='<?php echo _x('en', 'HTML language code'); ?>'>

<head id='html-head'>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?= page()->seo ?>

	<link rel="shortcut icon" href="<?= urls("templates") ?>images/waveinside-w.png" type="image/png">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135739099-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-135739099-1');
	</script>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="<?= urls()->templates ?>dist/bundle.css?v=<?= filemtime("dist/bundle.css") ?>">
</head>

<body id='html-body'>

	<!-- MASTHEAD -->
	<header>

		<div class="uk-container">
			<div class="uk-flex uk-flex-right uk-flex-middle uk-margin-small-top uk-visible@m">
				<a href="<?= $contact->url ?>" class="uk-link-muted uk-text-xsmall uk-margin-right">
					<span class="uk-text-middle uk-text-uppercase"><?= $contact->title ?></span>
				</a>

				<a href="#" class="uk-link-muted uk-text-xsmall">
					<span class="uk-text-middle uk-text-uppercase"><?php echo setting("t")["Country"] ?></span>
					<span uk-icon="icon: triangle-down; ratio: .875"></span>
				</a>
				<div class="uk-dropdown uk-dropdown-width-auto" uk-dropdown="pos: bottom-right">
					<div class="uk-position-top-right uk-position-xsmall">
						<a href="#lang-modal" uk-icon="question" class="uk-margin-small-left" uk-toggle></a>
					</div>
					<ul class='uk-nav uk-dropdown-nav' role='navigation'>
						<?php
						foreach ($languages as $language) {
							if (!$page->viewable($language)) continue;
							if ($language->id == $user->language->id) {
								echo "<li class='uk-active'>";
							} else {
								echo "<li>";
							}
							$url = $page->localUrl($language);
							$hreflang = $home->getLanguageValue($language, 'name');
							$name = setting('t')['languages'][$language->name];
							$namelang = $hreflang == "ffr" ? "(FR)" : "(" . strtoupper($hreflang) . ")";

							echo "<a hreflang='$hreflang' href='$url'>$name $namelang</a></li>";
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="uk-navbar-container uk-navbar-transparent">
			<div class="uk-container">
				<div class="uk-grid uk-flex-middle">
					<div class="uk-width-expand uk-text-center@m">
						<a href="<?= $home->url ?>" class="uk-logo">
							<img src="<?= urls('templates') ?>images/waveinside-2.svg" width="140" alt="WaveInside" class="uk-preserve uk-hidden@m">
							<img src="<?= urls('templates') ?>images/waveinside.svg" width="233" alt="WaveInside" class="uk-preserve uk-margin-top uk-visible@m">
						</a>
					</div>
					<div class="uk-width-auto uk-hidden@m">
						<div class="uk-navbar-right uk-hidden@m">
							<a class="uk-navbar-item" href="#offcanvas-nav" uk-toggle>
								<img src="<?= urls("templates") ?>images/menu.svg" width="27">
							</a>
						</div>
					</div>
				</div>

				<div class="uk-navbar uk-margin-medium uk-margin-small-bottom uk-visible@m" uk-navbar="offset: 12">
					<?= ukNavbarNav($home->children, ['class' => 'uk-child-width-expand', 'dropdown' => ['basic-page', 'products']]); ?>
				</div>
			</div>
		</div>
	</header>

	<!-- MAIN CONTENT -->
	<main id='main'>
		<div class='uk-container uk-margin'>
			<?php if (page()->id > 1) echo ukBreadcrumb(page()->parents('template!=landings,id!=1253'), ['class' => 'uk-margin-small-top', 'appendCurrent' => true]); ?>
			<div class='uk-grid uk-grid-large uk-margin-top' uk-grid>
				<?php if ($page->parent->id != 1253) { // landinglerde gozukmez 
				?>
					<aside id='sidebar' class='uk-width-1-3@m' pw-optional>
						<?= page()->sidebar ?>
					</aside>
				<?php } ?>
				<div id='content' class='uk-width-expand'>
					<h1 id='content-head' class='uk-h4 uk-text-primary uk-text-uppercase'>
						<?= page()->get('headline|title') ?>
					</h1>
					<div id='content-body'>
						<?= page()->body ?>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- FOOTER -->
	<footer id="footer">
		<section class="uk-section uk-section-muted uk-section-small">
			<div class="uk-container">
				<div class="uk-grid" uk-grid>
					<div class='uk-width-expand@m'>
						<div class="uk-slider uk-slider-news" uk-slider="autoplay: true;">
							<div class="uk-position-relative">
								<a href="<?= $news->url ?>" class="uk-link-toggle">
									<h4 class="uk-link-heading uk-text-primary uk-text-uppercase"><?= $news->title ?></h4>
								</a>

								<ul class="uk-slider-items uk-child-width-1-1">
									<?php foreach ($news->children("limit=8")->slices(4) as $key => $items) : ?>
										<li>
											<ul class="uk-list uk-list-divider">
												<?php foreach ($items as $key => $post) : ?>
													<li>
														<a href="<?= $post->url ?>" class="uk-link-text" title="<?= $post->title ?>">
															<span class="uk-text-primary"><?= date("d/m/Y", $post->getUnformatted("date")) ?> - </span> <?= sanitizer()->truncate($post->title, 90) ?>
														</a>
													</li>
												<?php endforeach ?>
											</ul>
										</li>
									<?php endforeach ?>
								</ul>

								<div class="uk-flex uk-position-top-right">
									<a class="tm-slidenav tm-slidenav-xsmall uk-margin-small-right" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
									<a class="tm-slidenav tm-slidenav-xsmall" href="#" uk-slidenav-next uk-slider-item="next"></a>
								</div>
							</div>

						</div>

						<h4 class="uk-text-primary uk-text-uppercase uk-margin-small"><?= setting("t")["Newsletter"] ?></h4>
						<p class="uk-margin-small"><?= setting("t")["Newsletter_Summary"] ?></p>
						<form action="https://email.novabis.be/t/r/s/thyudhr/" class="uk-grid uk-grid-small" uk-grid>
							<div class="uk-width-expand">
								<input type="email" class="uk-input" name="cm-thyudhr-thyudhr" required>
							</div>
							<div class="uk-width-auto">
								<button class="uk-button uk-button-default-outline uk-width-1-1"><?= setting("t")["Subscribe"] ?></button>
							</div>
						</form>
					</div>
					<div class='uk-width-2-5@m uk-flex-first@m'>
						<div class="uk-grid uk-grid-small uk-child-width-1-2">
							<div>
								<?= ukNav($home->children) ?>
							</div>
							<div>
								<?= ukNav(pages(1038)->children) ?>
							</div>
						</div>

						<div class="uk-grid uk-grid-small uk-flex-middle uk-text-small uk-margin-large uk-visible@m">
							<div class="uk-width-auto">
								<img src="<?= urls("templates") ?>images/waveinside-w.svg" width="26">
							</div>
							<div class="uk-width-expand">
								&copy; <?= date("Y") ?> WAVEinside -
								<a href="<?= pages(1182)->url ?>" class="uk-link-muted"><u><?= pages(1182)->title ?></u></a> - <a href="<?= pages(1183)->url ?>" class="uk-link-muted"><u><?= pages(1183)->title ?></u></a>
								Recherche(s) associée(s) :
								<?php
								$i = 0;
								foreach (pages(1253)->children() as $child) :
								?>
									<a href="<?php echo $child->url; ?>" class="uk-link-muted"><u><?php echo $child->title; ?></u></a><?php
									$i++;
									if ($i < count(pages(1253)->children())) echo ", ";
									?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="uk-width-auto uk-visible@m">
						<ul class="uk-subnav uk-flex-right uk-flex-middle">
							<?php foreach (explode("\n", $contact->summary) as $key => $item) { ?>
								<li>
									<a href="<?= $item ?>">
										<img src="<?= urls("templates") . "images/" . ukSocialIcon($item) ?>.svg" uk-svg>
									</a>
								</li>
							<?php } ?>
						</ul>

						<div class="uk-margin uk-text-right uk-text-small">
							<span class="uk-text-secondary">WAVEinside Belgique</span>
							<p>Rue de l'Athénée, 2<br>
								B-4130 Esneux<br>
								tél +32 4 383 55 13<br>
								fax +32 4 383 55 14</p>
						</div>
						<div class="uk-margin-medium uk-text-right uk-text-small">
							<span class="uk-text-secondary">WAVEinside Luxembourg</span>
							<p>30, rue des Champs<br>
								L-8285 Kehlen<br>
								tél +352 2021 1573<br>
								fax +352 2021 1573-50</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-xsmall uk-hidden@m">
			<div class="uk-container">
				<div class="uk-grid uk-grid-small" uk-grid>
					<div class="uk-width-auto">
						<img src="<?= urls("templates") ?>images/waveinside-w.svg" alt="">
					</div>
					<div class="uk-width-expand">
						&copy; <?= date("Y") ?> WAVEinside<br>
						<a href="<?= pages(1182)->url ?>" class="uk-link-muted"><u><?= pages(1182)->title ?></u></a> - <a href="<?= pages(1183)->url ?>" class="uk-link-muted"><u><?= pages(1183)->title ?></u></a>
						Recherche(s) associée(s) :
						<?php
						$i = 0;
						foreach (pages(1253)->children() as $child) :
						?>
							<a href="<?php echo $child->url; ?>" class="uk-link-muted"><u><?php echo $child->title; ?></u></a><?php
							$i++;
							if ($i < count(pages(1253)->children())) echo ", ";
							?>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</section>
		<?php if ($home->settings->cta) : ?>
			<div class="uk-margin-xlarge uk-hidden@m"></div>
		<?php endif ?>
	</footer>

	<?php if ($home->settings->cta) : ?>
		<div class="tm-cta uk-light uk-visible@m">
			<a href="<?php echo $home->settings->cta ?>" target="_blank" class="uk-link-reset">
				<div class="uk-panel uk-padding-small uk-text-center">
					<button class="uk-button uk-button-default uk-button-small uk-width-1-1 uk-padding-remove-horizontal" target="_blank"><?php echo setting("t")["CONFIGURE"] ?></button>
					<div class="uk-text-small uk-margin-small"><?php echo $home->settings->cta_text; ?></div>
				</div>
			</a>
		</div>

		<section class="uk-section uk-section-xsmall uk-section-primary uk-position-fixed uk-position-bottom uk-light uk-hidden@m">
			<div class="uk-container">
				<a href="<?php echo $home->settings->cta ?>" target="_blank" class="uk-link-reset">
					<div class="uk-grid uk-grid-small uk-flex-nowrap uk-flex-middle">
						<div>
							<button class="uk-button uk-button-default uk-button-small uk-width-1-1" target="_blank"><?php echo setting("t")["CONFIGURE"] ?></button>
						</div>
						<div class="uk-text-small">
							<?php echo $home->settings->cta_text; ?>
						</div>
					</div>
				</a>
			</div>
		</section>
	<?php endif ?>

	<?php if (!input()->cookie("cookieconsent")) : ?>
		<div class="tm-cookie-banner js-cookie-banner">
			<section class="uk-section uk-section-primary uk-section-xsmall uk-light">
				<div class="uk-container">
					<div class="uk-grid uk-grid-small uk-flex-middle" uk-grid>
						<div class="uk-width-expand@s">
							<?= setting("t")['We use cookies to improve your user experience.'] ?>
						</div>
						<div class="uk-width-auto@s uk-light">
							<div uk-margin>
								<button class="uk-button uk-button-light-outline js-cookie-dismiss uk-margin-small-right"><?= setting("t")['Yes I agree'] ?></button>
								<a href="<?= pages(1183)->url ?>" class="uk-button uk-button-light-outline"><?= setting("t")['No, more info'] ?></a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	<?php endif ?>

	<!-- OFFCANVAS NAVIGATION -->
	<div id="offcanvas-nav" class="uk-modal-full" uk-modal>
		<div class="uk-modal-dialog uk-height-viewport uk-background-primary">

			<div class="uk-container">
				<div class="uk-grid uk-grid-small uk-flex-middle uk-light">
					<div class="uk-width-expand">
						<img src="<?= urls('templates') ?>images/waveinside-2.svg" width="140" alt="WaveInside" uk-svg>
					</div>
					<div class="uk-width-auto">
						<a class="uk-modal-close" href="#">
							<img src="<?= urls("templates") ?>images/menu-close.svg" width="27">
						</a>
					</div>
				</div>
			</div>

			<div class="uk-padding-small">
				<?php echo cache()->get('offcanvas-nav', 10, function () {
					return ukNav(pages()->get('/')->children()->and(pages(1112)), [
						'depth' => 1,
						'class' => 'uk-light',
						'accordion' => true,
						'allowParents' => [1001, 1038],
						// 'repeatParent' => true,
						'noNavQty' => 20
					]);
				});
				?>

				<div class="uk-grid uk-grid-small uk-margin-medium" uk-grid>
					<div class="uk-width-expand">
						<ul class="uk-subnav">
							<?php foreach (explode("\n", $contact->summary) as $key => $item) { ?>
								<li>
									<a href="<?= $item ?>" class="uk-text-secondary">
										<img src="<?= urls("templates") . "images/" . ukSocialIcon($item) ?>.svg" uk-svg>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="uk-width-auto">
						<a href="#" class="uk-light">
							<span class="uk-text-middle uk-text-uppercase"><?php echo setting("t")["Country"] ?></span>
							<span uk-icon="icon: triangle-down; ratio: .875"></span>
						</a>
						<div class="uk-dropdown uk-dropdown-width-auto" uk-dropdown="pos: bottom-right">
							<ul class='uk-nav uk-dropdown-nav' role='navigation'>
								<?php
								foreach ($languages as $language) {
									if (!$page->viewable($language)) continue;
									if ($language->id == $user->language->id) {
										echo "<li class='uk-active'>";
									} else {
										echo "<li>";
									}
									$url = $page->localUrl($language);
									$hreflang = $home->getLanguageValue($language, 'name');
									$name = setting('t')['languages'][$language->name];
									$namelang = $hreflang == "ffr" ? "(FR)" : "(" . strtoupper($hreflang) . ")";

									echo "<a hreflang='$hreflang' href='$url'>$name $namelang</a></li>";
								}
								?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include '_lang_modal.php' ?>

	<script src="<?= urls()->templates ?>dist/bundle.js?v=<?= filemtime("dist/bundle.js") ?>"></script>

	<?php if (!$userCL && 1 == 2) : ?>
		<script>
			UIkit.modal("#lang-modal").show();
		</script>
	<?php endif ?>
</body>

</html>