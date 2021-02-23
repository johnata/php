## FOREACH
Ciclo para interações com array
```php
    // podemos utilizar com array
    $nomes = ["pedro", "antônio", "joão"];
    // $nomes é o seu array que quer tratar
    // $nome é o registro da linha do array que a repatição está, nesse caso $nome será predro na primeira ciclo de repetição depois antônio e por fim joão no terceiro ciclo de repetição
    foreach ( $nomes AS $nome ) {
        echo $nome."<br />";
    }

    // com array associativo
    $capitais = [
        "PR" => "Curitiba",
        "SC" => "Florianópolis"
    ];
    // $capitais é o seu array que quer tratar
    // $key é a chave do seu array
    // $value é o valor da chave do seu array
    foreach ( $capitais AS $key => $value ) {
        echo "$key: $value<br />";
    }
```