<?php


namespace ManyChat\fb\page;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\NamedAPIStructure;
use ManyChat\Request;

class Page extends NamedAPIStructure
{
    /**
     * Get information about the page that corresponds to the current token
     *
     * @return array The result of calling BaseAPI method
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
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
