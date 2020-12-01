<?php

return [
    'langList' => [
        'en' => 'EN',
        'de' => 'DE'
    ],
    'pageTypes' => [
        0 => PAGE_TYPE_STATIC,
        1 => PAGE_TYPE_ARTICLES,
        2 => PAGE_TYPE_CONTACT,
        3 => PAGE_TYPE_GALLERY,
    ],
    'pageTemplates' => [
        0 => [
            0 => 'default',
        ],
        1 => [
            0 => 'default',
            1 => 'products',
            2 => 'blog',
        ],
        2 => [
            0 => 'default',
        ],
        3 => [
            0 => 'default',
        ]
    ],
    'helperFieldsType' => [
        1 => 'text',
        2 => 'textarea',
        3 => 'editor',
        4 => 'attach file',
    ],
    'fileStoreReferenceType' => [
        'pages' => 1,
        'products' => 2,
        'photo_gallery' => 3,
    ],
    'defaultMarkerCoordinates' => [
        'defaultLat' => '41.719378',
        'defaultLng' => '44.792526',
        'defaultZoom' => '8',
        'templateType' => 'streets',
    ],
    'mapTypeList' => [0 => 'streets', 1 => 'light', 2 => 'dark', 3 => 'outdoors', 4 => 'satellite'],
];
