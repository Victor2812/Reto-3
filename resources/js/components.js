class login extends HTMLElement {
    constructor() {
        console.log('login component anexed');
        super();

        const shadowRoot = this.attachShadow({ mode: "open" });

        // v2 version of the login form web component, this one allows for the user to implement bootstrap
        const htmlTemplate = document.createElement('template');

        // no se que le pasa al primer div, no pilla el mb-4, lo alica bien el input dni
        htmlTemplate.innerHTML = `
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

                <div class="form-outline mb-4">
                    <input type="text" id="dni" class="form-control form-control-lg mb-4" placeholder="DNI" />
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="pass" class="form-control form-control-lg" placeholder="Password" />
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        `;

        shadowRoot.appendChild(htmlTemplate.content.cloneNode(true));

        // v1 of the login form, the only way to change the style is to implement css via template.innerHTML
        /*
        // create login form
        const loginForm = document.createElement("form");
        loginForm.setAttribute("method", "POST");
        loginForm.setAttribute("action", "#");
        loginForm.classList.add("login-form");

        // attach form to shadowRoot
        shadowRoot.appendChild(loginForm);

        // generate form inputs
        const inputName = document.createElement("input");
        inputName.setAttribute("name", "username");
        inputName.setAttribute("type", "text");
        inputName.setAttribute("placeholder", "Name");

        const inputPass = document.createElement("input");
        inputPass.setAttribute("name", "password");
        inputPass.setAttribute("type", "password");
        inputPass.setAttribute("placeholder", "Password");

        const enviar = document.createElement("input");
        enviar.setAttribute("type", "submit");
        enviar.classList.add("enviar");
        enviar.innerText = "Enviar";

        // append input to parent form element form
        loginForm.appendChild(inputName);
        loginForm.appendChild(inputPass);
        loginForm.appendChild(enviar);
        */

    }

    connectedCallback() {
        console.log('login component is being used');
    }
}

customElements.define('login-sufrimiento', login);

class footer extends HTMLElement {
    constructor() {
        console.log('Footer anexed');
        super();

        const shadowRoot = this.attachShadow({ mode: 'open' });

        const template = document.createElement('template');
        template.innerHTML = `
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

            <div id="contenedor" class="pepe" style="position: relative; bottom: 0;">
                <div class="row py-3 px-3" style="background-color: #1a52ab;">
                    <div class="col-md-6">
                        <div class="row ">
                            <div class="col-lg-12 d-flex flex-sm-column justify-content-md-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/contacto">Contacto</a>
                                    </li>
                                    <li class="nav-item">   
                                        <a class="nav-link text-light" href="https://auraportal.deusto.es/Visitor.aspx?id=11189&idPortal=0&updformid=false&Language=13">Buzón de sugerencias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/privacidad">Privacidad<a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/mapa-web">Mapa web</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Twitter"><i class="bi bi-twitter"></i></a>
                            </li>
                            <li>
                                <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Facebook"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li cclass="nav-item">
                                <a class="nav-link text-light" href="https://www.instagram.com/udeusto/"><i class="bi bi-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Linkedin"><i class="bi bi-linkedin"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="https://www.deusto.es/es/inicio/vive/actualidad/redes-sociales?redsel=Youtube"><i class="bi bi-youtube"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="https://www.tiktok.com/@udeusto"><i class="bi bi-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--
                <div class="row text-light text-center" style="background-color: #003FA2";>
                    <div class="col-md-12 py-2">
                        <p>2022 - Todos los derechos reservados</p>
                    </div>
                </div>
                -->
            </div>
        `;

        shadowRoot.appendChild(template.content.cloneNode(true));


    }

    connectedCallback() {
        console.log('footer component is being used');
    }
}

customElements.define('footer-sufrimiento', footer);
