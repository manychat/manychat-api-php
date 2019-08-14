<?php

/**
 * This file is part of ManyChat BaseAPI PHP library.
 *
 * ManyChat BaseAPI PHP library is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 * ManyChat BaseAPI PHP library is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 *    along with ManyChat BaseAPI PHP library.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @license GPL
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace ManyChat;

use ManyChat\Exception\RequestCURLException;

class Request
{
    public const GET = 1;
    public const POST = 2;

    protected $curl;
    protected $defaultHeaders;
    protected $defaultCURLOptions;

    public function __construct($defaultHeaders = [], $defaultCURLOptions = [])
    {
        $this->curl = curl_init();
        $this->defaultHeaders = $defaultHeaders;
        $this->defaultCURLOptions = $defaultCURLOptions;
    }

    public function request(array $curlOptions)
    {
        if (!empty($this->defaultHeaders)) {
            if (!isset($curlOptions[CURLOPT_HTTPHEADER])) {
                $curlOptions[CURLOPT_HTTPHEADER] = [];
            }
            $curlOptions[CURLOPT_HTTPHEADER] = $this->defaultHeaders + $curlOptions[CURLOPT_HTTPHEADER];
        }

        $options = $this->defaultCURLOptions + $curlOptions;
        curl_setopt_array($this->curl, $options);
        $result = curl_exec($this->curl);
        if ($result === false) {
            throw new RequestCURLException(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }

    public function get(string $url, ?array $data = [])
    {
        if (!empty($data)) {
            $url = $url . '?' . http_build_query($data);
        }

        $options = [
            CURLOPT_URL => $url,
        ];

        return $this->request($options);
    }

    public function post(string $url, string $data)
    {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        ];

        return $this->request($options);
    }

}
