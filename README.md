                            Gerenciador de tarefas do dia.

    Este projeto foi feito em Laravel(framework do PHP) instalado utilizando o composer.

    Para utiliza-lo é preciso criar no Mysql um banco de dados chamado 'tarefasFullstack',
sem as aspas, e os comandos necessários são 'php artisan serve' para iniciar o servidor 
e o 'php artisan migrate' para criar as mesas no banco de dados.

    O aplicativo é para marcar tarefas do dia e caracteriza-las como não realizadas, 
em andamento ou se foi concluída.

    Digite uma tarefa do dia no no campo onde pede para adicionar uma nova tarefa e 
clique em adicionar, esta nova tarefa estará caracterizada como não iniciada, caso 
esteja em andamento ou concluída apenas clique no botão em andamento ou concluído.

    No caso para editar o nome de uma tarefa clique em editar, uma caixa ira abrir 
contendo o nome da tarefa que pode ser alterado, apos fazer as alterações apenas 
clique em editar e sua tarefa terá um novo titulo.

    Caso queira excluir uma tarefa clique no botão excluir que esta dentro da tarefa 
que você deseja excluir. No caso de exclusão de varias tarefas de um determinado estado 
(não iniciado, em andamento ou concluído), clique em um dos botões que diz excluir 
tarefas e o estado em que elas se encontram. Já no caso para excluir todas as tarefas 
clique no botão excluir todas as tarefas.