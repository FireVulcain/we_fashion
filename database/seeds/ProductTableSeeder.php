<?php

use App\Genre;
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

        // Create all the genre available
        Genre::create([ 'name' => 'M' ]);
        Genre::create([ 'name' => 'F' ]);


        // Create all the size available
        Size::create([ 'name' => 'XS' ]);
        Size::create([ 'name' => 'S' ]);
        Size::create([ 'name' => 'M' ]);
        Size::create([ 'name' => 'L' ]);
        Size::create([ 'name' => 'XL' ]);

        // Create 80 products
        factory(Product::class, 80)->create()->each(function( $product ){
            $randomGenre = rand(1, 2);
            $genre = Genre::find($randomGenre);
            $product->genre()->associate($genre);


            // Check genre type
            switch ($randomGenre) {
                case 1: $images = glob(public_path() . '/images/hommes/*');
                    break;
                case 2: $images = glob(public_path() . '/images/femmes/*');
                    break;
                default:
            }

            $randomImage = $images[array_rand($images)]; // Get one random image from folder
            $product->picture = basename($randomImage);


            $sizes = Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            $product->size()->attach($sizes);


            $product->save();
        });
    }
}
