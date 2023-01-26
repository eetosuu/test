<?php

namespace app\service;

class RealtyService
{

    public static function parsingAddress($address): array
    {
        $newAddress = mb_substr(trim($address), 4);

        $addressArray = array_reverse(mb_str_split($newAddress));

        $apartmentNumber = '';
        $nameStreet = '';
        $numberHome = '';

        $foundApartmentNumber = false;
        $foundNumberHome = false;

        foreach ($addressArray as $addressSymbol) {
            if (!$foundApartmentNumber && $addressSymbol == '-') {
                $foundApartmentNumber = true;
                continue;
            }

            if (!$foundApartmentNumber) {
                $apartmentNumber = $addressSymbol . $apartmentNumber;
            }

            if ($foundApartmentNumber && !$foundNumberHome && $addressSymbol == ' ') {
                $foundNumberHome = true;
                continue;
            }

            if ($foundApartmentNumber && !$foundNumberHome) {
                $numberHome = $addressSymbol . $numberHome;
            }

            if ($foundApartmentNumber && $foundNumberHome) {
                $nameStreet = $addressSymbol . $nameStreet;
            }
        }
        return [
            'apartment' => $apartmentNumber,
            'street' => $nameStreet,
            'home' => $numberHome
        ];
    }

}