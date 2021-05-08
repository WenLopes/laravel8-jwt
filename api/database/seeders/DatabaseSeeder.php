<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::create([
            'name' => 'Usuário de teste',
            'email' => 'usuario@teste.com.br',
            'password' => bcrypt('senha123'),
            'job_title' => 'Gerente administrativo'
        ]);
    }
}
