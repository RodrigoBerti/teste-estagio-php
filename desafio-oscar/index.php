<?php

function verificaInfarto($instancia, $dados) {
    $maiorRisco = -1;
    $atorIndice = -1;

    foreach ($dados as $indice => $valor) {
        $risco = 0;
        $maxDiferenca = 0;
        $maxBatimento = 0;

        for ($i = 1; $i < count($valor); $i++) {
            if ($valor[$i] > $valor[$i - 1]) {
                $risco++;
                $diferente = 0;
                if (is_numeric($valor[$i]) && is_numeric($valor[$i - 1])) {
                    $diferente = $valor[$i] - $valor[$i - 1];
                }
                
                if ($diferente > $maxDiferenca) {
                    $maxDiferenca = $diferente;
                    $maxBatimento = $valor[$i];
                }
            }
        }

        if ($risco > $maiorRisco) {
            $maiorRisco = $risco;
            $atorIndice = $indice + 1;
        } elseif ($risco == $maiorRisco) {
            if ($maxDiferenca > 0) {
                $atorIndice = $indice + 1;
            } elseif ($maxBatimento > 0) {
                if ($maxBatimento > $dados[$atorIndice - 1][count($dados[$atorIndice - 1]) - 1]) {
                    $atorIndice = $indice + 1;
                }
            }
        }
    }

    echo "Instancia #" . $instancia . "\n";
    echo "Ator com maior risco de infarto: " . $atorIndice . "\n\n";
}

function entradaDados() {
    $arquivo = fopen('matrizBatimentosCardiacos.txt', 'r');
    $matriz = array();
    $instancia = 1;

    if ($arquivo) {
        while (($linha = fgets($arquivo)) !== false) {
            $numLinha = explode(" ", $linha);
            if (count($numLinha) == 2) {
                if (!empty($matriz)) {
                    verificaInfarto($instancia, $matriz);
                    $instancia++;
                    $matriz = array();
                }
            }
            if (in_array(0, $numLinha)) {
                break;
            }
            $matriz[] = $numLinha;
        }
        fclose($arquivo);
    } else {
        echo "Problema para abrir arquivo";
    }

    if (!empty($matriz)) {
        verificaInfarto($instancia, $matriz);
    }
}

entradaDados();

?>
