# 💻 Portfólio - Matheus

Meu portfólio pessoal desenvolvido em **PHP**, com foco em demonstrar conhecimentos em desenvolvimento Back-end, consumo de APIs REST e organização de projetos utilizando arquitetura modular.

Além de apresentar meus projetos, este portfólio foi construído para servir como demonstração prática das tecnologias e padrões que utilizo no desenvolvimento de aplicações web.

---

# 🚀 Tecnologias

- PHP 8+
- HTML5
- CSS3
- JavaScript
- Composer
- cURL
- YouTube Data API v3
- vlucas/phpdotenv

---

# 🏗️ Arquitetura

O projeto utiliza uma arquitetura baseada em **composição de templates (Template Composition)**, onde o arquivo `index.php` atua como ponto central da aplicação (**Front Controller**).

Ao invés de concentrar todo o HTML em um único arquivo, cada parte da interface é separada em componentes reutilizáveis e páginas independentes.

```
portfolio/
│
├── assets/
│   ├── css/
│   ├── imagens/
│   └── js/
│
├── componentes/
│   ├── header.php
│   ├── menu.php
│   └── footer.php
│
├── paginas/
│   ├── home.php
│   ├── projetos.php
│   ├── musicas.php
│   ├── sobre.php
│   └── contato.php
│
├── vendor/
│
├── index.php
├── composer.json
└── .env
```

---

## Como funciona o `index.php`

O `index.php` funciona como o ponto de entrada da aplicação, sendo responsável por montar toda a página através da inclusão dos componentes.

Fluxo de renderização:

```
index.php
     │
     ▼
header.php
     │
     ▼
menu.php
     │
     ▼
home.php
     │
     ▼
projetos.php
     │
     ▼
musicas.php
     │
     ▼
footer.php
```

Essa abordagem oferece diversas vantagens:

- Código organizado
- Componentes reutilizáveis
- Fácil manutenção
- Escalabilidade
- Separação de responsabilidades

---

# 🎵 Integração com YouTube Data API v3

A seção **"Músicas que eu curto"** foi desenvolvida consumindo diretamente a **YouTube Data API v3**.

O PHP realiza a consulta à API, processa a resposta JSON e renderiza os cards dos vídeos dinamicamente. O player é incorporado somente depois que os dados do vídeo são obtidos, utilizando o ID retornado pela API.

## Recurso utilizado

O projeto utiliza o recurso `videos.list` da YouTube Data API v3 por meio de uma requisição HTTP `GET`:

```text
https://www.googleapis.com/youtube/v3/videos
```

Parâmetros enviados:

- `part=snippet`: solicita os metadados básicos do vídeo.
- `id`: recebe a lista de IDs dos vídeos definidos no ambiente.
- `key`: autentica a requisição com a chave da API.

Como o projeto consulta vídeos específicos, ele não pesquisa por texto nem carrega uma playlist inteira. A resposta contém os itens correspondentes aos IDs informados, e o sistema utiliza principalmente:

- `id`: monta a URL do player `https://www.youtube.com/embed/{id}`.
- `snippet.title`: exibe o título do vídeo.
- `snippet.channelTitle`: exibe o nome do canal.

Essa estratégia deixa a lista de músicas sob controle do projeto e evita manter títulos ou nomes de canais duplicados no HTML.

## Configuração das variáveis de ambiente

Na raiz do projeto, crie um arquivo `.env` com a chave da API e os IDs separados por vírgula:

```env
YOUTUBE_API_KEY="sua_chave_da_api"
YOUTUBE_VIDEO_IDS="id_do_video_1,id_do_video_2,id_do_video_3"
```

O pacote `vlucas/phpdotenv` carrega essas variáveis em `paginas/musicas.php`. Antes da requisição, espaços, quebras de linha e caracteres de retorno de carro são removidos da lista de IDs.

---

## Fluxo da API

```
Arquivo .env
      │
      ▼
API Key + IDs dos vídeos
      │
      ▼
musicas.php
      │
      ▼
Leitura das variáveis com phpdotenv
      │
      ▼
Requisição GET via cURL
      │
      ▼
YouTube Data API v3
      │
      ▼
Resposta JSON
      │
      ▼
Validação do status HTTP e do JSON
      │
      ▼
foreach() + dados do snippet
      │
      ▼
Cards com iframe do YouTube
```

---

## Funcionamento

Durante o carregamento da página:

1. O pacote **vlucas/phpdotenv** lê as variáveis armazenadas no arquivo `.env`.

2. O sistema obtém a `YOUTUBE_API_KEY` e a lista `YOUTUBE_VIDEO_IDS`.

3. Os IDs são normalizados, removendo espaços e quebras de linha.

4. É criada uma requisição `GET` para o endpoint `videos.list`, solicitando apenas a parte `snippet` dos vídeos.

5. A comunicação é realizada utilizando **cURL** e a resposta JSON é convertida em um array PHP com `json_decode()`.

6. O status HTTP e a existência de `items` são validados antes do processamento.

7. Cada vídeo é percorrido através de um `foreach`, responsável por gerar dinamicamente os cards da interface.

Cada card apresenta:

- Nome do canal
- Título do vídeo
- Player incorporado do YouTube

## Tratamento de erros

O sistema verifica se a chave e os IDs foram configurados antes de chamar a API. Depois da requisição, o código verifica o status HTTP e procura a mensagem de erro retornada pela API no objeto `error.message`.

Em caso de configuração ausente, falha HTTP, resposta inválida ou nenhum vídeo encontrado, a página exibe uma mensagem de estado em vez de tentar renderizar cards incompletos.

Cada chamada também consome cota da YouTube Data API. Como a aplicação consulta apenas os IDs definidos e solicita somente `snippet`, a integração permanece limitada ao conjunto de vídeos configurado no `.env`.

Caso ocorra qualquer falha na comunicação com a API, o sistema realiza tratamento de erros e exibe mensagens amigáveis ao usuário.

---

# 🔒 Segurança

As credenciais da API não ficam armazenadas diretamente no código.

Foi utilizada a biblioteca **vlucas/phpdotenv**, permitindo que informações sensíveis permaneçam isoladas no arquivo `.env`, uma prática amplamente utilizada em aplicações profissionais.

O arquivo `.env` não deve ser publicado no repositório. Em um ambiente real, a chave também deve ser restringida no Google Cloud Console por API, domínio ou endereço IP, conforme o ambiente de execução.

Essa abordagem proporciona:

- Maior segurança
- Melhor organização
- Facilidade para troca de ambientes
- Publicação segura do projeto no GitHub

---

# 💡 Conceitos Aplicados

- Arquitetura modular
- Front Controller
- Template Composition
- Componentização utilizando PHP
- Consumo de APIs REST
- Comunicação HTTP via cURL
- JSON
- Variáveis de ambiente
- Composer
- Tratamento de erros
- Renderização dinâmica de componentes
- Manipulação de DOM com Vanilla JavaScript
- Criação de UI/UX interativa (Segmented Control / Toggle Switch animado)
- Transições de interface e animações fluidas utilizando CSS (Transform/Transition)
- Gerenciamento dinâmico de estado na interface do usuário (UI State)

---

# 📌 Próximas Implementações

- Sistema de temas dinâmicos
- Tradução completa da interface
- Alteração dinâmica de layout conforme idioma
- Carrossel de filmes
- Página de projetos individuais
- Integração com GitHub API
- Animações avançadas
- Melhorias de acessibilidade