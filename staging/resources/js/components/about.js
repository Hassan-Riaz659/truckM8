import React, { Component } from 'react';
import { Link } from "react-router-dom";
import Ripples from 'react-ripples';
import Navigation from './components/navigation';


import bannerColImage from './components/imgs/banner-img.png';

var baseUrl = window.location.origin;
var Background = baseUrl+'/public/images/home-banner-bg.jpg';

export default class About extends Component {
    constructor (props) {
        super(props);
        this.state={
            
        }
        
    }

    render() {
        return (
            <div>
<Navigation/>
<div className="banner banner-area" style={{backgroundImage: "url(" + Background + ")"}}>
                    <div className="container">
                        <div className="row banner-content ">

                        <div className="col-12 breadcrumbs-col">
			        <div className="right-part">
						<a href="index.html">home</a>
						<span className="fa fa-caret-right"></span>
						<a href="#">about</a>
					</div>
			    </div>
                            <div className="col-12 col-md-6 banner-title2">
                            <h1>About</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <section class="about-area">
		<div class="container">
		<div class="row">
		    <div class="col-md-12 text-center">
		        <p>Youtube Video</p>
		    </div>
		</div>
		</div>
	</section>

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
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" className="form-inline" novalidate="true">
							<input className="form-control" name="EMAIL" placeholder="Your Email Address" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Your Email Address '" required="" type="email"/>
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