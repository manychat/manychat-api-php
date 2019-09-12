<?php

/**
 * ManyChat API PHP library
 *
 * @copyright 2019 ManyChat, Inc.
 * @license https://opensource.org/licenses/MIT The MIT License
 */

namespace ManyChat;

use ManyChat\Exception\NotInitialisedException;
use ManyChat\API\BaseAPI;
use ManyChat\Structure\Fb;

/**
 * Main class for library usage
 * @package ManyChat
 */
final class ManyChat
{
    /** @var ManyChat $fbInstance ManyChat class instance to use in singleton */
    private static $fbInstance;

    /** @var Fb $fb ManyChat's API /fb/ namespace */
    public $fb;

    /**
     * Initialises ManyChat object with ManyChat's API token $token
     *
     * @param string $token ManyChat's API token
     */
    public function __construct(string $token)
    {
        $api = new BaseAPI($token);
        $this->fb = new Fb($api);
    }

    /**
     * Returns ManyChat instance If singleton object was initialised
     *
     * @return ManyChat ManyChat instance
     * @throws NotInitialisedException If instance wasn't initialised with ManyChat::fbInit method
     */
    public static function fbApi(): ManyChat
    {
        if (null === static::$fbInstance) {
            throw new NotInitialisedException('Please initialise library with calling ManyChat::fbInit method');
        }

        return static::$fbInstance;
    }

    /**
     * Initialises singleton instance with token $token
     *
     * @param string $token ManyChat's API token
     */
    public static function fbInit(string $token): void
    {
        static::$fbInstance = new static($token);
    }

}
