<?php

    function verificaCaminho($grid, $start, $M, $N) {
        
    }

    function jogoTunel() {
        while (true) {
            echo "Insira as dimensões da matriz (M N): ";
            $input = readline();
            if ($input === false || $input === '') break;
            list($M, $N) = explode(' ', $input);

            $visited = array_fill(0, $M, array_fill(0, $N, false));

            echo "Insira a matriz $M x $N (0s e 1s):" . PHP_EOL;
            $grid = [];
            for ($i = 0; $i < $M; $i++) {
                $linha = str_split(readline());
                $grid[] = $linha;
            }

            $iniciar = null;
            foreach ($grid as $linhaIndex => $linha) {
                $colunaIndex = array_search('0', $linha);
                if ($colunaIndex !== false) {
                    $iniciar = [$linhaIndex, $colunaIndex];
                    break; 
                }
            }

            if ($iniciar=== null) {
                echo "Posição inicial do objeto X não encontrada na matriz." . PHP_EOL;
            } else {
                $path = verificaCaminho($grid, $iniciar,$M,$N);
                echo "Instruções: " . $path . PHP_EOL . "E" . PHP_EOL;
            }
        }
    }

    jogoTunel();

?>