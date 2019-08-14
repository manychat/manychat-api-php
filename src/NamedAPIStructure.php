<?php

namespace ManyChat;

class NamedAPIStructure extends APIMethod
{
    public function __construct(BaseAPI $api, ?APIMethod $parent)
    {
        $className = strtolower(substr(strrchr(get_class($this), "\\"), 1));
        parent::__construct($className, $api, $parent);
    }
}
