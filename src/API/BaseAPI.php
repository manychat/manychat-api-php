<?php

/**
 * ManyChat API PHP library
 *
 * @copyright 2019 ManyChat, Inc.
 * @license https://opensource.org/licenses/MIT The MIT License
 */

namespace ManyChat\API;

use ManyChat\Exception\CallMethodNotSucceedException;
use ManyChat\Exception\InvalidActionException;
use ManyChat\Exception\JSONDecodeErrorException;
use ManyChat\Exception\RequestCURLException;
use ManyChat\Utils\Request;

/**
 * Main wrapper to ManyChat's API
 * @package ManyChat\API
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
