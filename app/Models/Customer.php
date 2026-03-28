<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Deal;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];
}
