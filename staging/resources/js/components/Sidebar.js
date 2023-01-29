import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import { Route , Link, withRouter } from 'react-router-dom';
import { hashHistory } from 'react-router';

class Sidebar extends Component {
    constructor (props){
        super(props);
        
        this.state = {
            isLoggedIn: false,
            user: {},
            userid:''
        }
        this.handleLogoutClick = this.handleLogoutClick.bind(this);

}

componentDidMount() {
    let state = localStorage["appState"];
    if (state) {
      let AppState = JSON.parse(state);
      this.setState({ isLoggedIn: AppState.isLoggedIn, user: AppState.user, userid: AppState.user.id });
    }
}

handleLogoutClick(e){
    let appState = {
      isLoggedIn: false,
      user: {}
    };
    localStorage["appState"] = JSON.stringify(appState);
    this.setState(appState);
     this.props.history.push('/public/login');
  }

    render() {
        return (
            <div className="navbarParent">
    <ul className="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a className="sidebar-brand d-flex align-items-center justify-content-center" href="">
          <div className="sidebar-brand-icon">
          </div>
          <div className="sidebar-brand-text mx-3">Dashboard</div>
        </a>
        <hr className="sidebar-divider my-0" />
        <li className="nav-item active">
            <Link
          className="nav-link" to="/public/dashboard">
            <i className="fas fa-fw fa-tachometer-alt" />
            <span>Dashboard</span>
            </Link>
        </li>
        <hr className="sidebar-divider" />
        <div className="sidebar-heading">
          Features
        </div>
        <li className="nav-item">
        <Link
          className="nav-link" to={"/public/new-quote/"+this.state.userid}>
            <i className="fas fa-fw fa-tachometer-alt" />
            <span>New Quote</span>
            </Link>
        </li>
        <li className="nav-item">
        <Link
          className="nav-link" to="/public/clients">
            <i className="fas fa-fw fa-tachometer-alt" />
            <span>Clients</span>
            </Link>
        </li>
        
        <li className="nav-item">
          <Link className="nav-link" to="/public/heath-care-providers">
            <i className="fas fa-fw fa-building" />
            <span>Healthcare Providers</span>
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/public/companies">
            <i className="fas fa-fw fa-building" />
            <span>Companies</span>
          </Link>
        </li>
       
        <li className="nav-item">
            <Link
          className="nav-link" to="/public/profile-setting">
            <i className="fas fa-fw fa-cog" />
            <span>Profile Settings</span>
          </Link>
        </li>
        
        <li className="nav-item">
            <a
          className="nav-link" onClick={this.handleLogoutClick}>
            <i className="fas fa-fw fa-sign-out"/>
            <span>Logout</span>
          </a>
        </li>
      </ul>

    </div>
        )
    }
}

export default withRouter (Sidebar);
