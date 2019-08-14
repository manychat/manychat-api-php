<?php


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
