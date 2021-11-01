<?php

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
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'cpf' => '042.291.430-44',
            'endereco' => 'João xxiii, 464',
            'bairro' => 'São Paulo',
            'cidade' => 'Tapejara',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'professor' => 1,
            'aluno' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
