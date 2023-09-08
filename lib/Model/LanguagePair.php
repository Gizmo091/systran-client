<?php

namespace Systran\Client\Model;

/**
 * LanguagePair Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class LanguagePair extends Model  {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'source'   => 'string',
        'target'   => 'string',
        'profiles' => '\Systran\Client\Model\ProfileId[]'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'source'   => 'source',
        'target'   => 'target',
        'profiles' => 'profiles'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'source'   => 'setSource',
        'target'   => 'setTarget',
        'profiles' => 'setProfiles'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'source'   => 'getSource',
        'target'   => 'getTarget',
        'profiles' => 'getProfiles'
    );


    /**
     * $source Source language
     *
     * @var string
     */
    protected string $source;

    /**
     * $target Target language
     *
     * @var string
     */
    protected string $target;

    /**
     * $profiles Array of profile identifiers
     *
     * @var \Systran\Client\Model\ProfileId[]
     */
    protected array $profiles;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->source   = $data[ "source" ];
            $this->target   = $data[ "target" ];
            $this->profiles = $data[ "profiles" ];
        }
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
     * @param string $source Source language
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
     * @param string $target Target language
     *
     * @return $this
     */
    public function setTarget( string $target ): static {

        $this->target = $target;
        return $this;
    }

    /**
     * Gets profiles
     *
     * @return \Systran\Client\Model\ProfileId[]
     */
    public function getProfiles(): array {
        return $this->profiles;
    }

    /**
     * Sets profiles
     *
     * @param \Systran\Client\Model\ProfileId[] $profiles Array of profile identifiers
     *
     * @return $this
     */
    public function setProfiles( array $profiles ): static {

        $this->profiles = $profiles;
        return $this;
    }


}
