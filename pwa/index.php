<?php
	ob_start("ob_gzhandler");
	error_reporting(0);
	ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>


	<!-- 
	    LINKEDIT.ml @link https://linkedit.ml
		GITHUB @link https://github.com/eminmuhammadi/hidemyass


	
		latest update	 @date 10/14/2019		
	!-->

	<link rel="dns-prefetch" href="//www.googletagmanager.com">
	<link rel="dns-prefetch" href="//stackpath.bootstrapcdn.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//code.jquery.com">


	<meta charset="utf-8">

	<link rel="shortcut icon" href="static/favicon.ico" />

	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="msapplication-starturl" content="/">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Crypto Calculator | Linkedit</title>

	<meta name="author" content="Emin Muhammadi">

	<meta name="title" content="Crypto Calculator | Linkedit">
	<meta name="description" content="Managing a couple of algorithms to decrypt or encrypt text">

	<link rel="apple-touch-icon" sizes="57x57" href="static/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="static/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="static/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="static/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="static/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="static/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="static/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="static/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="static/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="static/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="static/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="static/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="static/favicon-16x16.png">
	<link rel="manifest" href="assets/manifest.json">
	<meta name="msapplication-TileColor" content="#000">
	<meta name="msapplication-TileImage" content="static/ms-icon-144x144.png">
	<meta name="theme-color" content="#000">

	<script async src="//www.googletagmanager.com/gtag/js?id=UA-124804614-1" type="text/javascript"></script>
	<script type="text/javascript">
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-124804614-1');
	</script>

	<!-- CSS -->
	<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- APP CSS -->
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	
	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Notable&display=swap" rel="stylesheet">


	<!-- SEO -->
	<meta name="description" content="Managing a couple of algorithms to decrypt or encrypt text">
	<meta name="canonical" content="https://linkedit.ml">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://linkedit.ml">
	<meta property="og:title" content="Crypto Calculator | Linkedit">
	<meta property="og:description" content="Managing a couple of algorithms to decrypt or encrypt text">
	<meta property="og:image" content="static/linkedit-ml.png">
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="/">
	<meta property="twitter:title" content="Crypto Calculator | Linkedit">
	<meta property="twitter:description" content="Managing a couple of algorithms to decrypt or encrypt text">
	<meta property="twitter:image" content="static/linkedit-ml.png">

</head>

<body>

	<!-- Header -->
	<div class="header">
		<div class="d-flex justify-content-between container">
			<h1 class="header-link">
				<a href="https://linkedit.ml">Linkedit</a>
			</h1>
		</div>
	</div>
	<div class="notification bg-light">
		<p class="container">Don't miss, leave a star or fork. Check out github <a target="_blank"  rel="noreferer" href="https://github.com/eminmuhammadi/HideMyAss">↗ repository</a></p>
	</div>	

	<!-- Calculator -->
	<div class="mt-2 container">
		<div class="row">

			<div class="col-md-4">
				<div class="pt-1 sticky-top">
					<form class="mt-1" method="POST">
					
						<div class="input-group mb-3 pt-3">

							<div class="input-group-prepend">
								<label class="input-group-text">Algorithm :</label>
							</div>

	   						<select required class="form-control" id="algo">

							   	<option disabled>--------16 bytes--------</option>	
							    <option value="aes-128-cbc">aes-128-cbc</option>
							    <option value="aes-128-cfb">aes-128-cfb</option>
							    <option value="aes-128-cfb1">aes-128-cfb1</option>
							    <option value="aes-128-cfb8">aes-128-cfb8</option>
							    <option value="aes-128-ofb">aes-128-ofb</option>
							    <option value="aes-192-cbc">aes-192-cbc</option>
							    <option value="aes-192-cfb">aes-192-cfb</option>
							    <option value="aes-192-cfb1">aes-192-cfb1</option>
							    <option value="aes-192-cfb8">aes-192-cfb8</option>						    
							    <option value="aes-192-ofb">aes-192-ofb</option>
							    <option value="aes-256-cbc">aes-256-cbc</option>
							    <option value="aes-256-cfb">aes-256-cfb</option>
							    <option value="aes-256-cfb1">aes-256-cfb1</option>
							    <option value="aes-256-cfb8">aes-256-cfb8</option>
							    <option value="aes-256-ofb">aes-256-ofb</option>
							    <option value="aes128">aes128</option>
							    <option value="aes192">aes192</option>						    
							    <option value="aes256" selected>aes256</option>

							  	<option disabled>---------8 bytes--------</option>	

							    <option value="bf-cbc">bf-cbc</option>
							    <option value="bf-cfb">bf-cfb</option>
							    <option value="bf-ofb">bf-ofb</option>
							    <option value="cast5-cbc">cast5-cbc</option>
							    <option value="cast5-cfb">cast5-cfb</option>
							    <option value="cast5-ofb">cast5-ofb</option>
							    <option value="blowfish">blowfish</option>
							    <option value="cast">cast</option>
							    <option value="cast-cbc">cast-cbc</option>

	 						</select>
	 					</div>	

					    <div class="form-group">
					    	<input type="text" id="skey" class="form-control" required>
					    	<label class="form-control-placeholder" for="skey">Secret Key</label>
					    </div>

					    <div class="form-group">
					   		<input type="text" id="pkey" class="form-control" required>
					        <label class="form-control-placeholder" for="pkey">Public Key</label>
					    </div>

					    <div class="form-group">
					   		<input type="text" id="text" class="form-control" required></textarea>
					        <label class="form-control-placeholder" for="text">Text</label>
					    </div>

						<div class="btn-group group" role="group">
							<input disabled="true" type="submit" id="encrypt" class="shadow-sm btn btn-dark btn-md" value="Encrypt">
							<input disabled="true" type="submit" id="decrypt" class="shadow-sm btn btn-light btn-md" value="Decrypt"> 
						</div>

				    </form>  
				</div>	
			</div>

			<div class="col-md-8">
				<div class="mt-4 root-tool container d-flex justify-content-between">
					<div class="count-list">
						Total : <strong><span id="total_list">0</span></strong> data.
					</div>
					<div>
						<button id="clear" class="float-right btn btn-sm btn-dark">Clear</button>
					</div>	
				</div>
				<div class="row" id="root"></div>	
			</div>

		</div>
	</div>

	<div class="footer">

		<div class="notification bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>Subscribe to the newsletter <a rel="noreferer" target="_blank" href="https://linkedit-ml.us18.list-manage.com/subscribe/post?u=51cffc7b5be143864ea408903&amp;id=c002ade545">↗ via link</a>, or</p>
					</div>

					<div class="col-md-6 email">
						<form action="https://linkedit-ml.us18.list-manage.com/subscribe/post?u=51cffc7b5be143864ea408903&amp;id=c002ade545" method="post">	
							<div class="input-group mb-3">
							  <input type="email" name="EMAIL" required class="form-control" placeholder="john-doe@example.com">
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="submit">Subscribe</button>
							  </div>
							</div>
						</form>	
					</div>
				</div>	
			</div>
		</div>	

		<ul class="nav justify-content-end">
		  <li class="nav-item">
		    <a class="nav-link" rel="noreferer" target="_blank" href="https://github.com/eminmuhammadi/HideMyAss/blob/master/LICENSE">License</a>
		  </li>			
		  <li class="nav-item">
		    <a class="nav-link" rel="noreferer" target="_blank" href="https://github.com/eminmuhammadi/HideMyAss">Github</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" rel="noreferer" target="_blank" href="https://github.com/eminmuhammadi/HideMyAss/issues">Issues</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" rel="noreferer" target="_blank" href="https://github.com/eminmuhammadi/HideMyAss/graphs/contributors">Contributors</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" rel="noreferer" target="_blank" href="https://github.com/eminmuhammadi">@eminmuhamadi</a>
		  </li>
		</ul>
	</div>	

<!-- JQUERY -->
<script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- APP -->
<script type="text/javascript" src="assets/app.js"></script>

<!-- Service Worker -->
<script type="text/javascript">if('serviceWorker' in navigator){navigator.serviceWorker.register('service-worker.js').then(function(registration){console.log('ServiceWorker registration successful with scope: ',registration.scope)}).catch(function(err){console.log('ServiceWorker registration failed: ',err)})}</script>

</body>
</html>	
	