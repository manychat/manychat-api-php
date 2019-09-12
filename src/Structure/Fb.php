<?php

/**
 * ManyChat API PHP library
 *
 * @copyright 2019 ManyChat, Inc.
 * @license https://opensource.org/licenses/MIT The MIT License
 */

namespace ManyChat\Structure;

use ManyChat\API\BaseAPI;
use ManyChat\Structure\Fb\Page;
use ManyChat\Structure\Fb\Sending;
use ManyChat\Structure\Fb\Subscriber;
use ManyChat\API\NamedAPIStructure;

/**
 * ManyChat's API /fb/ namespace structure wrapper
 * @package ManyChat\Structure
 */
class Fb extends NamedAPIStructure
{
    /** @var Page ManyChat's API /fb/page/ namespace structure */
    public $page;

    /** @var Sending ManyChat's API /fb/sending/ namespace structure */
    public $sending;

    /** @var Subscriber ManyChat's API /fb/subscriber/ namespace structure */
    public $subscriber;

    public function __construct(BaseAPI $api)
    {
        parent::__construct($api, null);

        $this->page = new Page($api, $this);
        $this->sending = new Sending($api, $this);
        $this->subscriber = new Subscriber($api, $this);
    }
}
