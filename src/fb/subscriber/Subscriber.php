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

namespace ManyChat\fb\subscriber;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\NamedAPIStructure;
use ManyChat\Request;

class Subscriber extends NamedAPIStructure
{
    /**
     * Gets information about the subscriber by its ID
     *
     * @param integer $subscriber_id Subscriber ID
     *
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_getInfo Documentation
     * of /fb/subscriber/getInfo method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getInfo(int $subscriber_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Finds subscribers by name
     *
     * @param string $name Name
     *
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_findByName Documentation
     * of /fb/subscriber/findByName method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function findByName(string $name): array
    {
        $arguments = [
            'name' => $name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Gets information about the subscriber by user_ref
     *
     * @param integer $user_ref User ref
     *
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_getInfoByUserRef Documentation
     * of /fb/subscriber/getInfoByUserRef method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getInfoByUserRef(int $user_ref): array
    {
        $arguments = [
            'user_ref' => $user_ref,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Finds subscribers by custom field value
     *
     * @param integer $field_id Custom field ID
     * @param string $field_value Custom field value
     *
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_findByCustomField Documentation
     * of /fb/subscriber/findByCustomField method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function findByCustomField(int $field_id, string $field_value): array
    {
        $arguments = [
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Adds tag by its ID to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $tag_id Tag ID
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_addTag Documentation
     * of /fb/subscriber/addTag method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function addTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Adds tag by its name to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $tag_name Tag name
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_addTagByName Documentation
     * of /fb/subscriber/addTagByName method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function addTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Removes tag by its ID from the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $tag_id Tag ID
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_removeTag Documentation
     * of /fb/subscriber/removeTag method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function removeTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Removes tag by its name from the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $tag_name Tag name
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_removeTagByName Documentation
     * of /fb/subscriber/removeTagByName method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function removeTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->api->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sets custom field value by its ID to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $field_id Custom field ID
     * @param string $field_value Custom field value
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_setCustomField Documentation
     * of /fb/subscriber/setCustomField method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
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

    /**
     * Sets custom field value by its name to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $field_name Custom field ID
     * @param string $field_value Custom field value
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_setCustomFieldByName Documentation
     * of /fb/subscriber/setCustomFieldByName method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
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

    /**
     * Verifies subscriber by signed request
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $signed_request Signed request
     *
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_verifyBySignedRequest Documentation
     * of /fb/subscriber/verifyBySignedRequest method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
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
