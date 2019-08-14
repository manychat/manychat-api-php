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