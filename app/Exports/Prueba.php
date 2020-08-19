<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class Prueba implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Invoice::query();
    }
}
