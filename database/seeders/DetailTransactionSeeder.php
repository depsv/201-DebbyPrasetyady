<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailTransaction;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailTransaction::insert([
            [
                'transaction_id' => 1,
                'service_id' => 1,
                'qty' => 1,
                'discount' => 0,
                'total' => 10000,
            ],
            [
                'transaction_id' => 1,
                'service_id' => 4,
                'qty' => 1,
                'discount' => 0,
                'total' => 20000,
            ],
            [
                'transaction_id' => 2,
                'service_id' => 2,
                'qty' => 3,
                'discount' => 0,
                'total' => 45000,
            ],
            [
                'transaction_id' => 3,
                'service_id' => 4,
                'qty' => 1,
                'discount' => 0,
                'total' => 20000,
            ],
        ]);
    }
}
