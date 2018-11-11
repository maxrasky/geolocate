<?php
/**
 * @file IMapsService.php
 * @author maxpoltoratsky
 */

namespace app\services;

use app\services\response\AbstractMapsResponse;

/**
 * Class IMapsService
 * @package app\services
 */
interface MapsServiceInterface
{
    public function getLocation(string $term): AbstractMapsResponse;
}
