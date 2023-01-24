class login extends HTMLElement {
    constructor() {
        console.log('login component anexed');
        super();
        
        const shadowRoot = this.attachShadow({ mode: "closed" });
        
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

        // css 
        const template = document.createElement("template");
        template.innerHTML = `
            <style>
                * {
                    box-sizing: border-box;
                }
                .login-form {
                    display: flex;
                    flex-direction: column;
                }

                input {
                    margin: 1em
                }
                
                .enviar {
                    margin: 1em;
                    background-color: red;
                }
            </style>
        `;
        shadowRoot.appendChild(template.content.cloneNode(true));

    }

    connectedCallback() {
        console.log('login component is being used');
    }
}

customElements.define('login-sufrimiento', login);