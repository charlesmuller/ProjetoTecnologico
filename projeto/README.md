# Projeto Tecnologico

### Para executar o projeto:
    - git clone no projeto do github
    - rode no terminal: sudo apt-get install php-dom
    - Rode no terminal: composer install --ignore-platform-reqs
    - php artisan key:generate
    - php artisan config:cache
    - Vá até a pasta principal do projeto e rode: php artisan serve 
    - Abra o seu navegador em 127.0.0.1:8000
    

Gerenciador de Coleção de HQ
- Features
	- Busca por histórias (número da edição, ano de lançamento, titulos, personagens etc);
	- Área de leitura, usuário pode marcar o que está lendo e qual página parou (bookmark);
	- Favoritos;
	- Criação de um algum com sagas expecíficas (ex: Cria um album do Homem-Aranha e adiciona as HQ que possui desse personagem);


API MARVEL
--- https://developer.marvel.com/docs

API DC (testar)
--- https://rapidapi.com/collection/dc-comics-api

API Guia dos Quadrinhos (ver se é possível fazer)
--- http://www.guiadosquadrinhos.com/

Ideia
--- https://www.youtube.com/watch?v=6PZg6ht8yyc
--- https://www.youtube.com/watch?v=_OYW_rQzi3E
--- https://greensock.com/gsap/
--- https://datatables.net/extensions/responsive/examples/child-rows/custom-renderer.html

- cURL 
  - sudo apt-get install php-curl
  - Ativar: sudo phpenmod curl
  - Desativar: sudo phpdismod curl
  - Reestartar o apache: sudo /etc/init.d/apache2 restart
  - Verificar se está ativo: php -i | grep -i curl

- Instalação do node.js
--- sudo apt install nodejs
- Instação LaravelMix
--- npm install laravel-mix --save-dev

charlesmuller02
135078Mu

refresh route -- php artisan route:clear
