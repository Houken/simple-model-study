<?php

namespace App\Traits;

use Illuminate\Support\Facades\URL;

trait HasPreviousRouteInfo
{
    protected function getPreviousRouteAndParams()
    {
        $previousUrl = URL::previous();
        $previousRoute = $previousUrl ? $this->getMatchRequest($previousUrl)->getName() : 'dashboard';
        $previousParams = $previousUrl ? $this->getMatchRequest($previousUrl)->parameters() : [];
        $previousRouteAndParams = [
            'previousRoute' => $previousRoute,
            'previousParams' => $previousParams,
        ];

        return $previousRouteAndParams;
    }

    protected function getMatchRequest($url)
    {
        $match = app('router')->getRoutes()->match(app('request')->create($url));

        return $match;
    }
}
