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
 * Class Credentials
 * Handles the users credentials / connection details to the CalDAV server
 */
class Credentials
{
    /**
     * @var string
     */
    protected $base_url;

    /**
     * @var string
     */
    protected $pass;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $protocol;

    /**
     * @var string
     */
    protected $server;

    /**
     * @var int
     */
    protected $port;

    /**
     * Credentials constructor.
     *
     * @param string $base_url
     * @param string $user
     * @param string $password
     * @throws InvalidUrlException
     */
    public function __construct(string $base_url, string $user, string $password)
    {
        $this->user = $user;
        $this->pass = $password;
        if (preg_match('#^(https?)://([a-z0-9.-]+)(:([0-9]+))?(/.*)$#', $base_url, $matches)) {
            $this->server = $matches[2];
            $this->base_url = $matches[5];
            if ($matches[1] == 'https') {
                $this->protocol = 'ssl';
                $this->port = 443;
            } else {
                $this->protocol = 'tcp';
                $this->port = 80;
            }
            if ($matches[4] != '') {
                $this->port = intval($matches[4]);
            }
        } else {
            throw new InvalidUrlException("Invalid URL:" . $base_url);
        }
    }

    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->base_url;
    }
}
