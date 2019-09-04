# LARAVEL MULTI TENANCY SINGLE DATABASE

Sistema com múltiplos clientes, todos na mesma aplicação e no mesmo database (Banco de dados).

<br>

Algumas pastas estão ignoradas pelo .gitignore.

Levando em consideração que você tenha o <code> PHP >= 7.1.3 </code> e <code> <a href="https://getcomposer.org">composer</a>  </code> na sua variável global PATH, para uma nova instalação do Laravel.


## Clonando o projeto

Vou  considerar que você esteja rodando um sistema operacional Linux/Windows e com o git instalado, faça o seguinte:

<strong> Clone o projeto</strong> <br>
<code>  git clone https://github.com/ezequieldhonatan/laravel-multi-tenancy-single-database  </code> 
<br>

<strong> Instale as dependências e o framework</strong>
<br>
<code>
composer install --no-scripts
</code>

<strong>Crie o arquivo .env</strong>
<br>
<code> touch .env </code> <br><br>
Copie e cole os dados do arquivo .env.example para o arquivo .env. Logo em seguida configure o acesso ao banco de dados: <br>

<code>DB_CONNECTION= mysql </code>
<code>DB_HOST= 127.0.0.1    </code>
<code>DB_PORT= 3306  </code>
<code>DB_DATABASE= laravel-multi-tenancy-single-database </code>
<code>DB_USERNAME= root </code>
<code>DB_PASSWORD= secret</code>

<strong> Crie uma nova chave para a aplicação</strong>
<br>
<code>php artisan key:generate</code>

Em seguida você deve configurar o arquivo .env e rodar as migrations com:
<code> php artisan migrate --seed </code>
 
 <strong>Habilitando envio de e-mails</strong>

Gmail

Caso o host do e-mail seja o GMAIL, alterar as configurações do seu .env para
<code>

MAIL_DRIVER= smtp <br>
MAIL_HOST= smtp.gmail.com <br>
MAIL_PORT=587 <br>
MAIL_USERNAME= email@gmail.com <br>
MAIL_PASSWORD= password <br>
MAIL_ENCRYPTION= tls

</code>

É necessário também habilitar a opção na sua conta de e-mail para "Permitir aplicativos menos seguros" neste link <a href="https://myaccount.google.com/lesssecureapps?pli=1">Google</a>

Recomendo que use o <strong>Mailtrap</strong> para testar o envio de emails.

Recomendo <code> php artisan migrate:fresh --seed </code> para recriar o banco após atualizações. FRESH deleta o banco e cria novamente.

DevOps: <a href="https://www.linkedin.com/in/ezequieldhonatan/">Ezequiel Dhonatan</a>