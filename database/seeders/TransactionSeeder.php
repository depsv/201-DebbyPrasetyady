<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::insert([
            [
                'user_id' => 1,
                'status' => 'cancelled',
                'amount' => 30000,
            ],
            [
                'user_id' => 2,
                'status' => 'completed',
                'amount' => 45000,
            ],
            [
                'user_id' => 3,
                'status' => 'pending',
                'amount' => 20000,
            ],
        ]);
    }
}
