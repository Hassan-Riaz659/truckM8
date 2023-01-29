import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';
import TableRow from './TableRow';
import { Link } from 'react-router-dom';

export default class Clients extends Component {
    constructor (props){
        super(props);
        this.state = {clients: '',userid:''};
        this.url = window.location.origin+'/public';
        
}

componentDidMount() {
    
    let state = localStorage["appState"];
    if (state) {
      let AppState = JSON.parse(state);
      console.log('state',AppState.user);

      axios.get(this.url + 'api/clients/'+AppState.user.id)
       .then(response => {
         this.setState({ clients: response.data.data });
       })
       .catch(function (error) {
         console.log(error);
       });
    }
       
}

tabRow(){
       if(this.state.clients instanceof Array){
         return this.state.clients.map(function(object, i){
             return <TableRow obj={object} key={i} index={i}/>;

         }.bind(this))
       }
     }

    render() {
        return (
            <div>

            <div id="wrapper">

                <Sidebar/>

                <div className="d-flex flex-column" id="container-wrapper" style={{width: "100%"}}>

                <HeaderBar/>

                <div className="container-fluid" id="container-wrapper">
        <div className="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 className="h3 mb-0 text-gray-800">Clients</h1>
          <ol className="breadcrumb">
            <li className="breadcrumb-item"><a href="./">Home</a></li>
            <li className="breadcrumb-item active" aria-current="page">Clients</li>
          </ol>
        </div>
        <div className="row mb-3">
          <div className="col-lg-12">
            {/* Form Basic */}
            <div className="card mb-12">
              <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 className="m-0 font-weight-bold text-primary">Clients</h6>
              </div>
              <div className="card-body">
                <div className="row">
                    <div className="col-md-12 table-responsive">
                    <table className="table">
                    <thead className=" text-primary">
                      <tr><th>
                          Name
                        </th>
                        <th>
                          ZIP
                        </th>
                        <th>
                          Total Employees
                        </th>
                      </tr></thead>
                    <tbody>
                      {this.tabRow()}
                    </tbody>
                  </table>
                </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {/*Row*/}
      </div>

      </div>
      </div>
        )
    }
}
