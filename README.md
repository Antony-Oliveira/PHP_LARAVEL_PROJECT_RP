### O Project RP, inicialmente foi uma ideia real, requisitada por uma equipe responsável por vendas em uma rede de servidores de um jogo. A rede foi descontinuada, mas segui com a ideia, mas como algo para treino em programação.

O projeto possui ações de usuários, entre elas:
 
 - Visualizar itens;
 - Registrar compras;
 - Visualizar informações sobre suas compras.
 
E ações de administrador, sendo:

 - Visualização das contas registradas e itens no sistema;
 - Formulário para adição de novos itens; <br>
 - Visualização de todas as vendas, podendo atualizar seus status de "Pendente" para "Confirmada".

### Instruções
- Modifique o arquivo ".env.example" de acordo com as configurações do banco de sua máquina, e em seguida, renomeie para apenas ".env";
- Execute "composer install" na raíz do projeto, para instalar as dependencias php;
- Use "php artisan migrate" para adicionar as tabelas necessárias para o funcionamento do projeto;
- Use "php artisan db:seed" para popular algumas tabelas automáticamente, para uma visualização melhor do projeto;
- Por fim, execute "php artisan key:generate".
