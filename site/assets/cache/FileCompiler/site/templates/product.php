<?php

namespace ProcessWire;

$references = pages(1131)->children("ref=$page");
?>

<main id="main">
    <div class='uk-container uk-margin'>
        <?php if (page()->id > 1) echo ukBreadcrumb(page(), [
            'class' => 'uk-margin-small-top',
            'appendCurrent' => true,
        ]); ?>

        <div class="uk-panel">
            <h1 class='uk-h4 uk-text-primary uk-margin-remove'>
                <?= page()->get('headline|title') ?>
            </h1>
            <h4 class="uk-margin-remove"><?php echo $page->summary ?></h4>
        </div>
    </div>

    <div class="uk-slideshow uk-position-relative uk-visible-toggle uk-light uk-hidden@m" tabindex="-1" uk-slideshow="autoplay: true;">
        <ul class="uk-slideshow-items">
            <?php foreach ($page->images as $key => $item) {
            ?>
                <li>
                    <img src='<?= $item->size(0, 460)->url ?>' alt='<?= $item->description ?>' uk-cover>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="uk-slider uk-position-relative uk-visible-toggle uk-visible@m js-slider-center-init" tabindex="-1">

        <ul class="uk-slider-items uk-grid uk-grid-line">
            <?php $last = $page->images->last(); ?>
            <?php foreach ($page->images as $key => $item) { ?>
                <li style="<?= $item == $last ? "order: -2;" : "" ?>">
                    <img src='<?= $item->size(0, 460)->url ?>' alt='<?= $item->description ?>'>
                </li>
            <?php } ?>
        </ul>

        <div class="uk-position-cover uk-container uk-visible@s uk-disabled">
            <a class="tm-slidenav tm-slidenav-large uk-position-center-left uk-position-small uk-enabled" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="tm-slidenav tm-slidenav-large uk-position-center-right uk-position-small uk-enabled" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

        <ul class="uk-position-bottom uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

    </div>

    <div class="uk-container uk-margin-bottom">
        <div class='uk-grid uk-grid-large uk-margin-top' uk-grid>

            <?php if (count($references) || count($page->images2) || count($page->images3) || count($page->files)) : ?>
                <aside id='sidebar' class='uk-width-2-5@m'>
                    <ul class="uk-nav uk-nav-striped uk-text-uppercase">
                        <?php if (count(page()->references)) : ?>
                            <li>
                                <a href="#projects" uk-scroll>
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-expand">Projects</div>
                                        <div class="uk-width-auto">
                                            <img src="<?= urls("templates") ?>images/chevron-down.svg" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif ?>

                        <?php if (count($page->images2) || $page->hasChildren("template=product-configurations")) : ?>
                            <li>
                                <a href="#configurations" uk-scroll>
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-expand">Configurations</div>
                                        <div class="uk-width-auto">
                                            <img src="<?= urls("templates") ?>images/chevron-down.svg" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif ?>

                        <?php if (count($page->images3)) : ?>
                            <li>
                                <a href="#finitions" uk-scroll>
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-expand">Finitions</div>
                                        <div class="uk-width-auto">
                                            <img src="<?= urls("templates") ?>images/chevron-down.svg" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endif ?>

                        <?php foreach ($page->files as $key => $item) { ?>
                            <li>
                                <a href="<?php echo $item->url ?>" target="_blank">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-expand"><?php echo $item->description ?></div>
                                        <div class="uk-width-auto">
                                            <img src="<?= urls("templates") ?>images/pdf.svg" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </aside>
            <?php endif ?>

            <div id='content' class='uk-width-expand'>
                <div id='content-body'>
                    <?= page()->body ?>
                </div>
            </div>
        </div>

        <?php if (count(page()->references) || count($page->images2) || count($page->images3)) : ?>
            <div class="uk-margin-medium-top">
                <?php if (count(page()->references)) : ?>
                    <h4 id="projects" class="uk-text-muted uk-text-uppercase">Projects</h4>

                    <div uk-slider="autoplay: true">

                        <div class="uk-position-relative">

                            <div class="uk-slider-container">
                                <ul class="uk-slider-items uk-grid-line uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
                                    <?php foreach (page()->references as $key => $reference) { ?>
                                        <li>
                                            <?php if (count($reference->images)) { ?>
                                                <a href="<?php echo $reference->url ?>" class="uk-panel">
                                                    <div class="uk-cover-container">
                                                        <canvas width="250" height="170"></canvas>
                                                        <img src='<?= $reference->images->first->size(0, 260)->url ?>' alt='<?= $reference->images->first->description ?>' uk-cover>
                                                    </div>
                                                    <div class="uk-margin-small uk-text-small uk-text-truncate"><?php echo $reference->title ?></div>
                                                </a>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="uk-visible@s">
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-left-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-right-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-next uk-slider-item="next"></a>
                            </div>

                        </div>

                    </div>
                <?php endif ?>

                <?php if ($page->hasChildren("template=product-configurations")) : ?>
                    <h4 id="configurations" class="uk-text-muted uk-text-uppercase">Configurations</h4>

                    <div uk-slider="autoplay: true">

                        <div class="uk-position-relative">

                            <div class="uk-slider-container">
                                <ul class="uk-slider-items uk-grid-line uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
                                    <?php foreach (page()->find("template=product-configuration") as $key => $item) : ?>
                                        <?php if (count($item->images)) : ?>
                                            <li>
                                                <div class="uk-cover-container">
                                                    <canvas width="250" height="170"></canvas>
                                                    <img src='<?= $item->images->first()->size(0, 260)->url ?>' alt='<?= $item->title ?>' uk-cover>
                                                </div>
                                                <div class="uk-margin-small uk-text-small uk-text-truncate"><?= $item->title ?></div>
                                                <?php foreach ($item->files as $f) : ?>
                                                    <div class="uk-text-small uk-line-height-xsmall">
                                                        <a href="<?= $f->url ?>" class="uk-link-text uk-text-secondary" target="_blank"><?= $f->description ?></a>
                                                    </div>
                                                <?php endforeach ?>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </div>

                            <div class="uk-visible@s">
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-left-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-right-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-next uk-slider-item="next"></a>
                            </div>

                        </div>

                    </div>
                <?php elseif (count($page->images2)) : ?>
                    <h4 id="configurations" class="uk-text-muted uk-text-uppercase">Configurations</h4>

                    <div uk-slider="autoplay: true">

                        <div class="uk-position-relative">

                            <div class="uk-slider-container">
                                <ul class="uk-slider-items uk-grid-line uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
                                    <?php foreach ($page->images2 as $key => $item) { ?>
                                        <li>
                                            <div class="uk-cover-container">
                                                <canvas width="250" height="170"></canvas>
                                                <img src='<?= $item->size(0, 260)->url ?>' alt='<?= $item->description ?>' uk-cover>
                                            </div>
                                            <div class="uk-margin-small uk-text-small uk-text-truncate"><?php echo $item->description ?></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="uk-visible@s">
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-left-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                                <a class="tm-slidenav tm-slidenav-large uk-position-center-right-out uk-position-small uk-margin-remove-top uk-enabled" href="#" uk-slidenav-next uk-slider-item="next"></a>
                            </div>

                        </div>

                    </div>
                <?php endif ?>

                <?php if (count($page->images3)) : ?>
                    <h4 id="finitions" class="uk-text-muted uk-text-uppercase">Finitions</h4>

                    <div class="uk-grid uk-grid-column-line uk-grid-row-medium uk-grid-image uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" uk-grid>
                        <?php foreach ($page->images3 as $key => $item) { ?>
                            <li>
                                <a href="<?= pages(1180)->url ?>">
                                    <div class="uk-cover-container">
                                        <canvas width="250" height="170"></canvas>
                                        <img src='<?= $item->size(0, 260)->url ?>' alt='<?= $item->description ?>' uk-cover>
                                    </div>
                                </a>
                                <div class="uk-margin-small uk-line-height-xsmall uk-text-small uk-text-truncate"><?php echo nl2br($item->description) ?></div>
                            </li>
                        <?php } ?>
                    </div>
                <?php endif ?>

            </div>
        <?php endif ?>
    </div>

</main>