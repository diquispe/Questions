<?php

use App\User;
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
        // $this->call(UsersTableSeeder::class);
        /*
         * each hace que cada ves que se itera user tambien itera una pregumta
         * en ves de crearla por separado
         *
         * el metodo make almacena en memoria los registros
         * en cambio el metodo create inserta los registos en la base de datos
         */
        factory(User::class, 4)->create()->each(function ($u) {
            $u->questions()
                ->saveMany(
                    factory(\App\Question::class, rand(1,5))->make()
                );
        });
    }
}
