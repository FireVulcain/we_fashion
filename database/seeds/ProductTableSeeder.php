<?php

use App\Categorie;
use App\Product;
use App\Size;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create all the categories available
        Categorie::create([ 'name' => 'Homme' ]);
        Categorie::create([ 'name' => 'Femme' ]);


        // Create all the sizes available
        Size::create([ 'name' => 'XS' ]);
        Size::create([ 'name' => 'S' ]);
        Size::create([ 'name' => 'M' ]);
        Size::create([ 'name' => 'L' ]);
        Size::create([ 'name' => 'XL' ]);

        // Create 80 products
        factory(Product::class, 80)->create()->each(function( $product ){
            // Associate a random categories to a product
            $randomCategorie = rand(1, 2);
            $categorie = Categorie::find($randomCategorie);
            $product->categorie()->associate($categorie);


            // Check categories type
            switch ($randomCategorie) {
                case 1: $categoriesPath = 'hommes';
                    break;
                case 2: $categoriesPath = 'femmes';
                    break;
                default: $categoriesPath = 'products';
            }

            // Generate a random image from folder
            $images = glob(public_path() . '/images/' . $categoriesPath . '/*');
            $product->picture = $categoriesPath . '/' . basename($images[array_rand($images)]);


            // Generate multiple (random) size for a product
            $sizes = Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            $product->size()->attach($sizes);

            $product->save();
        });
    }
}
