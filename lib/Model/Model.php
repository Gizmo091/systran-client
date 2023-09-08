<?php

namespace Systran\Client\Model;

use ArrayAccess;
use Systran\Client\ErrorResponse;

/**
 * BatchCancel Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
abstract class Model implements ArrayAccess {

    public static array $SystranTypes;

    public static array $attributeMap;

    public static array $setters;

    public static array $getters;

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
    abstract public function __construct( array $data = null );

    /**
     * Gets status
     *
     * @return string
     */
    public final function getStatus(): string {
        return $this->status;
    }

    /**
     * Sets status
     *
     * @param string $status Result of the request
     *
     * @return $this
     */
    public final function setStatus( string $status ): static {

        $this->status = $status;
        return $this;
    }

    /**
     * Gets error
     *
     * @return \Systran\Client\ErrorResponse
     */
    public final function getError(): ErrorResponse {
        return $this->error;
    }

    /**
     * Sets error
     *
     * @param \Systran\Client\ErrorResponse $error Error of the request
     *
     * @return $this
     */
    public final function setError( ErrorResponse $error ): static {
        $this->error = $error;
        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public final function offsetExists( $offset ): bool {
        return isset( $this->$offset );
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public final function offsetGet( $offset ): mixed {
        return $this->$offset;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public final function offsetSet( $offset, mixed $value ): void {
        $this->$offset = $value;
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public final function offsetUnset( $offset ): void {
        unset( $this->$offset );
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public final function __toString(): string {
        if ( defined( 'JSON_PRETTY_PRINT' ) ) {
            return json_encode( get_object_vars( $this ), JSON_PRETTY_PRINT );
        }
        else {
            return json_encode( get_object_vars( $this ) );
        }
    }
}
