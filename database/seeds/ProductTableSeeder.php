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

        // Create all the categorie available
        Categorie::create([ 'name' => 'Homme' ]);
        Categorie::create([ 'name' => 'Femme' ]);


        // Create all the size available
        Size::create([ 'name' => 'XS' ]);
        Size::create([ 'name' => 'S' ]);
        Size::create([ 'name' => 'M' ]);
        Size::create([ 'name' => 'L' ]);
        Size::create([ 'name' => 'XL' ]);

        // Create 80 products
        factory(Product::class, 80)->create()->each(function( $product ){
            $randomCategorie = rand(1, 2);
            $categorie = Categorie::find($randomCategorie);
            $product->categorie()->associate($categorie);


            // Check categorie type
            switch ($randomCategorie) {
                case 1:
                    $path = 'hommes';
                    $images = glob(public_path() . '/images/' . $path . '/*' );
                    break;
                case 2:
                    $path = 'femmes';
                    break;
                default:
            }


            $images = glob(public_path() . '/images/' . $path . '/*');
            $randomImage = $images[array_rand($images)]; // Get one random image from folder
            $product->picture = $path . '/' . basename($randomImage);


            $sizes = Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            $product->size()->attach($sizes);


            $product->save();
        });
    }
}
