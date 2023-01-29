import React, { Component } from 'react';
import SelectSearch from 'react-select-search';
import Ripples from 'react-ripples';
import OwlCarousel from 'react-owl-carousel';
import 'owl.carousel/dist/assets/owl.carousel.css';
import Navigation from './components/navigation';

var baseUrl = window.location.origin;
var Background = baseUrl+'/public/images/home-banner-bg.jpg';
var bannerImg = baseUrl+'/public/images/banner-img.png';
var Iphone = baseUrl+'/public/images/iphone.png';
var S1 = baseUrl+'/public/images/s1.jpg';
var S2 = baseUrl+'/public/images/s2.jpg';
var S3 = baseUrl+'/public/images/s3.jpg';
var S4  = baseUrl+'/public/images/s4.jpg';
var videBg  = baseUrl+'/public/images/video-bg.jpg';




// let plugins = [
//     // other plugins,
//     new webpack.ProvidePlugin({
//         $: 'jquery',
//         jQuery: 'jquery',
//         'window.jQuery': 'jquery'
//     }),
// ];


export default class Home extends Component {
    constructor (props){
        super(props);
    this.state= {
        responsive:{
            0: {
                items: 1,
            },
            450: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 4,
            },
        },
    }
}


    render() {
        return (
            <div>
                <Navigation/>
                <div className="banner" style={{backgroundImage: "url(" + Background + ")"}}>
                    <div className="container">
                        <div className="row d-flex align-items-center justify-content-between">
                            <div className="col-12 col-md-6 banner-title">
                            <h1>Integrity Insurance</h1>
                            </div>

                            <div className="col-12 col-md-6 col-lg-4 banner-col-img">
                                <img src={bannerImg} className="img-fluid"></img>
                            </div>
                        </div>
                    </div>
                </div>

                <section className="section-padding second-section">
                    <div className="container">
                    <div className="row">

                        <div className="col-12 section-title text-center">
                            
                            <h1>Unique Features</h1>

                        </div>

                        <div className="col-md-4 co-12 ">
                            <div className="single-feature">
                                <a href="#" className="title">
                                    <span className="fa fa-book"></span>
                                    <h3>Expert Technicians</h3>
                                </a>
                                <p>
                                    Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                                </p>
                            </div>
                        </div>

                        <div className="col-md-4 co-12 ">
                            <div className="single-feature">
                                <a href="#" className="title">
                                    <span className="fa fa-book"></span>
                                    <h3>Professional Service</h3>
                                </a>
                                <p>
                                    Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                                </p>
                            </div>
                        </div>

                        <div className="col-md-4 co-12 ">
                            <div className="single-feature">
                                <a href="#" className="title">
                                    <span className="fa fa-book"></span>
                                    <h3>Great Support</h3>
                                </a>
                                <p>
                                    Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                                </p>
                            </div>
                        </div>
                        
                        

                    </div>
                    </div>

                </section>



                <section className="about-area">
		<div className="container">
			<div className="row align-items-center">
				<div className="col-lg-5 home-about-left">
					<img className="img-fluid" src={Iphone} />
				</div>
				<div className="col-lg-5 home-about-right">
					<h1>
						We Believe that <br></br>
						Interior beautifies the <br></br>
						Total Architecture
					</h1>
					<a className="primary-btn text-uppercase" href="#">Get Details</a>
				</div>
				<div className="col-lg-6 home-about-right home-about-right2">
					<h1>
						We Believe that <br></br>
						Interior beautifies the <br></br>
						Total Architecture
					</h1>
				</div>
				<div className="col-lg-5 home-about-left">
                <img className="img-fluid" src={Iphone} />
				</div>
			</div>
		</div>
	</section>




    <section className="about-video-area section-padding">
		<div className="vdo-bg">
			<div className="container">
				<div className="row align-items-center justify-content-center">
					<div className="col-lg-12 about-video-right justify-content-center align-items-center d-flex relative" style={{backgroundImage: "url(" + videBg + ")"}}>
						<div className="overlay overlay-bg"></div>
						<a className="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM">
                            {/* <img className="img-fluid mx-auto" src="img/play-btn.png" alt=""> */}

                            </a>
					</div>
				</div>
			</div>
		</div>
	</section>




    <section className="testimonials-area section-padding">
            <div className="container">
            <div className="row">
                <div className="col-12 col-md-7 mx-auto text-center">
                    <OwlCarousel
                        className="owl-theme"
                        loop
                        margin={10}
                        nav={false}
                        items={1}
                        autoplay={true}
                        autoplayTimeout={2000}
                        autoplayHoverPause={true}
                        navText={["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]}
                        dots={false}
                       
                    >
                        <div className="item testimonial-item">
                                <div className="testi-item">
                                <h4>Fanny Spencer</h4>
                                <ul className="list-inline">
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                </ul>
                                <div className="wow fadeIn" data-wow-duration="1s">
                                    <p>
                                        As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
                                        you travel
                                        across her face <br></br> and She is the host to your journey.
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div className="item testimonial-item" >
                                <div className="testi-item">
                                <h4>Fanny Spencer</h4>
                                <ul className="list-inline">
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                </ul>
                                <div className="wow fadeIn" >
                                    <p>
                                        As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
                                        you travel
                                        across her face <br></br> and She is the host to your journey.
                                    </p>
                                </div>
                            </div>

                        </div>


                        <div className="item testimonial-item">
                                <div className="testi-item">
                                <h4>Fanny Spencer</h4>
                                <ul className="list-inline">
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                </ul>
                                <div className="wow fadeIn" >
                                    <p>
                                        As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
                                        you travel
                                        across her face <br></br> and She is the host to your journey.
                                    </p>
                                </div>
                            </div>

                        </div>

                    
                        
                        <div className="item testimonial-item" >
                                <div className="testi-item">
                                <h4>Fanny Spencer</h4>
                                <ul className="list-inline">
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                    <li className="list-inline-item"><a href="#"><i className="fa fa-star"></i></a></li>
                                </ul>
                                <div className="wow fadeIn">
                                    <p>
                                        As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
                                        you travel
                                        across her face <br></br> and She is the host to your journey.
                                    </p>
                                </div>
                            </div>

                        </div>

                        

                        

                    </OwlCarousel>
                    </div>
                </div>
                </div>
            </section>


            <section className="screenshot-area section-padding">
            <div className="container">
                    <div className="row slider-row">

                    <div className="col-lg-6 mx-auto">
					<div className="section-title text-center">
						<h2>Featured Screens</h2>
					</div>
				</div>

                        <div className="col-12 slider">
                            <OwlCarousel
                                className="owl-theme"
                                loop
                                margin={10}
                                nav={false}
                                
                                autoplay={true}
                                autoplayTimeout={3000}
                                autoplayHoverPause={true}
                                navText={["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]}
                                dots={false}
                                responsive={this.state.responsive}
                            >


                                <div className="item">
                                <div className="single-screenshot">
                                        
                                        <img src={S3} className="img-fluid" />
                                    </div>
                                </div>

                                <div className="item">
                                <div className="single-screenshot">
                                        <img className="img-fluid" src="theme/img/screenshots/s3.jpg" alt=""/>
                                        <img src={S4} className="img-fluid" />
                                    </div>
                                </div>

                                <div className="item">
                                <div className="single-screenshot">
                                        <img className="img-fluid" src="theme/img/screenshots/s3.jpg" alt=""/>
                                        <img src={S1} className="img-fluid" />
                                    </div>
                                </div>

                                <div className="item">
                                <div className="single-screenshot">
                                        <img className="img-fluid" src="theme/img/screenshots/s3.jpg" alt=""/>
                                        <img src={S2} className="img-fluid" />
                                    </div>
                                </div>

                            </OwlCarousel>

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
