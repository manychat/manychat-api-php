<?php


namespace ManyChat\fb;

use ManyChat\BaseAPI;
use ManyChat\fb\page\Page;
use ManyChat\fb\sending\Sending;
use ManyChat\fb\subscriber\Subscriber;
use ManyChat\NamedAPIStructure;

class Fb extends NamedAPIStructure
{
    /** @var Page */
    public $page;
    /** @var Sending */
    public $sending;
    /** @var Subscriber */
    public $subscriber;

    public function __construct(BaseAPI $api)
    {
        parent::__construct($api, null);

        $this->page = new Page($api, $this);
        $this->sending = new Sending($api, $this);
        $this->subscriber = new Subscriber($api, $this);
    }
}
