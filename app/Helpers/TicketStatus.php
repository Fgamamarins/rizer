<?php

namespace App\Helpers;

/**
 * Class TicketStatus
 * @package App\Helpers
 */
class TicketStatus
{
    /**
     * @var array
     */
    private $statusOptions = [
      "1" => "Aberto",
      "2" => "Em Andamento",
      "3" => "Atrasado",
      "4" => "Resolvido"
    ];

    /**
     * @return array
     */
    public function getStatusOptions(): array {
        return $this->statusOptions;
    }
}
