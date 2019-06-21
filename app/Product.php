<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Specifies which attributes in the table should be mass-assignable.
     * @var array
     */
    protected $fillable = ['name', 'description', 'price', 'picture', 'status', 'sales', 'reference', 'categorie_id'];

    /**
     * Define the relationship with categorie
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Define the relationship with size
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function size(){
        return $this->belongsToMany(Size::class);
    }

    /**
     * Get the published element
     * @param $query
     * @return mixed
     */
    public function scopePublished($query){
        return $query->where('status', 'published');
    }

    /**
     * Get the on sale element
     * @param $query
     * @return mixed
     */
    public function scopeSales($query){
        return $query->where('sales', 'sale');
    }

    /**
     * Get the catagorie depending of the id
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeCategories($query, $id){
        return $query->where('categorie_id', $id);
    }
}