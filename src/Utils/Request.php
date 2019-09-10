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

namespace ManyChat\Utils;

use ManyChat\Exception\HTTPNotFoundException;
use ManyChat\Exception\RequestCURLException;

/**
 * CURL-request wrapper
 * @package ManyChat\Utils
 */
class Request
{
    /** @var integer HTTP method GET */
    public const GET = 1;

    /** @var integer HTTP method POST */
    public const POST = 2;

    /** @var integer HTTP Not Found status code */
    public const HTTP_NOTFOUND_CODE = 404;

    /** @var resource|false $curl CURL session object */
    private $curl;

    /** @var array $defaultHeaders Default request headers */
    private $defaultHeaders;

    /** @var array $defaultCURLOptions Default CURL options */
    private $defaultCURLOptions;

    public function __construct($defaultHeaders = [], $defaultCURLOptions = [])
    {
        $this->curl = curl_init();
        $this->defaultHeaders = $defaultHeaders;
        $this->defaultCURLOptions = $defaultCURLOptions;
    }

    /**
     * Makes CURL request with given CURL options
     *
     * @param array $curlOptions CURL options
     *
     * @return string Request's response
     * @throws RequestCURLException If the request didn't succeed
     * @throws HTTPNotFoundException If the server's reply is HTTP Not Found code (404)
     */
    public function request(array $curlOptions): string
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

        $responseCode = curl_getinfo($this->curl, CURLINFO_RESPONSE_CODE);
        if ($responseCode === self::HTTP_NOTFOUND_CODE) {
            throw new HTTPNotFoundException("404 Not Found: {$options[CURLOPT_URL]}");
        }

        return $result;
    }

    /**
     * Makes CURL GET-request to the $url with parameters $data
     *
     * @param string $url URL
     * @param array|null $data GET-request parameters
     *
     * @return string Request's response
     * @throws RequestCURLException If the request didn't succeed
     */
    public function get(string $url, ?array $data = []): string
    {
        if (!empty($data)) {
            $url = $url.'?'.http_build_query($data);
        }

        $options = [
            CURLOPT_URL => $url,
        ];

        return $this->request($options);
    }

    /**
     * Makes CURL POST-request to the $url with parameters $data
     *
     * @param string $url URL
     * @param string $data POST-request parameters
     *
     * @return string Request's response
     * @throws RequestCURLException If the request didn't succeed
     */
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
