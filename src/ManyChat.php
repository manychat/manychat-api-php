<?php

namespace ManyChat;

use ManyChat\fb\Fb;

class ManyChat
{
    /** @var Fb */
    public $fb;

    public function __construct(string $token)
    {
        $api = new BaseAPI($token);
        $this->fb = new Fb($api);
    }
}
