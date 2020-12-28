<?php

namespace App\Exports;

use App\Place;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlacesExport implements FromArray , WithHeadings
{
	protected $places;

    public function __construct(array $places)
    {
        $this->places = $places;
    }

    public function array(): array
    {
        return $this->places;
    }

    public function headings(): array
    {
        return [
            'place_name',
			'place_name_urdu',
			'place_short_name',
			'place_alt_spellings',
			'place_code',
			'place_lat_long',
			'place_type',
			'place_name_filter',
			'province_id',
			'division_id',
			'district_id',
			'tehsil_id',
			'uc_id',
			'village_id',
			'province_name',
			'division_name',
			'district_name',
			'tehsil_name',
			'uc_name',
			'village_name',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Place::all();
    }
}
