<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SearchResultsExport implements FromCollection
{
    protected $results;

    public function __construct(Collection $results)
    {
        $this->results = $results;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->results;
    }
}
