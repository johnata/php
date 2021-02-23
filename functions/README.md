## Functions
São blocos de codigos identificados uma assinatura (formada por um nome e opcionalmente os parametros da mesma).

Elas permitem que o código seja reutilizado e com uma melhor organização.

Estes blocos só são chamados quando são chamados.

Definimos uma função usando a palavra chave ```function```, seguida de seu nome, mais um conjunto de parenteses (com ou sem variaveis de parametros) e seu bloco de código entre chaves.

O nomes das funções podem ser usádos vários padrões, mas recomenda-se usar apenas um padrão em todo projeto.
```php
# Camel Case: primeira letra de cada palavra maiúscula
function CamelCase () {
}
# Snake Case: palavras separadas por "_"
function snake_case () {  
}
```
OBS: as funões não são ```case sensitive```, ou seja, não diferencia maiúculas de minúsculas (nomeDaFuncao == nomedafuncao).

Função de exemplo:
```php
function nome_da_funcao () {
    # aqui vai o bloco de código da sua função
    echo "nome_da_funcao";
}
# chamando a função
nome_da_funcao(); // a saída será: nome_da_funcao
```
Função com parametros obrigatórios:
```php
function echo_soma ( $a, $b ) {
    echo $param01;
}
# chamando a função
echo_soma(2, 8); // a saída será: 10
```
Função com retorno e um parametro não obrigatório:

Os parametros opcionais devem estar obrigatóriamente declarados no final, a partir do PHP 8 apresentará um alerta caso isso ocorra, já nas versões anteriores nada será apresentado, apenas erro de parametro faltando se mandar sem.
```php
// aqui o segundo parametro é opcional, se não for passado é usado padrão declarado (usa o 2 nesse caso)
function multipicar ( $a, $b = 2 ) {
    return $a * $b;
}
# chamando a função
echo multipicar(2, 8); // a saída será: 16
echo "<br />";
echo multipicar(2); // a saída será: 4
```
No PHP 8 foi adicionado os ```named arguments```
```php
// aqui o segundo parametro é opcional, se não for passado é usado padrão declarado (usa o 2 nesse caso)
function somar ( $a, $b = 2, $c = 10 ) {
    return $a + $b + $c;
}

# chamnda padrão
echo somar(3); // a saída será: 15
echo "<br />";

// posso mudar o valor de $c sem ter que pasar o $b
echo somar(3, c: 20); // a saída será: 25
echo "<br />";

// e posso mandar em qualquer ordem nomeando os argumentos
echo somar(c: 20, a: 3); // a saída será: 25
echo "<br />";
```
Podemos ter um função sem parametros em sua assinatura, mas que consegue ler o(s) parametro(s). Utilizamos a função ```func_get_arg``` do PHP:
```php
function somar () {
    $a = func_get_arg(0); // pega parametro 1
    $b = func_get_arg(1); // pega parametro 2
    return $a + $b;
}
# chamando a função
echo somar(3, 2); // a saída será: 5
echo "<br />";
```
Podemos utiliza a função ```func_get_arg``` do PHP em conjunto com a função ```func_num_args```, que retorna a quantidade de argumentos que recebeu:
```php
function somar () {
    $soma = 0;

    for ( $i=0; $i < func_num_args(); $i++ ) {    
        $soma += func_get_arg($i);
    }

    return $soma;
}
# chamando a função
echo somar(3, 2); // a saída será: 15
echo "<br />";
```
Também podemos utilizar o argumento ```variadic parameter```:
```php
function somar (...$params) {
    $soma = 0;

    foreach ( $params AS $value ) {    
        $soma += $value;
    }

    return $soma;
}
# chamando a função
echo somar(3, 2); // a saída será: 15
echo "<br />";
```

#### Funões Anonimas
Uma função anonima não tem nome e pode ser definida como o valor de uma variável.

Seu funcionamento interno é identico a uma função comum. 

Presente no PHP 5.3 ou superior
```php
$a = function() {
    echo "dentro da função";
};

// chamo a função anonima
$a();
echo "<br />";
```
Com parametros:
```php
// somar
$somar = function( $a, $b ) {
    echo $a + $b;
};

// chamo a função anonima
$somar(2, 5); // a saída será: 7
echo "<br />";
```
Com retorno:
```php
// somar com return
$somar2 = function( $a, $b ) {
    return $a + $b;
};

// chamo a função anonima
echo $somar2(2, 5); // a saída será: 7
```
Como parametro
```php
// somar com return
$a = function() {
    return 2;
};

function dividir ( $x, $y ) {
    return $x / $y;
}

// chamo a função anonima
echo dividir(10, $a()); // a saída será: 7
```
#### Funões Closure
São variáveis anonimas que podem usar variáveis do escopo global.

Pode apenas utilizar, não podem ser alteradas
```php
$a = 5;
$b = 10;

$minha_closure = function($param) use ($a, $b) {
    echo "param: $param; a: $a; b: $b";
    // isso NÃO altera o valor de $b
    $b += 2;
};

$minha_closure(20);
echo "<br />";
// chamo a função anonima
echo $b; // a saída será: 10
echo "<br />";
```
#### Funões Arrow
São funções anonimas com escrita "abreviada".

Suportam as mesmas caracteríticas de uma ```closure```, com a diferença que elas já capturam as variáveis globais.

Usam a palavra reservada ```fn``` e não precisam de ```return``` e nem as chaves ```{}```.

Presente no PHP 7.4 ou superior
```php
$a = 5;
$b = 10;

$minha_arrow = fn($param) => "param: $param; a: $a; b: $b";

echo $minha_arrow(20);
echo "<br />";
```
#### Funões Generators
Um gerador é uma função que permite gerar séries de valores.

Cada valor é devolvido pela função através da instrução ```yield```.

Ao contrario do return, a instrução ```yield``` guarda o estado da função permitindo que a mesma continue a partir do estado anterior.

Ela funciona como um interador, podendo ser usada num ciclo até que o gerador não tenha mais valores para devolver com o ```yield```.

```php
function buscar_numero () {
    for ( $i = 0; $i < 5; $i++) { 
        // vai devolver $i e guardar seu estado para próxima interação
        yield $i;
    }
}

foreach ( buscar_numero() AS $numero ) {
    echo $numero;
    echo "<br />";
}
```

Presente no PHP 5.5 ou superior

Foi melhorado no PHP 7 com a introdução do ```yield from```, que permitem um outro tipo de retorno: 
* devolver valores de outro gerador;
* devolver valores de um array;
```php
function buscar_nomes () {
    yield "nome 01";
    yield "nome 02";
    yield from ["nome array 01", "nome array 02", "nome array 03"];
    yield "nome 03";
}

foreach ( buscar_nomes() AS $nome ) {
    echo $nome;
    echo "<br />";
```
NOTA: 
* Como elas não necessitam tratar todos os dados de uma vez, quando usadas, pode reduzir a performance do script.
* O PHP vem acompanhado de uma imensa coleção de funções que estão sempre disponíveis para realizar operações com arrays, strings, comunicação com BD, encriptação, operações com arquivos e pastas, entre outras.