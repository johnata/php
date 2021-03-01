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

// parei no 62
// https://www.youtube.com/watch?v=LzAFUVSruvQ&list=PLXik_5Br-zO9wODVI0j58VuZXkITMf7gZ&index=62

abstract class Forma {
    public $largura = 100;
    public $altura = 200;

    abstract public function area();

    function getAltura() {
        return $this->altura;
    }
}
// $quadrado = new Forma(); // isto não é permitido de uma classe abstrata

class Retangulo extends Forma {
    // tenho que implementar obrigatóriamente o método "area" conforme assinatura da classe abstrata "Forma", se declarar-mos gerará um erro
    public function area() {
        return $this->largura * $this->altura;
    }
}
$r = new Retangulo();
echo $r->area();
echo "<br />";
echo $r->getAltura();
