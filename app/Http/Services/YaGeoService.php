<?php

namespace App\Http\Services;

use YaGeo;

class YaGeoService
{
    public function getCoordinates(string $city_name, string $city_address)
    {
        $geo_data = YaGeo::setQuery("$city_name, $city_address")->load();
        $latitude = $geo_data->getResponse()->getLatitude();
        $longitude = $geo_data->getResponse()->getLongitude();
        return [$latitude, $longitude];
    }

    public function validateAddress(string $full_address)
    {
        return YaGeo::setQuery("$full_address")->load()->getResponse() !== null;
    }
}
