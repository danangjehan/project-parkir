<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama
 * @property float $tarif
 * @property string $created_at
 * @property string $updated_at
 */
class Kendaraan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kendaraan';

    /**
     * @var array
     */
    protected $fillable = ['name', 'tarif', 'created_at', 'updated_at'];
}
