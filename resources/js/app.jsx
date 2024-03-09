import './bootstrap';
// import 'Code.jsx';

import React from "react";
import {createRoot} from "react-dom/client";

import Saludo from "./Pages/Saludo.jsx";
import Numero from "./Pages/Numero.jsx";

const react_numero = document.getElementById("react-numero");
const react_saludo = document.getElementById("react-saludo");
const react_listado_alumnos = document.getElementById("react-listado");

if(react_listado_alumnos){
    const listadoAlumnos = react_listado_alumnos.getAttribute("alumnos")
    createRoot(react_listado_alumnos).render(<ListadoAlumnos listadoAlumnos={listadoAlumnos}/>);
}

if (react_numero){
    const numero = react_numero.getAttribute("numero");
    console.log (`Valor de número ${numero}`)
    createRoot(react_numero).render(<Numero numero={numero}/>);
}

if (react_saludo)
    createRoot(react_saludo).render(<Saludo />);