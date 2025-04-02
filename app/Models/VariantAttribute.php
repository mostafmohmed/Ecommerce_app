<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    protected $guarded = [];
    public function ProductVariant()
    {
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }
}
