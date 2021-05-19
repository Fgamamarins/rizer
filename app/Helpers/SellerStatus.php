<?php

namespace App\Helpers;

/**
 * Class SellerStatus
 * @package App\Helpers
 */
class SellerStatus
{
    /**
     * @var array
     */
    private $statusOptions = [
      "1" => "Ativo",
      "2" => "Inativo",
    ];

    /**
     * @return array
     */
    public function getStatusOptions(): array {
        return $this->statusOptions;
    }
}
