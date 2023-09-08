<?php

namespace Systran\Client\Model;

/**
 * BatchClose Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class BatchClose extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'status' => 'string',
        'error'  => '\Systran\Client\ErrorResponse'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'status' => 'status',
        'error'  => 'error'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'status' => 'setStatus',
        'error'  => 'setError'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'status' => 'getStatus',
        'error'  => 'getError'
    );


    /**
     * $status Result of the request
     *
     * @var string
     */
    protected string $status;

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
            $this->status = $data[ "status" ];
            $this->error  = $data[ "error" ];
        }
    }

}
