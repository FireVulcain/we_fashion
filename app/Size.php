<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    /**
     * Define the relationship with Product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
