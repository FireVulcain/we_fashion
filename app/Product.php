<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function size(){
        return $this->belongsToMany(Size::class);
    }

    public function scopeSales($query){
        return $query->where('sales', 'sale');
    }

    public function scopeCategories($query, $id){
        return $query->where('categorie_id', $id);
    }
}
