<?php

namespace Systran\Client\Model;


/**
 * TranslationResponse Class Doc Comment
 *
 * @category    Class
 * @description By default (synchronous mode), the response will be a JSON object containing the result of the
 *              translation.
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 **/
class TranslationResponse extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'warning'    => 'string',
        'error'      => '\Systran\Client\ErrorResponse',
        'request_id' => 'string',
        'outputs'    => '\Systran\Client\Model\TranslationOutput[]'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'warning'    => 'warning',
        'error'      => 'error',
        'request_id' => 'requestId',
        'outputs'    => 'outputs'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'warning'    => 'setWarning',
        'error'      => 'setError',
        'request_id' => 'setRequestId',
        'outputs'    => 'setOutputs'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'warning'    => 'getWarning',
        'error'      => 'getError',
        'request_id' => 'getRequestId',
        'outputs'    => 'getOutputs'
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
     * $outputs Outputs of translation
     *
     * @var \Systran\Client\Model\TranslationOutput[]
     */
    protected array $outputs;


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
            $this->outputs    = $data[ "outputs" ];
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


    /**
     * Gets request_id
     *
     * @return string
     */
    public function getRequestId(): string {
        return $this->request_id;
    }

    /**
     * Sets request_id
     *
     * @param string $request_id Request identifier to use to get the status, the result of the request and to cancel
     *                           it in asynchronous mode
     *
     * @return $this
     */
    public function setRequestId( string $request_id ): static {

        $this->request_id = $request_id;
        return $this;
    }

    /**
     * Gets outputs
     *
     * @return \Systran\Client\Model\TranslationOutput[]
     */
    public function getOutputs(): array {
        return $this->outputs;
    }

    /**
     * Sets outputs
     *
     * @param \Systran\Client\Model\TranslationOutput[] $outputs Outputs of translation
     *
     * @return $this
     */
    public function setOutputs( array $outputs ): static {

        $this->outputs = $outputs;
        return $this;
    }

   
}
