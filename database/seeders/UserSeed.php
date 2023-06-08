<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nikname' => 'teste',
            'email'=>'teste@teste.com',
            'password' => bcrypt('12345678'),
            'profile' => 'admin'
        ]);

        User::create([
            'nikname' => 'client',
            'email'=>'client@client.com',
            'password' => bcrypt('12345678'),
            'profile' => 'client'
        ]);
    }
}
