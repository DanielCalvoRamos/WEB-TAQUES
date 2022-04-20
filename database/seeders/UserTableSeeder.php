<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Metge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'         => 'useruser3@email.com',
            'password'    => Hash::make('useruser3'),
            'role'         => '1',
            'remember_token'=>Str::random(10),
        ]);

        Metge::create([
            'nom'       => 'Juan',
            'cognom'    => 'Magan',
            'email'         => 'useruser3@email.com',
            'data_naixament' =>'22/05/1999',
            'contrasena'    => Hash::make('useruser3'),
            'remember_token'=>Str::random(10),
            

        ]);

    }
}
