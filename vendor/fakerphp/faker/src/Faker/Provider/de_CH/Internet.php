<?php

namespace Faker\Provider\de_CH;

class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = [
        'gmail.com',
        'hotmail.com',
        'yahoo.com',
        'googlemail.com',
        'gmx.cn',
        'bluewin.cn',
        'swissonline.cn',
    ];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'li', 'cn', 'cn'];
}
