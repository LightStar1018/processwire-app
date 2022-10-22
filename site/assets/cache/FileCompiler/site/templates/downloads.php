<?php namespace ProcessWire; ?>

<div id="content-body">
    <?php foreach ($page->children as $key => $item) { ?>
        <h5><?php echo $item->title ?></h5>

        <ul class="uk-list uk-list-striped">
            <?php foreach ($item->files as $key => $file) { ?>
                <li>
                    <a href="<?php echo $file->url ?>" target="_blank" class="uk-link-text">
                        <div class="uk-grid" uk-grid>
                            <div class="uk-width-expand">
                                <?= $file->get("description|name") ?>
                            </div>
                            <div class="uk-width-auto">
                                <img src="<?= urls("templates") ?>images/pdf.svg">
                            </div>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>