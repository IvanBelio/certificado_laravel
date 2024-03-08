import './bootstrap';
// import 'Code.jsx';

import React from "react";
import {createRoot} from "react-dom/client";

import Saludo from "./Pages/Saludo.jsx";
import Numero from "./Pages/Numero.jsx";

const react_numero = document.getElementById("react-numero");
const react_saludo = document.getElementById("react-saludo");

if (react_numero){
    const numero = react_numero.getAttribute("numero");
    createRoot(react_numero).render(<Numero numero={numero}/>);
}

if (react_saludo)
    createRoot(react_saludo).render(<Saludo />);