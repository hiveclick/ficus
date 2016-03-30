<?php
namespace Ficus;

class Client extends Base\Client {
    
    /**
     * Returns the distance to this client
     * @return integer
     */
    function getDistance($latitude, $longitude) {
        if ($this->getLocation()->getLatitude() != 0 && $this->getLocation()->getLongitude() != 0) {
            // convert from degrees to radians
            $latFrom = deg2rad($latitude);
            $lonFrom = deg2rad($longitude);
            $latTo = deg2rad($this->getLocation()->getLatitude());
            $lonTo = deg2rad($this->getLocation()->getLongitude());
            
            $latDelta = $latTo - $latFrom;
            $lonDelta = $lonTo - $lonFrom;
            
            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
            return $angle * 6371000; // angle * earth radius in m
        } else {
            return 100;
        }
    }
    
}