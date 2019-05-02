import React from 'react'
import { render } from 'react-dom'
import App from './Login/App'
import User from './Usuario/App/Index'
if (document.getElementById('app')) {
    render(<App />, document.getElementById('app'));
}

if (document.getElementById('user')) {
    render(<User />, document.getElementById('user'));
}