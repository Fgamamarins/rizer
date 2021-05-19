<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto

* Para desenvolvimento do projeto foi utilizado **PHP7.4**
* O servidor HTTP utilizado foi o **NGINX**
* O banco de dados utilizado foi o **MySQL**
* Ubuntu versão **18.04**

## Pré Requisitos

* MySQL
* PHP 7.4
* Nginx (opcional)
* Composer

## Configuração Linux

Após baixar este repositório você deverá entrar na pasta do projeto e executar o comando **composer install**. Já com o
MySQL configurado e funcional deverá criar um database e ajustar as configurações de banco de dados do projeto, que
ficam localizadas no arquivo **.env**, deverá alterar as seguintes linhas

- DB_DATABASE=**database**
- DB_USERNAME=**root**
- DB_PASSWORD=**pass**

Onde em DB_DATABASE deverá informar o nome do banco de dados, DB_USERNAME o nome do usuário do banco e DB_PASSWORD a
senha.

Feito isso será necessário rodar as migrations para criação das tabelas do banco com os seguintes comandos:

- php artisan migrate
- php artisan db:seed

Após isso deverá rodar os seguintes comandos

- npm install
- npm run dev

Feito isso será necessário apenas configurar o ambiente.

## Configuração de ambiente

Caso utilize o NGINX basta adicionar o seguinte trecho na configuração default do NGINX ou no arquivo simbólico criado
para configuração.

```server {
    listen 80;
    server_name dev.alhambrait.com;
    root /var/www/html/fausto/alhambrait/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}

```

Onde terá que alterar apenas em

```
server_name dev.alhambrait.com;
root /path_to_project/public;
fastcgi_pass unix:/run/php/php7.4-fpm.sock;
```

**server_name** deve ser preenchido com o host que quer utilizar, **root** a localização do arquivo index.php que está
na pasta public do projeto e **fastcgi_pass** para a versão do PHP que está utilizando.

Caso queira utilizar o servidor web "embutido" basta utilizar o seguinte comando dentro da pasta do projeto:

- php artisan serve

## Solução

Para efeito de teste, foram retiradas as telas de registro/login e foi feito um redirecionamento para o dashboard
criado.

No menu esquerdo possuem 3 opções

- Dashboard
- Tickets
- Vendedores

Onde ao clicar em Dashboard você é redirecionado para a página inicial do projeto. Ao clicar em Ticker aparece os itens
de subseleção para tela de Chamados e Criação de Chamados. Ao clicar em Vendedores aparece os itens de subseleção para
tela de Vendedores e Criação de Vendedor.

Caso ocorra algum erro ao transacionar pelas telas ou sucesso ao Cadastrar/Alterar/Deletar aparecerá uma mensagem em um
SWAL.

Foram criados Helpers para retornar os valores de status (ticket/vendedor) e para formatar o telefone e mensagem
genérica (RizerHelper).

Foi utilizado Repository para melhor organizar as funções e não atribuir tudo na model.

**Atrelando um vendedor a um ticket**

Ao salvar um ticket, um evento é executado para atribuir ao vendedor com a menor quantidade de chamados em aberto.

**Mudança de status do ticket para Atrasado**

Foi criado um command que é executado via cron a cada minuto verificando os tickets com status *Em aberto* e *Em
andamento* e caso a data de criação do ticket seja maior ou igual 24 horas ele é alterado para *Atrasado*

Para testar o command possuem 2 opções:

- Executar o comando no console
    - php artisan lateness:ticket
- Configurar o cron
    - editar o arquivo de crontab com o comando *crontab -e* e adicionar a seguinte linha no arquivo 
    - "* * * * * cd /path/to/project && php artisan schedule:run>> /dev/null 2>&1"

## Demo

- Dashboard
<p align="center">
<img src="https://trello-attachments.s3.amazonaws.com/5adea36859dcd255c9056b62/60a49757930a655b6cddf8c9/20c3ca63ef7d27a9816ac23fc2200957/WhatsApp_Image_2021-05-19_at_01.37.16.jpeg" />
</p>  

- Vendedores
<p align="center">
<img src="https://trello-attachments.s3.amazonaws.com/5adea36859dcd255c9056b62/60a49765c934fc3bdbae0a1c/857b147953436aad5ef2425bda41a56b/vendedores.gif" />
</p>

- Tickets
<p align="center">
<img src="https://trello-attachments.s3.amazonaws.com/5adea36859dcd255c9056b62/60a49768317b4b839f914747/266c86ed4d9a229f17c76529c7e0e170/tickets.gif" />
</p>

## Contato

* Email: faustogmjr@gmail.com
* Ligação/Whatsapp: (24) 99930-9321
