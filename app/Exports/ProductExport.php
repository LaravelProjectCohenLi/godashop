<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use App\Models\Products\Product;


class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array {
        return [
            'ID',
            'Name',
            'Sku',    
            "Created",
            "Updated"
            
        ];
    }
 
    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->sku,
            $user->created_at,
            $user->updated_at
        ];
    }
}
