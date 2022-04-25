<?php

namespace Yaromir\ShopPackage;

use Carbon\Exceptions\InvalidFormatException;
use KMLaravel\GeographicalCalculator\Facade\GeoFacade;

class Delivery
{
    private $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function calculateDeliveryPrice(float $latitude1, float $longitude1, float $latitude2, float $longitude2, float $pricePerHour)
    {
        $selectedService = config('shoppackage.selected_geo_service');
        switch ($selectedService) {
            case "mathematical":
                $this->kmlaravelDeliveryPrice($latitude1,$longitude1, $latitude2, $longitude2, $pricePerHour);
                break;
            case "kmlaravel":
                $this->mathDeliveryPrice($latitude1,$longitude1, $latitude2, $longitude2, $pricePerHour);
                break;
            default:
                throw new InvalidFormatException('error');
        }
        return $this;
    }

    private function kmlaravelDeliveryPrice(float $latitude1, float $longitude1, float $latitude2, float $longitude2, float $pricePerHour)
    {
        $this->result = $pricePerHour * GeoFacade::setPoint([$latitude1, $longitude1])->setOptions(['units' => ['km']])
            ->setPoint([$latitude2, $longitude2])->getDistance()['1-2']['km'];

        return $this;
    }

    private function mathDeliveryPrice(float $latitude1, float $longitude1, float $latitude2, float $longitude2, float $pricePerHour)
    {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        $this->result = round($distance,2) * $pricePerHour;
        return $this;
    }

    public function result()
    {
        return $this->result;
    }

    public function __toString()
    {
        return "{$this->result}";
    }
}
