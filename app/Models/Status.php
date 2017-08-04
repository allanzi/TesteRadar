<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 02/08/17
 * Time: 23:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'status';

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}