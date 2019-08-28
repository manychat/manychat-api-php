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

namespace ManyChat\API;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\Exception\InvalidActionException;
use ManyChat\Utils\Request;

/**
 * Recursive API-structure builder and method-runner
 * @package ManyChat
 */
class APIStructure
{
    /** @var string $name APIStructure name */
    private $name;

    /** @var BaseAPI $api BaseAPI instance */
    private $api;

    /** @var APIStructure|null $parent Parent's APIStructure */
    private $parent;

    public function __construct(string $name, BaseAPI $api, ?APIStructure $parent)
    {
        $this->name = $name;
        $this->api = $api;
        $this->parent = $parent;
    }

    /**
     * Creates child structure when user tries to access it as a property of current structure
     *
     * @param string $name The name of the child structure
     *
     * @return APIStructure Created child structure
     */
    public function __get(string $name): APIStructure
    {
        return new APIStructure($name, $this->api, $this);
    }

    /**
     * Throws exception when user tries to change some property
     *
     * @throws InvalidActionException always
     */
    public function __set($name, $value)
    {
        throw new InvalidActionException('ManyChat\\APIStructure object doesn\'t support property setting');
    }

    /**
     * Returns that every property is set
     *
     * @return bool Always true
     */
    public function __isset(string $name): bool
    {
        return true;
    }

    /**
     * Returns current structure name
     *
     * @return string Current structure name
     */
    protected function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets current structure name
     *
     * @param string $name Current structure name
     */
    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns BaseAPI instance
     *
     * @return BaseAPI BaseAPI INSTANCE
     */
    protected function getApi(): BaseAPI
    {
        return $this->api;
    }

    /**
     * Sets BaseAPI instance
     *
     * @param BaseAPI $api BaseAPI instance
     */
    protected function setApi(BaseAPI $api): void
    {
        $this->api = $api;
    }

    /**
     * Returns parent APIStructure
     *
     * @return APIStructure Parent APIStructure
     */
    protected function getParent(): ?APIStructure
    {
        return $this->parent;
    }

    /**
     * Sets current structure's parent structure
     *
     * @param APIStructure|null $parent Parent instance
     */
    protected function setParent(?APIStructure $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * Builds full ManyChat's API method path for current structure
     * e.g. if instance is named 'bar' and has parent structure 'foo',
     * and this method is called for build method 'methodName',
     * it will return '/foo/bar/methodName' string
     *
     * @param string $name Method name
     *
     * @return string Full method path
     */
    protected function getMethodAddress(string $name): string
    {
        $methodAddress = '/'.$this->name.'/'.$name;
        $parent = $this->parent;
        while ($parent !== null) {
            $methodAddress = '/'.$parent->name.$methodAddress;
            $parent = $parent->parent;
        }

        return $methodAddress;
    }

    /**
     * Calls ManyChat's API method $name with $arguments in current structure
     * By default method is called as GET request, but you could specify it with
     * 'method_type' argument in $arguments
     *
     * @param string $name Method name
     * @param array $arguments Method arguments
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @throws InvalidActionException If invalid 'method_type' was passed
     */
    public function __call(string $name, array $arguments): array
    {
        $methodType = Request::GET;
        if (isset($arguments['method_type'])) {
            $methodType = $arguments['method_type'];
            unset($arguments['method_type']);
        }

        $methodName = $this->getMethodAddress($name);

        if (!empty($arguments)) {
            $arguments = $arguments[0];
        }

        return $this->api->callMethod($methodName, $arguments, $methodType);
    }
}
