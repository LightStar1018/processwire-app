<?php

namespace ProcessWire;

$year = input("get", "year", "digits", date("Y"));

$startdate = $year . "-01-01";
$enddate   = $year . "-12-31";

$posts = $page->children("body!='', date>=$startdate, date<=$enddate");
?>

<div id='content-head' pw-append>
	: <?= $year ?>
</div>

<div id='content-body'>
	<ul class="uk-list uk-list-divider uk-list-large">
		<?php foreach ($posts as $key => $post) : ?>
			<li>
				<a href="<?= $post->url ?>" class="uk-link-toggle">
					<div class="uk-grid uk-grid-medium" uk-grid>
						<?php if (count($post->images)) : ?>
							<div class="uk-width-auto@s">
								<img src="<?php echo $post->images->first->size(0,260)->url ?>" alt="<?php echo $post->images->first->description ?>" width="170">
							</div>
						<?php endif ?>
						<div class="uk-width-expand">
							<h4 class="uk-link-heading"><?= $post->title ?></h4>
							<p><span class="uk-text-primary"><?= date("d/m/Y", $post->getUnformatted("date")) ?> - </span><?= sanitizer()->truncate($post->body, 200) ?></p>
							<div class="uk-text-right">
								<button class="uk-button uk-button-default-outline">EN SAVOIR PLUS</button>
							</div>
						</div>
					</div>
				</a>
			</li>
		<?php endforeach ?>
		
		<?php if(!count($posts)) echo "<li>" . setting("t")["No results found."] . "</li>"; ?>
	</ul>
</div>

<aside id='sidebar'>
	<ul class="uk-nav uk-nav-striped">
		<?php foreach (range(date("Y"), 2015) as $key => $item) : ?>
			<li class="<?php echo ($item == $year) ? "uk-active" : "" ?>">
				<a href="?year=<?= $item ?>"><?= $item ?></a>
			</li>
		<?php endforeach ?>
	</ul>
</aside>