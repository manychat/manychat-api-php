<?php


namespace ManyChat\fb\page;

use ManyChat\API;
use ManyChat\APIMethod;
use ManyChat\Request;

class Page extends APIMethod
{
    public function __construct(API $api, ?APIMethod $parent)
    {
        parent::__construct('page', $api, $parent);
    }

    public function getInfo(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName);
    }

    public function createTag(string $name): array
    {
        $arguments = [
            'name' => $name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function getTags(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName);
    }

    public function removeTag(int $tag_id): array
    {
        $arguments = [
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function removeTagByName(string $tag_name): array
    {
        $arguments = [
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function getWidgets(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName);
    }

    public function getCustomFields(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName);
    }

    public function getBotFields(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName);
    }

    public function createBotField(string $name, string $type, string $description): array
    {
        $arguments = [
            'name' => $name,
            'type' => $type,
            'description' => $description,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function setBotField(int $field_id, string $field_value): array
    {
        $arguments = [
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function setBotFieldByName(string $field_name, string $field_value): array
    {
        $arguments = [
            'field_name' => $field_name,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

}
