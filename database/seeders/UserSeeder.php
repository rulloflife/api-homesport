<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'Admin Admin',
//            'email' => 'admin@material.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('secret'),
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);

        $userData = config('setting.users');
        foreach ($userData as $data) {
            $user = User::where('email','=' ,$data['email'])->first();
            if(empty($user)){
                $data['password'] = Hash::make($data['password']);
                User::create($data);
            }
        }
    }
}
