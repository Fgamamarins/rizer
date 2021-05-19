<?php

namespace App\Helpers;

/**
 * Class RizerHelper
 * @package App\Helpers
 */
class RizerHelper
{
    const GENERIC_ERROR_MESSAGE = "Ocorreu um erro ao atualizar o vendedor, tente novamente mais tarde!";

    /**
     * @param $phoneNumber
     * @return string
     */
    static function formatPhoneNumber($phoneNumber): string
    {
        $areaCode = substr($phoneNumber, -11, 2);
        $nextFive = substr($phoneNumber, -9, 5);
        $lastFour = substr($phoneNumber, -4, 4);

        return ' (' . $areaCode . ') ' . $nextFive . '-' . $lastFour;
    }
}
