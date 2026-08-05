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

Ao invés de utilizar iframes ou playlists incorporadas, o PHP realiza toda a comunicação com a API, processa os dados recebidos e renderiza automaticamente os componentes HTML.

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
Requisição HTTP via cURL
      │
      ▼
YouTube Data API v3
      │
      ▼
Resposta JSON
      │
      ▼
json_decode()
      │
      ▼
foreach()
      │
      ▼
Renderização automática dos cards
```

---

## Funcionamento

Durante o carregamento da página:

1. O pacote **vlucas/phpdotenv** lê as variáveis armazenadas no arquivo `.env`.

2. O sistema obtém a API Key e a lista de vídeos configurados.

3. É criada automaticamente uma requisição para o endpoint da **YouTube Data API v3**.

4. A comunicação é realizada utilizando **cURL**.

5. A resposta JSON é convertida em um array PHP utilizando `json_decode()`.

6. Cada vídeo é percorrido através de um `foreach`, responsável por gerar dinamicamente os cards da interface.

Cada card apresenta:

- Thumbnail
- Nome do canal
- Título do vídeo
- Link para o YouTube

Caso ocorra qualquer falha na comunicação com a API, o sistema realiza tratamento de erros e exibe mensagens amigáveis ao usuário.

---

# 🔒 Segurança

As credenciais da API não ficam armazenadas diretamente no código.

Foi utilizada a biblioteca **vlucas/phpdotenv**, permitindo que informações sensíveis permaneçam isoladas no arquivo `.env`, uma prática amplamente utilizada em aplicações profissionais.

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