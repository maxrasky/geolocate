<?php
/**
 * @file GoogleMapsService.php
 * @author maxpoltoratsky
 */

namespace app\services;

use app\services\response\GoogleMapsResponse;
use app\services\response\AbstractMapsResponse;
use GuzzleHttp\Client;

/**
 * Class GoogleMapsService
 */
class GoogleMapsService implements MapsServiceInterface
{
    /**
     * Geocode url
     */
    const GEOCODE_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    /**
     * Get location
     *
     * @param string $term
     * @return AbstractMapsResponse
     */
    public function getLocation(string $term): AbstractMapsResponse
    {
        $client = new Client();
        $params = [
            'address' => $term,
            'key' => getenv('KEY')
        ];
        $res = $client->get(self::GEOCODE_URL, ['query' => $params]);
        $body = \GuzzleHttp\json_decode($res->getBody()->getContents(), true);
        $results = $body['results'];

        if (isset($results) && is_array($results) && count($results) > 0) {
            list($address) = $results;

            return new GoogleMapsResponse($address);
        }

        return new GoogleMapsResponse();
    }
}
