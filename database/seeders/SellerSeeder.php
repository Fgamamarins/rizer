<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Repositories\SellerRepository;
use Illuminate\Database\Seeder;

/**
 * Class SellerSeeder
 * @package Database\Seeders
 */
class SellerSeeder extends Seeder
{
    /**
     * @var SellerRepository
     */
    private $sellerRepository;

    /**
     * SellerSeeder constructor.
     * @param SellerRepository $sellerRepository
     */
    public function __construct(SellerRepository $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }

    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $values = [
            [
                "name"        => "Felipe",
                "email"       => "felipe.absx@mailinator.com",
                "phone"       => "24999999999",
                "status_enum" => 1,
            ],
            [
                "name"        => "Marcos",
                "email"       => "marcos.absx@mailinator.com",
                "phone"       => "24999999999",
                "status_enum" => 1,
            ],
            [
                "name"        => "João",
                "email"       => "joao.absx@mailinator.com",
                "phone"       => "24999999999",
                "status_enum" => 1,
            ],
        ];

        foreach ($values as $value) {
            Seller::create($value);
        }
    }
}
