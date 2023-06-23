<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
>>>>>>> aa3445f (projects done)
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
<<<<<<< HEAD
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "studio", 
                "email" => "studio@gmail.com",
                "password" => Hash::make("studio"),
                "role_id" => "3",
                "phone" => "0777777",
                "image" => ""
            ],
            [
                "name" => "evrogroup", 
                "email" => "evrogroup@gmail.com",
                "password" => Hash::make("evrogroup"),
                "role_id" => "2",
                "phone" => "099999999",
                "image" => ""
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
=======
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
>>>>>>> aa3445f (projects done)
    }
}
