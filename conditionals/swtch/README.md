## SWITCH
```php
    $nome = "pedro";
    switch ( $nome ) {
        case "pedro":
            # suas linhas de código
        break; // é obrigatório, se não tiver ele executará o proximo case
        case "joão":
            # suas linhas de código
        break;
        default:
            # suas linhas de código
        break; // como o default mantemos no final não é obrigatório, mas pode ser usado também
    }

    // outra forma (não muito utilizada)
    switch ( $nome ):
        case "pedro":
            # suas linhas de código
        break; // é obrigatório, se não tiver ele executará o proximo case
        case "joão":
            # suas linhas de código
        break;
        default:
            # suas linhas de código
        break; // como é o ultimo "case" não é obrigatório, mas pode ser usado também
    endswitch;
```