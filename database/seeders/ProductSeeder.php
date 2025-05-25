<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 3, // Pribor i oprema
            'name' => 'Ribolovački štap Shimano FX',
            'description' => 'Kvalitetan štap za rekreativni i sportski ribolov, pogodan za sve vrste riba.',
            'price' => 4999.99,
            'image' => 'products/stap_shimano.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Mamac - veštačke gliste',
            'description' => 'Set od 20 veštačkih mamaca u obliku glista, idealni za šarana i smuđa.',
            'price' => 1199.99,
            'image' => 'products/mamci_gliste.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Ribarska mreža standard',
            'description' => 'Mreža za prihvat ulova sa čvrstim okvirom i mekanim koncem, jednostavna za nošenje.',
            'price' => 1999.99,
            'image' => 'products/mreza.jpg',
            'is_featured' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Kutija za pribor',
            'description' => 'Organizator za udice, plovke, olova i ostalu sitnu opremu.',
            'price' => 899.99,
            'image' => 'products/kutija_pribor.jpg',
            'is_featured' => false,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Ribolovačka stolica na sklapanje',
            'description' => 'Prenosiva i udobna stolica za duži boravak pored vode.',
            'price' => 2599.99,
            'image' => 'products/stolica.jpg',
            'is_featured' => false,
        ]);
    }
}
