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
