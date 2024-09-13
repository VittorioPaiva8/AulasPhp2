<?php



class Cargo extends FichaTecnica
{

    public function cargos()
    {
        $setCargos = readline("1-Vendedor 2-Veterinario 3-Balconista: ");

        switch ($setCargos) {
            case 1:
                salarioVendedor();
                break;
            case 2:
                break;
            case 3:
                break;
        }
    }
    public function salarioVendedor()
    {
        $salarioVendedor = 2000;
        $numeroVendas = readline("Numero de vendas: ");

        if ($numeroVendas >= 1) {
            $salarioVendedor + 50;
        } else if ($numeroVendas >= 3) {
            $salarioVendedor + 170;
        } else if ($numeroVendas >= 5) {
            $salarioVendedor + 300;
        }

        echo "Vendedor Recebeu: $salarioVendedor";
    }

    public function salarioVeterinario()
    {
        $salarioVeterinario = 4000;
        $numeroAtendimentos = readline("Numero de atendimentos: ");

        if ($numeroAtendimentos >= 1) {
            $salarioVeterinario + 100;
        } else if ($numeroAtendimentos >= 3) {
            $salarioVeterinario + 300;
        } else if ($numeroAtendimentos >= 5) {
            $salarioVeterinario + 700;
        }

        echo "Veterinairo Recebeu: $salarioVeterinario";
    }
    public function salarioBalconista()
    {
        $salarioBalsconista = 1500;

        echo "Vendedor Recebeu: $salarioBalsconista";
    }
}
