<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            [
                'user_id' => '3',
                'category_id' => '1',
                'title' => 'pantai asoi',
                'description' => 'ini pantai asoy',
                'imageURL' => 'http://cdn.cnn.com/cnnnext/dam/assets/181010131059-australia-best-beaches-cossies-beach-cocos3.jpg',
            ],

            [
                'user_id' => '3',
                'category_id' => '1',
                'title' => 'pantai santoy',
                'description' => 'ini pantai asoy',
                'imageURL' => 'http://cdn.cnn.com/cnnnext/dam/assets/181010131059-australia-best-beaches-cossies-beach-cocos3.jpg',
            ], 
            [
                'user_id' => '3',
                'category_id' => '2',
                'title' => 'mountain a',
                'description' => 'mountain ini terletak di pantai',
                'imageURL' => 'http://cdn.cnn.com/cnnnext/dam/assets/181010131059-australia-best-beaches-cossies-beach-cocos3.jpg',
            ],
        ]);
    }
}
