<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Define the table associated with the model
    protected $table = 'tb_users';

    // Define the primary key for the model
    protected $primaryKey = 'user_id';

    // Define the fields that are mass assignable
    protected $fillable = [
        'user_email',
        'user_password',
        'user_nama',
        'user_alamat',
        'user_hp',
        'user_pos',
        'user_role',
        'user_aktif',
    ];

    // Optionally define if timestamps are used in this table
    public $timestamps = true;

    protected $hidden = [
        'user_password',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}