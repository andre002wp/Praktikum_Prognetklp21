<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
class User_Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::all();
        foreach ($admin as $data) {
            Admin::create([
                'id'                => $data['id'],
                'name'              => $data['name'],
                'email'             => $data['email'],
                'phone'             => $data['phone'],
                'password'          => $data['password'],
                'remember_token'    => $data['remember_token'],
                'created_at'        => $data['created_at'],
                'updated_at'        => $data['updated_at'],
            ]);
        }
        $user = User::all();
        foreach ($user as $data) {
            User::create([
                'id'                => $data['province_id'],
                'name'              => $data['name'],
                'email'             => $data['email'],
                'phone'             => $data['phone'],
                'address'           => $data['address'],
                'email_verified_at' => $data['email_verified_at'],
                'password'          => $data['password'],
                'remember_token'    => $data['remember_token'],
                'created_at'        => $data['created_at'],
                'updated_at'        => $data['updated_at'],
            ]);
        }
    }
}
