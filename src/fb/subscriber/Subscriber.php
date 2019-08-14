<?php


namespace ManyChat\fb\subscriber;

use ManyChat\NamedAPIStructure;
use ManyChat\Request;

class Subscriber extends NamedAPIStructure
{
    public function getInfo(int $subscriber_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    public function findByName(string $name): array
    {
        $arguments = [
            'name' => $name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    public function getInfoByUserRef(int $user_ref): array
    {
        $arguments = [
            'user_ref' => $user_ref,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    public function findByCustomField(int $field_id, string $field_value): array
    {
        $arguments = [
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    public function addTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function addTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function removeTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function removeTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function setCustomField(int $subscriber_id, int $field_id, string $field_value): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function setCustomFieldByName(int $subscriber_id, string $field_name, string $field_value): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'field_name' => $field_name,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function verifyBySignedRequest(int $subscriber_id, string $signed_request): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'signed_request' => $signed_request,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

}
