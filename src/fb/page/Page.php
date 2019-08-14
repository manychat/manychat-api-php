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
