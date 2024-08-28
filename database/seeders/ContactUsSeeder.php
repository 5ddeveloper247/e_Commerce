<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUs;
class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUs::insert([
            [
                'full_name' => 'John Doe',
                'phone_number' => '1234567890',
                'email_address' => 'john.doe@example.com',
                'order_number' => 'ORD12345',
                'company_name' => 'Example Corp',
                'rma_number' => 'RMA67890',
                'comment' => 'This is a test comment for John Doe.',
                'reply' => 'This is a reply to John Doe\'s comment.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Jane Smith',
                'phone_number' => '0987654321',
                'email_address' => 'jane.smith@example.com',
                'order_number' => 'ORD54321',
                'company_name' => 'Another Corp',
                'rma_number' => 'RMA98765',
                'comment' => 'This is a test comment for Jane Smith.',
                'reply' => 'This is a reply to Jane Smith\'s comment.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Alice Johnson',
                'phone_number' => '1122334455',
                'email_address' => 'alice.johnson@example.com',
                'order_number' => 'ORD67890',
                'company_name' => 'Tech Solutions',
                'rma_number' => 'RMA11223',
                'comment' => 'Alice Johnson inquiry about the product order.',
                'reply' => 'This is a reply to Alice Johnson\'s inquiry.',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
