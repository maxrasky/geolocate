<?php
/**
 * @file MapsResponseInterface.php
 * @author maxpoltoratsky
 */

namespace app\services\response;

/**
 * Interface MapsResponseInterface
 * @package app\services\response
 */
abstract class AbstractMapsResponse
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * AbstractMapsResponse constructor.
     * @param array $payload
     */
    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
        $this->processPayload();
    }

    /**
     * @return mixed
     */
    abstract protected function processPayload();

    /**
     * Get data as array
     *
     * @return array
     */
    abstract public function getData(): array;
}
