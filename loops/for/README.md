## FOR
```php
    // $i = 1   : declara e inicia o contador
    // $i < 10  : condição para conclusão do ciclo
    // $i++;    : incrementa o contador
    for ( $i = 1; $i < 10; $i++ ) {
        echo "repetição $i";        
    }

    // podemos "ignorar" a declaração e o incremento dentro da contição for, não é muito usado
    $i = 1;
    for ( ; $i < 10; ) {
        echo "repetição $i";
        // CUIDADO: dessa forma voltamos a correr o risco de criar ul loop infinito se não incrementar-mos ou decrementar-mos o contador de repatição
        $i++;       
    }

    // o primeiro e ultimo parametro podem ser multiplos, separando-os por virgula
    for ( $i = 1, $x = 10; $i < 10 ; $i++, $x--) {
        echo "repetição $x";    
    }

    // podemos utilizar com array
    $nomes = ["pedro", "antônio", "joão"];
    for ( $i = 0; count( $nomes ); $i++ ) {
        echo $nomes[$i]."<br />";
    }
```