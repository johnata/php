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
No PHP, as propriedades tem que ter um nível de acesso especificado (```public```, ```private```)
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
* private: que podemos ver os dados apenas de dentro da classe;
* public: que podemos ver os dados de fora da classe;
* se os dados estão protegidos por algum motivo extra;

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

    $homem = new Humano("Pedro", "Santos");
    $mulher = new Humano("Ana", "Santos");

    echo $homem->nomeCompleto();
    echo "<br />";
    echo $mulher->nomeCompleto();
}
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

    $homem = new Humano("Pedro", "Santos");
    $mulher = new Humano("Ana", "Santos");

    echo $homem->nomeCompleto();
    echo "<br />";
    echo $mulher->nomeCompleto();
}
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