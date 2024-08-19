<?php

namespace StefanGalescu\Heroicons;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \StefanGalescu\Heroicons\Tags\Heroicon::class,
    ];
}
