<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::insert([
            'title' => 'New'
        ]);

        About::insert([
            'title' => 'Test'
        ]);

        About::insert([
            'title' => 'Visit'
        ]);
    }
}
