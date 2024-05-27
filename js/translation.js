window.addEventListener("load", function (event) {
  const url = window.location.pathname;
  let file;
  if(url.includes("/pages/")) {
    file = window.location.pathname.split("/pages/")[1];
  } else {
    file = window.location.pathname.split("/admin/")[1];
  }
  const page = file.split(".")[0];
  language.addEventListener("change", function () {
    const language = document.getElementById("language");
    const value = language.value;
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
    document.getElementById("my-articles").textContent = selected_content.myArticles;
    document.getElementById("signin-menu").textContent = selected_content.signin;
    document.getElementById("signup-menu").textContent = selected_content.signup;
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
      },
      pt: {
        title: "entrar",
        email_label: "e-mail",
        email_placeholder: "digite seu e-mail",
        password_label: "senha",
        password_placeholder: "digite sua senha",
        submit_button: "continuar",
        signup_link: "ainda não tem uma conta?",
      },
      es: {
        title: "entrar",
        email_label: "e-mail",
        email_placeholder: "ingrese su e-mail",
        password_label: "senha",
        password_placeholder: "ingrese su contraseña",
        submit_button: "continuar",
        signup_link: "¿aún no tienes una cuenta?",
      },
    };
    let selected_content;
    if (language == "en") selected_content = content.en;
    if (language == "pt") selected_content = content.pt;
    if (language == "es") selected_content = content.es;

    const title = document.getElementById("title");
    const email_label = document.getElementById("email_label");
    const email = document.getElementById("email");
    const password_label = document.getElementById("password_label");
    const password = document.getElementById("password");
    const submit_button = document.getElementById("submit_button");
    const signup_link = document.getElementById("signup_link");

    title.textContent = selected_content.title;
    email_label.textContent = selected_content.email_label;
    email.placeholder = selected_content.email_placeholder;
    password_label.textContent = selected_content.password_label;
    password.placeholder = selected_content.password_placeholder;
    submit_button.textContent = selected_content.submit_button;
    signup_link.textContent = selected_content.signup_link;
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

    document.getElementById("create-title").textContent = selected_content.createTitle;
    document.getElementById("cover-picture").textContent = selected_content.coverPicture;
    document.getElementById("labelPicture").textContent = selected_content.labelPicture;
    document.getElementById("article-title-label").textContent = selected_content.articleTitleLabel;
    document.getElementById("content-label").textContent = selected_content.contentLabel;
    document.getElementById("content").placeholder = selected_content.content;
    document.getElementById("title").placeholder = selected_content.title;
    document.getElementById("sendArticle").textContent = selected_content.sendArticle;
  }
}
