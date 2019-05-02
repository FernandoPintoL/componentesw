import React , { Component } from 'react'
import HeaderUser from '../Header/Index'
import ListadoUsers from '../Main/Index'
class User extends Component{
    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                        <div className="col-md-8">
                            <HeaderUser />
                            <br/>
                            <ListadoUsers />
                    </div>
                </div>
            </div>
        )
    }
}
export default User