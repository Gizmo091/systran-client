<?php
/**
 * TranslationApi
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

namespace Systran\Client\Translation;

use CurlFile;
use InvalidArgumentException;
use SplFileObject;
use Systran\Client\ApiClient;
use Systran\Client\ApiException;
use Systran\Client\Model\BatchCancel;
use Systran\Client\Model\BatchClose;
use Systran\Client\Model\BatchCreate;
use Systran\Client\Model\BatchStatus;
use Systran\Client\Model\ProfilesResponse;
use Systran\Client\Model\SupportedLanguageResponse;
use Systran\Client\Model\TranslationCancel;
use Systran\Client\Model\TranslationFileResponse;
use Systran\Client\Model\TranslationResponse;
use Systran\Client\Model\TranslationStatus;

/**
 * TranslationApi Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licence v2
 * @link
 */
class TranslationApi {

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
            $apiClient->getConfig()->setHost( 'https://api-platform.systran.net' );
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
     * @return TranslationApi
     */
    public function setApiClient( ApiClient $apiClient ): static {
        $this->apiClient = $apiClient;
        return $this;
    }


    /**
     * translationFileBatchCancelPost
     *
     * Batch Cancel
     *
     * @param string|null $batch_id Batch Identifier (required)
     * @param string|null $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\BatchCancel|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileBatchCancelPost( string $batch_id = null, string $callback = null ): ?BatchCancel {

        // verify the required parameter 'batch_id' is set
        if ( $batch_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $batch_id when calling translationFileBatchCancelPost' );
        }

        // parse inputs
        $resourcePath = "/translation/file/batch/cancel";
        $resourcePath = str_replace( "{format}", "json", $resourcePath );
        $method       = "POST";
        $httpBody     = '';
        $queryParams  = [];
        $headerParams = [];

        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/json' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        $queryParams[ 'batchId' ] = $this->apiClient->getSerializer()->toQueryValue( $batch_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\BatchCancel'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\BatchCancel', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\BatchCancel', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationFileBatchClosePost
     *
     * Batch Close
     *
     * @param string|null $batch_id Batch Identifier (required)
     * @param string|null $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\BatchClose|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileBatchClosePost( string $batch_id = null, string $callback = null ): ?BatchClose {

        // verify the required parameter 'batch_id' is set
        if ( $batch_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $batch_id when calling translationFileBatchClosePost' );
        }

        // parse inputs
        $resourcePath   = "/translation/file/batch/close";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "POST";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];

        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        $queryParams[ 'batchId' ] = $this->apiClient->getSerializer()->toQueryValue( $batch_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\BatchClose'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\BatchClose', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\BatchClose', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationFileBatchCreatePost
     *
     * Batch Create
     *
     * @param string|null $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\BatchCreate|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileBatchCreatePost( string $callback = null ): ?BatchCreate {


        // parse inputs
        $resourcePath   = "/translation/file/batch/create";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "POST";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];

        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/json' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\BatchCreate'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\BatchCreate', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\BatchCreate', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }

    }

    /**
     * translationFileBatchStatusGet
     *
     * Batch Status
     *
     * @param string|null $batch_id Batch Identifier (required)
     * @param string|null $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\BatchStatus|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileBatchStatusGet( string $batch_id = null, string $callback = null ): ?BatchStatus {

        // verify the required parameter 'batch_id' is set
        if ( $batch_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $batch_id when calling translationFileBatchStatusGet' );
        }

        // parse inputs
        $resourcePath   = "/translation/file/batch/status";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "GET";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        $queryParams[ 'batchId' ] = $this->apiClient->getSerializer()->toQueryValue( $batch_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\BatchStatus'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\BatchStatus', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\BatchStatus', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationFileCancelPost
     *
     * Translate Cancel
     *
     * @param string|null $request_id Request Identifier (required)
     * @param string|null $callback   Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\TranslationCancel|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileCancelPost( string $request_id = null, string $callback = null ): ?TranslationCancel {

        // verify the required parameter 'request_id' is set
        if ( $request_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $request_id when calling translationFileCancelPost' );
        }

        // parse inputs
        $resourcePath   = "/translation/file/cancel";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "POST";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params

        $queryParams[ 'requestId' ] = $this->apiClient->getSerializer()->toQueryValue( $request_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\TranslationCancel'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\TranslationCancel', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\TranslationCancel', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationFileResultGet
     *
     * Translate Result
     *
     * @param string|null $request_id Request Identifier (required)
     * @param string|null $callback   Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\TranslationFileResponse|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileResultGet( string $request_id = null, string $callback = null ): ?TranslationFileResponse {

        // verify the required parameter 'request_id' is set
        if ( $request_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $request_id when calling translationFileResultGet' );
        }

        // parse inputs
        $resourcePath = "/translation/file/result";
        $resourcePath = str_replace( "{format}", "json", $resourcePath );
        $method       = "GET";
        $httpBody     = '';
        $queryParams  = [];
        $headerParams = [];

        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json',
                                                                'multipart/mixed',
                                                                '*/*' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params

        $queryParams[ 'requestId' ] = $this->apiClient->getSerializer()->toQueryValue( $request_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\TranslationFileResponse'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\TranslationFileResponse', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\TranslationFileResponse', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationFileStatusGet
     *
     * Translate Status
     *
     * @param string|null $request_id Request Identifier (required)
     * @param null        $callback   Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\TranslationStatus|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileStatusGet( string $request_id = null, $callback = null ): ?TranslationStatus {

        // verify the required parameter 'request_id' is set
        if ( $request_id === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $request_id when calling translationFileStatusGet' );
        }

        // parse inputs
        $resourcePath   = "/translation/file/status";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "GET";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params

        $queryParams[ 'requestId' ] = $this->apiClient->getSerializer()->toQueryValue( $request_id );
        // query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\TranslationStatus'
            );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()->deserialize( $response, '\Systran\Client\Model\TranslationStatus', $httpHeader );

        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()->deserialize( $e->getResponseBody(), '\Systran\Client\Model\TranslationStatus', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }

    }

    /**
     * translationFileTranslatePost
     *
     * Translate File
     *
     * @param \SplFileObject|null $input            Input file (required)
     * @param string|null         $target           Target language code ([details](#description_langage_code_values))
     *                                              (required)
     * @param string|null         $source           Source language code ([details](#description_langage_code_values))
     *                                              or
     *                                              `auto`.\n\nWhen the value is set to `auto`, the language will be
     *                                              automatically detected, used to enhance the translation, and
     *                                              returned in output. (optional)
     * @param string|null         $format           Format of the source text.\n\nValid values are `text` for plain
     *                                              text,
     *                                              `html` for HTML pages, and `auto` for automatic detection. The MIME
     *                                              type of file format supported by SYSTRAN can also be used
     *                                              (application/vnd.openxmlformats,
     *                                              application/vnd.oasis.opendocument,
     *                                              ...) (optional)
     * @param int|null            $profile          Profile id (optional)
     * @param bool|null           $with_source      If `true`, the source will also be sent back in the response
     *                                              message. It can be useful when used with the withAnnotations option
     *                                              to align the source document with the translated document
     *                                              (optional)
     * @param bool|null           $with_annotations If `true`, different annotations will be provided in the translated
     *                                              document. If the option &#39;withSource&#39; is used, the
     *                                              annotations will also be provided in the source document. It will
     *                                              provide segments, tokens, not found words,... (optional)
     * @param string|null         $with_dictionary  User Dictionary or/and Normalization Dictionary ids to be applied
     *                                              to the translation result. Each dictionary &#39;id&#39; has to be
     *                                              separate by a comma. (optional)
     * @param string|null         $with_corpus      Corpus to be applied to the translation result. Each corpus
     *                                              &#39;id&#39; has to be separate by a comma. (optional)
     * @param string[]|null       $options          Additional options.\n\nAn option can be a JSON object containing a
     *                                              set of key/value generic options supported by the translator. It
     *                                              can also be a string with the syntax
     *                                              &#39;&lt;key&gt;:&lt;value&gt;&#39; to pass a key/value generic
     *                                              option to the translator. (optional)
     * @param string|null         $encoding         Encoding. `base64` can be useful to send binary documents in the
     *                                              JSON body. Please note that another alternative is to use
     *                                              translateFile
     *                                              (optional)
     * @param bool                $async            If `true`, the translation is performed asynchronously.\n\nThe
     *                                              \&quot;/translation/file/status\&quot; service must be used to wait
     *                                              for the completion of the request and the
     *                                              \&quot;/translation/file/result\&quot; service must be used to get
     *                                              the final result. The \&quot;/translation/file/cancel\&quot; can be
     *                                              used to cancel the request. (optional)
     * @param string|null         $batch_id         Batch Identifier (optional)
     * @param string|null         $callback         Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\TranslationFileResponse|string|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationFileTranslatePost( SplFileObject $input = null, string $target = null, string $source = null, string $format = null, int $profile = null, bool $with_source = null, bool $with_annotations = null, string $with_dictionary = null, string $with_corpus = null, array $options = null, string $encoding = null, bool $async = false, string $batch_id = null, string $callback = null ): TranslationFileResponse|string|null {
//        die('ici');
//        error_log($input);
        // verify the required parameter 'input' is set
        if ( $input === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $input when calling translationFileTranslatePost' );
        }
        // verify the required parameter 'target' is set
        if ( $target === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $target when calling translationFileTranslatePost' );
        }

        // parse inputs
        $resourcePath   = "/translation/file/translate";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "POST";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $formParams     = [];
        $_header_accept = ApiClient::selectHeaderAccept( array( 'application/json',
                                                                'multipart/mixed',
                                                                '*/*' ) );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }

        // query params
        if ( $source !== null ) {
            $queryParams[ 'source' ] = $this->apiClient->getSerializer()->toQueryValue( $source );
        }// query params
        $queryParams[ 'target' ] = $this->apiClient->getSerializer()->toQueryValue( $target );
        // query params
        if ( $format !== null ) {
            $queryParams[ 'format' ] = $this->apiClient->getSerializer()->toQueryValue( $format );
        }// query params
        if ( $profile !== null ) {
            $queryParams[ 'profile' ] = $this->apiClient->getSerializer()->toQueryValue( $profile );
        }// query params
        if ( $with_source !== null ) {
            $queryParams[ 'withSource' ] = $this->apiClient->getSerializer()->toQueryValue( $with_source );
        }// query params
        if ( $with_annotations !== null ) {
            $queryParams[ 'withAnnotations' ] = $this->apiClient->getSerializer()->toQueryValue( $with_annotations );
        }// query params
        if ( $with_dictionary !== null ) {
            $queryParams[ 'withDictionary' ] = $this->apiClient->getSerializer()->toQueryValue( $with_dictionary );
        }// query params
        if ( $with_corpus !== null ) {
            $queryParams[ 'withCorpus' ] = $this->apiClient->getSerializer()->toQueryValue( $with_corpus );
        }// query params
        if ( $options !== null ) {
            $queryParams[ 'options' ] = $this->apiClient->getSerializer()->toQueryValue( $options );
        }// query params
        if ( $encoding !== null ) {
            $queryParams[ 'encoding' ] = $this->apiClient->getSerializer()->toQueryValue( $encoding );
        }// query params
        //        if ($async !== null) {
        //            $queryParams['async'] = $this->apiClient->getSerializer()->toQueryValue($async);
        //        }// query params
        if ( $batch_id !== null ) {
            $queryParams[ 'batchId' ] = $this->apiClient->getSerializer()->toQueryValue( $batch_id );
        }// query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()->toQueryValue( $callback );
        }


        // form params
        if ( function_exists( 'curl_file_create' ) ) {
            $formParams[ 'input' ] = new CurlFile( $input->getRealPath() );
        }
        else {
            $formParams[ 'input' ] = '@' . $this->apiClient->getSerializer()->toFormValue( $input );
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [ 'multipart/form-data' ] );
        //error_log($formParams['input']);


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }
        else {
            if ( count( $formParams ) > 0 ) {
                $httpBody = $formParams; // for HTTP post (form)
            }
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Systran\Client\Model\TranslationFileResponse'
            );

            if ( !$response ) {
                return null;
            }

            if ( false === $async && null === json_decode( $response ) ) {
                return $response;
            }

            return $this->apiClient->getSerializer()
                                   ->deserialize( $response, '\Systran\Client\Model\TranslationFileResponse', $httpHeader );
        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()
                                        ->deserialize( $e->getResponseBody(), '\Systran\Client\Model\TranslationFileResponse', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationProfileGet
     *
     * List of profiles
     *
     * @param string|null $source   Source language code of the profile (optional)
     * @param string|null $target   Target Language code of the profile (optional)
     * @param int[]|null  $id       Identifier of the profile (optional)
     * @param string|null $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\ProfilesResponse|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationProfileGet( string $source = null, string $target = null, array $id = null, string $callback = null ): ?ProfilesResponse {
        // parse inputs
        $resourcePath   = "/translation/profile";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "GET";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/json' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        if ( $source !== null ) {
            $queryParams[ 'source' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $source );
        }// query params
        if ( $target !== null ) {
            $queryParams[ 'target' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $target );
        }// query params
        if ( $id !== null ) {
            $queryParams[ 'id' ] = $this->apiClient->getSerializer()
                                                   ->toQueryValue( $id );
        }// query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()
                                                         ->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi( $resourcePath, $method, $queryParams, $httpBody, $headerParams, '\Systran\Client\Model\ProfilesResponse' );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()
                                   ->deserialize( $response, '\Systran\Client\Model\ProfilesResponse', $httpHeader );
        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()
                                        ->deserialize( $e->getResponseBody(), '\Systran\Client\Model\ProfilesResponse', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationSupportedLanguagesGet
     *
     * Supported Languages
     *
     * @param string[]|null $source   Language code of the source text (optional)
     * @param string[]|null $target   Language code into which to translate the source text (optional)
     * @param string|null   $callback Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\SupportedLanguageResponse|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationSupportedLanguagesGet( array $source = null, array $target = null, string $callback = null ): ?SupportedLanguageResponse {
        // parse inputs
        $resourcePath   = "/translation/supportedLanguages";
        $resourcePath   = str_replace( "{format}", "json", $resourcePath );
        $method         = "GET";
        $httpBody       = '';
        $queryParams    = [];
        $headerParams   = [];
        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/json' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params
        if ( $source !== null ) {
            $queryParams[ 'source' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $source );
        }// query params
        if ( $target !== null ) {
            $queryParams[ 'target' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $target );
        }// query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()
                                                         ->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi( $resourcePath, $method, $queryParams, $httpBody, $headerParams, '\Systran\Client\Model\SupportedLanguageResponse' );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()
                                   ->deserialize( $response, '\Systran\Client\Model\SupportedLanguageResponse', $httpHeader );
        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()
                                        ->deserialize( $e->getResponseBody(), '\Systran\Client\Model\SupportedLanguageResponse', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

    /**
     * translationTextTranslatePost
     *
     * Translate
     *
     * @param string[]      $input            Input text (this parameter can be repeated) (required)
     * @param string|null   $target           Target language code ([details](#description_langage_code_values))
     *                                        (required)
     * @param string|null   $source           Source language code ([details](#description_langage_code_values)) or
     *                                        `auto`.\n\nWhen the value is set to `auto`, the language will be
     *                                        automatically detected, used to enhance the translation, and returned in
     *                                        output. (optional)
     * @param string|null   $format           Format of the source text.\n\nValid values are `text` for plain text,
     *                                        `html` for HTML pages, and `auto` for automatic detection. The MIME type
     *                                        of file format supported by SYSTRAN can also be used
     *                                        (application/vnd.openxmlformats, application/vnd.oasis.opendocument, ...)
     *                                        (optional)
     * @param int|null      $profile          Profile id (optional)
     * @param bool|null     $with_source      If `true`, the source will also be sent back in the response message. It
     *                                        can be useful when used with the withAnnotations option to align the
     *                                        source document with the translated document (optional)
     * @param bool|null     $with_annotations If `true`, different annotations will be provided in the translated
     *                                        document. If the option &#39;withSource&#39; is used, the annotations
     *                                        will also be provided in the source document. It will provide segments,
     *                                        tokens, not found words,... (optional)
     * @param string|null   $with_dictionary  User Dictionary or/and Normalization Dictionary ids to be applied to the
     *                                        translation result. Each dictionary &#39;id&#39; has to be separate by a
     *                                        comma. (optional)
     * @param string|null   $with_corpus      Corpus to be applied to the translation result. Each corpus &#39;id&#39;
     *                                        has to be separate by a comma. (optional)
     * @param bool|null     $back_translation If `true`, the translated text will be translated back in source language
     *                                        (optional)
     * @param string[]|null $options          Additional options.\n\nAn option can be a JSON object containing a set of
     *                                        key/value generic options supported by the translator. It can also be a
     *                                        string with the syntax &#39;&lt;key&gt;:&lt;value&gt;&#39; to pass a
     *                                        key/value generic option to the translator. (optional)
     * @param string|null   $encoding         Encoding. `base64` can be useful to send binary documents in the JSON
     *                                        body. Please note that another alternative is to use translateFile
     *                                        (optional)
     * @param string|null   $callback         Javascript callback function name for JSONP Support (optional)
     *
     * @return \Systran\Client\Model\TranslationResponse|null
     * @throws \Systran\Client\ApiException on non-2xx response
     * @throws \Exception
     */
    public function translationTextTranslatePost( array $input = null, string $target = null, string $source = null, string $format = null, int $profile = null, bool $with_source = null, bool $with_annotations = null, string $with_dictionary = null, string $with_corpus = null, bool $back_translation = null, array $options = null, string $encoding = null, string $callback = null ): ?TranslationResponse {
        // verify the required parameter 'input' is set
        if ( $input === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $input when calling translationTextTranslatePost' );
        }
        // verify the required parameter 'target' is set
        if ( $target === null ) {
            throw new InvalidArgumentException( 'Missing the required parameter $target when calling translationTextTranslatePost' );
        }

        // parse inputs
        $resourcePath = "/translation/text/translate";
        $resourcePath = str_replace( "{format}", "json", $resourcePath );
        $method       = "POST";
        $httpBody     = '';
        $queryParams  = [];
        $headerParams = [];

        $_header_accept = ApiClient::selectHeaderAccept( [ 'application/json' ] );
        if ( !is_null( $_header_accept ) ) {
            $headerParams[ 'Accept' ] = $_header_accept;
        }
        $headerParams[ 'Content-Type' ] = ApiClient::selectHeaderContentType( [] );

        // query params

        $queryParams[ 'input' ] = $this->apiClient->getSerializer()
                                                  ->toQueryValue( $input );
        // query params
        if ( $source !== null ) {
            $queryParams[ 'source' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $source );
        }// query params

        $queryParams[ 'target' ] = $this->apiClient->getSerializer()
                                                   ->toQueryValue( $target );
        // query params
        if ( $format !== null ) {
            $queryParams[ 'format' ] = $this->apiClient->getSerializer()
                                                       ->toQueryValue( $format );
        }// query params
        if ( $profile !== null ) {
            $queryParams[ 'profile' ] = $this->apiClient->getSerializer()
                                                        ->toQueryValue( $profile );
        }// query params
        if ( $with_source !== null ) {
            $queryParams[ 'withSource' ] = $this->apiClient->getSerializer()
                                                           ->toQueryValue( $with_source );
        }// query params
        if ( $with_annotations !== null ) {
            $queryParams[ 'withAnnotations' ] = $this->apiClient->getSerializer()
                                                                ->toQueryValue( $with_annotations );
        }// query params
        if ( $with_dictionary !== null ) {
            $queryParams[ 'withDictionary' ] = $this->apiClient->getSerializer()
                                                               ->toQueryValue( $with_dictionary );
        }// query params
        if ( $with_corpus !== null ) {
            $queryParams[ 'withCorpus' ] = $this->apiClient->getSerializer()
                                                           ->toQueryValue( $with_corpus );
        }// query params
        if ( $back_translation !== null ) {
            $queryParams[ 'backTranslation' ] = $this->apiClient->getSerializer()
                                                                ->toQueryValue( $back_translation );
        }// query params
        if ( $options !== null ) {
            $queryParams[ 'options' ] = $this->apiClient->getSerializer()
                                                        ->toQueryValue( $options );
        }// query params
        if ( $encoding !== null ) {
            $queryParams[ 'encoding' ] = $this->apiClient->getSerializer()
                                                         ->toQueryValue( $encoding );
        }// query params
        if ( $callback !== null ) {
            $queryParams[ 'callback' ] = $this->apiClient->getSerializer()
                                                         ->toQueryValue( $callback );
        }


        // for model (json/xml)
        if ( isset( $_tempBody ) ) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        }

        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'Authorization' );
        if ( isset( $apiKey ) ) {
            $headerParams[ 'Authorization' ] = $apiKey;
        }


        $apiKey = $this->apiClient->getApiKeyWithPrefix( 'key' );
        if ( isset( $apiKey ) ) {
            $queryParams[ 'key' ] = $apiKey;
        }


        // make the API Call
        try {
            list( $response, $httpHeader ) = $this->apiClient->callApi( $resourcePath, $method, $queryParams, $httpBody, $headerParams, '\Systran\Client\Model\TranslationResponse' );

            if ( !$response ) {
                return null;
            }

            return $this->apiClient->getSerializer()
                                   ->deserialize( $response, '\Systran\Client\Model\TranslationResponse', $httpHeader );
        }
        catch ( ApiException $e ) {
            if ( $e->getCode() == 200 ) {
                $data = $this->apiClient->getSerializer()
                                        ->deserialize( $e->getResponseBody(), '\Systran\Client\Model\TranslationResponse', $e->getResponseHeaders() );
                $e->setResponseObject( $data );
            }

            throw $e;
        }
    }

}
