<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [

    // ✅ Laravel doesn't need this to come from .env unless you want to override it.
    'inertia' => false,

    'meta' => [
        'defaults' => [
            'title'        => 'Sunhour Group Co., Ltd', // Default site title
            'titleBefore'  => false, // "Page Title | Sunhour Group Co., Ltd"
            'description'  => 'Explore premium water pumps, filters, faucets, solar systems, tiles, and more in Cambodia with Sunhour Group Co., Ltd.',
            'separator'    => ' | ',
            'keywords'     => [
                'Water Pump',
                'Water Transfer',
                'Filter',
                'Toilet',
                'Faucet',
                'Heat Pump',
                'Dispenser',
                'Tiles',
                'Home Shower',
                'Solar Water',
                'Bathub',
                'Storage Water',
                'Accessories',
                'Transfer Pump',
                'Home Drinking Water',
                'Water System'
            ],
            'canonical'    => null, // Uses current URL
            'robots'       => 'index, follow', // Allows indexing by search engines
        ],

        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],

    'opengraph' => [
        'defaults' => [
            'title'       => 'Sunhour Group Co., Ltd',
            'description' => 'Premium water and home systems in Cambodia from Sunhour Group Co., Ltd.',
            'url'         => null, // Uses current URL
            'type'        => 'website',
            'site_name'   => 'Sunhour Group Co., Ltd',
            'images'      => [
                'https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg', // ✅ Update with your actual OG image path
            ],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@SunHourGroup', // ✅ Update if you have a Twitter handle
        ],
    ],

    'json-ld' => [
        'defaults' => [
            'title'       => 'Sunhour Group Co., Ltd',
            'description' => 'Explore water pumps, solar water, filters, and more from Sunhour Group Co., Ltd in Cambodia.',
            'url'         => null,
            'type'        => 'WebPage',
            'images'      => [
                'https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg',
            ],
        ],
    ],
];
