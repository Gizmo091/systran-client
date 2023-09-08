<?php
/**
 * Configuration
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

namespace Systran\Client;

use InvalidArgumentException;

/**
 * Configuration Class Doc Comment
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class Configuration
{

    private static ?Configuration $_defaultConfiguration = null;
  
    /** 
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];
  
    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];
  
    /** 
     * Username for HTTP basic authentication
     *
     * @var string
     */
    protected string $username = '';
  
    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected string $password = '';
  
    /**
     * The default instance of ApiClient
     */
    protected array $defaultHeaders = array();
  
    /**
     * The host
     *
     * @var string
     */
    protected string $host = 'https://localhost:8903';
  
    /**
     * Timeout (second) of the HTTP request, by default set to 0, no timeout
     *
     * @var int
     */
    protected int $curlTimeout = 0;
  
    /**
     * User agent of the HTTP request, set to "PHP-Systran" by default
     *
     * @var string
     */
    protected string $userAgent = "PHP-Systran/1.0.0";
  
    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $debug = false;
  
    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $tempFolderPath;

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $curlSSLVerify = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }
  
    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key              API key or token
     *
     * @return Configuration
     */
    public function setApiKey( string $apiKeyIdentifier, string $key): static {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return string|null API key or token
     */
    public function getApiKey( string $apiKeyIdentifier): ?string {
        return $this->apiKeys[ $apiKeyIdentifier ] ?? null;
    }
  
    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix           API key prefix, e.g. Bearer
     *
     * @return Configuration
     */
    public function setApiKeyPrefix( string $apiKeyIdentifier, string $prefix): static {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }

    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return string|null
     */
    public function getApiKeyPrefix( string $apiKeyIdentifier): ?string {
        return $this->apiKeyPrefixes[ $apiKeyIdentifier ] ?? null;
    }
  
    /**
     * Sets the username for HTTP basic authentication
     *
     * @param string $username Username for HTTP basic authentication
     *
     * @return Configuration
     */
    public function setUsername( string $username): static {
        $this->username = $username;
        return $this;
    }
  
    /**
     * Gets the username for HTTP basic authentication
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername(): string {
        return $this->username;
    }
  
    /**
     * Sets the password for HTTP basic authentication
     *
     * @param string $password Password for HTTP basic authentication
     *
     * @return Configuration
     */
    public function setPassword( string $password): static {
        $this->password = $password;
        return $this;
    }
  
    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword(): string {
        return $this->password;
    }
  
    /**
     * Adds a default header
     *
     * @param string $headerName  header name (e.g. Token)
     * @param string $headerValue header value (e.g. 1z8wp3)
     *
     * @return \Systran\Client\Configuration
     */
    public function addDefaultHeader( mixed $headerName, string $headerValue): static {
        if (!is_string($headerName)) {
            throw new InvalidArgumentException('Header name must be a string.');
        }
  
        $this->defaultHeaders[$headerName] =  $headerValue;
        return $this;
    }
  
    /**
     * Gets the default header
     *
     * @return array An array of default header(s)
     */
    public function getDefaultHeaders() : array
    {
        return $this->defaultHeaders;
    }
  
    /**
     * Deletes a default header
     *
     * @param string $headerName the header to delete
     */
    public function deleteDefaultHeader( string $headerName): void {
        unset($this->defaultHeaders[$headerName]);
    }
  
    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return Configuration
     */
    public function setHost( string $host): static {
        $this->host = $host;
        return $this;
    }
  
    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string {
        return $this->host;
    }
  
    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @return \Systran\Client\Configuration
     */
    public function setUserAgent( mixed $userAgent): static {
        if (!is_string($userAgent)) {
            throw new InvalidArgumentException('User-agent must be a string.');
        }
  
        $this->userAgent = $userAgent;
        return $this;
    }
  
    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string {
        return $this->userAgent;
    }
  
    /**
     * Sets the HTTP timeout value
     *
     * @param integer $seconds Number of seconds before timing out [set to 0 for no timeout]
     *
     * @return \Systran\Client\Configuration
     */
    public function setCurlTimeout( mixed $seconds): static {
        if (!is_numeric($seconds) || $seconds < 0) {
            throw new InvalidArgumentException('Timeout value must be numeric and a non-negative number.');
        }
  
        $this->curlTimeout = (int)$seconds;
        return $this;
    }
  
    /**
     * Gets the HTTP timeout value
     *
     * @return int HTTP timeout value
     */
    public function getCurlTimeout(): int {
        return $this->curlTimeout;
    }
  
    /**
     * Sets debug flag
     * 
     * @param bool $debug Debug flag
     *
     * @return Configuration
     */
    public function setDebug( bool $debug): static {
        $this->debug = $debug;
        return $this;
    }
  
    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool {
        return $this->debug;
    }
  
    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return Configuration
     */
    public function setDebugFile( string $debugFile): static {
        $this->debugFile = $debugFile;
        return $this;
    }
  
    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string {
        return $this->debugFile;
    }
 
    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return Configuration
     */
    public function setTempFolderPath( string $tempFolderPath): static {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }
 
    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration(): Configuration {
        if (self::$_defaultConfiguration === null) {
            self::$_defaultConfiguration = new Configuration();
        }
  
        return self::$_defaultConfiguration;
    }
  
    /**
     * Sets the default configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config): void {
        self::$_defaultConfiguration = $config;
    }
  
    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport(): string {
        $report  = "PHP SDK (Systran\Client) Debug Report:\n";
        $report .= "    OS: ".php_uname()."\n";
        $report .= "    PHP Version: ".phpversion()."\n";
        $report .= "    Systran Spec Version: 1.0.0\n";
        $report .= "    SDK Package Version: 1.0.0\n";
        $report .= "    Temp Folder Path: ".self::getDefaultConfiguration()->getTempFolderPath()."\n";
  
        return $report;
    }

    /**
     * Allows CURL to get around CA certification issues
     *
     * @param bool $verify curlSSLVerify flag
     *
     * @return Configuration
     */
    public function setStopCurlSSLVerify( bool $verify): static {
      $this->curlSSLVerify = $verify;
      return $this;
    }

    /**
     * Gets the curlSSLVerify flag
     *
     * @return bool
     */
    public function getStopCurlSSLVerify(): bool {
      return $this->curlSSLVerify;
    }

}
