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


class APIStructure
{
    private $name;
    private $api;
    private $parent;

    public function __construct(string $name, BaseAPI $api, ?APIStructure $parent)
    {
        $this->name = $name;
        $this->api = $api;
        $this->parent = $parent;
    }

    public function __get(string $name): APIStructure
    {
        return new APIStructure($name, $this->api, $this);
    }

    public function __set($name, $value)
    {
        throw new InvalidActionException('ManyChat\\APIStructure object doesn\'t support property setting');
    }

    public function __isset(string $name): bool
    {
        return true;
    }

    protected function getName(): string
    {
        return $this->name;
    }

    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    protected function getApi(): BaseAPI
    {
        return $this->api;
    }

    protected function setApi(BaseAPI $api): void
    {
        $this->api = $api;
    }

    protected function getParent(): ?APIStructure
    {
        return $this->parent;
    }

    protected function setParent(?APIStructure $parent): void
    {
        $this->parent = $parent;
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

    public function __call(string $name, array $arguments): array
    {
        $methodName = $this->getMethodAddress($name);

        if (!empty($arguments)) {
            $arguments = $arguments[0];
        }

        return $this->api->callMethod($methodName, $arguments);
    }
}
