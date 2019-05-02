import React , { Component } from 'react'
import ReactDOM from 'react-dom'
import { render } from 'react-dom'
import isEmail from 'validator/lib/isEmail'
import Axios from 'axios'
class Main extends Component{
    state = { email : '', password : '', errors : {}};
    constructor(){
        super();
        this.state = {
            email : '',
            password : '',
            errors : {},
        };
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.handleFormSubmit = this.handleFormSubmit.bind();
    }

    validateUserInput = userData => {
        // email is required
        //valid email, password > 8 characters 
        let errors =  { email : [], password : []};
        if(!userData.email)  {
            errors.email.push('El Email es requerido\n');
        }
        if(!userData.password)  {
            errors.password.push('El Password es requerido\n');
        }

        if(!isEmail(userData.email)){
            errors.email.push('Ingrese un Email Valido!.\n');
        }

        if(userData.password.length < 8){
            errors.password.push('El password tiene que tener mas de 8 caracteres\n');
        }
        return errors;
    }

    renderErrorsFor = field => {
        if(this.state.errors[field]){
            //console.log(this.state.errors[`${field}`]);
            const errores = this.state.errors[`${field}`].map((error) => (
                <span key={error}>
                    <small style={{ color : "red" }}>{ error } </small> <br></br>
                </span>
            ));
            return <div>{errores}</div>;
        }
    }

    handleFormSubmit = (event) => {
        event.preventDefault();
        const errors = this.validateUserInput(this.state);
        if(errors.email.length > 0 || errors.password.length > 0){
            this.setState({
                errors
            });
            return;
        }
        //post del data para el servidor
        Axios.post('/login', this.state).then(response => {
            window.location = 'usuario';
        }).catch(error => {
            //console.log(error.response.data.errors);
            this.setState({
                errors : error.response.data.errors
            });
        });
    }

    handleFieldChange = (event) =>{
        this.setState({
            [event.target.name] : event.target.value
        });
    }
    render(){
        return (
            <main className="card-body">
                <form onSubmit={this.handleFormSubmit}>
                    <div className="form-group">
                        <label htmlFor="exampleInputEmail1">Email</label>
                        <input 
                            type="email" 
                            className="form-control" 
                            id="exampleInputEmail1" 
                            aria-describedby="emailHelp" 
                            placeholder="Ingrese Email" 
                            name = "email"
                            onChange = {this.handleFieldChange}
                        />
                        {this.renderErrorsFor('email')}
                    </div>
                    <div className="form-group">
                        <label htmlFor="exampleInputPassword1">Password</label>
                        <input 
                            type="password" 
                            className="form-control" 
                            id="exampleInputPassword1" 
                            placeholder="Password" 
                            name = "password"
                            onChange = {this.handleFieldChange}
                        />
                        {this.renderErrorsFor('password')}
                    </div>
                    <button type="submit" className="btn btn-primary">Ingresar</button>                
                </form>
            </main>
        );
    }
}
export default Main