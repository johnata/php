## IF
```php
    $nome = "pedro";
    if ( $nome == "pedro" ) {
        // executa tudo que estiver dentro das chaves
        echo "OK";
    }

    // outra forma (não muito utilizada)
    if ( $nome == "pedro" ):
        // executa tudo que estiver dentro das chaves
        echo "OK";
    endif;
```
### IF ... ELSE
```php
    $idade = 20;
    if ( $idade <= 18 ) {
        echo "Adolescente";
    } else {
        echo "Adulto";
    }
    
    // outra forma (não muito utilizada)
    if ( $idade <= 18 ):
        echo "Adolescente";
    else:
        echo "Adulto";
    endif;
```
### IF ... ELSEIF ... ELSE
```php
    $nota = 5;
    if ( $nota <= 2 ) {
        echo "nota muito baixa";
    } elseif ( $nota <= 4 ) {
        echo "nota baixa";
    } elseif ( $nota <= 6 ) {
        echo "nota positiva";
    } elseif ( $nota <= 8 ) {
        echo "nota muito positiva";
    } else {
        echo "nota exelente";
    }
```