## Classes
Uma classe é um modelo a partir do qual criamos objetos.

Um modelo pode ter:
* propriedades: são variáveis/fields/campos/ atributos que guardam as características do objeto;
* métodos: são funções que definem o que o objeto pode fazer (uma ação);

Ex.: 

Classe Humano:
* Ela é um modelo, a partir dela criamos um conjunto de homens e mulheres, cada um partilhando um mesmo "modelo", mas com propriedade e funções com valores diferentes.
* Homem e mulher: ambos tem cabelo, mas o um pode ter cabelo escuro e outro claro.

Teoricamente:
* class Humano
    * cabelo (uma propriedade)
    * genero (uma propriedade)
    * peso (uma propriedade)
    * caminhar (um método)
* Homem -> Humano
    * cabelo: castanho
    * genero: masculino
    * peso: 80
    * caminhar()
* Mulher -> Humano
    * cabelo: castanho
    * genero: masculino
    * peso: 80
    * caminhar()
    * engravidar() - pode ter funções diferenciadas

### No PHP
Elas são definidas pela declaração ```class```, o seu nome e o bloco de código que contem suas propriedades e métodos.

Por convensão PSR-1, o nome de uma classe de ser sempre ```StudlyCaps```/```PascalCase```/```MixedCase``` (primeira letra de cada palavra maiuscula).

NOTA: Ao contrario do nome das variáveis, o nome das classes são ```case insensitive```, ou seja, podemos instanciar a classe ```Humano``` com ```humano``` ou ```Humano```.

Conforme exemplo:
```php
class Humano {
    // propriedades e métodos
}
class JogadorFutebol {
    // propriedades e métodos
}
```
No PHP, as propriedades tem que ter um nível de acesso especificado (```public```, ```private```, ```protected```)
```php
class FiguraGeometrica {
    public $largura, $altura;
    public $x;
    public $y;

    function novaArea ( $a, $b ) {
        return $a * $b;
    }
}
```
Para acessar as propriedade de uma classe, dentro dos médodos da classe, é usada a pseudo variável $this seguida de ```->``` e o nome da variavel que deseja acessar.
```php
class Humano {
    public $name = "Fulano";
    public $sobrenome = "de Tal";

    public function nomeCompleto () {
        return $this->nome." ".$this->sobrenome;
    }
}
```
As classes recorrem a utilização de Access Modifiers (Níceis de acesso)

Estes níveis de acesso aos dados indicam:
* private: que podemos ver os dados apenas de dentro da classe em que esta;
* public: que podemos ver os dados de fora da classe;
* protected: pode ser visto de dentro da classe e de qualquer extenção de classe (classe derivada);

#### Objetos
É uma variável criada a partir de uma classe.

#### Instanciar
É a criação de um objeto a partir de uma classe atribuindo a variável a expressão ```new``` e o nome da classe.

Assim poderemos acessar as propriedades e métodos
```php
$homem = new Humano();

echo $homem->nomeCompleto;
```
#### Constructor
O construtor é um método especial dentro de uma classe que é sempre executado automáticamente quando é criado um objeto s a partir de uma classe.

Este método é definido de uma forma especial com ```__construct```.

São chamados de métodos mágicos porque têm uma execução específica ou automática associada.
```php
class Humano {
    private $nome;
    private $sobrenome;

    function __construct( $n, $s ) {
        $this->nome = $n;
        $this->sobrenome = $s;
    }

    public function nomeCompleto() {
        return $this->nome." ".$this->sobrenome;
    }
}

$homem = new Humano("Pedro", "Santos");
$mulher = new Humano("Ana", "Santos");

echo $homem->nomeCompleto();
echo "<br />";
echo $mulher->nomeCompleto();
```
#### Property Promotion
Isso permite definir propriedades diretamente nos parâmetros do construtor.

Foi adicionado no PHP 8
```php
class Humano {
    // passamos para dentro do construtor
    //public $nome;
    //public $sobrenome;

    function __construct( public $nome, public $sobrenome ) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }

    public function nomeCompleto() {
        return $this->nome." ".$this->sobrenome;
    }
}

$homem = new Humano("Pedro", "Santos");
$mulher = new Humano("Ana", "Santos");

echo $homem->nomeCompleto();
echo "<br />";
echo $mulher->nomeCompleto();
```
#### Classe anonimas
Classe sem nome
Adicionada no PHP 7
```php
$a = new class {
    function teste() {
        echo "teste";
    }
};

$a->teste();
```
#### Herança (Inheritance)
É o mecanismo através do qual podemos criar classes que herdam propriedades e mátodos de outra classe.

A classe inicial a partir da qual outras serão criadas, é chamada de classe base.

Todas as classes vão herdar propriedades e métodos da classe base são chamadas de classes derivadas.

Em PHP utilizamos a expressão ```extends``` para herdar uma classe.
```php
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
```
#### Overriding (Reescrever)
Esse mecanismo permite que uma classe derivada tenha seus atributos e médodos reescritos especificamente para ela.
```php
class Animal {
    function mover() {
        echo "metodo mover padrão";
    }
}
class Mamifero extends Animal {
    // sem reescrita 
}
class Peixe extends Animal {
    function mover() {
        echo "metodo mover da classe peixe";
    }
}

$animal = new Animal();
echo $animal->mover();
echo "<br />";

$mamifero = new Mamifero();
echo $mamifero->mover();
echo "<br />";

$peixe = new Peixe();
echo $peixe->mover();
echo "<br />";
```
> Podemos chamar o contrutor da classe base usando parent ou o nome da classe base.
```php
class Retangulo {
    public $largura, $altura;
    function __construct( $l, $a ) {
        $this->largura = $l;
        $this->altura = $a;
    }

    function calcularArea() {
       return $this->largura * $this->altura;
    }
}
// Normal
class Quadrado extends Retangulo {
    function __construct( $l ) {
        $this->largura = $l;
        $this->altura = $l;
    }
}
// com parent
class Quadrado1 extends Retangulo {
    function __construct( $l ) {
        parent::__construct( $l, $l );
    }
}
// com nome da classe base
class Quadrado2 extends Retangulo {
    function __construct( $l ) {
        Retangulo::__construct( $l, $l );
    }
}

$animal = new Retangulo(10, 20);
echo $animal->calcularArea(); // 200
echo "<br />";

$quadrado = new Quadrado(10);
echo $quadrado->calcularArea(); // 100
echo "<br />";

$quadrado1 = new Quadrado1(1);
echo $quadrado1->calcularArea(); // 1
echo "<br />";


$quadrado2 = new Quadrado2(2);
echo $quadrado2->calcularArea(); // 4
echo "<br />";
```
#### Final
Utilizado para impedir que uma classe seja usada como base (```final class Animal```) ou que a classe derivada reescreva metodos (```final function mover()```):
```php
class Animal {
    final function mover() {
        echo "metodo mover padrão";
    }
}

final class Animal1 {
    function mover() {
        echo "metodo mover padrão";
    }
}

class Mamifero extends Animal {
    // aqui não será possivel reescrever o método devido ela estar bloqueada na classe base com o "final"
    function mover() {
        echo "metodo mover da classe peixe";
    }
}

// aqui a classe Peixe não poderá utilizar a classe Animal1 como base
class Peixe extends Animal1 {
    
}

$animal = new Animal();
echo $animal->mover();
echo "<br />";

$mamifero = new Mamifero();
echo $mamifero->mover();
echo "<br />";

$peixe = new Peixe();
echo $peixe->mover();
echo "<br />";
```

#### Var
Tem o mesmo comportamento do public, mas existe apenas para ter compatibilidade com códigos escritos antes do PHP 5. Então sua utilização não é recomendada, pois poderá ser descontinuada em versões futuras do PHP.

#### Object Access
No PHP, um objeto instanciado a partir de uma classe pode acessar elementos privados e protegidos de outro objeto criado a partir da mesma classe.

O que não acontece na maior parte das linguagens.
```php
class Humano {
    private $nome;

    function __construct( $nome ) {
        $this->nome = $nome;
    }

    public function set( $objeto, $valor ) {
        // estou alterando o objeto informado
        $objeto->nome = $valor;
    }

    public function get() {
        // estou devolvendo o nome do objeto instanciado
        return $this->nome;
    }
}
$a = new Humano("Pedro");
$b = new Humano("Ana");

// aqui o objeto $a está alterando o objeto $b
$a->set( $b, "João");

echo "a: ".$a->get(); // Pedro
echo "<br />";
echo "b: ".$b->get(); // João
```
#### Access Level
Uma boa pratica é criar o menor número de propriedades de uma classe como públicas, pois assim não conseguimos manter a integridade dos dados.

Como o PHP não é uma linguagem ```strongly type```, se a propriedade for pública um campo que só deve aceitar número irá aceitar um alfanumérico.
```php
class Humano {
    // é suposto aceitar apenas número
    public $idade;
}
$a = new Humano();
$a->idade = "Olá mundo";
```
Para evitar devemos criar a propriedade privada (não pode ser visto nem alterado de fora da classe) e criar metodos para buscar e atribuir valores a ele, assim no método podemos criar validações para o atributo. 
```php
class Humano {
    private $idade = 0;

    function setIdade ( $valor ) {
        // validação se o $valor é numérico
        if ( is_numeric($valor) ) {
            $this->idade = $valor;
        }
    }

    function getIdade () {
        return $this->idade;
    }
}
$a = new Humano();
// isso não é permitido, pode descomentar para comprovar
// $a->idade = "Olá mundo";

// Se passar um campo string não será aceito
$a->setIdade("Olá mundo");
echo $a->getIdade(); // 0 (vai retornar o valor que tinha antes, visto que não passou na validação)

echo "<br />";

$a->setIdade(18);
echo $a->getIdade(); // 18
```

#### Static
A palavra chave ```static``` pode ser usada para declarar propriedades e métodos de uma classe que podem ser acessados sem que seja necessário criar um objeto a partir dessa classe.

Podemos utilizar o ```static``` quando precisamos de uma função que o PHP não tenha (ex. uma regra para validar as exigencias de uma senha no sistema), assim não iremos precisar instanciar a classe para utilizar o método/função.

Algum calculo, formula

```php
class Humano {
    // instance members - um membro por cada objeto criado a partir da classe
    public $nome;
    function setNome( $nome ) {
        $this->nome = $nome;
    }
    
    // static ou class members - apenas existentes uma vez na classe
    static $idade;
    static function getIdade() {
        return self::$idade;
        // existe esta segunda forma, mas é menos usada
        // return Humano::$idade;
    }
}
$a = new Humano();
$a->nome = "Pedro";

Humano::$idade = 18;

print_r($a);
```
#### Classe Abstrada
Classes abstratas são utilizadas apenas como modelo para outras classes possam herdar:
* Elas tem médodos incompletos que, obrigatóriamente, precisam ser implementados nas classes que os herdam;
* Elas não podem ser instanciadas, servem apenas para serem herdadas por outras classes;
```php
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
```