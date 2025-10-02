# Frontend Dev Portfolio - WordPress Theme

Um tema WordPress moderno e responsivo especialmente criado para desenvolvedores frontend.

## 🎯 Características

- **Design Moderno**: Interface limpa baseada em Tailwind CSS
- **Totalmente Responsivo**: Funciona perfeitamente em todos os dispositivos
- **Custom Post Types**: Habilidades e Projetos gerenciados separadamente
- **Formulário de Contato**: Sistema de contato funcional com AJAX
- **WordPress Customizer**: Personalização fácil através da interface nativa
- **SEO Optimizado**: Estrutura semântica e otimizada para buscadores
- **Compatível com Gutenberg**: Suporte completo ao editor de blocos

## 🚀 Instalação

1. Faça o download ou clone este repositório
2. Copie a pasta para `/wp-content/themes/`
3. Ative o tema em **Aparência > Temas**
4. Configure através de **Aparência > Personalizar**

## ⚙️ Configuração

### Personalização Básica

1. Acesse **Aparência > Personalizar**
2. Configure:
   - Nome do desenvolvedor
   - Descrição pessoal
   - Email de contato

### Adicionando Habilidades

1. Vá em **Habilidades** no menu administrativo
2. Adicione suas skills como novos posts
3. Elas aparecerão automaticamente na seção de habilidades

### Criando Projetos

1. Acesse **Projetos** no menu administrativo
2. Adicione seus projetos com imagens e descrições
3. Configure portfolios e cases de sucesso

## 📁 Estrutura do Tema

```
wp-luigi-theme/
├── style.css              # Estilos principais e info do tema
├── functions.php          # Funções e configurações do tema
├── index.php             # Template principal de listagem
├── front-page.php        # Template da página inicial
├── single.php            # Template para posts individuais
├── page.php              # Template para páginas estáticas
├── archive.php           # Template para arquivos
├── header.php            # Cabeçalho do site
├── footer.php            # Rodapé do site
├── js/
│   └── main.js           # JavaScript principal
└── readme.txt           # Documentação WordPress
```

## 🎨 Personalização

### Cores e Estilos

O tema utiliza Tailwind CSS. Para personalizar cores:

1. Edite as classes CSS nos templates
2. Ou adicione CSS personalizado em **Aparência > Personalizar > CSS Adicional**

### Menus

1. Vá em **Aparência > Menus**
2. Crie um novo menu
3. Atribua à localização "Menu Principal"

## 📧 Formulário de Contato

O formulário de contato é totalmente funcional e:

- Envia emails para o endereço configurado no customizer
- Utiliza AJAX para envio sem recarregar a página
- Inclui validação de campos
- Proteção contra spam com nonce

## 🔧 Recursos Técnicos

- **WordPress 5.0+** requerido
- **PHP 7.4+** requerido
- Suporte a Custom Post Types
- Integração com WordPress REST API
- Otimizado para performance
- Código limpo e documentado

## 📱 Responsividade

O tema é totalmente responsivo com breakpoints:

- **Mobile**: até 768px
- **Tablet**: 768px - 1024px
- **Desktop**: 1024px+

## 🛠️ Desenvolvimento

### Estrutura de Arquivos

- Templates PHP seguem hierarquia WordPress
- JavaScript modular em `/js/main.js`
- Estilos em `style.css` com Tailwind CDN
- Funções organizadas em `functions.php`

### Hooks e Filtros

O tema utiliza hooks WordPress padrão:

- `wp_enqueue_scripts` para CSS/JS
- `after_setup_theme` para configurações
- `init` para Custom Post Types
- `customize_register` para customizer

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

- **v1.0.0**: Lançamento inicial com todas as funcionalidades básicas