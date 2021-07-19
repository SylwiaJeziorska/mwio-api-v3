<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $io_id io id
@property varchar $file_name file name
@property varchar $original_name original name
@property varchar $type type
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Medium extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'media';

    /**
    * Mass assignable columns
    */
    protected $fillable=['io_id',
'file_name',
'original_name',
'type'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}