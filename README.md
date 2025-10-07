# Frontend Dev Portfolio - WordPress Block Theme

Um tema de blocos WordPress moderno e responsivo especialmente criado para desenvolvedores frontend. Convertido para **Block Theme** com suporte completo ao Site Editor do WordPress.

## 🎯 Características

- **Block Theme Moderno**: Tema de blocos totalmente editável via Site Editor
- **Design Profissional**: Interface limpa com tipografia Space Grotesk + Noto Sans
- **Totalmente Responsivo**: Funciona perfeitamente em todos os dispositivos
- **Site Editor Completo**: Edição visual de templates, cores e tipografia
- **Theme.json**: Configuração centralizada seguindo padrões WordPress
- **Block Patterns**: Padrões personalizados incluindo formulário de contato
- **Template Parts**: Cabeçalho e rodapé reutilizáveis
- **SEO Optimizado**: Estrutura semântica e otimizada para buscadores

## 🚀 Instalação

1. Faça o download ou clone este repositório
2. Copie a pasta para `/wp-content/themes/`
3. Ative o tema em **Aparência > Temas**
4. Configure através do **Site Editor** em **Aparência > Editor do Site**

## ⚙️ Configuração

### Site Editor (Recomendado)

1. Acesse **Aparência > Editor do Site**
2. Edite templates, cores e tipografia visualmente
3. Personalize:
   - Templates (página inicial, posts, páginas)
   - Cores da paleta personalizada
   - Tipografia (Space Grotesk, Noto Sans)
   - Layout e espaçamentos

### Customizador WordPress (Alternativo)

1. Acesse **Aparência > Personalizar**
2. Configure opções básicas disponíveis

## 📁 Estrutura do Block Theme

```
wp-luigi-theme/
├── theme.json             # ⭐ Configuração central do tema de blocos
├── style.css              # Estilos principais (v2.0.1)
├── functions.php          # Funções adaptadas para blocos
│
├── templates/             # 🆕 Templates HTML editáveis
│   ├── index.html         # Listagem de posts
│   ├── front-page.html    # Página inicial
│   ├── single.html        # Posts individuais
│   ├── page.html          # Páginas estáticas
│   ├── archive.html       # Archives de categorias/tags
│   ├── search.html        # Resultados de busca
│   └── 404.html           # Página de erro 404
│
├── parts/                 # 🆕 Template parts reutilizáveis
│   ├── header.html        # Cabeçalho com navegação
│   └── footer.html        # Rodapé com links sociais
│
├── patterns/              # 🆕 Block patterns personalizados
│   └── contact-form-simple.php # Formulário de contato
│
├── assets/                # Recursos do tema
│   └── main.js            # JavaScript para interações
│
└── readme.txt            # Documentação WordPress
```

## 🎨 Personalização

### Site Editor (Principal)

O tema é totalmente editável através do Site Editor:

1. Acesse **Aparência > Editor do Site**
2. Edite qualquer template visualmente
3. Personalize cores da paleta:
   - Texto Principal (#131516)
   - Destaque (#293338)
   - Texto Secundário (#6c757a)
   - Cinza Claro (#eceeee)
   - Fundo (#fafafa)
   - Branco (#ffffff)

### Tipografia

Fontes incluídas:
- **Space Grotesk**: Títulos e destaques
- **Noto Sans**: Texto corrido e legibilidade

### Block Patterns

O tema inclui padrões personalizados:
- Formulário de contato funcional
- Layouts de seções pré-configurados

### Menus

1. Vá em **Aparência > Menus**
2. Crie um novo menu
3. Configure através do Site Editor para posicionamento

## 📧 Formulário de Contato

O tema inclui um block pattern de formulário de contato:

- Disponível na biblioteca de padrões do Site Editor
- Design integrado ao tema
- Funcional com plugins de formulário compatíveis
- Estilização responsiva incluída

## 🔧 Recursos Técnicos

- **WordPress 6.0+** requerido (para suporte completo a Block Themes)
- **PHP 7.4+** requerido
- **Theme.json v2**: Configuração moderna do tema
- Suporte completo ao Site Editor (FSE)
- Templates HTML editáveis
- Block patterns personalizados
- Template parts reutilizáveis
- Otimizado para performance
- Código limpo e documentado

## 📱 Responsividade

O tema é totalmente responsivo com breakpoints:

- **Mobile**: até 768px
- **Tablet**: 768px - 1024px
- **Desktop**: 1024px+

## 🛠️ Desenvolvimento

### Estrutura Block Theme

- **theme.json**: Configuração central do tema
- **Templates HTML**: Editáveis via Site Editor
- **Template Parts**: Componentes reutilizáveis (header/footer)
- **Block Patterns**: Padrões de layout pré-configurados
- **JavaScript**: Funcionalidades em `/assets/main.js`
- **Estilos**: CSS complementar em `style.css`

### Arquivos de Configuração

- `theme.json`: Paleta de cores, tipografia, layouts
- `functions.php`: Funções adaptadas para Block Theme
- `style.css`: Estilos base e complementares

### Hooks e Filtros

O tema utiliza hooks WordPress modernos:

- `after_setup_theme` para configurações do tema
- `wp_enqueue_scripts` para assets
- Suporte nativo a Block Theme features

## 📄 Licença

Este tema é licenciado sob GPL v2 ou posterior - veja o arquivo [LICENSE](LICENSE) para detalhes.

## 👨‍💻 Autor

Desenvolvido por **Luigi** baseado no design fornecido.

## 🤝 Contribuição

Contribuições são bem-vindas! Para contribuir:

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📞 Suporte

Para suporte ou dúvidas sobre o tema, abra uma issue no repositório do GitHub.

## 🔄 Atualizações

- **v2.0.1**: Tema convertido para Block Theme com Site Editor completo
- **v1.0.0**: Versão inicial como tema clássico

## 📋 Histórico de Conversão

Este tema foi **convertido de tema clássico para Block Theme**, mantendo 100% da identidade visual original e adicionando:

- Site Editor completo
- Templates HTML editáveis
- Configuração via theme.json
- Block patterns personalizados
- Template parts reutilizáveis

Consulte `BLOCK-THEME-CONVERSION.md` para detalhes completos da conversão.