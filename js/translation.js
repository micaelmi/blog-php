window.addEventListener("load", function (event) {
  const file = window.location.pathname.split("/pages/")[1];
  const page = file.split(".")[0];
  language.addEventListener("change", function () {
    const language = document.getElementById("language");
    const value = language.value;
    loadContent(page, value);
  });
});

function loadContent(page, language) {
  if (page == "signin") {
    const title = document.getElementById("title");
    const email_label = document.getElementById("email_label");
    const email = document.getElementById("email");
    const password_label = document.getElementById("password_label");
    const password = document.getElementById("password");
    const submit_button = document.getElementById("submit_button");
    const signup_link = document.getElementById("signup_link");

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

    title.textContent = selected_content.title;
    email_label.textContent = selected_content.email_label;
    email.placeholder = selected_content.email_placeholder;
    password_label.textContent = selected_content.password_label;
    password.placeholder = selected_content.password_placeholder;
    submit_button.textContent = selected_content.submit_button;
    signup_link.textContent = selected_content.signup_link;
  }
}
