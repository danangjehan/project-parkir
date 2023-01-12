<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $unique_character
 * @property string $created_at
 * @property string $updated_at
 */
class TiketMasuk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tiket_masuk';

    /**
     * @var array
     */
    protected $fillable = ['unique_character', 'created_at', 'updated_at'];
}
