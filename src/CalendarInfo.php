<?php
/**
 * Copyright (C)  2018  Alexander Jank <alex@zeraton.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
 */

namespace Zeraton\Calendize;

/**
 * A class for holding basic calendar information
 *
 * @see awl / davical https://gitlab.com/davical-project/davical
 * @author Andrew McMillan <andrew@mcmillan.net.nz>
*/
class CalendarInfo
{

    /**
     * @var string
     */
    public $url;

    /**
     * @var null | string
     */
    public $displayname;

    /**
     * @var null | string
     */
    public $getctag;

    /**
     * CalendarInfo constructor.
     *
     * @param $url
     * @param null $displayname
     * @param null $getctag
     */
    public function __construct($url, $displayname = null, $getctag = null)
    {
        $this->url = $url;
        $this->displayname = $displayname;
        $this->getctag = $getctag;
    }

    public function __toString()
    {
        return '(URL: ' . $this->url
            . '   Ctag: ' . $this->getctag
            . '   Displayname: ' . $this->displayname . ')' . "\n";
    }
}
