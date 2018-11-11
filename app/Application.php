<?php
/**
 * @file Application.php
 * @author maxpoltoratsky
 */

namespace app;

use app\services\GoogleMapsService;

/**
 * Class Application
 */
class Application
{
    public function run()
    {
        $options = getopt('l:', ['location:']);
        $location = $options['l'] ?? $options['location'] ?? '';

        if (!$location) {
            echo 'Location option (proposed address) should be provided!', PHP_EOL;
            exit;
        }

        try {
            $service = new GoogleMapsService();
            $response = $service->getLocation($location);
            print_r($response->getData());
        } catch (\Exception $e) {
            echo 'Error!', PHP_EOL, $e->getMessage(), PHP_EOL;
        }
    }
}
