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