<?php
namespace Nemutagk\Mlogger\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Logger extends Model
{
    protected $collection = '';
    public $timestamps = true;
    protected $connection = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "message"
        ,"extra"
        ,"info"
        ,"context"
    ];

    public function __construct(array $attributes = []) {
    	$this->collection = env('MLOGGER_COLLECTION');
    	$this->connection = env('MLOGGER_CONNECTION');

        parent::__construct($attributes);
    }
}
