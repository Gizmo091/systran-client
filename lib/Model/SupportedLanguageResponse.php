<?php

namespace Systran\Client\Model;

/**
 * SupportedLanguageResponse Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class SupportedLanguageResponse extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'warning'        => 'string',
        'error'          => '\Systran\Client\ErrorResponse',
        'language_pairs' => '\Systran\Client\Model\LanguagePair[]'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'warning'        => 'warning',
        'error'          => 'error',
        'language_pairs' => 'languagePairs'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'warning'        => 'setWarning',
        'error'          => 'setError',
        'language_pairs' => 'setLanguagePairs'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'warning'        => 'getWarning',
        'error'          => 'getError',
        'language_pairs' => 'getLanguagePairs'
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
     * $language_pairs Array of language pairs
     *
     * @var \Systran\Client\Model\LanguagePair[]
     */
    protected array $language_pairs;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->warning        = $data[ "warning" ];
            $this->error          = $data[ "error" ];
            $this->language_pairs = $data[ "language_pairs" ];
        }
    }

    /**
     * Gets language_pairs
     *
     * @return \Systran\Client\Model\LanguagePair[]
     */
    public function getLanguagePairs(): array {
        return $this->language_pairs;
    }

    /**
     * Sets language_pairs
     *
     * @param \Systran\Client\Model\LanguagePair[] $language_pairs Array of language pairs
     *
     * @return $this
     */
    public function setLanguagePairs( array $language_pairs ): static {

        $this->language_pairs = $language_pairs;
        return $this;
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
