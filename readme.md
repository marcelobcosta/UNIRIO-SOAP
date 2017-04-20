#Tarefa SOAP

Trabalho 2 e 3 de SOA

##Instalação
1. Instalar os pacotes através do composer
2. Copiar .env.example para .env e trocar as variáveis necessárias
3. Importar o banco de dados através do dump dentro do repositório
 
##Uso
1. O cliente é acessado pelo client.php na raiz do projeto. Ex.: http://dominio.com.br/client.php
2. O nome do método a ser chamado deve ser enviado por GET por um parâmetro chamado f. Ex.: http://dominio.com.br/client.php?f=nomeDoMetodo
3. Todo os paramêtros a serem enviados para a função devem ser enviado seguindo a regra nomeDoParametro=valorDoParametro, sendo todos, como o nome do método, enviados por GET.
Ex.: http://dominio.com.br/client.php?f=nomeDoMetodo&nomeDavariavel=valorDaVariavel
