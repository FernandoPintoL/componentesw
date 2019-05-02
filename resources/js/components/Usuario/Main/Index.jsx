import React , { Component } from 'react'
import { getList , addUser, deleteUser, updateUser } from '../Funciones/Index'

class ListadoUsers extends Component{
    constructor(){
        super()
        this.state = {
            id : '',
            name : '',
            email : '',
            password : '',
            editDisabled : false,
            datos : []
        }
        this.onSubmit = this.onSubmit.bind(this);
        this.onChange = this.onChange.bind(this);
    }
    componentDidMount(){
        this.getAll()
    }

    onChange = e => {
        this.setState({
            [e.target.name] : e.target.value
        })
    }

    getAll = () => {
        getList().then(data => {
            this.setState({
                id : '',
                name : '',
                email : '',
                password : '',
                datos : [...data]

            },
            () => {
                console.log(this.state.datos)
            })
        })
    }

    onSubmit = e => {
        e.preventDefault()
        addUser(this.state.name, this.state.email, this.state.password).then(() => {
            this.getAll()
        })
        this.setState({
            name : '',
            email : '',
            password : ''
        })
    }

    onUpdate = e => {
        e.preventDefault()
        updateUser(this.state.name, this.state.email, this.state.id).then(() => {
            this.getAll()
        })
        this.setState({
            name : '',
            email : '',
            editDisabled : ''
        })
        this.getAll()
    }

    onEdit = (datosid, e) => {
        e.preventDefault()
        var data = [...this.state.datos]
        data.forEach((dato, index) => {
            if(dato._id === datosid){
                this.setState({
                    id : dato._id,
                    name : dato.name,
                    email : dato.email,
                    editDisabled : true
                })
            }
        })
    }

    onDelete = (val, e) => {
        e.preventDefault()
        deleteUser(val)
        this.getAll()
    }

    render(){
        return (                
                <table className="table">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        {this.state.datos.map((dato) => {
                            return  (<tr key = {dato.id}>
                                            <td>{dato.id}</td>
                                            <td>{dato.name}</td>
                                            <td>{dato.email}</td>
                                            <td>
                                                <a 
                                                    href = {`usuario/${dato.id}/edit`}
                                                    className= "btn btn-info mr-1"                     
                                                >
                                                    Editar
                                                </a>
                                                <button 
                                                    href = ""
                                                    className= "btn btn-danger"
                                                    disabled = {this.state.editDisabled}
                                                    onClick = {this.onDelete.bind(
                                                        this,
                                                        dato.id
                                                    )}
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>)
                        })}
                    </tbody>
                </table>
        )
    }

}

export default ListadoUsers