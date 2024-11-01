<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'user_id', 
        'package_member_id', 
        'discount_id', 
        'invoice', 
        'original_price',
        'final_price',
        'payment_status',
        'payment_url',
        'snap_token',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public static function generateInvoice(){
        $prefix = 'INV';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        return "{$prefix}-{$date}-{$random}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package_member()
    {
        return $this->belongsTo(Package_member::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
