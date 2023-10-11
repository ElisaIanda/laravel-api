<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['FrontEnd', 'Backend', 'FullStack'];          
        foreach ($types as $type) {             
            $new_type = new Type();             
            $new_type->title = $type;             
            $new_type->save();         
        }

    }
}
