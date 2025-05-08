<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {

        Product::truncate();

        $products = [
            [
                'nazov' => 'Keramický pohár s modrou glazúrou',
                'popis' => 'Kvalitná ručná práca, ideálna na rannú kávu či čaj.',
                'cena' => 15.00,
                'obrazok' => 'pohare/modry_pohar.jpg',
                'detail' => 'pohare/detail_modreho_pohara.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'modry-pohar',
                'kategoria' => 'poháre',
                'farba' => 'modrá',
            ],
            [
                'nazov' => 'Moderný keramický pohár',
                'popis' => 'Minimalistický dizajn, vhodný do každej domácnosti.',
                'cena' => 9.00,
                'obrazok' => 'pohare/simple_pohar.jpg',
                'detail' => 'pohare/simple_pohar.jpg',
                'objem' => '250 ml',
                'rozmer' => 'stredný',
                'slug' => 'moderny-pohar',
                'kategoria' => 'poháre',
                'farba' => 'biela',
            ],
            [
                'nazov' => 'Keramický pohár v tvare srdca',
                'popis' => 'Darček pre zaľúbených.',
                'cena' => 17.00,
                'obrazok' => 'pohare/srdieckovy_pohar.jpg',
                'detail' => 'pohare/srdieckovy_pohar.jpg',
                'objem' => '250 ml',
                'rozmer' => 'stredný',
                'slug' => 'srdcovy-pohar',
                'kategoria' => 'poháre',
                'farba' => 'červená',
            ],
            [
                'nazov' => 'Jahodový pohár',
                'popis' => 'Roztomilý dizajn aj pre tých najmenších.',
                'cena' => 12.00,
                'obrazok' => 'pohare/jahodkovy_pohar.jpg',
                'detail' => 'pohare/jahodkovy_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'jahodovy-pohar',
                'kategoria' => 'poháre',
                'farba' => 'ružová',
            ],
            [
                'nazov' => 'Asymetrický pohár',
                'popis' => 'Nerovnomerný tvar, originálny.',
                'cena' => 16.00,
                'obrazok' => 'pohare/asymetricky_pohar.jpg',
                'detail' => 'pohare/asymetricky_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'asymetricky-pohar',
                'kategoria' => 'poháre',
                'farba' => 'biela',
            ],
            [
                'nazov' => 'Ružový kvetinový pohár',
                'popis' => 'Krásny, ružový kvetinový pohár pre potešenie všetkých.',
                'cena' => 16.00,
                'obrazok' => 'pohare/ruzovy_pohar.jpg',
                'detail' => 'pohare/ruzovy_pohar.jpg',
                'objem' => '150 ml',
                'rozmer' => 'malý',
                'slug' => 'ruzovy-pohar',
                'kategoria' => 'poháre',
                'farba' => 'ružová',
            ],
            [
                'nazov' => 'Pohár Blue Flower',
                'popis' => 'Modrý, jemný dizajn',
                'cena' => 13.00,
                'obrazok' => 'pohare/modrekvietky_pohar.jpg',
                'detail' => 'pohare/modrekvietky_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'modry-pohar-blue-flower',
                'kategoria' => 'poháre',
                'farba' => 'modrá',
            ],
            [
                'nazov' => 'Cintronový Pohár',
                'popis' => 'Svieži pohár na kávičku, aj s tématickým podnosom',
                'cena' => 24.00,
                'obrazok' => 'pohare/lemon_pohar.jpg',
                'detail' => 'pohare/lemon_pohar.jpg',
                'objem' => '250 ml',
                'rozmer' => 'stredný',
                'slug' => 'cintronovy-pohar',
                'kategoria' => 'poháre',
                'farba' => 'žltá',
            ],
            [
                'nazov' => 'Muchotrávkový pohár',
                'popis' => 'Ručne malované muchotrávky na keramickom hrnčeku',
                'cena' => 14.00,
                'obrazok' => 'pohare/muchotravkovy_pohar.jpg',
                'detail' => 'pohare/muchotravkovy_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'muchotravkovy-pohar',
                'kategoria' => 'poháre',
                'farba' => 'červená',
            ],
            [
                'nazov' => 'Roztomilé poháriky',
                'popis' => 'Malé, ručne zdobené poháriky',
                'cena' => 14.00,
                'obrazok' => 'pohare/roztomily_pohar.jpg',
                'detail' => 'pohare/roztomily_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'roztomily-pohar',
                'kategoria' => 'poháre',
                'farba' => 'hnedá',
            ],
            [
                'nazov' => 'Totoro pohár',
                'popis' => 'Pohár inšpirovaný postavičkami z Totora',
                'cena' => 14.00,
                'obrazok' => 'pohare/totoro.jpg',
                'detail' => 'pohare/totoro.jpg',
                'objem' => '250 ml',
                'rozmer' => 'stredný',
                'slug' => 'totoro-pohar',
                'kategoria' => 'poháre',
                'farba' => 'zelená',
            ],            
            [
                'nazov' => 'Nizky pohár',
                'popis' => 'Ručne malovaný, nizky pohár so zatočenou rúčkou.',
                'cena' => 19.00,
                'obrazok' => 'pohare/nizky_pohar.jpg',
                'detail' => 'pohare/nizky_pohar.jpg',
                'objem' => '150 ml',
                'rozmer' => 'malý',
                'slug' => 'small-cup',
                'kategoria' => 'poháre',
                'farba' => 'biela',
            ],
            [
                'nazov' => 'Srdcový pohár',
                'popis' => 'Ručne malovaný pohár v tvare srdca',
                'cena' => 14.00,
                'obrazok' => 'pohare/srdcove_pohare.jpg',
                'detail' => 'pohare/srdcovy_pohar.jpg',
                'objem' => '200 ml',
                'rozmer' => 'malý',
                'slug' => 'heart-pohar',
                'kategoria' => 'poháre',
                'farba' => 'červená',
            ],

            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}