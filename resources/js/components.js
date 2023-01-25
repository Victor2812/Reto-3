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

            <form action="#" method="post>
                <div class="form-outline mb-4">
                    <input type="text" id="dni" class="form-control form-control-lg mb-4" placeholder="DNI" />
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="pass" class="form-control form-control-lg" placeholder="Password" />
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
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
