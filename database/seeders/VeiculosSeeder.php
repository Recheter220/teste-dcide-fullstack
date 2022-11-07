<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Seeder;

class VeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veiculo::create([
            'marca' => 'GM Chevrolet',
            'veiculo' => 'AGILE LT 1.4 MPFI 8V FlexPower 5p',
            'ano' => 2015,
            'descricao' => 'AGILE LT 1.4 MPFI 8V FlexPower 5p',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'GM Chevrolet',
            'veiculo' => 'Astra 2.0 8V/ CD 2.0 8V Hatchback 5p Aut',
            'ano' => 2015,
            'descricao' => 'Astra 2.0 8V/ CD 2.0 8V Hatchback 5p Aut',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'GM Chevrolet',
            'veiculo' => 'Corsa Sed. Joy 1.8 MPFI 8V FlexPower',
            'ano' => 2010,
            'descricao' => 'Corsa Sed. Joy 1.8 MPFI 8V FlexPower',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'Ford',
            'veiculo' => 'EcoSport 4WD 2.0/ 2.0 Flex 16V 5p',
            'ano' => 2022,
            'descricao' => 'EcoSport 4WD 2.0/ 2.0 Flex 16V 5p',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'Ford',
            'veiculo' => 'Ka 1.0 8V/1.0 8V ST Flex 3p',
            'ano' => 2019,
            'descricao' => 'Ka 1.0 8V/1.0 8V ST Flex 3p',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'Hyundai',
            'veiculo' => 'HB20 C./C.Plus/C.Style 1.6 Flex 16V Mec.',
            'ano' => 2022,
            'descricao' => 'HB20 C./C.Plus/C.Style 1.6 Flex 16V Mec.',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'Hyundai',
            'veiculo' => 'i30 2.0 16V 145cv 5p Aut.',
            'ano' => 2019,
            'descricao' => 'i30 2.0 16V 145cv 5p Aut.',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'Hyundai',
            'veiculo' => 'Elantra GL',
            'ano' => 2015,
            'descricao' => 'Elantra GL',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'VW - VolksWagen',
            'veiculo' => 'up! black/white/red 1.0 TSI TFlex 12V 5p',
            'ano' => 2017,
            'descricao' => 'up! black/white/red 1.0 TSI TFlex 12V 5p',
            'vendido' => false,
        ]);

        Veiculo::create([
            'marca' => 'VW - VolksWagen',
            'veiculo' => 'Golf GTi 350 TSI 2.0 230cv 16V Aut.',
            'ano' => 2019,
            'descricao' => 'Golf GTi 350 TSI 2.0 230cv 16V Aut.',
            'vendido' => false,
        ]);
    }
}
