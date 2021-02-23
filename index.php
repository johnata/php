<?php
// PSR
/*
    Função para definir quebra de linha,
    Retorna <br /> se for executato via web (roda no servidor)
    Rertona o PHP_EOL do PHP se for executato via terminal (linha de comando)
*/
function define_quebra_linha () {
    // definição de quebra de linha web (server)
    $line_break = "<br />";
    if ( php_sapi_name() == "cli" ) {
        // Executando via linha de comando (terminal)
        $line_break = PHP_EOL;
    }
    return $line_break;
}


function buscar_nomes () {
    yield "nome 01";
    yield "nome 02";
    yield from ["nome array 01", "nome array 02", "nome array 03"];
    yield "nome 03";
}

foreach ( buscar_nomes() AS $nome ) {
    echo $nome;
    echo "<br />";
}