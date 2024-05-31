<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'name' => 'Cuci Kiloan',
                'description' => 'Layanan cuci dengan sistem per kilogram',
                'unit' => 'Kg',
                'price' => 10000,
            ],
            [
                'name' => 'Cuci Karpet',
                'description' => 'Layanan cuci dengan sistem per meter persegi',
                'unit' => 'm2',
                'price' => 15000,
            ],
            [
                'name' => 'Bag Care',
                'description' => 'Layanan perawatan tas',
                'unit' => 'Pcs',
                'price' => 20000,
            ],
            [
                'name' => 'Shoe Care',
                'description' => 'Layanan perawatan sepatu',
                'unit' => 'Pairs',
                'price' => 20000,
            ],
        ]);
    }
}
