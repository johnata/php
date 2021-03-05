### Variáveis
Uma variável passa a existir a partir do local da sua declaração ou iniciada até o final do seu arquivo.

Porém muda se houver funções:
* se ela inicia fora da função, seu ciclo de vida é apenas fora da ou das funções;
* se ela inicia dentro de uma função ou como paramtros da assinatura da função, seu ciclo de vida é apenas dentro dessa função;
* podemos utilizar e atualizar uma variavel iniciada fora de uma função de duas formar:
    * com o ```global```;
    * com o ```$GLOBALS["nome-da-sua-variavel"]```;
    ```php
    $a = 10;
    $b = 100;

    function func1 () {
        // aqui vai alterar a variável $a interna da função
        $a = 20;
    }
    function func2 () {
        // faz com que a função utilize a variável global ($a) do arquivo
        global $a;
        $a = 20;
    }

    function func3 () {
        // aqui vai alterar a variável $b interna da função 
        $b = 200;
    }
    function func4 () {
        // altera direto no GLOBALS do PHP
        $GLOBALS["b"] = 200;
    }

    echo func1(); 
    echo $a;// a saída será: 10
    echo "<br />";

    echo func2(); 
    echo $a;// a saída será: 20
    echo "<br />";

    echo func3(); 
    echo $b;// a saída será: 100
    echo "<br />";

    echo func4(); 
    echo $b;// a saída será: 200
    echo "<br />";
    ```
* Diferente de outras linguagens, o ciclo de vida de uma variável declarada dentro de loops (```for```, ```foreach```, ```while```) ou de condições (```if```, ```swith```), não são destruídas dentro dele, elas continuam existindo na sequencia do código:
```php
if ( true ) {
    $a = 10;
}
echo $a; // a saída será: 10
echo "<br />";

for ( $i = 0; $i < 10; $i++ ) { 
    $b = 100;
}
echo $b; // a saída será: 100
echo "<br />";
```

#### Constantes
São variáveis que são declardas com valor atribuido e esse não pode ser alterado durante a execução de um script.

Uma constante é sempre pública, ou seja, sempre visivel.

O nome de uma constante de ser sempre maiuscula, pode utilizat o ```_```, e não se inicia com o ```$``` (como em variáveis normais).

O PHP permite definir uma constante de duas formas:
* com termo ```const```: é usado para definir constantes no contexto de classes;
    ```php
    class Constantes {
        const PI = 3.14;
        // Add array nas constantes declaradas com const no PHP 5.6
        const NOMES = ["Pedro", "João", "Antonio"];
    }

    $a = new Constantes();
    // echo $a->PI; // gera erro, pois PI não é um atributo, é uma constante
    echo $a::PI; // 3.14
    echo "<br />";
    echo Constantes::PI; // 3.14
    echo "<br />";

    echo $a::NOMES[0]; // Pedro
    echo "<br />";
    echo Constantes::NOMES[1]; // João
    echo "<br />";
    ```
* com o método ```define```: permite definir constantes globais ou locais, mas não pode ser usada dentro de uma classe;
    ```php
    define("APP_NAME", "Nome da minha aplicação");
    define("MOSTRAR_ERROS", true);
    
    // Add array nas constantes com define no PHP 7 
    define("NOME", ["Pedro", "João", "Antonio"]);

    echo "APP_NAME: ".APP_NAME;
    echo "<br />";

    
    echo "NOME[1]: ".NOME[1]; // João
    echo "<br />";

    if ( MOSTRAR_ERROS ) {
        echo "mostra o erro";
        echo "<br />";
    }
    ```
Em versões antigas do PHP é possivel utilizar um terceiro parâmetro para indicar que a constante é insensitive, porem a partir do PHP 7.3 não é mais aceito. 

Podemos validar se uma constante já existe da seguinte forma:
```php
if ( !defined("APP_NAME") ) {
    define("APP_NAME", "Nome da minha aplicação");
}
echo "APP_NAME: ".APP_NAME;
echo "<br />";

defined("APP_NAME2") or define("APP_NAME2", "app 2");

echo "APP_NAME2: ".APP_NAME2;
echo "<br />";
```

#### Constantes mágicas
Existem 8, e são chamadas assim porque seu valor varia automaticamente dependendo de onde são usadas:
* ```__LINE__```: indica o número da de código no stript;
* ```__FILE__```: identifica o caminho completo do script;
* ```__DIR__```: identifica a pasta onde o script esta;
* ```__FUNCTION__```: indica o nome da função;
* ```__CLASS__```: indica o nome da classe;
* ```__METHOD__```: indica o nome do método;

* ```__TRAIT__```: está relacionado com um mecanismo de reutilização de código;
* ```__NAMESPACE__```: indica o nome do namespace atual;
```php
echo "__LINE__: ".__LINE__."<br />";
echo "__FILE__: ".__FILE__."<br />";
echo "__DIR__: ".__DIR__."<br />";
teste();
$ct = new ClasseTeste();
$ct->set();
// echo "__TRAIT__: ".__TRAIT__."<br />";
echo "__NAMESPACE__: ".__NAMESPACE__."<br />";

function teste() {
    echo "__FUNCTION__: ".__FUNCTION__."<br />"; // teste
}

class ClasseTeste {
    function set() {
        echo "__CLASS__: ".__CLASS__."<br />";
        echo "__METHOD__: ".__METHOD__."<br />";
    }
}
```
#### Type declarations
O PHP não é uma linguagem tipificada, ou seja, as variáveis não são definidas com um tipo específico. Mas podemos tipificar nos parametros e retornos de funções
```php
function falar ( array $msg ) {
    print_r($msg);
}

// falar("alô"); // var dar erro
falar(["alô"]); // teremos que passar um array como parâmetro

function conversar ( string $msg ) {
    echo($msg);
}
conversar("alô"); // funciona perfeitamente
conversar(1); // funciona perfeitamente, pois o PHP converte automaticamente o inteiro para string
// conversar(["alô"]); // já se passarmos um array dará erro
```

A declarações de tipos foram adicionadas no PHP 5.1 e acrescentados mais tipos no PHP 5.4, como por exemplo `callable`

Outros tipos (`bool`, `int`, `float` e `string`) foram adicionados no PHP 7 e no PHP 8 foi adicionado o tipo `mixed`.

O tipo `callable` tem que ser uma função, método ou objeto. Podemos utilizar uma função anonima por exemplo.

**CUIDADO**: O PHP faz algumas converções automáticas (inteiro para string)
```php
$falar = function($msg) { echo "A minha mensagem é: $msg"; };

function conversar( callable $func, $valor ) {
    $func($valor);
}

conversar($falar, "apenas para confirmar a reserva");
```
Com retornos de funções:
```php
function func_1():array {
    return [0, 1, 2];
}
print_r(func_1());

// aqui irá dar erro, pois espera uma string como retorno e está retornando um array
// function func_2():string {
//     return [0, 1, 2];
// }
```

No PHP 7.1 passou a ser possivel usar o tipo de  declaração nullable, com isso alem do tipo especificado ela pode receber valor nulo. Para isso basta colocar prefixo `?` antes do tipo de valor esperado (`function escrever( ?string $msg) { echo $msg; }`).

#### Strict types
O comportamento natural do PHP é tentar converter os tipos declarados:
```php
function escrever( string $msg) {
    echo $msg;
}
escrever("olá"); // converte
echo "<br / >";
escrever(23); // converte

function somar( int $num_1, int $num_2 ) {
    echo $num_1 + $num_2;
}
somar(2, 8); // converte
echo "<br / >";
somar('a', 'b'); // converte, porem dará erro no calculo
```
Porem temos forçar que o PHP não tente converter com o `declare(strict_types=1)`, porem ele deve ser declarado no inicio de cada stript:
```php
declare(strict_types=1);
function escrever( string $msg) {
    echo $msg;
}
escrever("olá"); // OK
echo "<br / >";
// escrever(23); // ERROR

function somar( int $num_1, int $num_2 ) {
    echo $num_1 + $num_2;
}
somar(2, 8); // OK
echo "<br / >";
// somar('a', 'b'); // ERROR
```
No PHP 8 foi disponibilizada a possibilidade de definirmos mais de um tipo de variável para o mesmo campo ou retorno de uma função, separando os tipos co o pipe "`|`":
```php
declare(strict_types=1);
function escrever( int|string $msg) {
    echo $msg;
}
escrever("olá"); // OK
echo "<br / >";
escrever(23); // OK
echo "<br / >";
// escrever([1, 2, 3]); // ERROR

function somar( int|float $v1, int|float $v2):int|float {    
    // return "teste"; // se tentarmos devolver algo diferente do esperado dará erro
    return $v1 + $v2;
}
echo somar(1.5, 1.5); // OK
echo "<br / >";
echo somar(1, 1); // OK
echo "<br / >";
// echo somar(1, "1"); // ERROR
echo "<br / >";
```
#### Explicit Cast (Conversão explícita)
Podemos converter explícitamente os principais tipos de valores: `(string)`, `(int)`, `(float)`, `(array)`, etc.
> boleano para inteiro:
```php
$var_boleana = false;
// se for mostrar o valor boleano falso, mostrará nulo
echo "\$var_boleana: ".$var_boleana;
echo "<br />";
// assim podemos converter para inteiro para mostrar como 0 (zero)
echo "(int)\$var_boleana: ".(int)$var_boleana;
echo "<br />";
```
> array para objeto
```php
$array_ufs = ["PR", "SC", "RS"];
$objeto_ufs = (object)$array_ufs;

echo "\$array_ufs:<br /><pre>";
print_r($array_ufs);
echo "</pre><br />";

echo "\$objeto_ufs:<br /><pre>";
print_r($objeto_ufs);
echo "</pre><br />";
```
> string ou int para array ou objeto
```php
$nome = "Pedro";
$array_nomes = (array)$nome;
$obj_nomes = (object)$nome;

echo "\$array_nomes:<br /><pre>";
print_r($array_nomes);
echo "</pre><br />";

echo "\$obj_nomes:<br /><pre>";
print_r($obj_nomes);
echo "</pre><br />";

$idade = 20;
$array_idades = (array)$idade;
$obj_idades = (object)$idade;

echo "\$array_idades:<br /><pre>";
print_r($array_idades);
echo "</pre><br />";

echo "\$obj_idades:<br /><pre>";
print_r($obj_idades);
echo "</pre><br />";
```