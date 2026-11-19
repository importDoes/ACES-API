<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $addresses = [
            [
                'address_number' => '123',
                'street' => 'Sample Street',
                'barangay' => 'Barangay 1',
                'district' => 'District 1',
                'municipality' => 'Sample Municipality',
                'city' => 'Manila',
                'province' => 'Metro Manila',
                'zip_code' => '1000',
            ],
            [
                'address_number' => '456',
                'street' => 'Example Avenue',
                'barangay' => 'Barangay 2',
                'district' => 'District 2',
                'municipality' => 'Sample Municipality',
                'city' => 'Quezon City',
                'province' => 'Metro Manila',
                'zip_code' => '1100',
            ],
        ];

        foreach ($addresses as $address) {
            Address::firstOrCreate($address);
        }
    }
}