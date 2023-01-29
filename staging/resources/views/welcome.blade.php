<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="icon" type="image/png" href="https://integrityinsurance.dev505.io/public/images/newlogo.png"/>
    <meta
      name="description"
      content="Web site created using create-react-app"
    />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="apple-touch-icon" sizes="76x76" href="./apple-icon.png" />
    <!--
      manifest.json provides metadata used when your web app is installed on a
      user's mobile device or desktop. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
    <!--
      Notice the use of %PUBLIC_URL% in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.

      Unlike "/favicon.ico" or "favicon.ico", "%PUBLIC_URL%/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="styleSheet" href="{{ asset('public/assets/css/animate.css') }}">
    <link rel="styleSheet" href="{{ asset('css/ruang-admin.min.css') }}">
    <link rel="styleSheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="styleSheet" href="{{ asset('public/assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Integrity Insurance</title>
  </head>
  <body class="dark-edition">
    <div class="wrapper">

      <div id="app"></div>
    <!--
      This HTML file is a template.
      If you open it directly in the browser, you will see an empty page.

      You can add webfonts, meta tags, or analytics to this file.
      The build step will place the bundled scripts into the <body> tag.

      To begin the development, run `npm start` or `yarn start`.
      To create a production bundle, use `npm run build` or `yarn build`.
    -->

  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  
  	<script src="{{ asset('theme/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="{{ asset('theme/js/tilt.jquery.min.js') }}"></script>
	<script src="{{ asset('theme/js/vendor/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ asset('theme/js/easing.min.js') }}"></script>
	<script src="{{ asset('theme/js/hoverIntent.js') }}"></script>
	<script src="{{ asset('theme/js/superfish.min.js') }}"></script>
	<script src="{{ asset('theme/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('theme/js/owl-carousel-thumb.min.js') }}"></script>
	<script src="{{ asset('theme/js/hexagons.min.js') }}"></script>
	<script src="{{ asset('theme/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('theme/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('theme/js/mail-script.js') }}"></script>
	<script src="{{ asset('theme/js/main.js') }}"></script>
  </body>
</html>