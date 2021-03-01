# php

## Versões
### Mostrar a versão do php
php -v

## Módulos
### Mostrar módulos ativos no php
php -m

### Ativar módulos
Deve ser ativada (descomentada) no php.ini de seu servidor

## Variáveis
### INT
### STRING
### FLOAT
### BOOLEAN
### ARRAY
Um array (matriz) é uma coleção de valores constituida por indices e valores.

Os índices podem ser numéricos (array numérico), strings (array associativo) ou ambos juntos, sendo que a base de um array numérico sem a especificação dos mesmos é 0 (zero)

Os valores podem ser de qualquer tipo, até mesmo outros arrays.

```php
// arrays numéricos
$num_primos = array(1, 3, 5, 7, 11);
$uf = array("PR", "SC", "RS");

// o 0 (zero) e o 1 (um) são os indices do array
echo $num_primos[0]; // 1
echo $num_primos[1]; // 3

// o 0 (zero) e o 1 (um) são os indices do array
echo $uf[0]; // PR
echo $uf[1]; // SC
```

A partir do PHP 5.4, passou a ser possivel escrever os array de forma mais simples: 

```php
// arrays numéricos
$num_primos = [1, 3, 5, 7, 11];
$uf = ["PR", "SC", "RS"];

// o 0 (zero) e o 1 (um) são os indices do array
echo $num_primos[0]; // 1
echo $num_primos[1]; // 3

// o 0 (zero) e o 1 (um) são os indices do array
echo $uf[0]; // PR
echo $uf[1]; // SC
```
#### Indices
Não precisam ser sequencias
```php
// arrays numéricos
$ufs = [
    10 => "PR",
    20 => "SC", 
    30 => "RS"
];

// o 10 e o 20 são os indices do array
echo $ufs[10]; // PR
echo $ufs[20]; // SC
```

#### Adicionando um valor no array
```php
// arrays numéricos
$num_primos = [1, 3, 5];

print_r($num_primos);
// Saída:
//      Array        
//      (
//          [0] => 1 
//          [1] => 3 
//          [2] => 5 
//      )

// uma forma de adiciodar
$num_primos[] = 7;

// outra forma de adiciodar
array_push($num_primos, 11);

print_r($num_primos);
// Saída:
//      Array        
//      (
//          [0] => 1 
//          [1] => 3 
//          [2] => 5 
//          [3] => 7 
//          [4] => 11
//      )
```
#### Array associativos:
```php
$estados = [
    "PR" => "Paraná",
    "SC" => "Santa Catarina", 
    "RS" => "Rio Grande do Sul"
];

echo $estados["PR"]; // Paraná
```
#### Array misto:
Não é muito usado e nem recomendável
```php
$dados = [
    0 => 10,
    "nome" => "João", 
    "estado" => "Paraná",
    10 => 100
];

echo $dados[0]; // 10
echo $dados["estado"]; // Paraná
```

#### Array multidimensionais:

```php
$dados = [
    [10, 20],
    [100, 200],
    [1000, 2000]
];

print_r($dados[0][1]); // 20
print_r($dados[1][1]); // 200

$cidades = [
    "PR" => ["Curitiba", "Maringá", "Londrina"],
    "SC" => ["Florianópolis", "Itapema", "Itajaí"]
];

print_r($cidades["PR"][0]); // Curitiba
print_r($cidades["SC"][1]); // Itapema
```