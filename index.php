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

// parei no 48
// https://www.youtube.com/watch?v=LzAFUVSruvQ&list=PLXik_5Br-zO9wODVI0j58VuZXkITMf7gZ&index=48

// classe base
class Animais {
    public $especie;
    public $peso;

    function tipoEspecie() {
        return $this->especie;
    }
}

// classe derivada (com herança da classe base)
class Mamifero extends Animais {
    // ela vai herdar todas a propriedades (especie e peso) e métodos (tipoEspecie()) da classe Animais

    // podemos adicionar novas proriedades e métodos
    public $num_pernas;
    public $tem_pelo;

    function temQuantasPernas() {
        return $this->num_pernas;
    }
}

$mamifero = new Mamifero();
$mamifero->especie = "Cavalo";
$mamifero->num_pernas = 4;
echo $mamifero->temQuantasPernas();
echo "<br /><pre>";
print_r($mamifero);
echo "</pre>";