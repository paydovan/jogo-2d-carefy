<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo 2D - Matrizes</title>
</head>
<body>
    <?php

        $matriz = [
            [1, 0, 1, 1, 0, 1],
            [0, 0, 1, 1, 0, 1],
            [0, 1, 1, 1, 0, 1],
            [0, 0, 0, 1, 0, 1],
            [1, 1, 0, 0, 0, 1]
        ];

        $matriz2 = [
            [0, 1, 1],
            [0, 0, 1],
            [1, 0, 1]
        ];   

        function explorarMatriz($matriz, $coordenadasIniciais) {
            $linhas = count($matriz); // número de linhas (M)
            $colunas = count($matriz[0]); // número de colunas (N)

            $x = $coordenadasIniciais; // coordenadas iniciais

            foreach ($matriz as $linha) {
                echo "[" . implode(", ", $linha) . "]<br>";
            }
            echo 'Resultado:';

            while (true) {
                $esquerda = $x[1] - 1 >= 0 ? $matriz[$x[0]][$x[1] - 1] : null;
                $direita = $x[1] + 1 < $colunas ? $matriz[$x[0]][$x[1] + 1] : null;
                $frente = $x[0] + 1 < $linhas ? $matriz[$x[0] + 1][$x[1]] : null;
                $cima = $x[0] - 1 >= 0 ? $matriz[$x[0] - 1][$x[1]] : null; // Verificação para cima

                // echo implode(' ', $x) . ' ' . $esquerda . ' ' . $direita . ' ' . $frente . ' ' . $cima . PHP_EOL; // Saída de depuração

                $matriz[$x[0]][$x[1]] = 1; // Marcar a posição atual como visitada

                if ($esquerda === 0) { 
                    echo 'L' . PHP_EOL; 
                    $x = [$x[0], $x[1] - 1];
                } else if ($direita === 0) { 
                    echo 'R' . PHP_EOL;  
                    $x = [$x[0], $x[1] + 1];
                } else if ($frente === 0) { 
                    echo 'F' . PHP_EOL;  
                    $x = [$x[0] + 1, $x[1]];
                } else if ($cima === 0) { // Verificar se pode subir
                    echo 'F' . PHP_EOL;
                    $x = [$x[0] - 1, $x[1]];
                } else { 
                    echo 'E' . PHP_EOL;
                    break;
                }
            }
        }

        explorarMatriz($matriz, [0, 1]); // Explorar a primeira matriz com coordenadas [0, 1]
        
        echo '<br>---------------------- <br>';

        explorarMatriz($matriz2, [0, 0]); // Explorar a segunda matriz com coordenadas [0, 0]

    ?>

</body>
</html>