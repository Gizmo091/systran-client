<?php

namespace Systran\Client\Model;

/**
 * TranslationOutput Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class TranslationOutput extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'warning'                      => 'string',
        'error'                        => 'string',
        'detected_language'            => 'string',
        'detected_language_confidence' => 'double',
        'output'                       => 'string',
        'back_translation'             => 'string',
        'source'                       => 'string'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'warning'                      => 'warning',
        'error'                        => 'error',
        'detected_language'            => 'detectedLanguage',
        'detected_language_confidence' => 'detectedLanguageConfidence',
        'output'                       => 'output',
        'back_translation'             => 'backTranslation',
        'source'                       => 'source'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'warning'                      => 'setWarning',
        'error'                        => 'setError',
        'detected_language'            => 'setDetectedLanguage',
        'detected_language_confidence' => 'setDetectedLanguageConfidence',
        'output'                       => 'setOutput',
        'back_translation'             => 'setBackTranslation',
        'source'                       => 'setSource'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'warning'                      => 'getWarning',
        'error'                        => 'getError',
        'detected_language'            => 'getDetectedLanguage',
        'detected_language_confidence' => 'getDetectedLanguageConfidence',
        'output'                       => 'getOutput',
        'back_translation'             => 'getBackTranslation',
        'source'                       => 'getSource'
    );


    /**
     * $warning Warning at output level
     *
     * @var string
     */
    protected string $warning;



    /**
     * $detected_language Result of the automatic language detection if `auto` was specified as source language
     *
     * @var string
     */
    protected string $detected_language;

    /**
     * $detected_language_confidence Automatic language detection confidence
     *
     * @var float
     */
    protected float $detected_language_confidence;

    /**
     * $output Translated text
     *
     * @var string
     */
    protected string $output;

    /**
     * $back_translation Retranslation of output in source language, if backTranslation was specified
     *
     * @var string
     */
    protected string $back_translation;

    /**
     * $source Source text, if withSource was specified
     *
     * @var string
     */
    protected string $source;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->warning                      = $data[ "warning" ];
            $this->error                        = $data[ "error" ];
            $this->detected_language            = $data[ "detected_language" ];
            $this->detected_language_confidence = $data[ "detected_language_confidence" ];
            $this->output                       = $data[ "output" ];
            $this->back_translation             = $data[ "back_translation" ];
            $this->source                       = $data[ "source" ];
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
     * @param string $warning Warning at output level
     *
     * @return $this
     */
    public function setWarning( string $warning ): static {

        $this->warning = $warning;
        return $this;
    }


    /**
     * Gets detected_language
     *
     * @return string
     */
    public function getDetectedLanguage(): string {
        return $this->detected_language;
    }

    /**
     * Sets detected_language
     *
     * @param string $detected_language Result of the automatic language detection if `auto` was specified as source
     *                                  language
     *
     * @return $this
     */
    public function setDetectedLanguage( string $detected_language ): static {

        $this->detected_language = $detected_language;
        return $this;
    }

    /**
     * Gets detected_language_confidence
     *
     * @return double
     */
    public function getDetectedLanguageConfidence(): float {
        return $this->detected_language_confidence;
    }

    /**
     * Sets detected_language_confidence
     *
     * @param double $detected_language_confidence Automatic language detection confidence
     *
     * @return $this
     */
    public function setDetectedLanguageConfidence( float $detected_language_confidence ): static {

        $this->detected_language_confidence = $detected_language_confidence;
        return $this;
    }

    /**
     * Gets output
     *
     * @return string
     */
    public function getOutput(): string {
        return $this->output;
    }

    /**
     * Sets output
     *
     * @param string $output Translated text
     *
     * @return $this
     */
    public function setOutput( string $output ): static {

        $this->output = $output;
        return $this;
    }

    /**
     * Gets back_translation
     *
     * @return string
     */
    public function getBackTranslation(): string {
        return $this->back_translation;
    }

    /**
     * Sets back_translation
     *
     * @param string $back_translation Retranslation of output in source language, if backTranslation was specified
     *
     * @return $this
     */
    public function setBackTranslation( string $back_translation ): static {

        $this->back_translation = $back_translation;
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
     * @param string $source Source text, if withSource was specified
     *
     * @return $this
     */
    public function setSource( string $source ): static {

        $this->source = $source;
        return $this;
    }


}
