<?php
/**
 * @file GoogleMapsResponse.php
 * @author maxpoltoratsky
 */

namespace app\services\response;

use app\exceptions\MapsResponseException;

/**
 * Class GoogleMapsResponse
 * @package app\services\response
 */
class GoogleMapsResponse extends AbstractMapsResponse
{
    protected $city;
    protected $areaLevel1;
    protected $areaLevel2;
    protected $country;

    const LOCALITY = 'locality';
    const ADMIN_AREA_LEVEL_1 = 'administrative_area_level_1';
    const ADMIN_AREA_LEVEL_2 = 'administrative_area_level_2';
    const COUNTRY = 'country';

    /**
     * Process payload
     *
     * @throws MapsResponseException
     */
    protected function processPayload()
    {
        if (!isset($this->payload['address_components'])) {
            throw new MapsResponseException('Incorrect payload format');
        }

        foreach ($this->payload['address_components'] as $component) {
            list($areaType) = $component['types'];
            $name = $component['long_name'];

            switch ($areaType) {
                case self::LOCALITY:
                    $this->city = $name;
                    break;

                case self::ADMIN_AREA_LEVEL_1:
                    $this->areaLevel1 = $name;
                    break;

                case self::ADMIN_AREA_LEVEL_2:
                    $this->areaLevel2 = $name;
                    break;

                case self::COUNTRY:
                    $this->country = $name;
                    break;

                default:
                    break;
            }
        }
    }

    /**
     * Get data as array
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'city' => $this->city,
            'areaLevel2' => $this->areaLevel2,
            'areaLevel1' => $this->areaLevel1,
            'country' => $this->country
        ];
    }
}
