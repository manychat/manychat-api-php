<?php


namespace ManyChat\fb\sending;

use ManyChat\API;
use ManyChat\APIMethod;
use ManyChat\Request;

class Sending extends APIMethod
{
    public function __construct(API $api, ?APIMethod $parent)
    {
        parent::__construct('sending', $api, $parent);
    }

    public function sendContent(int $subscriber_id, array $data, string $message_tag): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'data' => $data,
            'message_tag' => $message_tag,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function sendContentByUserRef(int $user_ref, array $data): array
    {
        $arguments = [
            'user_ref' => $user_ref,
            'data' => $data,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    public function sendFlow(int $subscriber_id, string $flow_ns): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'flow_ns' => $flow_ns,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

}
