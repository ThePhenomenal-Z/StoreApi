<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'type',
        'email',
        'address',
        'city'
    ];
    public function invoices(){
         return $this->hasMany(invoice::class)->orderBy('billed_data','DESC');
    }
}
