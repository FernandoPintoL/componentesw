import React , { Component } from 'react'
import Header from '../Header'
import Main from '../Main'
class App extends Component{
    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                        <div className="col-md-8">
                            <div className="card">                    
                            <Header />
                            <Main />
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default App