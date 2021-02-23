## WHILE
```php
    $i = 1;
    // executa enquanto $i for menor do que 10
    while ( $i < 10 ) {
        echo "repetição $i";
        // incrementa $i (CUIDADO se faltar o incremento da condição você terá um loop infinito)
        $i++;
    }
    
```

## DO WHILE
```php
    $i = 1;
    // valida a condição no final do ciclo de repetição
    do {
        echo "repetição $i";
        // incrementa $i (CUIDADO se faltar o incremento da condição você terá um loop infinito)
        $i++;
    } while ( $i < 10 )
    
```