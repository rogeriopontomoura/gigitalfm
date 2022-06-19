<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{

    // fonte https://www.meupositivo.com.br/doseujeito/dicas/lista-de-codigos-de-bancos-brasileiros/

    static $banks = [
        [
            'name' => 'Banco do Brasil',
            'code' => '001',
        ],
        [
            'name' => 'Santander ',
            'code' => '033',
        ],
        [
            'name' => 'Caixa ',
            'code' => '104',
        ],
        [
            'name' => 'Bradesco ',
            'code' => '237',
        ],
        [
            'name' => 'Mercantil ',
            'code' => '389',
        ],
        [
            'name' => 'HSBC ',
            'code' => '399',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$banks as $bank) {
            Bank::create($bank);
        }
    }
}
