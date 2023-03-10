// Componentes fuera de uso

// No nos permite una redirección correcta a la ruta de laravel
class login extends HTMLElement {
    constructor() {
        console.log("login component anexed");
        super();

        const shadowRoot = this.attachShadow({ mode: "open" });

        // v2 version of the login form web component, this one allows for the user to implement bootstrap
        const htmlTemplate = document.createElement("template");

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
        console.log("login component is being used");
    }
}

customElements.define("login-sufrimiento", login);

// Fuera de uso -> se optó por no utilizarlo por motivos de ajuste en el layout del proyecto
class footer extends HTMLElement {
    constructor() {
        console.log("Footer anexed");
        super();

        const shadowRoot = this.attachShadow({ mode: "open" });

        const template = document.createElement("template");
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
        console.log("footer component is being used");
    }
}

customElements.define("footer-sufrimiento", footer);

// NEW CUSTOM WEB COMPONENTS ARE DATA CHARTS

import Chart from "chart.js/auto";

// PIECHART
class piechart extends HTMLElement {
    constructor() {
        console.log("stats component ok");
        super();
    }

    getModel() {
        return new Promise((res, rej) => {
            fetch("/stats")
                .then((data) => data.json())
                .then((json) => {
                    //console.log(json);
                    this.renderChart(json);
                    res();
                })
                .catch((err) => rej(err));
        });
    }

    renderChart(json) {
        const shadowRoot = this.attachShadow({ mode: "open" });
        const div = document.createElement("div");
        div.setAttribute("width", "90%");
        const canvas = document.createElement("canvas");
        canvas.setAttribute("id", "pieChart");
        div.appendChild(canvas);
        shadowRoot.appendChild(div);

        new Chart(canvas, {
            type: "pie",
            data: {
                labels: json.map((row) => row.item),
                datasets: [
                    {
                        label: "Aprobados $ Suspendidos",
                        data: json.map((row) => row.count),
                        backgroundColor: json.map((row) => row.color),
                    },
                ],
            },
            options: {
                resposive: true,
                maintainAspectRatio: false,
            },
        });
    }

    connectedCallback() {
        console.log("piechart component is being used");
        this.getModel();
    }
}

customElements.define("piechart-component", piechart);

// LINECHART
class lineChart extends HTMLElement {
    constructor() {
        console.log("lineChart component ok");
        super();
    }

    async getModel() {
        const response = await fetch("/lineData");
        const data = await response.json();
        if (response.ok) {
            //console.log(data);
            this.renderChart(data);
        } else {
            console.log("An error occured while fetching lineChart data");
        }
    }

    renderChart(data) {
        console.log(data);

        const shadowRoot = this.attachShadow({ mode: "open" });
        const div = document.createElement("div");
        div.setAttribute("width", "90%");
        const canvas = document.createElement("canvas");
        canvas.setAttribute("id", "lineChart");
        div.appendChild(canvas);
        shadowRoot.appendChild(div);

        new Chart(canvas, {
            type: "line",
            data: {
                labels: data.map((row) => row.year),
                datasets: [
                    {
                        label: "Aprobados",
                        data: data,
                        backgroundColor: "#C89F24",
                        borderColor: "#C89F24",
                        tension: 0.4,
                        parsing: {
                            xAxisKey: "year",
                            yAxisKey: "count.aprobados",
                        },
                    },
                    {
                        label: "Suspendidos",
                        data: data,
                        backgroundColor: "#FBDA79",
                        borderColor: "#FBDA79",
                        tension: 0.4,
                        parsing: {
                            xAxisKey: "year",
                            yAxisKey: "count.suspensos",
                        },
                    },
                ],
                options: {
                    resposive: true,
                    maintainAspectRatio: false,
                },
            },
        });
    }

    connectedCallback() {
        console.log("lineChart component is being used");
        this.getModel();
    }
}

customElements.define("linechart-component", lineChart);
