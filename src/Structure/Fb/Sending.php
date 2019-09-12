<?php

/**
 * ManyChat API PHP library
 *
 * @copyright 2019 ManyChat, Inc.
 * @license https://opensource.org/licenses/MIT The MIT License
 */

namespace ManyChat\Structure\Fb;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\API\NamedAPIStructure;
use ManyChat\Utils\Request;

/**
 * ManyChat's API /fb/sending/ namespace structure wrapper
 * @package ManyChat\Structure\Fb
 */
class Sending extends NamedAPIStructure
{
    /**
     * Sends content to the subscriber by its ID
     *
     * @param integer $subscriber_id Subscriber ID
     * @param array $data Content in the public content format (https://manychat.github.io/dynamic_block_docs/)
     * @param string $message_tag Message tag (https://developers.facebook.com/docs/messenger-platform/send-messages/message-tags#supported_tags)
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendContent Documentation
     * of /fb/sending/sendContent method at manychat.com.
     *
     */
    public function sendContent(int $subscriber_id, array $data, string $message_tag): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'data' => $data,
            'message_tag' => $message_tag,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sends content to the subscriber by user_ref
     *
     * @param integer $user_ref User ref
     * @param array $data Content in the public content format (https://manychat.github.io/dynamic_block_docs/)
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendContentByUserRef Documentation
     * of /fb/sending/sendContentByUserRef method at manychat.com.
     *
     */
    public function sendContentByUserRef(int $user_ref, array $data): array
    {
        $arguments = [
            'user_ref' => $user_ref,
            'data' => $data,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sends flow to the subscriber by its ID
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $flow_ns Flow namespace
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendFlow Documentation
     * of /fb/sending/sendFlow method at manychat.com.
     *
     */
    public function sendFlow(int $subscriber_id, string $flow_ns): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'flow_ns' => $flow_ns,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

}
