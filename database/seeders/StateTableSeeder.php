<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array(
            array('id' => ' 1', 'name' => 'ABIA'),
            array('id' => '2', 'name' => 'ADAMAWA'),
            array('id' => '3', 'name' => 'AKWA IBOM'),
            array('id' => '4', 'name' => 'ANAMBRA'),
            array('id' => '5', 'name' => 'BAUCHI'),
            array('id' => '6', 'name' => 'BAYELSA'),
            array('id' => '7', 'name' => 'BENUE'),
            array('id' => '8', 'name' => 'BORNO'),
            array('id' => '9', 'name' => 'CROSS RIVER'),
            array('id' => '10', 'name' => 'DELTA'),
            array('id' => '11', 'name' => 'EBONYI'),
            array('id' => '12', 'name' => 'EDO'),
            array('id' => '13', 'name' => 'EKITI'),
            array('id' => '14', 'name' => 'ENUGU'),
            array('id' => '37', 'name' => 'FEDERAL CAPITAL TERRITORY'),
            array('id' => '15', 'name' => 'GOMBE'),
            array('id' => '16', 'name' => 'IMO'),
            array('id' => '17', 'name' => 'JIGAWA'),
            array('id' => '18', 'name' => 'KADUNA'),
            array('id' => '19', 'name' => 'KANO'),
            array('id' => '20', 'name' => 'KATSINA'),
            array('id' => '21', 'name' => 'KEBBI'),
            array('id' => '22', 'name' => 'KOGI'),
            array('id' => '23', 'name' => 'KWARA'),
            array('id' => '24', 'name' => 'LAGOS'),
            array('id' => '25', 'name' => 'NASARAWA'),
            array('id' => '26', 'name' => 'NIGER'),
            array('id' => '27', 'name' => 'OGUN'),
            array('id' => '28', 'name' => 'ONDO'),
            array('id' => '29', 'name' => 'OSUN'),
            array('id' => '30', 'name' => 'OYO'),
            array('id' => '31', 'name' => 'PLATEAU'),
            array('id' => '32', 'name' => 'RIVERS'),
            array('id' => '33', 'name' => 'SOKOTO'),
            array('id' => '34', 'name' => 'TARABA'),
            array('id' => '35', 'name' => 'YOBE'),
            array('id' => '36', 'name' => 'ZAMFARA'),
        );
        
        foreach ($states as $value) {
            State::create([
                'id' => $value['id'],
                'name' => $value['name']
            ]);
        }
    }
}
