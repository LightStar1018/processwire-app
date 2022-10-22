<?php

namespace ProcessWire;
?>

<h1 id="content-head" class="uk-margin-remove" pw-append></h1>

<div id="content-body">
    <div class="uk-grid uk-grid-small uk-margin" uk-grid>
        <div class="uk-width-expand@m">
            <div class="tm-h4"><?php echo $page->summary ?>, <span class="uk-text-secondary"><?php echo $page->text ?></span></div>
        </div>
        <div class="uk-width-auto uk-text-small">
            <a href="<?php echo $page->prev->url ?>"><?php echo setting("t")["Previous project"] ?></a>  |  <a href="<?php echo $page->next->url ?>"><?php echo setting("t")["Next project"] ?></a>
        </div>
    </div>

    <div uk-slideshow="autoplay: true; ratio: 980:460">

        <div class="uk-position-relative">

            <div class="uk-slideshow-container">
                <ul class="uk-slideshow-items">
                    <?php foreach ($page->images as $key => $item) { ?>
                        <li class="uk-width-1-1 uk-width-auto@m">
                            <img src='<?= $item->size(980, 460)->url ?>' alt='<?= $item->description ?>'>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="uk-hidden@s uk-light">
                <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>

            <div class="uk-visible@s">
                <a class="tm-slidenav tm-slidenav-large uk-position-center-left-out uk-position-large" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="tm-slidenav tm-slidenav-large uk-position-center-right-out uk-position-large" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>

        </div>


        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

    </div>

    <?php echo $page->body ?>

    <p><?= setting("t")["Products Used"] ?> : <?php echo $page->ref->implode(", ", "<a href='{url}'>{title}</a>") ?></p>
</div>