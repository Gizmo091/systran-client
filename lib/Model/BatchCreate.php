<?php

namespace Systran\Client\Model;

/**
 * BatchCreate Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class BatchCreate extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'batch_id' => 'string',
        'error'    => '\Systran\Client\ErrorResponse'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'batch_id' => 'batchId',
        'error'    => 'error'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'batch_id' => 'setBatchId',
        'error'    => 'setError'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'batch_id' => 'getBatchId',
        'error'    => 'getError'
    );


    /**
     * $batch_id Identifier of the created batch
     *
     * @var string
     */
    protected string $batch_id;

    /**
     * $error Error of the request
     *
     * @var \Systran\Client\ErrorResponse
     */
    protected mixed $error;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->batch_id = $data[ "batch_id" ];
            $this->error    = $data[ "error" ];
        }
    }

    /**
     * Gets batch_id
     *
     * @return string
     */
    public function getBatchId(): string {
        return $this->batch_id;
    }

    /**
     * Sets batch_id
     *
     * @param string $batch_id Identifier of the created batch
     *
     * @return $this
     */
    public function setBatchId( string $batch_id ): static {

        $this->batch_id = $batch_id;
        return $this;
    }


}
