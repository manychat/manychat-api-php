<?php

namespace ManyChat;

use ManyChat\fb\Fb;
use ManyChat\Exception\NotInitialisedException;

class MC
{
    /** @var MC */
    private static $instance;
    /** @var Fb */
    public $fb;

    public static function api(): MC
    {
        if (null === static::$instance) {
            throw new NotInitialisedException('Please initialise library with calling MC::init method');
        }

        return static::$instance;
    }

    public static function init(string $token): void
    {
        static::$instance = new static($token);
    }

    private function __construct(string $token)
    {
        $api = new BaseAPI($token);
        $this->fb = new Fb($api);
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}
