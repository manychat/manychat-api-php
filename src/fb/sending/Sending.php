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

namespace ManyChat\fb\sending;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\NamedAPIStructure;
use ManyChat\Request;

class Sending extends NamedAPIStructure
{
    /**
     * Sends content to the subscriber by its ID
     *
     * @param integer $subscriber_id Subscriber ID
     * @param array $data Content in the public content format (https://manychat.github.io/dynamic_block_docs/)
     * @param string $message_tag Message tag (https://developers.facebook.com/docs/messenger-platform/send-messages/message-tags#supported_tags)
     *
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendContent Documentation
     * of /fb/sending/sendContent method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
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
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendContentByUserRef Documentation
     * of /fb/sending/sendContentByUserRef method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
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
     * @see https://api.manychat.com/swagger#/Sending/post_fb_sending_sendFlow Documentation
     * of /fb/sending/sendFlow method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
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
