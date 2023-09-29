# Tesseract PHP Text Extract
Esse projeto utiliza a biblioteca Tesseract OCR com PHP para extrair textos de imagens.  

**Table of contents**  
[1.0 - Ambiente](#ambiente)  
&nbsp;&nbsp;&nbsp;&nbsp;[1.1 - Imagem do Container](#imagem-do-container)  
&nbsp;&nbsp;&nbsp;&nbsp;[1.2 - Biblioteca Tesseract OCR](#bliblioteca-tesseract-ocr)  
[2.0 - Container](#container)  
[3.0 - Código Fonte](#código-fonte)  
[4.0 - Fontes](#fontes)  

## Ambiente
### Imagem do Container
Ao escolher a imagem do PHP, tentei escolher a mais leve que atendesse aos requisitos.  
Tentei levantar sobre a imagem `php:8.1`, porém, tive dificuldades para instalar a biblioteca `tesseract-ocr-por`.  
Por esse motivo, escolhi a `php:8.1-bullseye`.  

### Bliblioteca Tesseract OCR
Ao instalar a bliblioteca padrão, `tesseract-ocr`, não temos a versão português, o que fazia caracteres como **ç** não serem reconhecidos. Instalando a versão `tesseract-ocr-por`, ganhamos esse recurso a mais.  
Para obter nossa imagem personalizada, basta utilizarmos o comando `docker build -t php-tesseract-ocr:latest .` (sim o ponto faz parte do comando), de dentro da pasta do projeto.  
Substitua php-tesseract-ocr:latest, pelo nome e a tag que desejar. Só não esqueça de alterar depois o docker-compose.yaml também.

## Container
Está no projeto também um arquivo *docker-compose.yaml*, que nos ajudará a subir o container.  
Esse container foi construído para ser usado em ambientes de desenvolvimento.  
Nele usamos o comando sleep para manter o container em pé e podermos conectar nele para realizar nossos testes.  
Compartilhamos também a pasta do nosso host onde clonamos o projeto, com a `/var/www` do container pelo mesmo motivo, podermos fazer alterações locais e testá-las de imediato dentro do container.  
Para subir o container, basta utilizar o bom e velho `docker-compose up -d`.  
Após ter o container rodando, precisamos instalar o pacote que utilizaremos. Para tal, acesse o container com o comando `docker exec -it <nome_do_container> /bin/bash` e execute o comando `composer install`.  

## Código Fonte
O código fonte é muito simples.  
Na linha 3, importamos o autoload.php gerado pelo composer, que servirá para carregar os pacotes necessários.  
Na linha 5, importamos o pacote em si.  
Depois, basta criar o objeto, informar a imagem que deve ser decodificada, a linguagem, e executar o método que faz a extração (`run()`).  

Com o resultado da leitura em mãos, podemos realizar várias tarefas, procurar termos com regex é uma delas. Agora basta você fazer o uso que quiser dessas informações.  

## Fontes:
[Tesseract OCR for PHP](https://github.com/thiagoalessio/tesseract-ocr-for-php)  
[Tesseract OCR installation](https://tesseract-ocr.github.io/tessdoc/Installation.html)  
[Como instalo um novo pacote de idiomas para o Tesseract](https://sobrelinux.info/questions/13937/how-do-i-install-a-new-language-pack-for-tesseract-on-16-04)  
[Page Segmentation Method](https://github.com/tesseract-ocr/tessdoc/blob/main/ImproveQuality.md#page-segmentation-method)