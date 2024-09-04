<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_status')->insert([
            ['name' => 'Pending','description' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'In-Transit','description' => 'In-Transit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Confirmed','description' => 'Confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shipped','description' => 'Shipped', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivered','description' => 'Delivered', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelled','description' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Refund Request','description' => 'Refund Request', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Refund Confirm','description' => 'Refund Confirm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Refund Cancel','description' => 'Refund Cancel', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
