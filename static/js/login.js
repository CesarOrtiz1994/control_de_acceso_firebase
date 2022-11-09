let url_login = appData.base_url + "Controller/login/loginAc.php";

let dataL = new FormData();


function validateEmail(email) {
    return email.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  }

  function valida_user(email, password) {
    if (email == "") {
      document.getElementById("alert_correo").innerHTML =
        "El correo es requerido.";
      document.getElementById("email_l").classList.add("is-invalid");
    } else {
      if (!validateEmail(email)) {
        document.getElementById("alert_correo").innerHTML =
          "El correo no tiene el formato correcto.";
        document.getElementById("email_l").classList.add("is-invalid");
      } else {
        document.getElementById("email_l").classList.remove("is-invalid");
        document.getElementById("email_l").classList.add("is-valid");
      }
    }
    if (password == "") {
      document.getElementById("password_l").classList.add("is-invalid");
    } else {
      document.getElementById("password_l").classList.remove("is-invalid");
      document.getElementById("password_l").classList.add("is-valid");
    }
  }

  function logearse() {
    let email = document.getElementById("email_l").value;
    let password = document.getElementById("password_l").value;
    valida_user(email, password);
     if (
       email != "" &&
       validateEmail(email) &&
       password != ""
     ) {
      dataL.append("Correo", email);
      dataL.append("Password", password);
      fetch(url_login, {
        method: "POST",
        body: dataL,
      })
        .then((response) => response.json())
        .then((json) => {
          //console.log(json.res);
          if (!json.res) {
            alert(json.mes, 'danger')
          } else {
            console.log("vamos a logear");
            window.location.reload()
          }
        })
        .catch((err) => console.log(err));
    }
  }