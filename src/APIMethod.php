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

use ManyChat\Exception\InvalidActionException;


class APIMethod
{
    protected $name;
    protected $api;
    protected $parent;

    public function __construct(string $name, BaseAPI $api, ?APIMethod $parent)
    {
        $this->name = $name;
        $this->api = $api;
        $this->parent = $parent;
    }

    public function __get($name)
    {
        return new APIMethod($name, $this->api, $this);
    }

    public function __set($name, $value)
    {
        throw new InvalidActionException('ManyChat\\APIMethod object doesn\'t support property setting');
    }

    public function __isset($name)
    {
        return true;
    }

    protected function getMethodAddress($name): string
    {
        $methodAddress = '/' . $this->name . '/' . $name;
        $parent = $this->parent;
        while ($parent !== null) {
            $methodAddress = '/' . $parent->name . $methodAddress;
            $parent = $parent->parent;
        }

        return $methodAddress;
    }

    public function __call($name, $arguments)
    {
        $methodName = $this->getMethodAddress($name);

        if (!empty($arguments)) {
            $arguments = $arguments[0];
        }

        return $this->api->callMethod($methodName, $arguments);
    }
}
