<?php

namespace Database\Seeders;

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Insert restaurants data with category associations and images
        Restaurant::insert([
            [
                'name' => 'Bu Rudy Jl. Anjasmoro',
                'category_id' => 1, // Category ID for Indonesian
                'rating' => 4.4,
                'price' => '$$',
                'location' => 'Jl. Anjasmoro No.45, Sawahan, Kec. Sawahan, Surabaya',
                'image' => 'images/restaurants/burudy.jpg',
            ],
            [
                'name' => 'RM Padang  Payakumbuah',
                'category_id' => 1, // Category ID for Indonesian
                'rating' => 4.6,
                'price' => '$$',
                'location' => 'Jl. Jawa No.33, Gubeng, Kec. Gubeng, Surabaya',
                'image' => 'images/restaurants/rmpadang.jpg',
            ],[
                'name' => 'Warung Bebek Goreng H. Slamet',
                'category_id' => 1, // Category ID for Indonesian
                'rating' => 4.4,
                'price' => '$$',
                'location' => 'Jl. Anjasmoro No.45, Sawahan, Kec. Sawahan, Surabaya',
                'image' => 'images/restaurants/warungbebek.jpg',
            ],
            [
                'name' => 'Gyu Kaku, Pakuwon Mall',
                'category_id' => 2, // Category ID for Japanese
                'rating' => 4.6,
                'price' => '$$$$',
                'location' => 'Pakuwon Mall. 2nd Floor Mezzanine, Unit. 12, Surabaya',
                'image' => 'images/restaurants/gyukaku.jpg',
            ],[
                'name' => 'Yoshinoya, Jemursari',
                'category_id' => 2, // Category ID for Japanese
                'rating' => 4.4,
                'price' => '$$',
                'location' => 'Jl. Raya Jemursari No.262, Surabaya',
                'image' => 'images/restaurants/yoshinoya.jpg',
            ],[
                'name' => 'Housaku Sushi & Bento',
                'category_id' => 2, // Category ID for Japanese
                'rating' => 3.8,
                'price' => '$$',
                'location' => 'Jl. Taman Puspa Raya Ruko Taman Gapura Gwalk K- 2, Surabaya',
                'image' => 'images/restaurants/housaku.jpg',
            ],
            [
                'name' => 'Gojumong Surabaya',
                'category_id' => 3, // Category ID for Korean
                'rating' => 4.5,
                'price' => '$$',
                'location' => 'Jl. Raya Ruko Bukit Darmo Boulevard blok 2D-2E, Surabaya',
                'image' => 'images/restaurants/gojumong.jpg',
            ],
            [
                'name' => 'SON GA Korean Family Resturant',
                'category_id' => 3, // Category ID for Korean
                'rating' => 4.5,
                'price' => '$$$$',
                'location' => 'Jl. Anjasmoro No.45, Sawahan, Kec. Sawahan, Surabaya,',
                'image' => 'images/restaurants/songa.jpg',
            ],[
                'name' => 'Tteobokki Queen',
                'category_id' => 3, // Category ID for Korean
                'rating' => 4.1,
                'price' => '$',
                'location' => 'Jl. Pakuwon Indah Lontar Timur Waterplace Tokan A-01, Surabaya',
                'image' => 'images/restaurants/tteobokki.jpg',
            ],
            [
                'name' => 'McDonald’s Jl. Basuki Rachmad',
                'category_id' => 4, // Category ID for Fast Food
                'rating' => 4.0,
                'price' => '$$',
                'location' => 'Jln. Basuki Rachmad 21-13, Surabaya',
                'image' => 'images/restaurants/mcd.jpg',
            ],[
                'name' => 'KFC Raya Diponegoro',
                'category_id' => 4, // Category ID for Fast Food
                'rating' => 4.1,
                'price' => '$$',
                'location' => 'Jl. Raya Diponegoro No. 217, Surabaya',
                'image' => 'images/restaurants/kfc.jpg',
            ],[
                'name' => 'HokBen Tegalsari',
                'category_id' => 4, // Category ID for Fast Food
                'rating' => 4.4,
                'price' => '$$',
                'location' => 'Jl. Polisi Istimewa No. 23 - 25, Tegalsari, Surabaya',
                'image' => 'images/restaurants/hokben.jpg',
            ],
            [
                'name' => 'De Soematara 1910',
                'category_id' => 5, // Category ID for Italian
                'rating' => 4.4,
                'price' => '$$$$',
                'location' => 'Jl. Sumatra 75, Surabaya ',
                'image' => 'images/restaurants/sumatra.jpg',
            ],[
                'name' => 'TuttoBono Ristorante',
                'category_id' => 5, // Category ID for Italian
                'rating' => 4.7,
                'price' => '$$$',
                'location' => 'Jl. Bukit Darmo Boulevard No. 9, Dukuh Pakis, Surabaya',
                'image' => 'images/restaurants/tutto.jpg',
            ],[
                'name' => 'Nanny’s Pavillon',
                'category_id' => 5, // Category ID for Italian
                'rating' => 4.0,
                'price' => '$$',
                'location' => 'Jln. Bo. Basuki Rachmad no. 8-12 Tunjungan Plaza 4 Lt. 4 PW. 04 Unit 67, 81-82, Surabaya ',
                'image' => 'images/restaurants/nanny.jpg',
            ],
            [
                'name' => 'Pavilion Restaurant',
                'category_id' => 6, // Category ID for Western
                'rating' => 5.0,
                'price' => '$$$$',
                'location' => 'JL Embong Malang 85-89 JW Marriott Hotel Surabaya',
                'image' => 'images/restaurants/pavillion.jpg',
            ],[
                'name' => 'Boncafe Steak Jl.Pregolan',
                'category_id' => 6, // Category ID for Western
                'rating' => 4.4,
                'price' => '$$$',
                'location' => 'Jl. Anjasmoro No.45, Sawahan, Kec. Sawahan, Surabaya,',
                'image' => 'images/restaurants/boncafe.jpg',
            ],[
                'name' => 'United Steaks',
                'category_id' => 6, // Category ID for Western
                'rating' => 4.0,
                'price' => '$$',
                'location' => 'Jl. Mayjend Yono Soewoyo, Dukuh Pakis, Surabaya',
                'image' => 'images/restaurants/united.jpg',
            ],
        ]);
    }
}
