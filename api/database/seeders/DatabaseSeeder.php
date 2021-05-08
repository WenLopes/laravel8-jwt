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
            'email' => config('env.API_USER_EMAIL'),
            'password' => bcrypt( config('env.API_USER_PASSWORD') ),
            'job_title' => 'Gerente administrativo'
        ]);
    }
}
