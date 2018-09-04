<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '248795902417241',
            'client_secret' => 'f4fd7186ab4c2b59013e739791632a01',
            'redirect_uri' => 'http://codingforum.dev/facebook/redirect',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '925409736157-li7op3ghtipf7cen47ph4q2g0muc2562.apps.googleusercontent.com',
            'client_secret' => '25WC4qTMP6Gy64NR9VkJic7K',
            'redirect_uri' => 'http://codingforum.dev/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'f770f1fcc33b3fe5692b',
            'client_secret' => '35b26d343e1920a37b5bba8fc2c665bd5490a42f',
            'redirect_uri' => 'http://codingforum.dev/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
