<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
            'name'=> 'Ayange Felix',
            'email'=> 'ayangefelix8@gmail.com',
            'usertype' => 'admin',
            'password' => bcrypt('felix123'),
        ]);

        $user = App\User::create([
            'name'=> 'Atekombo Fater',
            'email'=> 'logicfatee360@gmail.com',
            'usertype' => 'admin',
            'password' => bcrypt('felix123'),
        ]);

        $user = App\User::create([
            'name'=> 'Ayodele Damilola',
            'email'=> 'ayodeledamilola@gmail.com',
            'usertype' => 'admin',
            'password' => bcrypt('felix123'),
        ]);
    
    }
}
