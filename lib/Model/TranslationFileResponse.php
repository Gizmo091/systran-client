<?php

namespace Systran\Client\Model;


/**
 * TranslationFileResponse Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class TranslationFileResponse extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'warning'    => 'string',
        'error'      => '\Systran\Client\ErrorResponse',
        'request_id' => 'string'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'warning'    => 'warning',
        'error'      => 'error',
        'request_id' => 'requestId'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'warning'    => 'setWarning',
        'error'      => 'setError',
        'request_id' => 'setRequestId'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'warning'    => 'getWarning',
        'error'      => 'getError',
        'request_id' => 'getRequestId'
    );


    /**
     * $warning Warning at request level
     *
     * @var string
     */
    protected string $warning;

    /**
     * $error Error at request level
     *
     * @var \Systran\Client\ErrorResponse
     */
    protected mixed $error;

    /**
     * $request_id Request identifier to use to get the status, the result of the request and to cancel it in
     * asynchronous mode
     *
     * @var string
     */
    protected string $request_id;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->warning    = $data[ "warning" ];
            $this->error      = $data[ "error" ];
            $this->request_id = $data[ "request_id" ];
        }
    }

    /**
     * Gets warning
     *
     * @return string
     */
    public function getWarning(): string {
        return $this->warning;
    }

    /**
     * Sets warning
     *
     * @param string $warning Warning at request level
     *
     * @return $this
     */
    public function setWarning( string $warning ): static {

        $this->warning = $warning;
        return $this;
    }

}
