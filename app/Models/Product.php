<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function Category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function orders()
{
    return $this->hasMany(Order::class);
}

}
