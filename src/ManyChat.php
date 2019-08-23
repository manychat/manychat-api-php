<?php

/**
 * This file is part of ManyChat API PHP library.
 *
 * ManyChat API PHP library is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 * ManyChat API PHP library is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 *    along with ManyChat API PHP library.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @license GPL
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace ManyChat;

use ManyChat\Exception\NotInitialisedException;
use ManyChat\fb\Fb;

/**
 * Main class for library usage
 * @package ManyChat
 */
final class ManyChat
{
    /** @var ManyChat $instance ManyChat class instance to use in singleton */
    private static $instance;
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
     * @throws NotInitialisedException If instance wasn't initialised with ManyChat::init method
     */
    public static function api(): ManyChat
    {
        if (null === static::$instance) {
            throw new NotInitialisedException('Please initialise library with calling ManyChat::init method');
        }

        return static::$instance;
    }

    /**
     * Initialises singleton instance with token $token
     *
     * @param string $token ManyChat's API token
     */
    public static function init(string $token): void
    {
        static::$instance = new static($token);
    }

}
