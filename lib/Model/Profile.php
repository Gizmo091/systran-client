<?php

namespace Systran\Client\Model;

/**
 * Profile Class Doc Comment
 *
 * @category    Class
 * @description Profile
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class Profile extends Model  {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'id'           => 'int',
        'localization' => 'object',
        'name'         => 'string',
        'source'       => 'string',
        'target'       => 'string'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'id'           => 'id',
        'localization' => 'localization',
        'name'         => 'name',
        'source'       => 'source',
        'target'       => 'target'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'id'           => 'setId',
        'localization' => 'setLocalization',
        'name'         => 'setName',
        'source'       => 'setSource',
        'target'       => 'setTarget'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'id'           => 'getId',
        'localization' => 'getLocalization',
        'name'         => 'getName',
        'source'       => 'getSource',
        'target'       => 'getTarget'
    );


    /**
     * $id Profile identifier
     *
     * @var int
     */
    protected int $id;

    /**
     * $localization Localization of the profile name
     *
     * @var object
     */
    protected mixed $localization;

    /**
     * $name Name
     *
     * @var string
     */
    protected string $name;

    /**
     * $source Source
     *
     * @var string
     */
    protected string $source;

    /**
     * $target Target
     *
     * @var string
     */
    protected string $target;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->id           = $data[ "id" ];
            $this->localization = $data[ "localization" ];
            $this->name         = $data[ "name" ];
            $this->source       = $data[ "source" ];
            $this->target       = $data[ "target" ];
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
     * Gets localization
     *
     * @return object
     */
    public function getLocalization(): mixed {
        return $this->localization;
    }

    /**
     * Sets localization
     *
     * @param object $localization Localization of the profile name
     *
     * @return $this
     */
    public function setLocalization( mixed $localization ): static {

        $this->localization = $localization;
        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Sets name
     *
     * @param string $name Name
     *
     * @return $this
     */
    public function setName( string $name ): static {

        $this->name = $name;
        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource(): string {
        return $this->source;
    }

    /**
     * Sets source
     *
     * @param string $source Source
     *
     * @return $this
     */
    public function setSource( string $source ): static {

        $this->source = $source;
        return $this;
    }

    /**
     * Gets target
     *
     * @return string
     */
    public function getTarget(): string {
        return $this->target;
    }

    /**
     * Sets target
     *
     * @param string $target Target
     *
     * @return $this
     */
    public function setTarget( string $target ): static {

        $this->target = $target;
        return $this;
    }

}
