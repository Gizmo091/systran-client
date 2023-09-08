<?php

namespace Systran\Client\Model;

/**
 * ProfileId Class Doc Comment
 *
 * @category    Class
 * @description Profile identifier
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class ProfileId extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'id'      => 'int',
        'private' => 'bool'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'id'      => 'id',
        'private' => 'private'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'id'      => 'setId',
        'private' => 'setPrivate'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'id'      => 'getId',
        'private' => 'getPrivate'
    );


    /**
     * $id Profile identifier
     *
     * @var int
     */
    protected int $id;

    /**
     * $private Public or private profile
     *
     * @var bool
     */
    protected bool $private;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->id      = $data[ "id" ];
            $this->private = $data[ "private" ];
        }
    }

    /**
     * Gets id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Sets id
     *
     * @param int $id Profile identifier
     *
     * @return $this
     */
    public function setId( int $id ): static {

        $this->id = $id;
        return $this;
    }

    /**
     * Gets private
     *
     * @return bool
     */
    public function getPrivate(): bool {
        return $this->private;
    }

    /**
     * Sets private
     *
     * @param bool $private Public or private profile
     *
     * @return $this
     */
    public function setPrivate( bool $private ): static {

        $this->private = $private;
        return $this;
    }


}
