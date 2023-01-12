<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tiket_id
 * @property integer $kendaraan_id
 * @property float $durasi
 * @property float $bayar
 * @property string $created_at
 * @property string $updated_at
 * @property Kendaraan $kendaraan
 * @property TiketMasuk $tiketMasuk
 */
class TiketKeluar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tiket_keluar';

    /**
     * @var array
     */
    protected $fillable = ['tiket_id', 'kendaraan_id', 'durasi', 'bayar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiketMasuk()
    {
        return $this->belongsTo('App\Models\TiketMasuk', 'tiket_id');
    }
}
