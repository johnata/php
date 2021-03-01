## Importações de arquivos
Como a maioria dos projetos de programação precisam ser divididos, salvo rarissimas exceções, um projeto trá inúmeros arquivos para que a mesma funcione.

Assim existem os mecanismos de importação de scripts dentro de outros scripts.

Em PHP temos algumas formas:
* | sintaxe | Importa apenas uma vez? | Gera alerta se importação falhar? | Interrompe com erro se importação falhar?
--- | --- | --- | --- | --- 
```include``` | ```include "config.php;``` | ```NO``` | ```YES``` | ```NO```
```require``` | ```require "config.php;``` | ```NO``` | ```YES``` | ```YES```
```include_once``` | ```include_once "config.php;``` | ```YES``` | ```YES``` | ```NO```
```require_once``` | ```require_once "config.php;``` | ```YES``` | ```YES``` | ```YES```


* include:;
* require;
* include_once;
* require_once;

Entre include e require é aconselavel a utilização do require, assim a aplicação não avança se a importação falhar, mas no gerá é melhor o require_once para não importamos mais de uma vez o mesmo script.

### Include

Em PHP pode ser feita com o ```include``` mais o caminho do arquivo a ser importado, o caminho pode ser:
* nenhum:  apenas o nome do arquivo (quando o arquivo atual e o a ser importado estiverem na mesma pasta);
* relativo: você informa o caminho com base no script atual (ex. volta uma pasta, acessa a pasta lang e importa o arquivo pt-br.php - ```"../lang/pt-br.php"```);
* absoluto: informa o caminho completo do arquivo a ser importado;

```php
// sem caminho, quando ambos estiverem na mesma pasta
include "config.php";
// caminho relativo (acesso a pasta lang e importo o arquivo config.php)
include "lang/config.php";
// caminho relativo (volta uma pasta, acessa a pasta lang e importa o arquivo pt-br.php)
include "../lang/pt-br.php";
// caminho absoluto
include "C:/laragon/www/php/config.php";
```

É possivel executar uma expressão de retorno dentro de um script importado:
* script a ser importado ( ```estados.php``` ):
    ```php
        return [
            "Paraná",
            "Santa Catrarina",
            "Rio Grande do Sul"
        ];
    ```
* script principal ( ```index.php``` ):
    ```php
        $estados = require_once "estados.php";
        echo "Estados:<hr />";
        foreach( $estados AS $estado ) {
            echo "$estado<br />";
        }        
    ```