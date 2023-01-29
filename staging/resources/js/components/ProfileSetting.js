import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import Sidebar from './Sidebar';
import HeaderBar from './headerBar';

export default class ProfileSetting extends Component {
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
          <h1 className="h3 mb-0 text-gray-800">Account Settings</h1>
          <ol className="breadcrumb">
            <li className="breadcrumb-item"><a href="./">Home</a></li>
            <li className="breadcrumb-item active" aria-current="page">Profile Settings</li>
          </ol>
        </div>
        <div className="row mb-3">
          <div className="col-lg-8">
            {/* Form Basic */}
            <div className="card mb-12">
              <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 className="m-0 font-weight-bold text-primary">Profile</h6>
              </div>
              <div className="card-body">
                <form>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Account ID</label>
                    <input type="text" className="form-control" defaultValue={123456} disabled />
                  </div>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Username</label>
                    <input type="text" className="form-control" name="username" placeholder="Enter your username" defaultValue="Integrity" />
                  </div>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Phone Number</label>
                    <input type="text" className="form-control" name="phone_no" placeholder="Enter your phone number" defaultValue="(444) 123-4567" />
                  </div>
                  <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Email address</label>
                    <input type="email" className="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                    <small id="emailHelp" className="form-text text-muted">We'll never share your
                      email with anyone else.</small>
                  </div>
                  <button type="submit" className="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
          <div className="col-lg-4">
            {/* Form Basic */}
            <div className="card mb-12">
              <div className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 className="m-0 font-weight-bold text-primary">Account Settings</h6>
              </div>
              <div className="card-body">
                <form>
                  <div className="form-group">
                    <label htmlFor="exampleInputPassword1">Password</label>
                    <input type="password" className="form-control" id="exampleInputPassword1" placeholder="Password" />
                  </div>
                  <button type="submit" className="btn btn-primary">Submit</button>
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
