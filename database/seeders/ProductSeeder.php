<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            ['name'=>'Oppo mobile',
            'price'=> '300',
            'description'=> 'Brand new 8G phone.',
            'category'=> 'mobile',
            'gallery'=> 'https://image.oppo.com/content/dam/oppo/common/mkt/v2-2/f21_pro/navigation/v2/Navigation-SunsetOrange-427_600-pc.png.thumb.webp',
        ],
        ['name'=>'Panasonic TV',
            'price'=> '900',
            'description'=> 'Brand new 4K TV.',
            'category'=> 'tv',
            'gallery'=> 'data:image/jpeg;base64,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',
        ],
        ['name'=>'Sony TV',
            'price'=> '950',
            'description'=> 'Sony Bravia 8K TV.',
            'category'=> 'tv',
            'gallery'=> 'data:image/jpeg;base64,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',
        ],
        ]);
    }
}