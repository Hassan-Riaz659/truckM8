import React, { Component } from 'react';
import { Link } from "react-router-dom";
import Ripples from 'react-ripples';
import Navigation from './components/navigation';

var baseUrl = window.location.origin;
var Background = baseUrl+'/public/images/home-banner-bg.jpg';

export default class Login extends Component {
    constructor (props) {
        super(props);

    this.state = {email: '',password: '',isLoggedIn: false,user: {email: '',password: ''}};
    this.handleChange1 = this.handleChange1.bind(this);
    this.handleChange2 = this.handleChange2.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    }
    
        handleChange1(e){
        this.setState({
            email: e.target.value
        })
    }
  
    handleChange2(e){
        this.setState({
            password: e.target.value
        })
    }

handleSubmit(e){
    e.preventDefault();
    const postData = {
      email: this.state.email,
      password: this.state.password
    }
    
    let uri = baseUrl+'/public/api/user-login';
    axios.post(uri, postData).then((response) => {
        if(response['data']['status']==0)
        {
            alert(response['data']['message']);
        }
        else
        {
     $('#email').val('');
     $('#password').val('');
        let appState = {
             isLoggedIn: true,
             user: response['data']['user']
           };
           localStorage["appState"] = JSON.stringify(appState);
           this.setState({
              isLoggedIn: appState.isLoggedIn,
              user: appState.user,
              error: ''
           });
            this.props.history.push('/public/dashboard');
        }
    })
    .catch(error => {
        console.log('error',error);
    alert('Invalid credentials or bad request!');
});
  }

    render() {
        return (
            <div>
            
            <Navigation/>

<div className="banner banner-area" style={{backgroundImage: "url(" + Background + ")"}}>
                    <div className="container">
                        <div className="row banner-content ">

                        <div className="col-md-6">
                    <h4 className="text-center mb-3">Login</h4>
					<form onSubmit={this.handleSubmit}>
					    <input type="hidden" name="_token" value="dgZVpfGYjOYTH0Fgk739ukuVbulA50BqSmCOvGW4"/>						
                        <div className="row">
							<div className="col-md-12 form-group form-group-col">
							
                            <input type="email" className="form-control common-input mb-20" id="email" name="email" placeholder="Your E-mail" required="" onChange={this.handleChange1} />
							                                
                            <input id="password" type="password" className="form-control common-input mb-20" name="password" required="" placeholder="Your Password" onChange={this.handleChange2} />
								<span>Forgot Password? <Link to="/public/forgot-password">Click here to reset!</Link></span>
							</div>
							<div className="col-md-12 form-group form-group-col2">
								<p>Are you a new user? 
								<Link to="/public/register">
								Register here!</Link>
								
								<button className="primary-btn"  type="submit">Login</button></p>
								
							</div>
						</div>
					</form>
				</div>
                        </div>
                    </div>
                </div>



                <footer className="footer-area section-gap" style={{marginTop:60}}>
		<div className="container">
			<div className="row">
				<div className="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>

				<div className="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div className="col-lg-2 col-md-6 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div className="col-lg-2 col-md-6 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div className="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div className="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" className="form-inline" noValidate={true}>
							<input className="form-control" name="EMAIL" placeholder="Your Email Address" required="" type="email"/>
							<button className="click-btn btn btn-default"><span className="fa fa-arrow-right"></span></button>
							
						</form>
					</div>
				</div>
			</div>
		
		</div>
	</footer>
                

            </div>
        )
    }
}