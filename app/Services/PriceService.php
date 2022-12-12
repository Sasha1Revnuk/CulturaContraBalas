<?php

namespace App\Services;

class PriceService
{
    public function getCents( $grivnas )
    {
        return (float)$grivnas * 100;
    }

    public function getGrivnas( $cents, $delimetr = '.', $thousandsSep = '' )
    {
        return number_format( (float)round( $cents / 100, 2 ), 2, $delimetr, $thousandsSep );
    }

    public function formatFromComaToDot( $value )
    {
        return stripos( $value, ',' ) ? str_replace( ',', '.', $value ) : $value;
    }

}
