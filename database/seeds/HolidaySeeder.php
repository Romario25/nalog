<?php
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('holidays')->insert([
            'name' => '1 января',
            'day' => '01',
            'month' => '01'
        ]);
        DB::table('holidays')->insert([
            'name' => 'Рождество',
            'day' => '07',
            'month' => '01'
        ]);
        DB::table('holidays')->insert([
            'name' => '8 марта',
            'day' => '08',
            'month' => '03'
        ]);
        DB::table('holidays')->insert([
            'name' => 'test',
            'day' => '15',
            'month' => '04'
        ]);
        DB::table('holidays')->insert([
            'name' => 'test2',
            'day' => '21',
            'month' => '05'
        ]);
    }
}