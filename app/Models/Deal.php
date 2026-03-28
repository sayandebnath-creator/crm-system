<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deal extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    use HasFactory;
    // data which will go in bulk insert
    protected $fillable = [
        'title', 'amount', 'status', 'customer_id'
        ];
}
