## LOOP
break
```php
    for ( $i = 1; $i < 20; $i++ ) {
        echo "repetição $i";
        if ( $i == 10 ) {
            // interrompe o loop e só mostra até 10
            break;
        }
    }

    $nomes = ["pedro", "antônio", "joão"];
    foreach ( $nomes AS $nome ) {
        echo $nome."<br />";
        if ( $nome == "antônio" ) {
            // interrompe o loop e só mostra pedro e antônio
            break;
        }
    }
```

continue

Pula para a proxima repetição não executando o codigo de dentro do loop após ele
```php
    for ( $i = 1; $i < 20; $i++ ) {
        if ( $i == 10 ) {
            // pula a repetição e não mostra o 10
            continue;
        }
        echo "repetição $i";
    }

    $nomes = ["pedro", "antônio", "joão"];
    foreach ( $nomes AS $nome ) {
        if ( $nome == "antônio" ) {
            // pula a repetição e não mostra o antônio
            continue;
        }
        echo $nome."<br />";
    }
```

goto

Muito pouco usado, pois torna dificil a leitura do código
Foi incluído no PHP 5.3 e permite sair do loop e ir para a linha do código definida por um label (nome seguido de :)
```php
    for ( $i = 1; $i < 20; $i++ ) {
        if ( $i == 10 ) {
            // pula para a linha com "gotoFor:"
            goto gotoFor;
        }
        echo "repetição $i<br />";
    }

    // não é executado
    echo "fim do for<br />";
    
    gotoFor:
    echo "pulou para cá (gotoFor)<br />";

    $nomes = ["pedro", "antônio", "joão"];
    foreach ( $nomes AS $nome ) {
        if ( $nome == "antônio" ) {
            // pula para a linha com "gotoForeach:"
            goto gotoForeach;
        }
        echo $nome."<br />";
    }
    
    // não é executado
    echo "fim do foreach<br />";

    gotoForeach:
    echo "pulou para cá (gotoForeach)<br />";
```