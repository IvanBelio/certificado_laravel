import React from 'react';
import './bootstrap.js';
import {createRoot} from'react-dom/client';
import Saludo from './Saludo.jsx';

const main_element = document.getElementById("root")

const root = createRoot(main_element)

root.render(<Saludo />)
