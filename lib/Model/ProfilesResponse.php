<?php

namespace Systran\Client\Model;

/**
 * ProfilesResponse Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class ProfilesResponse extends Model  {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'error'    => '\Systran\Client\ErrorResponse',
        'profiles' => '\Systran\Client\Model\Profile[]'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'error'    => 'error',
        'profiles' => 'profiles'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'error'    => 'setError',
        'profiles' => 'setProfiles'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'error'    => 'getError',
        'profiles' => 'getProfiles'
    );


    /**
     * $error Error at request level
     *
     * @var \Systran\Client\ErrorResponse
     */
    protected mixed $error;

    /**
     * $profiles Array of profiles
     *
     * @var \Systran\Client\Model\Profile[]
     */
    protected array $profiles;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->error    = $data[ "error" ];
            $this->profiles = $data[ "profiles" ];
        }
    }


    /**
     * Gets profiles
     *
     * @return \Systran\Client\Model\Profile[]
     */
    public function getProfiles(): array {
        return $this->profiles;
    }

    /**
     * Sets profiles
     *
     * @param \Systran\Client\Model\Profile[] $profiles Array of profiles
     *
     * @return $this
     */
    public function setProfiles( $profiles ): static {

        $this->profiles = $profiles;
        return $this;
    }

}
