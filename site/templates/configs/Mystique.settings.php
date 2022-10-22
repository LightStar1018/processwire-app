<?php

namespace ProcessWire;

/**
 * Resource : Settings
 */
return [
    'title' => __('Settings'),
    'fields' => [
        'video' => [
            'label' => __('Video'),
            'type' => 'text',
            'useLanguages' => true,
        ],
        'video_text' => [
            'label' => __('Video Text'),
            'type' => 'CKEditor',
            'useLanguages' => true,
            'stylesSet' => 'mystyles:/site/modules/InputfieldCKEditor/mystyles.js',
        ],
        'cta' => [
            'label' => __('Cta'),
            'type' => 'text',
            'columnWidth' => 50,
            'useLanguages' => true,
        ],
        'cta_text' => [
            'label' => __('Cta Text'),
            'type' => 'text',
            'columnWidth' => 50,
            'useLanguages' => true,
        ],
    ]
];
