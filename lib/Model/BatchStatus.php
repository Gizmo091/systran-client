<?php

namespace Systran\Client\Model;

/**
 * BatchStatus Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class BatchStatus extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'cancelled'   => 'bool',
        'closed'      => 'bool',
        'created_at'  => 'double',
        'expire_at'   => 'double',
        'finished_at' => 'double',
        'requests'    => '\Systran\Client\Model\BatchRequest[]',
        'error'       => '\Systran\Client\ErrorResponse'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'cancelled'   => 'cancelled',
        'closed'      => 'closed',
        'created_at'  => 'createdAt',
        'expire_at'   => 'expireAt',
        'finished_at' => 'finishedAt',
        'requests'    => 'requests',
        'error'       => 'error'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'cancelled'   => 'setCancelled',
        'closed'      => 'setClosed',
        'created_at'  => 'setCreatedAt',
        'expire_at'   => 'setExpireAt',
        'finished_at' => 'setFinishedAt',
        'requests'    => 'setRequests',
        'error'       => 'setError'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'cancelled'   => 'getCancelled',
        'closed'      => 'getClosed',
        'created_at'  => 'getCreatedAt',
        'expire_at'   => 'getExpireAt',
        'finished_at' => 'getFinishedAt',
        'requests'    => 'getRequests',
        'error'       => 'getError'
    );


    /**
     * $cancelled Is the batch cancelled
     *
     * @var bool
     */
    protected bool $cancelled;

    /**
     * $closed Is the batch closed
     *
     * @var bool
     */
    protected bool $closed;

    /**
     * $created_at Creation time of the batch (ms since the Epoch)
     *
     * @var double
     */
    protected float $created_at;

    /**
     * $expire_at Expiration time of the batch (ms since the Epoch). Is null while there are pending requests
     *
     * @var double
     */
    protected float $expire_at;

    /**
     * $finished_at Completion time of the batch (ms since the Epoch)
     *
     * @var double
     */
    protected float $finished_at;

    /**
     * $requests Array of requests
     *
     * @var \Systran\Client\Model\BatchRequest[]
     */
    protected array $requests;

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
            $this->cancelled   = $data[ "cancelled" ];
            $this->closed      = $data[ "closed" ];
            $this->created_at  = $data[ "created_at" ];
            $this->expire_at   = $data[ "expire_at" ];
            $this->finished_at = $data[ "finished_at" ];
            $this->requests    = $data[ "requests" ];
            $this->error       = $data[ "error" ];
        }
    }

    /**
     * Gets cancelled
     *
     * @return bool
     */
    public function getCancelled(): bool {
        return $this->cancelled;
    }

    /**
     * Sets cancelled
     *
     * @param bool $cancelled Is the batch cancelled
     *
     * @return $this
     */
    public function setCancelled( bool $cancelled ): static {

        $this->cancelled = $cancelled;
        return $this;
    }

    /**
     * Gets closed
     *
     * @return bool
     */
    public function getClosed(): bool {
        return $this->closed;
    }

    /**
     * Sets closed
     *
     * @param bool $closed Is the batch closed
     *
     * @return $this
     */
    public function setClosed( bool $closed ): static {

        $this->closed = $closed;
        return $this;
    }

    /**
     * Gets created_at
     *
     * @return double
     */
    public function getCreatedAt(): float {
        return $this->created_at;
    }

    /**
     * Sets created_at
     *
     * @param double $created_at Creation time of the batch (ms since the Epoch)
     *
     * @return $this
     */
    public function setCreatedAt( float $created_at ): static {

        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Gets expire_at
     *
     * @return double
     */
    public function getExpireAt(): float {
        return $this->expire_at;
    }

    /**
     * Sets expire_at
     *
     * @param double $expire_at Expiration time of the batch (ms since the Epoch). Is null while there are pending
     *                          requests
     *
     * @return $this
     */
    public function setExpireAt( float $expire_at ): static {

        $this->expire_at = $expire_at;
        return $this;
    }

    /**
     * Gets finished_at
     *
     * @return double
     */
    public function getFinishedAt(): float {
        return $this->finished_at;
    }

    /**
     * Sets finished_at
     *
     * @param double $finished_at Completion time of the batch (ms since the Epoch)
     *
     * @return $this
     */
    public function setFinishedAt( float $finished_at ): static {

        $this->finished_at = $finished_at;
        return $this;
    }

    /**
     * Gets requests
     *
     * @return \Systran\Client\Model\BatchRequest[]
     */
    public function getRequests(): array {
        return $this->requests;
    }

    /**
     * Sets requests
     *
     * @param \Systran\Client\Model\BatchRequest[] $requests Array of requests
     *
     * @return $this
     */
    public function setRequests( array $requests ): static {

        $this->requests = $requests;
        return $this;
    }


}
