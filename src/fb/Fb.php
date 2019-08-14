<?php


namespace ManyChat\fb;

use ManyChat\API;
use ManyChat\APIMethod;
use ManyChat\fb\page\Page;
use ManyChat\fb\sending\Sending;
use ManyChat\fb\subscriber\Subscriber;

class Fb extends APIMethod
{
    /** @var Page */
    public $page;
    /** @var Sending */
    public $sending;
    /** @var Subscriber */
    public $subscriber;

    public function __construct(API $api)
    {
        $className = strtolower(substr(strrchr(__CLASS__, "\\"), 1));
        parent::__construct($className, $api, null);

        $this->page = new Page($api, $this);
        $this->sending = new Sending($api, $this);
        $this->subscriber = new Subscriber($api, $this);
    }
}
