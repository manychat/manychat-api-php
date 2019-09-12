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
 * ManyChat's API /fb/subscriber/ namespace structure wrapper
 * @package ManyChat\Structure\Fb
 */
class Subscriber extends NamedAPIStructure
{
    /**
     * Gets information about the subscriber by its ID
     *
     * @param integer $subscriber_id Subscriber ID
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_getInfo Documentation
     * of /fb/subscriber/getInfo method at manychat.com.
     *
     */
    public function getInfo(int $subscriber_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Finds subscribers by name
     *
     * @param string $name Name
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_findByName Documentation
     * of /fb/subscriber/findByName method at manychat.com.
     *
     */
    public function findByName(string $name): array
    {
        $arguments = [
            'name' => $name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Gets information about the subscriber by user_ref
     *
     * @param integer $user_ref User ref
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_getInfoByUserRef Documentation
     * of /fb/subscriber/getInfoByUserRef method at manychat.com.
     *
     */
    public function getInfoByUserRef(int $user_ref): array
    {
        $arguments = [
            'user_ref' => $user_ref,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Finds subscribers by custom field value
     *
     * @param integer $field_id Custom field ID
     * @param string $field_value Custom field value
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/get_fb_subscriber_findByCustomField Documentation
     * of /fb/subscriber/findByCustomField method at manychat.com.
     *
     */
    public function findByCustomField(int $field_id, string $field_value): array
    {
        $arguments = [
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::GET);
    }

    /**
     * Adds tag by its ID to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $tag_id Tag ID
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_addTag Documentation
     * of /fb/subscriber/addTag method at manychat.com.
     *
     */
    public function addTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Adds tag by its name to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $tag_name Tag name
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_addTagByName Documentation
     * of /fb/subscriber/addTagByName method at manychat.com.
     *
     */
    public function addTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Removes tag by its ID from the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $tag_id Tag ID
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_removeTag Documentation
     * of /fb/subscriber/removeTag method at manychat.com.
     *
     */
    public function removeTag(int $subscriber_id, int $tag_id): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Removes tag by its name from the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $tag_name Tag name
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_removeTagByName Documentation
     * of /fb/subscriber/removeTagByName method at manychat.com.
     *
     */
    public function removeTagByName(int $subscriber_id, string $tag_name): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sets custom field value by its ID to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param integer $field_id Custom field ID
     * @param string $field_value Custom field value
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_setCustomField Documentation
     * of /fb/subscriber/setCustomField method at manychat.com.
     *
     */
    public function setCustomField(int $subscriber_id, int $field_id, string $field_value): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sets custom field value by its name to the subscriber
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $field_name Custom field ID
     * @param string $field_value Custom field value
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_setCustomFieldByName Documentation
     * of /fb/subscriber/setCustomFieldByName method at manychat.com.
     *
     */
    public function setCustomFieldByName(int $subscriber_id, string $field_name, string $field_value): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'field_name' => $field_name,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Verifies subscriber by signed request
     *
     * @param integer $subscriber_id Subscriber ID
     * @param string $signed_request Signed request
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Subscriber/post_fb_subscriber_verifyBySignedRequest Documentation
     * of /fb/subscriber/verifyBySignedRequest method at manychat.com.
     *
     */
    public function verifyBySignedRequest(int $subscriber_id, string $signed_request): array
    {
        $arguments = [
            'subscriber_id' => $subscriber_id,
            'signed_request' => $signed_request,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

}
