import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';

// import user from "../../components/imgs/user.png";

var baseUrl = window.location.origin;
var user =  baseUrl + "/public/landingImages/user.png";

export default class DashboardHeader extends Component {
    constructor (props){
        super(props);
}


    render() {
        return (
            <div>

                <nav className="navbar navbar-expand-lg navbar-transparent navbar-absolute">
          <div className="container-fluid">
            <div className="navbar-wrapper">
              <div className="navbar-toggle">
                <button type="button" className="navbar-toggler">
                  <span className="navbar-toggler-bar bar1" />
                  <span className="navbar-toggler-bar bar2" />
                  <span className="navbar-toggler-bar bar3" />
                </button>
              </div>

              <form className="header-bar-form">
                <div className="">
                  <input type="text"  className="form-control" placeholder="Search Something..." />
                  <i className="fa fa-search"/>
                </div>
              </form>

            </div>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-bar navbar-kebab" />
              <span className="navbar-toggler-bar navbar-kebab" />
              <span className="navbar-toggler-bar navbar-kebab" />
            </button>
            <div className="collapse navbar-collapse justify-content-end" id="navigation">
              
              <ul className="navbar-nav header-nav">
               
              <li className="nav-item dropdown">

                  <a className="nav-link notification-li" href="#">
                    <i className="far fa-bell" />
                   
                      <span className="notification-dot"></span>
                  
                  </a>
                  
                </li>

                <li className="nav-item dropdown">
                  <a className="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img className="img-fluid" src={user}/>

                    <p>
                      <span className="">Some Actions</span>
                    </p>
                  </a>
                  <div className="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a className="dropdown-item" href="#">Logout</a>
                    
                  </div>
                </li>


                
              </ul>
            </div>
          </div>
        </nav>

            </div>
        )
    }
}
