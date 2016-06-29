<?php

use App\Medicamento;
use Illuminate\Database\Seeder;

class MedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicamento = new Medicamento();
        $medicamento->delete();
        $dataMedicamentos = file_get_contents(public_path('app/public/medicamentosLegalesVE.json'));
        $jsonMedicamentos = json_decode($dataMedicamentos, true);
        foreach ($jsonMedicamentos as  $data) {
            $array = [
                'nombre' => $data['FIELD2'],
                'laboratorio' => $data['FIELD7'],
                'concentracion' => $data['FIELD3'],
                'forma_farmacetica' => $data['FIELD4'],
                'titular' => $data['FIELD6'],
                'nombre_generico' => $data['FIELD5'],
            ];
            $medicamento->crearNuevo($array);
        }
    }
}
