<?php

namespace Systran\Client\Model;

/**
 * BatchRequest Class Doc Comment
 *
 * @category    Class
 * @description Batch Request
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class BatchRequest extends Model  {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'id'     => 'string',
        'status' => 'string'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'id'     => 'id',
        'status' => 'status'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'id'     => 'setId',
        'status' => 'setStatus'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'id'     => 'getId',
        'status' => 'getStatus'
    );


    /**
     * $id Request identifier
     *
     * @var string
     */
    protected string $id;

    /**
     * $status Status of the request
     *
     * @var string
     */
    protected string $status;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->id     = $data[ "id" ];
            $this->status = $data[ "status" ];
        }
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Sets id
     *
     * @param string $id Request identifier
     *
     * @return $this
     */
    public function setId( string $id ): static {

        $this->id = $id;
        return $this;
    }


}
