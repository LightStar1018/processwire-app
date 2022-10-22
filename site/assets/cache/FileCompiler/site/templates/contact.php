<?php

namespace ProcessWire;
?>

<div id="content-body">
    <hr>

    <div class="uk-grid uk-child-width-1-2@s" uk-grid>
        <?php foreach ($page->repeater as $key => $item) { ?>
            <div>
                <div class="uk-margin">
                    <span class="uk-text-secondary"><?= $item->title ?></span>
                </div>
                <?= $item->body ?>
                <?=  str_replace("<iframe ", "<iframe uk-responsive ", html_entity_decode($item->summary)); ?>
            </div>
        <?php } ?>
    </div>

    <?= $page->body ?>
</div>