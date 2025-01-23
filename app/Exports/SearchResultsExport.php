<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SearchResultsExport implements FromCollection, WithHeadings
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
        return $this->results->map(function ($item) {
            return [
                '日付' => $item->date,
                '作業開始時間' => $item->start_time,
                '作業終了時間' => $item->end_time,
                '名前' => $item->name,
                '作業場所' => $item->location,
                '作業内容' => $item->workDescription,
                '使用機械' => $item->machine,
                '燃料使用量' => $item->fuel,
            ];
        });
    }

    public function headings(): array
    {
        return ['日付', '作業開始時間', '作業終了時間', '名前', '作業場所', '作業内容', '使用機械', '燃料使用量'];
    }
}
