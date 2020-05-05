<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addAdmin();
    }

    /**
     * @return null |null
     */
    public function addAdmin()
    {
        $roleID = $this->addRole();
        $user = new User();
        $user['name'] = 'Zarok13';
        $user['email'] = 'zarok@dreadnought.com';
        $user['password'] = Hash::make('1');
        $user['role_id'] = $roleID;
        $user->save();
        return null;
    }

    /**
     * @return mixed
     */
    public function addRole()
    {
        $check = Role::where('title', 'administrator')->first();
        if (empty($check)) {
            $role = new Role();
            $role->title = 'administrator';
            $role->save();
            return $role->id;
        }
        return $check->id;
    }
}
