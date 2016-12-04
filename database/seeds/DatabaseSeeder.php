<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $docente = new Docente;
       $docente->apelido = 'Mavie';
       $docente->nome= 'Sergio';
       $docente->email='sergio.mavie@gmail.com';
       $docente->celular='842725428';
       $docente->area_de_formacao='Informática';
       $docente->save();

       $docente = new Docente;
        $docente->apelido = 'Cheque';
        $docente->nome= 'Valter';
        $docente->email='sergio.mavie@gmail.com';
        $docente->celular='842725428';
        $docente->area_de_formacao='Informática';
        $docente->save();
    }
}
