<?php

/**
 * ManyChat API PHP library
 *
 * @copyright 2019 ManyChat, Inc.
 * @license https://opensource.org/licenses/MIT The MIT License
 */

namespace ManyChat\API;

/**
 * API-structure that uses for structure-element name of the class
 * @package ManyChat\API
 */
class NamedAPIStructure extends APIStructure
{
    public function __construct(BaseAPI $api, ?APIStructure $parent)
    {
        $className = strtolower(substr(strrchr(get_class($this), "\\"), 1));
        parent::__construct($className, $api, $parent);
    }
}
