<?php
/**
 * CrossDomainApi
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
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

namespace Systran\Client\Translation;

use SplFileObject;
use Systran\Client\ApiClient;
use Systran\Client\ApiException;

/**
 * CrossDomainApi Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class CrossDomainApi {

    /**
     * API Client
     *
     * @var \Systran\Client\ApiClient instance of the ApiClient
     */
    protected ApiClient $apiClient;

    /**
     * Constructor
     *
     * @param \Systran\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct( ApiClient $apiClient = null ) {
        if ( $apiClient == null ) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost( 'https://localhost:8903' );
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Systran\Client\ApiClient get the API client
     */
    public function getApiClient(): ApiClient {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Systran\Client\ApiClient $apiClient set the API client
     *
     * @return CrossDomainApi
     */
    public function setApiClient( ApiClient $apiClient ): static {
        $this->apiClient = $apiClient;
        return $this;
    }


    /**
     * clientaccesspolicyXmlGet
     *
     * Silverlight client access policy file
     *
     * @return \SplFileObject|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function clientaccesspolicyXmlGet() : ?SplFileObject{


        // parse inputs
        $resourcePath = "/clientaccesspolicy.xml";
        $resourcePath = str_replace( "{format}", "json", $resourcePath );
        $method       = "GET";
        $httpBody     = '';
        $queryParams  = [];
        $headerParams = [];

        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/xml' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\SplFileObject'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\SplFileObject', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }

    }

    /**
     * crossdomainXmlGet
     *
     * Adobe Flash cross-domain policy file
     *
     * @return \SplFileObject|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function crossdomainXmlGet(): ?SplFileObject {


        // parse inputs
        $resourcePath   = "/crossdomain.xml";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "GET";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/xml' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\SplFileObject'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\SplFileObject', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }

    }

}
