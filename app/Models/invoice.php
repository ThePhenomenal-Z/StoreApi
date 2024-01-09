<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $fillable=[
        'cusromer_id',
        'amount',
        'status',
        'billed_date',
        'paid_date'
    ];
    public function customer(){
        return $this->belongsTo(customer::class);
    }
}
