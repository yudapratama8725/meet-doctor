<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\ConfigPayment;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $config_payment = [
            [
                'fee'=>'150000',
                'vat'=> '20', //vat is Percentage
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        ConfigPayment::insert($config_payment);
    }
}
