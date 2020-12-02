<?php

namespace App\Traits;

trait MapCoordinate
{
    protected $defaultMarkerCoordinates;

    /**
     * @param null $pageID
     * @return mixed
     * @throws \Exception
     */
    protected function getDefaultCoordinates($pageID = null)
    {
        $coordinates = \App\Models\MapCoordinate::where('page_id', $pageID)->first();
        if (!empty($coordinates)) {
            $default['lat'] = $coordinates->lat;
            $default['lng'] = $coordinates->lng;
            $default['zoom'] = $coordinates->zoom;
            $default['templateType'] = setting('mapTypeList')[$coordinates->template_type];
        } else {
            $default['lat'] = $this->defaultMarkerCoordinates['defaultLat'];
            $default['lng'] = $this->defaultMarkerCoordinates['defaultLng'];
            $default['zoom'] = $this->defaultMarkerCoordinates['defaultZoom'];
            $default['templateType'] = $this->defaultMarkerCoordinates['templateType'];
        }
        return $default;
    }
}