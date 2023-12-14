# Patterns

## Docker Compose

Este projeto pode ser executado usando Docker Compose. Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

### Construir e Iniciar os Contêineres

```bash
docker-compose up -d --build
```

O aplicativo estará acessível em [http://localhost:8000](http://localhost:8000).

### Parar os Contêineres

```bash
docker-compose down
```

## Testes

Executar o seguinte comando dentro do container

```bash
vendor/bin/phpunit  --color
```

## Permissões

Pode ser necessário executar o seguinte comando dentro do container se ocorrerem erros de permissão ao acessar a aplicação:

```bash
chmod -R 777 /var/www/html/public
```
