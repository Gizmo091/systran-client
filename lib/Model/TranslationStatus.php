<?php

namespace Systran\Client\Model;

/**
 * TranslationStatus Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     Systran\Client
 * @author      http://github.com/Systran-api/Systran-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class TranslationStatus extends Model {
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    static array $SystranTypes = array(
        'error'          => '\Systran\Client\ErrorResponse',
        'batch_id'       => 'string',
        'cancelled'      => 'bool',
        'created_at'     => 'double',
        'description'    => 'string',
        'expire_at'      => 'double',
        'finished_at'    => 'double',
        'finished_steps' => 'int',
        'status'         => 'string',
        'total_steps'    => 'int'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    static array $attributeMap = array(
        'error'          => 'error',
        'batch_id'       => 'batchId',
        'cancelled'      => 'cancelled',
        'created_at'     => 'createdAt',
        'description'    => 'description',
        'expire_at'      => 'expireAt',
        'finished_at'    => 'finishedAt',
        'finished_steps' => 'finishedSteps',
        'status'         => 'status',
        'total_steps'    => 'totalSteps'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    static array $setters = array(
        'error'          => 'setError',
        'batch_id'       => 'setBatchId',
        'cancelled'      => 'setCancelled',
        'created_at'     => 'setCreatedAt',
        'description'    => 'setDescription',
        'expire_at'      => 'setExpireAt',
        'finished_at'    => 'setFinishedAt',
        'finished_steps' => 'setFinishedSteps',
        'status'         => 'setStatus',
        'total_steps'    => 'setTotalSteps'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    static array $getters = array(
        'error'          => 'getError',
        'batch_id'       => 'getBatchId',
        'cancelled'      => 'getCancelled',
        'created_at'     => 'getCreatedAt',
        'description'    => 'getDescription',
        'expire_at'      => 'getExpireAt',
        'finished_at'    => 'getFinishedAt',
        'finished_steps' => 'getFinishedSteps',
        'status'         => 'getStatus',
        'total_steps'    => 'getTotalSteps'
    );


    /**
     * $error Error of the request
     *
     * @var \Systran\Client\ErrorResponse
     */
    protected mixed $error;

    /**
     * $batch_id Batch Identifier
     *
     * @var string
     */
    protected string $batch_id;

    /**
     * $cancelled Is the request cancelled
     *
     * @var bool
     */
    protected bool $cancelled;

    /**
     * $created_at Creation time of the request (ms since the Epoch)
     *
     * @var float
     */
    protected float $created_at;

    /**
     * $description Description
     *
     * @var string
     */
    protected string $description;

    /**
     * $expire_at Expiration time of the request (ms since the Epoch)
     *
     * @var float
     */
    protected float $expire_at;

    /**
     * $finished_at Completion time of the request (ms since the Epoch)
     *
     * @var float
     */
    protected float $finished_at;

    /**
     * $finished_steps Number of finished steps
     *
     * @var int
     */
    protected int $finished_steps;

    /**
     * $status Status of the request
     *
     * @var string
     */
    protected string $status;

    /**
     * $total_steps Number of steps to complete
     *
     * @var int
     */
    protected int $total_steps;


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property value initalizing the model
     */
    public function __construct( array $data = null ) {
        if ( $data != null ) {
            $this->error          = $data[ "error" ];
            $this->batch_id       = $data[ "batch_id" ];
            $this->cancelled      = $data[ "cancelled" ];
            $this->created_at     = $data[ "created_at" ];
            $this->description    = $data[ "description" ];
            $this->expire_at      = $data[ "expire_at" ];
            $this->finished_at    = $data[ "finished_at" ];
            $this->finished_steps = $data[ "finished_steps" ];
            $this->status         = $data[ "status" ];
            $this->total_steps    = $data[ "total_steps" ];
        }
    }


    /**
     * Gets batch_id
     *
     * @return string
     */
    public function getBatchId(): string {
        return $this->batch_id;
    }

    /**
     * Sets batch_id
     *
     * @param string $batch_id Batch Identifier
     *
     * @return $this
     */
    public function setBatchId( string $batch_id ): static {

        $this->batch_id = $batch_id;
        return $this;
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
     * @param bool $cancelled Is the request cancelled
     *
     * @return $this
     */
    public function setCancelled( bool $cancelled ): static {

        $this->cancelled = $cancelled;
        return $this;
    }

    /**
     * Gets created_at
     *
     * @return float
     */
    public function getCreatedAt(): float {
        return $this->created_at;
    }

    /**
     * Sets created_at
     *
     * @param float $created_at Creation time of the request (ms since the Epoch)
     *
     * @return $this
     */
    public function setCreatedAt( float $created_at ): static {

        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Sets description
     *
     * @param string $description Description
     *
     * @return $this
     */
    public function setDescription( string $description ): static {

        $this->description = $description;
        return $this;
    }

    /**
     * Gets expire_at
     *
     * @return float
     */
    public function getExpireAt(): float {
        return $this->expire_at;
    }

    /**
     * Sets expire_at
     *
     * @param float $expire_at Expiration time of the request (ms since the Epoch)
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
     * @return float
     */
    public function getFinishedAt(): float {
        return $this->finished_at;
    }

    /**
     * Sets finished_at
     *
     * @param float $finished_at Completion time of the request (ms since the Epoch)
     *
     * @return $this
     */
    public function setFinishedAt( float $finished_at ): static {

        $this->finished_at = $finished_at;
        return $this;
    }

    /**
     * Gets finished_steps
     *
     * @return int
     */
    public function getFinishedSteps(): int {
        return $this->finished_steps;
    }

    /**
     * Sets finished_steps
     *
     * @param int $finished_steps Number of finished steps
     *
     * @return $this
     */
    public function setFinishedSteps( int $finished_steps ): static {

        $this->finished_steps = $finished_steps;
        return $this;
    }

    /**
     * Gets total_steps
     *
     * @return int
     */
    public function getTotalSteps(): int {
        return $this->total_steps;
    }

    /**
     * Sets total_steps
     *
     * @param int $total_steps Number of steps to complete
     *
     * @return $this
     */
    public function setTotalSteps( int $total_steps ): static {

        $this->total_steps = $total_steps;
        return $this;
    }

}
