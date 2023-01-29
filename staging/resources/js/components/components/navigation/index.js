import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import Ripples from 'react-ripples';

var baseUrl = 'https://integrityinsurance.dev505.io';


export default class Navigation extends Component {
    render() {
        return (
            <div>
                <div className="navbar-section" id="header">
                <div className="container">
                    <div className="row">
                        <div className="col-12 navigation">


                            <nav className="navbar navbar-expand-md navbar-dark">
                                <a className="navbar-brand" href="#"><img className="img-fluid logo" src={baseUrl + '/public/images/newlogo.png'} /></a>
                                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                    <span className="navbar-toggler-icon"></span>
                                </button>
                                <div className="collapse navbar-collapse custom-navbar" id="collapsibleNavbar">
                                    <ul className="navbar-nav">
                                        <li className="nav-item">
                                            <Link to="/public">Home</Link>
                                        </li>
                                        <li className="nav-item">
                                            <Link to="/public/about">About</Link>
                                        </li>
                                        <li className="nav-item">
                                            <Link to="/public/Pricing">Pricing</Link>
                                        </li>
                                        <li className="nav-item">
                                            <Link to="/public">Contact</Link>
                                        </li>
                                        <li className="nav-item">
                                            <Link to="/public/Login">Login</Link>
                                        </li>


                                    </ul>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        )
    }
}