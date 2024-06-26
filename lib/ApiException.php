<?php
/**
 * ApiException
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licence v2
 * @link
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
/**
 *
 *
 * Do not edit the class manually.
 */

namespace Systran\Client;

use Exception;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licence v2
 * @link
 */
class ApiException extends Exception
{

    /** 
     * The HTTP body of the server response.
     * @var string|null
     */
    protected ?string $responseBody;
  
    /**
     * The HTTP header of the server response.
     * @var string[]
     */
    protected mixed $responseHeaders;
  
    /**
     * The deserialized response object
     * @var $responseObject;
     */
    protected mixed $responseObject;

    /**
     * Constructor
     *
     * @param string      $message         Error message
     * @param int         $code            HTTP status code
     * @param string|null $responseHeaders HTTP response header
     * @param string|null $responseBody    Deseralized response object
     */
    public function __construct(string $message="",int $code=0, mixed $responseHeaders=null, string $responseBody=null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }
  
    /**
     * Gets the HTTP response header
     *
     * @return string HTTP response header
     */
    public function getResponseHeaders() : mixed
    {
        return $this->responseHeaders;
    }
  
    /**
     * Gets the HTTP response body
     *
     * @return string HTTP response body
     */
    public function getResponseBody() : string
    {
        return $this->responseBody;
    }
  
    /**
     * Sets the deseralized response object (during deserialization)
     * @param mixed $obj Deserialized response object
     * @return void
     */
    public function setResponseObject(mixed $obj) : void
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deseralized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject() : mixed
    {
        return $this->responseObject;
    }
}
