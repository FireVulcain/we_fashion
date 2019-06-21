<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    /**
     * Specifies which attributes in the table should be mass-assignable.
     * @var array
     */
    protected $fillable = [ 'name' ];


    /**
     * Define the relationship with Product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany(Product::class);
    }
}
