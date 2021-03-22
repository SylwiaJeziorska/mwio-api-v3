<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $io_id io id
@property int $user_id user id
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class IoUser extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'io_user';

    /**
    * Mass assignable columns
    */
    protected $fillable=['io_id',
'user_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}