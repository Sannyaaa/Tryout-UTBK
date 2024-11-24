<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'otp',
        'access',
        'role',
        'data_universitas_id',
        'second_data_universitas_id',
        'sekolah_id',
        'status',
        'tgl',
        'jenis_kelamin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }

    public function data_universitas(){
        return $this->belongsTo(DataUniversitas::class, 'data_universitas_id');
    }

    public function second_data_universitas(){
        return $this->belongsTo(DataUniversitas::class, 'second_data_universitas_id');
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }

}
