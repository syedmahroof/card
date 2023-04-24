<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $timestamps = true;

    public function parent()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function category()
    {
        return $this->belongsTo(ServiceType::class);
    }

    // public function serviceSubType()
    // {
    //     return $this->belongsTo(ServiceType::class,'service_sub_type_id','id');
    // }

    // public function destination()
    // {
    //     return $this->belongsTo(Destination::class);
    // }
}
