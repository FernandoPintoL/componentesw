import axios from 'axios'

export const getList = () => {
    return axios
    .get('users' , {
        headers : {'Content-Type' : 'application/json'}
    })
    .then(res => {
        return res.data
    })
}

export const addUser = (name, email, password) =>{
    return axios
        .post('usuariocreate', {
                name : name,
                email :  email,
                password : password
            },
            {
                headers : {'Content-Type' : 'application/json'}
            }
        )
        .then(resp => {
            console.log(resp)
        })
}

export const deleteUser = id => {
    axios.delete(`usuario/${id}`, {
        headers : {'Content-Type' : 'application/json'}
    })
    .then( res  => {
        console.log(res)
    })
    .catch(err => {
        console.log(err)
    })
}

export const updateUser = (id,name, email) => {
    return axios
        .put(`usuario/${id}`, {
            name : name,
            email : email
        },
        {
            headers : {'Content-Type' : 'application/json'}
        })
        .then( res  => {
            console.log(res)
        })
        .catch(err => {
            console.log(err)
        })
}