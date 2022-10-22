<?php

namespace ProcessWire;

$blog = pages(1014);
?>

<aside id='sidebar'>
	<ul class="uk-nav uk-nav-striped">
		<li>
			<a href="<?= $blog->url ?>?year=<?= date("Y", $page->getUnformatted("date")) ?>" class="uk-text-primary"><?= setting('t')['Back to the list'] ?></a>
		</li>
		<?php foreach (range(date("Y"), 2015) as $key => $item) : ?>
			<li class="<?php echo ($item == $year) ? "uk-active" : "" ?>">
				<a href="<?= $blog->url ?>?year=<?= $item ?>"><?= $item ?></a>
			</li>
		<?php endforeach ?>
	</ul>
</aside>

<div id='content'>
	<h1 id='content-head' class='uk-h4 uk-text-primary uk-text-uppercase'>
		<?= page()->get('headline|title') ?> - <span class="uk-text-secondary"><?= date("d/m/Y", $page->getUnformatted("date")) ?></span>
	</h1>
	<hr>
	<div id='content-body'>
		<?= page()->body ?>
	</div>
</div>