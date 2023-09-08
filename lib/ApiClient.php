<?php
/**
 * ApiClient
 *
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

/**
 * ApiClient Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licence v2
 * @link
 */
class ApiClient {

    public static string $PATCH   = "PATCH";
    public static string $POST    = "POST";
    public static string $GET     = "GET";
    public static string $HEAD    = "HEAD";
    public static string $OPTIONS = "OPTIONS";
    public static string $PUT     = "PUT";
    public static string $DELETE  = "DELETE";

    /**
     * Configuration
     *
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * Object Serializer
     *
     * @var ObjectSerializer
     */
    protected ObjectSerializer $serializer;

    /**
     * Constructor of the class
     *
     * @param \Systran\Client\Configuration|null $config config for this ApiClient
     */
    function __construct( Configuration $config = null ) {
        if ( $config == null ) {
            $config = Configuration::getDefaultConfiguration();
        }

        $this->config     = $config;
        $this->serializer = new ObjectSerializer();
    }

    /**
     * Get the config
     *
     * @return Configuration
     */
    public function getConfig(): Configuration {
        return $this->config;
    }

    /**
     * Get the serializer
     *
     * @return ObjectSerializer
     */
    public function getSerializer(): ObjectSerializer {
        return $this->serializer;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     *
     * @return string|null API key with the prefix
     */
    public function getApiKeyWithPrefix( string $apiKeyIdentifier ): ?string {
        $prefix = $this->config->getApiKeyPrefix( $apiKeyIdentifier );
        $apiKey = $this->config->getApiKey( $apiKeyIdentifier );

        if ( !isset( $apiKey ) ) {
            return null;
        }

        if ( isset( $prefix ) ) {
            $keyWithPrefix = $prefix . " " . $apiKey;
        }
        else {
            $keyWithPrefix = $apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Make the HTTP call (Sync)
     *
     * @param string      $resourcePath path to method endpoint
     * @param string      $method       method to call
     * @param mixed       $queryParams  parameters to be place in query URL
     * @param mixed       $postData     parameters to be placed in POST body
     * @param mixed       $headerParams parameters to be place in request header
     * @param string|null $responseType expected response type of the endpoint
     *
     * @return array
     * @throws \Systran\Client\ApiException on a non 2xx response
     */
    public function callApi( string $resourcePath, string $method, mixed $queryParams, mixed $postData, mixed $headerParams, string $responseType = null ) : array {

        $headers = array();

        // construct the http header
        $headerParams = array_merge(
            $this->config->getDefaultHeaders(),
            $headerParams
        );

        foreach ( $headerParams as $key => $val ) {
            $headers[] = "$key: $val";
        }

        // form data
        if ( $postData and in_array( 'Content-Type: application/x-www-form-urlencoded', $headers ) ) {
            $postData = http_build_query( $postData );
        }
        json_encode( $postData );
        $url = $this->config->getHost() . $resourcePath;

        $curl = curl_init();
        // Disable Safe Upload in php 7 ( no longer supported ) 
        if ( !class_exists( "\CURLFile" ) && defined( 'CURLOPT_SAFE_UPLOAD' ) ) {
            /** @noinspection PhpDeprecationInspection */
            curl_setopt( $curl, CURLOPT_SAFE_UPLOAD, false );
        }

        // set timeout, if needed
        if ( $this->config->getCurlTimeout() != 0 ) {
            curl_setopt( $curl, CURLOPT_TIMEOUT, $this->config->getCurlTimeout() );
        }
        // return the result on success, rather than just TRUE
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );

        if ( !empty( $queryParams ) ) {
            $url = ( $url . '?' . http_build_query( $queryParams ) );
        }

        if ( $method == self::$POST ) {
            curl_setopt( $curl, CURLOPT_POST, true );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, $postData );
        }
        else {
            if ( $method == self::$HEAD ) {
                curl_setopt( $curl, CURLOPT_NOBODY, true );
            }
            else {
                if ( $method == self::$OPTIONS ) {
                    curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "OPTIONS" );
                    curl_setopt( $curl, CURLOPT_POSTFIELDS, $postData );
                }
                else {
                    if ( $method == self::$PATCH ) {
                        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PATCH" );
                        curl_setopt( $curl, CURLOPT_POSTFIELDS, $postData );
                    }
                    else {
                        if ( $method == self::$PUT ) {
                            curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
                            curl_setopt( $curl, CURLOPT_POSTFIELDS, $postData );
                        }
                        else {
                            if ( $method == self::$DELETE ) {
                                curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "DELETE" );
                                curl_setopt( $curl, CURLOPT_POSTFIELDS, $postData );
                            }
                            else {
                                if ( $method != self::$GET ) {
                                    throw new ApiException( 'Method ' . $method . ' is not recognized.' );
                                }
                            }
                        }
                    }
                }
            }
        }
        curl_setopt( $curl, CURLOPT_URL, $url );

        // Set user agent
        curl_setopt( $curl, CURLOPT_USERAGENT, $this->config->getUserAgent() );

        // Allow for CA CERTIFICATES to be ignored -> https://curl.haxx.se/docs/sslcerts.html
        if ( $this->config->getStopCurlSSLVerify() ) {
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        }

        // debugging for curl
        if ( $this->config->getDebug() ) {
            error_log( "[DEBUG] HTTP Request body  ~BEGIN~\n" . print_r( $postData, true ) . "\n~END~\n", 3, $this->config->getDebugFile() );

            curl_setopt( $curl, CURLOPT_VERBOSE, 1 );
            curl_setopt( $curl, CURLOPT_STDERR, fopen( $this->config->getDebugFile(), 'a' ) );
        }
        else {
            curl_setopt( $curl, CURLOPT_VERBOSE, 0 );
        }

        // obtain the HTTP response headers
        curl_setopt( $curl, CURLOPT_HEADER, 1 );


        // Make the request
        $response         = curl_exec( $curl );
        $http_header_size = curl_getinfo( $curl, CURLINFO_HEADER_SIZE );
        $http_header      = substr( $response, 0, $http_header_size );
        $http_body        = substr( $response, $http_header_size );
        $response_info    = curl_getinfo( $curl );

        // debug HTTP response body
        if ( $this->config->getDebug() ) {
            error_log( "[DEBUG] HTTP Response body ~BEGIN~\n" . print_r( $http_body, true ) . "\n~END~\n", 3, $this->config->getDebugFile() );
        }

        // Handle the response
        if ( $response_info[ 'http_code' ] == 0 ) {
            throw new ApiException( "API call to $url timed out: " . serialize( $response_info ), 0, null, null );
        }
        else {
            if ( $response_info[ 'http_code' ] >= 200 && $response_info[ 'http_code' ] <= 299 ) {
                // return raw body if response is a file
                if ( $responseType == '\SplFileObject' ) {
                    return [ $http_body,
                             $http_header ];
                }

                $data = json_decode( $http_body );
                if ( json_last_error() > 0 ) { // if response is a string
                    $data = $http_body;
                }
            }
            else {
                throw new ApiException(
                    "[" . $response_info[ 'http_code' ] . "] Error connecting to the API ($url)",
                    $response_info[ 'http_code' ], $http_header, $http_body
                );
            }
        }
        return [ $data,
                 $http_header ];
    }

    /**
     * Return the header 'Accept' based on an array of Accept provided
     *
     * @param string[] $accept Array of header
     *
     * @return string|null Accept (e.g. application/json)
     */
    public static function selectHeaderAccept( array $accept ): ?string {
        if ( count( $accept ) === 0 or ( count( $accept ) === 1 and $accept[ 0 ] === '' ) ) {
            return null;
        }
        elseif ( preg_grep( "/application\/json/i", $accept ) ) {
            return 'application/json';
        }
        else {
            return implode( ',', $accept );
        }
    }

    /**
     * Return the content type based on an array of content-type provided
     *
     * @param string[] $content_type Array fo content-type
     *
     * @return string Content-Type (e.g. application/json)
     */
    public static function selectHeaderContentType( array $content_type ): string {
        if ( count( $content_type ) === 0 or ( count( $content_type ) === 1 and $content_type[ 0 ] === '' ) ) {
            return 'application/json';
        }
        elseif ( preg_grep( "/application\/json/i", $content_type ) ) {
            return 'application/json';
        }
        else {
            return implode( ',', $content_type );
        }
    }
}
