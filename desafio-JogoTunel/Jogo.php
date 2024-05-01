<?php

    function verificaCaminho($matriz, $iniciar, $M, $N, &$caminho) {
        $linha = $iniciar[0];
        $coluna = $iniciar[1];

        $caminho[$linha][$coluna] = true;

        if ($iniciar[1] + 1 < $N && $matriz[$linha][$coluna + 1] == 0 && !$caminho[$linha][$coluna + 1]) {
            echo "L ";
            $posicaoAtual = [$linha, $coluna + 1];
            return verificaCaminho($matriz, $posicaoAtual, $M, $N, $caminho);
        }

        if ($iniciar[1] - 1 >= 0 && $matriz[$linha][$coluna - 1] == 0 && !$caminho[$linha][$coluna - 1]) {
            echo "R ";
            $posicaoAtual = [$linha, $coluna - 1];
            return verificaCaminho($matriz, $posicaoAtual, $M, $N, $caminho);
        }

        if ($iniciar[0] + 1 < $M && $matriz[$linha + 1][$coluna] == 0 && !$caminho[$linha + 1][$coluna]) {
            echo "F ";
            $posicaoAtual = [$linha + 1, $coluna];
            return verificaCaminho($matriz, $posicaoAtual, $M, $N, $caminho);
        }

        if ($iniciar[0] - 1 >= 0 && $matriz[$linha - 1][$coluna] == 0 && !$caminho[$linha - 1][$coluna]) {
            echo "F ";
            $posicaoAtual = [$linha - 1, $coluna];
            return verificaCaminho($matriz, $posicaoAtual, $M, $N, $caminho);
        }

        return '';
    }

    function jogoTunel() {
        while (true) {
            echo "Insira as dimensões da matriz (M N): ";
            $input = readline();
            if ($input === false || $input === '') break;
            list($M, $N) = explode(' ', $input);

            echo "Insira a matriz $M x $N sem espaço entre (0 e 1):" . PHP_EOL;
            $matriz = [];
            for ($i = 0; $i < $M; $i++) {
                $linha = str_split(readline());
                $matriz[] = $linha;
            }

            $iniciar = null;
            foreach ($matriz as $linhaIndex => $linha) {
                foreach ($linha as $colunaIndex => $valor) {
                    if (strtolower($valor) === 'x') {
                        $iniciar = [$linhaIndex, $colunaIndex];
                        break 2;
                    }
                }
            }
            $caminho = array_fill(0, $M, array_fill(0, $N, false));
            echo "Instruções: ";

            if ($iniciar=== null) {
                echo "Posição inicial do objeto X não encontrada na matriz." . PHP_EOL;
            } else {
                verificaCaminho($matriz, $iniciar,$M,$N,$caminho);
                echo "E\n";
            }
        }
    }

    jogoTunel();

?>