<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        // $faker = Faker\Factory::create();
        // static $password;
    
        // for($i = 0; $i < 10; $i++) {
        //     App\User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => $password ?: $password = bcrypt('secret'),
        //         'remember_token' => str_random(10),
        //     ]);
        // }
        
        // One user generation
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);

        $faker = Faker\Factory::create();
        factory(App\Post::class, 10)->create();
    }
}
