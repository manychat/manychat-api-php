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
 * ManyChat's API /fb/page/ namespace structure wrapper
 * @package ManyChat\Structure\Fb
 */
class Page extends NamedAPIStructure
{
    /**
     * Gets information about the page that corresponds to the current token
     *
     * @see https://api.manychat.com/swagger#/Page/get_fb_page_getInfo Documentation
     * of /fb/page/getInfo method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getInfo(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName);
    }

    /**
     * Creates tag
     *
     * @param string $name Tag name
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_createTag Documentation
     * of /fb/page/createTag method at manychat.com.
     *
     */
    public function createTag(string $name): array
    {
        $arguments = [
            'name' => $name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Gets current page tags list
     *
     * @see https://api.manychat.com/swagger#/Page/get_fb_page_getTags Documentation
     * of /fb/page/getTags method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getTags(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName);
    }

    /**
     * Removes tag by its ID
     *
     * @param integer $tag_id Tag ID
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_removeTag Documentation
     * of /fb/page/removeTag method at manychat.com.
     *
     */
    public function removeTag(int $tag_id): array
    {
        $arguments = [
            'tag_id' => $tag_id,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Removes tag by its name
     *
     * @param string $tag_name Tag name
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_removeTagByName Documentation
     * of /fb/page/removeTagByName method at manychat.com.
     *
     */
    public function removeTagByName(string $tag_name): array
    {
        $arguments = [
            'tag_name' => $tag_name,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Gets current page widgets
     *
     * @see https://api.manychat.com/swagger#/Page/get_fb_page_getWidgets Documentation
     * of /fb/page/getWidgets method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getWidgets(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName);
    }

    /**
     * Gets current page custom fields
     *
     * @see https://api.manychat.com/swagger#/Page/get_fb_page_getCustomFields Documentation
     * of /fb/page/getCustomFields method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getCustomFields(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName);
    }

    /**
     * Gets current page bot fields
     *
     * @see https://api.manychat.com/swagger#/Page/get_fb_page_getBotFields Documentation
     * of /fb/page/getBotFields method at manychat.com.
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function getBotFields(): array
    {
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName);
    }

    /**
     * Creates bot field
     *
     * @param string $name Bot field name
     * @param string $type Bot field type
     * @param string $description Description of the bot field
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_createBotField Documentation
     * of /fb/page/createBotField method at manychat.com.
     *
     */
    public function createBotField(string $name, string $type, string $description): array
    {
        $arguments = [
            'name' => $name,
            'type' => $type,
            'description' => $description,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sets bot field value by its ID
     *
     * @param integer $field_id Bot field ID
     * @param string $field_value Bot field value
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_setBotField Documentation
     * of /fb/page/setBotField method at manychat.com.
     *
     */
    public function setBotField(int $field_id, string $field_value): array
    {
        $arguments = [
            'field_id' => $field_id,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

    /**
     * Sets bot field value by its name
     *
     * @param string $field_name Bot field name
     * @param string $field_value Bot field value
     *
     * @return array The resulting array that was received from ManyChat API
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     * @see https://api.manychat.com/swagger#/Page/post_fb_page_setBotFieldByName Documentation
     * of /fb/page/setBotFieldByName method at manychat.com.
     *
     */
    public function setBotFieldByName(string $field_name, string $field_value): array
    {
        $arguments = [
            'field_name' => $field_name,
            'field_value' => $field_value,
        ];
        $methodName = $this->getMethodAddress(__FUNCTION__);

        return $this->getApi()->callMethod($methodName, $arguments, Request::POST);
    }

}
