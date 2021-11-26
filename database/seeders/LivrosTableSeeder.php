<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivrosTableSeeder extends Seeder
{
    static $pessoas = [
        [
            'nome'=>'Joao da Silva',
            'idade'=> '2020-01-05',
            'sexo' => 'H'
        ],
        [
            'nome'=>'Maria da Silva',
            'idade'=> '2008-05-01',
            'sexo' => 'M'
        ],
        [
            'nome'=>'Paulo Jose',
            'idade'=> '1987-05-12',
            'sexo' => 'H'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$pessoas as $p){
            DB::table('pessoas')->insert([
                'nome'=>$p['nome'],
                'idade'=>$p['idade'],
                'sexo'=>$p['sexo']
            ]);
        }
    }
}
