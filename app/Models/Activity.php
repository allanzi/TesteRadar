<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 02/08/17
 * Time: 22:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'finish_date',
        'status_id',
        'situation'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'finish_date'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}