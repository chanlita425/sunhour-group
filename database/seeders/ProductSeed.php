<?php

namespace Database\Seeders;

use App\Models\Admin\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Seeder
{
    /**
     * Generate a unique encoded ID from an integer.
     */
    private function encodeIdToString($id, $length = 10)
    {
        $id = (int)$id;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $saltLength = $length - strlen((string)$id) - 2;
        $salt = '';
        for ($i = 0; $i < max(4, $saltLength); $i++) {
            $salt .= $characters[rand(0, strlen($characters) - 1)];
        }
        $combined = $salt . '-' . $id;
        return base64_encode($combined);
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];
        for ($i = 1; $i <= 50; $i++) {
            $products[] = [
                "uuid" => $this->encodeIdToString($i), // Generate unique ID
                "brand_id" => 'bXRMSTQ3OC0y',
                "name" => match ($i) {
                    1 => "Neorest",
                    2 => "Washlet",
                    3 => "Eco-Washer",
                    4 => "Toilets",
                    5 => "Close-Coupled Toilets",
                    6 => "Wall Hung Toilet",
                    7 => "Concealed Tank",
                    8 => "Bidet",
                    9 => "Console Lavatories",
                    10 => "Seft Rimming Lavatories",
                    11 => "Semi Recessed Lavatories",
                    12 => "Under Counter Lavatories",
                    13 => "Wall Hung Lavatories",
                    14 => "Flotation Hub",
                    15 => "Pearl Acrylic Bathtub",
                    16 => "Acrylic Bathtub",
                    17 => "ZA Series",
                    18 => "ZL Series",
                    20 => "GE Series",
                    21 => "GC Series",
                    22 => "GR Series",
                    23 => "GF Series",
                    24 => "GS Series",
                    25 => "GO Series",
                    26 => "GM Series",
                    27 => "GR Series",
                    28 => "Rain Shower",
                    29 => "LB Series",
                    30 => "GA Series",
                    31 => "LF Series",
                    32 => "LN Series",
                    33 => "LC Series",
                    34 => "REI-S Series",
                    35 => "SHOWER- PRODUCT LINE UP",
                    36 => "SAFETY THERMO PRODUCTS",
                    37 => "SHOWER SYSTEMS",
                    38 => "OVERHEAD SHOWER",
                    39 => "Wall Mounted & Over Head Shower",
                    40 => "Hand Shower",
                    41 => "L Selection (Hand Shower)",
                    42 => "Wall Outlet Shower",
                    43 => "Sliding Rail",
                    44 => "G SELECTION ACCESSORY( ROUND)",
                    45 => "G SELECTION ACCESSORY( SQUARE)",
                    46 => "L SELECTION ACCESSORY( ROUND)",
                    47 => "Accessory L Selection (Square)",
                    48 => "TOUCHLESS FAUCETS",
                    49 => "TOUCHLESS SOAP DISPENSERS",
                    50 => "HAND DRY",
                }
            ];
        }

        DB::table('products')->insert($products);
    }
}
