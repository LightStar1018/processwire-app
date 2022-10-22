<?php

namespace ProcessWire;

$iproduct = input("get", "product", "text");
$isector = input("get", "sector", "text");
?>

<div id="content">

    <div class="uk-grid uk-grid-small" uk-grid>
        <div class="uk-width-expand">

            <h1 class='uk-h4 uk-text-primary uk-text-uppercase'>
                <?= page()->get('headline|title') ?>
            </h1>

        </div>

        <div class="uk-width-medium@m">

            <select class="uk-select js-select-redirect">
                <option value="<?= $page->url ?>"><?= setting("t")['Search by product'] ?></option>
                <?php
                foreach (pages(1039)->children as $key => $item) {
                    $selected = ($item->name == $iproduct) ? "selected" : "";

                    echo "<option value='{$page->url}?product={$item->name}' $selected>{$item->title}</option>";
                }
                ?>
            </select>

        </div>

        <?php if(user()->language->id == 1031) : ?>
        <div class="uk-width-medium@m">

            <select class="uk-select js-select-redirect">
                <option value="<?= $page->url ?>"><?= setting("t")['Audiovisual technology'] ?></option>
                <?php
                foreach (pages(1041)->children as $key => $item) {
                    $selected = ($item->name == $iproduct) ? "selected" : "";

                    echo "<option value='{$page->url}?sector={$item->name}' $selected>{$item->title}</option>";
                }
                ?>
            </select>

        </div>
        <?php endif ?>
    </div>

    <div class="uk-grid uk-grid-column-line uk-grid-row-medium uk-grid-image uk-child-width-1-2 uk-child-width-1-3@m" uk-grid>
        <?php
        $selector = "";
        if ($iproduct) $selector = "ref=$iproduct";
        if ($isector) $selector = "ref2=$isector";

        $references = $page->children($selector);

        foreach ($references as $item) : ?>
            <div>
                <a href="<?php echo $item->url ?>" class="uk-panel">
                    <?php if (count($item->images2)) : ?>
                        <div class="uk-cover-container">
                            <canvas width="250" height="170"></canvas>
                            <img src="<?php echo $item->images2->first->size(0, 260)->url ?>" alt="<?php echo $item->images2->first->description ?>" uk-cover>
                        </div>
                    <?php elseif (count($item->images)) : ?>
                        <div class="uk-cover-container">
                            <canvas width="250" height="170"></canvas>
                            <img src="<?php echo $item->images->first->size(0, 260)->url ?>" alt="<?php echo $item->images->first->description ?>" uk-cover>
                        </div>
                    <?php endif ?>
                    <div class="uk-text-small uk-margin-small">
                        <div class="uk-text-truncate"><?php echo $item->title ?></div>
                    </div>
                </a>
                <div class="uk-text-small uk-line-height-xsmall">
                    <div class="uk-text-truncate"><?php echo $item->summary ?></div>
                    <div class="uk-text-truncate uk-text-secondary"><?php echo $item->text ?></div>
                </div>
            </div>
        <?php endforeach ?>

        <?php if (!count($references)) echo setting("t")["No results found."] ?>
    </div>
</div>