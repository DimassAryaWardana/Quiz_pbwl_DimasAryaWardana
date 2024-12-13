<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'tb_pelanggan';

    // Define the primary key for the model
    protected $primaryKey = 'pel_id';

    // Define the fields that are mass assignable
    protected $fillable = [
        'pel_id_gol',
        'pel_id_user',
        'pel_no',
        'pel_nama',
        'pel_alamat',
        'pel_hp',
        'pel_ktp',
        'pel_seri',
        'pel_meteran',
        'pel_aktif',
    ];

    // Optionally define if timestamps are used in this table
    public $timestamps = true;

    /**
     * Define the relationship with the Golongan model.
     */
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'pel_id_gol', 'gol_id');
    }

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
    
