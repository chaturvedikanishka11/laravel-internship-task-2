<?php

use Illuminate\Database\Seeder;
use App\blogcategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        blogcategory::create(
        [
         
        'CategoryName' => 'Interior Wallpaper',
        'Status' => '1',

        ]);

        blogcategory::create(
        [
         
        'CategoryName' => 'Exterior Wallpaper',
        'Status' => '1',

        ]);

        blogcategory::create(
        [
         
        'CategoryName' => 'Kitchen Wallpaper',
        'Status' => '1',

        ]);

        blogcategory::create(
        [
         
        'CategoryName' => 'Bathroom Wallpaper',
        'Status' => '1',

        ]);


    }
}
