<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Songs::table('users')->insert([
            'songnaam' => Str::random(10),
            'songsgenre' => 'jaz',
        ]);
    }
}
