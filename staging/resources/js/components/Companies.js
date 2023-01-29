import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';
import { Link } from 'react-router-dom';

export default class Companies extends Component {
    constructor (props){
        super(props);
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
          <h1 className="h3 mb-0 text-gray-800">Add Company</h1>
          <ol className="breadcrumb">
            <li className="breadcrumb-item"><a href="./">Home</a></li>
            <li className="breadcrumb-item active" aria-current="page">Add Company</li>
          </ol>
        </div>
        <div className="row mb-3">
          <div className="col-lg-12">
            {/* Form Basic */}
            <div className="card mb-12">
              <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 className="m-0 font-weight-bold text-primary">Add Company</h6>
              </div>
              <div className="card-body">
                <form method="post" action="">
                  <input type="hidden" name="_token" defaultValue="ZdqiFhMns0Yr5cLe2zeoa3LaLlshHAHqcEe3PJQe" />                      <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Name</label>
                    <input type="text" className="form-control" name="name" placeholder="Enter Company Name" required />
                  </div>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Email</label>
                    <input type="email" className="form-control" name="email" placeholder="Enter Company Email" required />
                  </div>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Phone Number</label>
                    <input type="number" className="form-control" name="phone" placeholder="Enter Company Phone" required />
                  </div>
                  <div className="form-group">
                    <input type="submit" className="btn btn-primary" defaultValue="Submit" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        {/*Row*/}
      </div>

      </div>

      </div>
      </div>
    
        )
    }
}
