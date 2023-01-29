import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';




export default class DashboardFooter extends Component {
    constructor (props){
        super(props);
}


    render() {
        return (
            <div>

<section className="footer-section">
    <div className="container-fluid">
        <div className="row">
            <div className="col-12 col-md-6 footer-logo-col"><img className="img-fluid" src="https://xecutequotes.com/public/landingImages/footerLogo.png" />
                <p>Help health insurance agents optimize the process of generating and analyzing group health insurance quotes.</p>
                <ul className="list-inline">
                    <li className="list-inline-item"><a href="#"><i className="fab fa-instagram" /></a></li>
                    <li className="list-inline-item"><a href="#"><i className="fas fa-globe" /></a></li>
                    <li className="list-inline-item"><a href="#"><i className="fab fa-twitter" /></a></li>
                    <li className="list-inline-item"><a href="#"><i className="fab fa-youtube" /></a></li>
                </ul>
            </div>
            <div className="col-5 col-md-3 footer-pages-col">
                <h5>Pages</h5>
                <ul>
                    <li><a href="/about">About</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/contact-us">Contact</a></li>
                </ul>
            </div>
            <div className="col-7 col-md-3 reachUs-col">
                <h5>Reach us</h5>
                <ul>
                    <li><i className="fas fa-envelope" />xecutequotes.hello@coder.com</li>
                    <li><i className="fas fa-mobile-alt" />+1 98765 43210</li>
                    <li><i className="fas fa-map-marker-alt" />772 Lyonwood Ave Walnut, CA 91789</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section className="footer-bar">
    <div className="container-fluid">
        <div className="row">
            <div className="col-12 col-md-5 col-lg-6 copy-right">
                <p>© 2021 Xecute. All rights reserved</p>
            </div>
            <div className="col-12 col-md-7 col-lg-6 terms-condition">
                <ul className="list-inline">
                    <li className="list-inline-item"><a href="#">Terms &amp; Conditions</a></li>
                    <li className="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li className="list-inline-item"><a href="#">Sitemap</a></li>
                    <li className="list-inline-item"><a href="#">Disclaimer</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

            </div>
        )
    }
}
