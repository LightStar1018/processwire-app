<?php

namespace ProcessWire;

$clients = $page->children;
?>

<div id="content-body">
    <select name="" id="" class="uk-select uk-margin js-switcher-clients uk-hidden@s">
        <?php foreach ($clients as $key => $client) : ?>
            <option value="<?php echo $key ?>"><?php echo $client->title ?></option>
        <?php endforeach ?>
    </select>

    <div class="uk-grid uk-grid-column-line uk-grid-row-medium uk-grid-image uk-child-width-1-2 uk-child-width-1-4@m uk-visible@s" uk-grid uk-switcher>
        <?php foreach ($clients as $client) : ?>
            <?php if (count($client->images)) : ?>
                <div>
                    <a href="#uk-switcher-clients" class="uk-panel" uk-scroll>
                        <img src="<?php echo $client->images->first->height(260)->url ?>" alt="<?php echo $client->images->first->description ?>">
                        <p class="uk-text-small uk-margin-small"><?php echo $client->title ?></p>
                    </a>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <ul id="uk-switcher-clients" class="uk-switcher" hidden>
        <?php foreach ($clients as $client) : ?>
            <?php if (count($client->images2)) : ?>
                <li>
                    <h4 class="uk-margin-medium-top"><?= $client->title ?></h4>
                    <div id="clients-<?php echo $client->name ?>" class="uk-margin-medium">
                        <div class="uk-grid uk-grid-medium uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-flex-middle" uk-grid>
                            <?php foreach ($client->images2 as $item) : ?>
                                <div>
                                    <img data-src="<?php echo $item->size(0, 150, ["upscaling" => false])->url ?>" alt="<?php echo $item->description ?>" uk-img>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>

</div>