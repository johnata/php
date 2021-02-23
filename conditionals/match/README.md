## MATCH
Incluída no PHP8, ela é muito semelhante ao switch, mas com uma sintaxe mais compacta, porem cada "case" só pode ter uma expressão.

No switch a comparação é apenas por valor (==)
No match a comparação é por valor e tipo (===)
```php
    $x = 10;
    echo match ( $x ) {
        5 => "parou no 5",
        10 => "parou no 10",
        15 => "parou no 15",
        default => "é um número diferente",
    };

    echo match ( $x ) {
        5 => "parou no 5",
        10, 15, 20 => "parou no 10, 15 ou 20",
        default => "é um número diferente",
    };
```