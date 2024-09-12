<?php



class Cargo extends FichaTecnica
{

    public function calcularSalario()
    {
        $salarioBalconista = 2000;
        $salarioVet = 4000;
        $salarioVendedor = 1500;
    }



    public function cargos()
    {
        $setCargos = readline("1-Balconista 2-Veterinario 3-Vendedor: ");

        switch ($setCargos) {
            case 1:
                $salarioBalconista();
                break;
            case 2:
                $salarioVet();
                break;
            case 3:
                $salarioVendedor();
                break;
        }
    }
}
