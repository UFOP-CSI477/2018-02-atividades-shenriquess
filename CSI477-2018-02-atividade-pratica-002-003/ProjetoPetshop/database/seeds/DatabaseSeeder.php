<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call('UserTableSeeder');
        // $this->call(UsersTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'type'=>2,
            'password'=>bcrypt('123456'),
        ]);

        User::create([
            'name'=>'Operador',
            'email'=>'operador@admin.com',
            'type'=>3,
            'password'=>bcrypt('123456'),
        ]);
    }

}
