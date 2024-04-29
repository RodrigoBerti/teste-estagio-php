<?php

    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;

    function verificaAniversario($data) {

        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('d-m');
    
        foreach ($data as $linha) {
            $colaborador = $linha[0];
            $dataNascimento = $linha[1];
            $dataEntrada = $linha[2];
            $dataSainda = $linha[3];

            if(empty($dataSainda)){
                if (!empty($dataNascimento)){

                    $aniversario = date('d-m', strtotime($dataNascimento));

                    if ($hoje == $aniversario) {
                        echo "$colaborador está fazendo aniversário hoje!\n";
                    }
                }
                if (!empty($$dataEntrada)){

                    $aniversario = date('d-m', strtotime($$dataEntrada));

                    if ($hoje == $aniversario) {
                        echo "$colaborador está fazendo aniversário na empresa!\n";
                    }
                }
            }
        }
    }

    function lerArquivo($arquivo ) {

        $carregarArquivo = IOFactory::load($arquivo);

        $planilha = $carregarArquivo ->getActiveSheet();

        $data = [];

        foreach ($planilha->getRowIterator() as $linha) {
            $linhaData = [];
            foreach ($linha->getCellIterator() as $cell) {

                $valor = $cell->getValue();

                if ($cell->getDataType() == \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC && \PhpOffice\PhpSpreadsheet\Shared\Date::isDateTime($cell)) {

                    $valor = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($valor)->format('d-m-Y');
                }

                $linhaData[] = $valor;
            }

            $data[] = $linhaData;
        }

        return $data;
    }

    $arquivo = '202402.xlsx';

    $data = lerArquivo($arquivo );

    verificaAniversario($data);

?>
