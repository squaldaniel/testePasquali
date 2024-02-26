# Teste de desenvolvedor Web Pasquali/SpotPromo
Aplicação de teste para vaga de programador web, aplicação consiste em um pequeno crud seguindo as orienbtações da empresa.

### Informações para execução da aplicação
Clone ou baixe o pacote da aplicação e em um prompt de comando, na pasta da mesma, execute o comando para instalar as dependências da aplição:
```sh
composer install
```
Rode a s migrações em um banco de dados de sua preferência, executamos o desenvolvimento com Mysql, para outros bancos, configurações adicionais podem ser necessárias.
```sh
php artisan migrate
```
Depois para que seja possivel ter uma previa da aplicação, execute o comando para rodar as seeds do banco:
```sh
php artisan db:seed
```
e por fim inicialize a aplicação com o comando:
```sh
php artisan serve
```

### Screenshots da aplicação
![responsivo](/public/tela_004.png)
![tela001](/public/tela_001.png)
![tela002](/public/tela_003.png)
![tela003](/public/tela_002.png)