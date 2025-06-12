<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Broduct::class);
    }

    public function VariantAttributes()
    {
        return $this->hasMany(VariantAttribute::class,'product_variant_id');
    }
}
