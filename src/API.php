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

namespace ManyChat;

use ManyChat\Exception\InvalidActionException;
use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\fb\Fb;

class API
{
    public const API_URL = 'https://api.manychat.com';

    /** @var string */
    protected $token;
    /** @var Request */
    protected $request;
    /** @var Fb */
    public $fb;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->fb = new Fb($this);
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ];
        $curlOptions = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
        ];
        $this->request = new Request($headers, $curlOptions);
    }

    /**
     * Get current ManyChat API token
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set ManyChat API token
     *
     * @param string $token ManyChat API token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function __get(string $name): APIMethod
    {
        return new APIMethod($name, $this, null);
    }

    public function __set(string $name, $value): void
    {
        throw new InvalidActionException('ManyChat\\API object doesn\'t support property setting');
    }

    public function __isset(string $name): bool
    {
        return true;
    }

    public function callMethod(string $method, array $arguments = [], int $type = Request::GET): array
    {
        if ($type === Request::GET) {
            $result = $this->request->get(self::API_URL . $method, $arguments);
        } else if ($type === Request::POST) {
            $argumentsEncoded = json_encode($arguments);
            $result = $this->request->post(self::API_URL . $method, $argumentsEncoded);
        }
        $result = json_decode($result, true);
        var_dump($result);
        if (!isset($result['status']) || $result['status'] !== 'success') {
            $message = "Calling method {$method} didn't succeed";
            if (isset($result['message'])) {
                $message .= ", error message: {$result['message']}";
            }

            throw new CallMethodNotSucceedException($message);
        }

        return $result;
    }

}
