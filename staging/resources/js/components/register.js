import React, { Component } from 'react';
import { Link } from "react-router-dom";
import Ripples from 'react-ripples';
import Navigation from './components/navigation';
import swal from 'sweetalert';

var baseUrl = window.location.origin;
var Background = baseUrl+'/public/images/home-banner-bg.jpg';

export default class Register extends Component {
    constructor (props) {
        super(props);

    this.state = {formSubmitting: false,passwordError:0,name:'',email: '',password: '',isLoggedIn: false,user: {email: '',password: ''}};
    this.handleChange0 = this.handleChange0.bind(this);
    this.handleChange1 = this.handleChange1.bind(this);
    this.handleChange2 = this.handleChange2.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handlePasswordConfirm = this.handlePasswordConfirm.bind(this);
    }
    
    handleChange0(e)
    {
        this.setState({
            name: e.target.value
        })
    }
    
    handlePasswordConfirm(e) {
  let value = e.target.value;
  this.setState({formSubmitting: false});
  if(value!=this.state.password)
  {
      this.setState({formSubmitting: true});
      this.setState({
            passwordError: 1
        })
      
      //swal("Password Mismatch!", "Password doesn't match!", "error");
  }
  else
  {
      this.setState({
            passwordError: 0
        })
  }
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
    this.setState({formSubmitting: true});
    e.preventDefault();
    const postData = {
        name: this.state.name,
        email: this.state.email,
        password: this.state.password
    }
    
    let uri = 'https://integrityinsurance.dev505.io/public/api/register';
    axios.put(uri, postData).then((response) => {
        if(response['data']['status']==0)
        {
            alert(response['data']['message']);
        }
        else
        {
            $('#name').val();
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
    render() 
    {
        return (
            <div>
            <Navigation/>
                <div className="banner banner-area" style={{backgroundImage: "url(" + Background + ")"}}>
                    <div className="container">
                        <div className="row banner-content ">

                        <div className="col-md-6">
                    <h4 className="text-center mb-3">Register</h4>
					<form onSubmit={this.handleSubmit}>
					 	
                        <div className="row">
							<div className="col-md-12 form-group form-group-col">
							
							<input type="text" className="form-control common-input mb-20" id="name" name="name" placeholder="Your Name" required="" autoComplete="name" onChange={this.handleChange0} />
							
                            <input type="email" className="form-control common-input mb-20" id="email" name="email" placeholder="Your E-mail" autoComplete="email" required="" onChange={this.handleChange1} />
							                                
                            <input id="password" type="password" className="form-control common-input mb-20" name="password" required="" placeholder="Your Password" autoComplete="password" onChange={this.handleChange2} />
                            
                            <input id="password_confirm" type="password" name="password_confirm" placeholder="Confirm Password" className="form-control" autoComplete="new-password" required onChange={this.handlePasswordConfirm} />
								
							</div>
							
							<div className="col-md-12 form-group form-group-col2">
							  {this.state.passwordError === 1 ? 
							<span> Password doesn't match!</span>
							
							:null
							}
								<button className="primary-btn" type="submit" disabled={this.state.formSubmitting ? "disabled" : ""}>Register</button>
								
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