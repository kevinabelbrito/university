<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $se = new Career();
        $se->fill([
            'name' => 'System Engineer',
            'code_number' => '047',
            'code_string' => 'SYS',
        ]);
        $se->save();

        $ie = new Career();
        $ie->fill([
            'name' => 'Industrial Engineer',
            'code_number' => '045',
            'code_string' => 'IDT',
        ]);
        $ie->save();

        $ce = new Career();
        $ce->fill([
            'name' => 'Civil Engineer',
            'code_number' => '043',
            'code_string' => 'CVL',
        ]);
        $ce->save();

        $ee = new Career();
        $ee->fill([
            'name' => 'Electronic Engineer',
            'code_number' => '042',
            'code_string' => 'ETR',
        ]);
        $ee->save();
    }
}
