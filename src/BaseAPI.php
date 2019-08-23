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

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\Exception\InvalidActionException;
use ManyChat\Exception\JSONDecodeErrorException;
use ManyChat\Exception\RequestCURLException;

/**
 * Main wrapper to ManyChat's API
 * @package ManyChat
 */
class BaseAPI
{
    /** @var string ManyChat API base URL */
    public const API_URL = 'https://api.manychat.com';

    /** @var string $token ManyChat API token */
    private $token;

    /** @var Request $request CURL-request wrapper */
    private $request;

    public function __construct(string $token)
    {
        $this->token = $token;
        $headers = [
            'Authorization: Bearer '.$token,
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
     * @return string Current ManyChat API token
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

    /**
     * Calls ManyChat's API method $method with arguments $arguments and request type $type
     *
     * @param string $method ManyChat API method
     * @param array $arguments Arguments for method
     * @param int $type Request type (Request::GET or Request::POST)
     *
     * @return array ManyChat API response
     * @throws InvalidActionException If $type not in [Request::GET, Request::POST]
     * @throws RequestCURLException If HTTP request didn't succeed
     * @throws JSONDecodeErrorException If ManyChat's JSON response couldn't be parsed
     * @throws CallMethodNotSucceedException If the result of calling method didn't succeed
     */
    public function callMethod(string $method, array $arguments = [], int $type = Request::GET): array
    {
        switch ($type) {
            case Request::GET:
                $result = $this->request->get(self::API_URL.$method, $arguments);
                break;
            case Request::POST:
                $argumentsEncoded = json_encode($arguments);
                $result = $this->request->post(self::API_URL.$method, $argumentsEncoded);
                break;
            default:
                throw new InvalidActionException("Unknown type {$type}");
        }

        $result = json_decode($result, true);
        if ($result === null) {
            throw new JSONDecodeErrorException('Couldn\'t parse response JSON: '.json_last_error_msg());
        }

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
