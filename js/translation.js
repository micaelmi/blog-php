window.addEventListener("load", function (event) {
  const url = window.location.pathname;
  let file;
  if (url.includes("/pages/")) {
    file = window.location.pathname.split("/pages/")[1];
  } else {
    file = window.location.pathname.split("/admin/")[1];
  }
  const page = file.split(".")[0];
  const lang = localStorage.getItem("language") || "en";

  const language = document.getElementById("language");

  language.value = lang;

  loadContent(page, lang);

  language.addEventListener("change", function () {
    const value = language.value;
    localStorage.setItem("language", value);
    loadContent(page, value);
  });
});

function loadContent(page, language) {
  if (page == "home" || page == "create-article" || page == "my-articles") {
    const content = {
      en: {
        signin: "Sign in",
        signup: "Sign up",
        home: "Home",
        myArticles: "My articles",
        logout: "Logout",
      },
      pt: {
        signin: "Entrar",
        signup: "Cadastre-se",
        home: "Início",
        myArticles: "Meus artigos",
        logout: "Sair",
      },
      es: {
        signin: "Iniciar sesión",
        signup: "Regístrese",
        home: "Inicio",
        myArticles: "Mis artículos",
        logout: "Salir",
      },
    };

    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("signin").textContent = selected_content.signin;
    document.getElementById("signup").textContent = selected_content.signup;
    document.getElementById("home").textContent = selected_content.home;
    document.getElementById("my-articles").textContent =
      selected_content.myArticles;
    document.getElementById("signin-menu").textContent =
      selected_content.signin;
    document.getElementById("signup-menu").textContent =
      selected_content.signup;
    document.getElementById("logout").textContent = selected_content.logout;
  }

  if (page == "signin") {
    const content = {
      en: {
        title: "sign in",
        email_label: "email",
        email_placeholder: "enter your email address",
        password_label: "password",
        password_placeholder: "enter your password",
        submit_button: "login",
        signup_link: "isn't registered yet?",
        home_link: "home",
      },
      pt: {
        title: "entrar",
        email_label: "e-mail",
        email_placeholder: "digite seu e-mail",
        password_label: "senha",
        password_placeholder: "digite sua senha",
        submit_button: "continuar",
        signup_link: "ainda não tem uma conta?",
        home_link: "início",
      },
      es: {
        title: "entrar",
        email_label: "e-mail",
        email_placeholder: "ingrese su e-mail",
        password_label: "senha",
        password_placeholder: "ingrese su contraseña",
        submit_button: "continuar",
        signup_link: "¿aún no tienes una cuenta?",
        home_link: "inicio",
      },
    };
    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("title").textContent = selected_content.title;
    document.getElementById("email_label").textContent =
      selected_content.email_label;
    document.getElementById("email").placeholder =
      selected_content.email_placeholder;
    document.getElementById("password_label").textContent =
      selected_content.password_label;
    document.getElementById("password").placeholder =
      selected_content.password_placeholder;
    document.getElementById("submit_button").textContent =
      selected_content.submit_button;
    document.getElementById("signup_link").textContent =
      selected_content.signup_link;
    document.getElementById("home_link").textContent =
      selected_content.home_link;
  }

  if (page == "signup") {
    const content = {
      en: {
        title: "sign up",
        name_label: "name",
        name_placeholder: "enter your full name",
        username_label: "username",
        username_placeholder: "create a unique username",
        email_label: "email",
        email_placeholder: "enter your email address",
        password_label: "password",
        password_placeholder: "enter your password",
        submit_button: "create account",
        signin_link: "already have an account?",
        home_link: "home",
      },
      pt: {
        title: "cadastro",
        name_label: "nome",
        name_placeholder: "digite seu nome completo",
        username_label: "nome de usuário",
        username_placeholder: "crie um nome de usuário",
        email_label: "e-mail",
        email_placeholder: "digite seu e-mail",
        password_label: "senha",
        password_placeholder: "digite sua senha",
        submit_button: "criar conta",
        signin_link: "já tem uma conta?",
        home_link: "início",
      },
      es: {
        title: "registro",
        name_label: "nombre",
        name_placeholder: "ingrese su nombre completo",
        username_label: "nombre de usuario",
        username_placeholder: "crie un nombre de usuario",
        email_label: "e-mail",
        email_placeholder: "ingrese su e-mail",
        password_label: "contraseña",
        password_placeholder: "ingrese su contraseña",
        submit_button: "crear cuenta",
        signin_link: "¿aún no tienes una cuenta?",
        home_link: "inicio",
      },
    };
    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("title").textContent = selected_content.title;
    document.getElementById("name_label").textContent =
      selected_content.name_label;
    document.getElementById("name").placeholder =
      selected_content.name_placeholder;
    document.getElementById("username_label").textContent =
      selected_content.username_label;
    document.getElementById("username").placeholder =
      selected_content.username_placeholder;
    document.getElementById("email_label").textContent =
      selected_content.email_label;
    document.getElementById("email").placeholder =
      selected_content.email_placeholder;
    document.getElementById("password_label").textContent =
      selected_content.password_label;
    document.getElementById("password").placeholder =
      selected_content.password_placeholder;
    document.getElementById("submit_button").textContent =
      selected_content.submit_button;
    document.getElementById("signin_link").textContent =
      selected_content.signin_link;
    document.getElementById("home_link").textContent =
      selected_content.home_link;
  }

  if (page == "article") {
    const content = {
      en: {
        by: "By",
        comments: "Comments",
        comments_placeholder: "comment here...",
      },
      pt: {
        by: "Por",
        comments: "Comentários",
        comments_placeholder: "comente aqui...",
      },
      es: {
        by: "Por",
        comments: "Comentarios",
        comments_placeholder: "comente aqui...",
      },
    };

    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("by").textContent = selected_content.by;
    document.getElementById("comments").textContent = selected_content.comments;
    document.getElementById("comments_placeholder").placeholder =
      selected_content.comments_placeholder;
  }

  if (page == "home") {
    const content = {
      en: {
        title: "Lastest articles",
      },
      pt: {
        title: "Últimos artigos",
      },
      es: {
        title: "Últimos artículos",
      },
    };

    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("title").textContent = selected_content.title;
  }

  if (page == "create-article") {
    const content = {
      en: {
        createTitle: "Create article",
        coverPicture: "Upload a cover picture",
        labelPicture: "--- Select your file ---",
        articleTitleLabel: "Title",
        title: "give a great title to your post",
        contentLabel: "Content",
        content: "write your text here",
        sendArticle: "Lauch 🚀",
      },
      pt: {
        createTitle: "Criar artigo",
        coverPicture: "Escolha uma imagem de fundo",
        labelPicture: "--- Selecione seu arquivo ---",
        articleTitleLabel: "Título",
        title: "dê um bom título ao seu artigo",
        contentLabel: "Conteúdo",
        content: "escreva seu texto aqui",
        sendArticle: "Enviar 🚀",
      },
      es: {
        createTitle: "Crear artículo",
        coverPicture: "Elija una imagen de fondo",
        labelPicture: "--- Seleccionar el archivo ---",
        articleTitleLabel: "Título",
        title: "Dale un buen título a tu artículo",
        contentLabel: "Contenido",
        content: "escriba su texto aquí",
        sendArticle: "Enviar 🚀",
      },
    };

    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("create-title").textContent =
      selected_content.createTitle;
    document.getElementById("cover-picture").textContent =
      selected_content.coverPicture;
    document.getElementById("labelPicture").textContent =
      selected_content.labelPicture;
    document.getElementById("article-title-label").textContent =
      selected_content.articleTitleLabel;
    document.getElementById("content-label").textContent =
      selected_content.contentLabel;
    document.getElementById("content").placeholder = selected_content.content;
    document.getElementById("title").placeholder = selected_content.title;
    document.getElementById("sendArticle").textContent =
      selected_content.sendArticle;
  }

  if (page == "my-articles") {
    const content = {
      en: {
        title: "My articles",
        tb_date: "date",
        tb_title: "title",
        tb_actions: "actions",
        new: "write new",
      },
      pt: {
        title: "Meus artigos",
        tb_date: "data",
        tb_title: "título",
        tb_actions: "ações",
        new: "escrever novo",
      },
      es: {
        title: "Mis artículos",
        tb_date: "fecha",
        tb_title: "título",
        tb_actions: "acciones",
        new: "escribir un nuevo",
      },
    };

    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    document.getElementById("title").textContent = selected_content.title;
    document.getElementById("tb-date").textContent = selected_content.tb_date;
    document.getElementById("tb-title").textContent = selected_content.tb_title;
    document.getElementById("tb-actions").textContent =
      selected_content.tb_actions;
    document.getElementById("new").textContent = selected_content.new;
  }
}
