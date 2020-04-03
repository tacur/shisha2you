<?php
$db = mysqli_connect("localhost", "salia", "bxPJgr6km4mx", "shisha2you_bestellungen");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$sql = "SELECT Bestellung, Datum FROM Bestellungen";
 
$db_erg = mysqli_query( $db, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}

?>
<!doctype html>
<html lang="en" class="no-js">
<style>html {scroll-behavior: smooth; }</style>
<head>
	<meta charset="UTF-8">
	<meta name="theme-color" content="#8e793e">
	<link rel="icon" sizes="192x192" href="img/favicon1.PNG">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0, user-scalable=0'/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700|Merriweather:400italic,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/stylewarenkorb.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script src="js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
	<script src="js/jquery-2.1.1.js"></script>
	<script
    	src="https://www.paypal.com/sdk/js?client-id=AWcDGS43FUOITL8aAbnPevapI38ZozP5qSLW3UaUzV4DaU7DaG57DDXC_LX5hRqOQ5MTBJ1evO98tWNg"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  	</script>
  	<script>
		  /*
		paypal.Buttons(
			{
			style: {
								layout:  'vertical',
								color:   'black',
								shape:   'pill',
								label:   'paypal'
							},
			createOrder: function(data, actions) {
			// This function sets up the details of the transaction, including the amount and line item details.
			return actions.order.create({
				purchase_units: [{
				amount: {
					value: '13.00'
					}
				}]
			});
			},
			onApprove: function(data, actions) {
			// This function captures the funds from the transaction.
			return actions.order.capture().then(function(details) {
				// This function shows a transaction success message to your buyer.
				alert('Shisha-Bestellung erfolgreich von ' + details.payer.name.given_name + ' bezahlt.');
			});
		}
		}).render('#paypal-button-container');
		*/
		// This function displays Smart Payment Buttons on your web page.
  	</script>

  	
	<title>Shisha2you</title>
</head>
			<div id="cookieConsent">
			    <div id="closeCookieConsent"><i class="material-icons">close</i></div>
			    <b>Zustimmung zur Verwendung von Cookies.</b></br>Diese Website benutzt Cookies. <a href="#" target="_blank">Mehr Informationen</a>. <a class="cookieConsentOK">Zustimmen</a>
			</div>
<body id="top" class="cd-about" style="background-color: var(--third);">
	<section class="cd-intro" style="position: fixed; z-index: 10;">
	<div class="cd-intro-content scale">
		<div class="content-wrapper">
			<div>
				<h1><img src="img/logo1.png" style="max-width: 100%; height: auto;"></h1>
			</div>
		</div>
	</div>
</section>
					<script>
							function openNav() {
							document.getElementById("mySidenav").style.width = "100%";
							}
							
							function closeNav() {
							document.getElementById("mySidenav").style.width = "0";
							}
					</script>
	<main>
			<nav class="navbar2">	
				<div class="row" style="min-height: 100%;">
						<div class="col-sm-2"><a href="index.html" ><img src="img/logo_neu.png" style="position: fixed; width: 100px; height: 35px; top: 15px; left: 0%; z-index: 4;"></a></div>  
						<div class="col-sm-8"style="text-align: center;">
							<a class="btn_lieferung2 slideanim3" href="#lieferzeiten" style="position: relative; margin-top: 10px; border-radius: 1rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);"><i class="material-icons">info</i></br>Liefergebiet aktuell nur Hannover!</a>
						</div>
						<div class="col-sm-2">
							<div class="hamburger" onclick="openNav()">
								<div class="line"></div>
								<div class="line"></div>
								<div class="line"></div>
							</div>
						</div>
				</div>
			
		</nav>
			<div id="mySidenav" class="sidenav" style="z-index: 7; background: var(--white);">
				<a href="javascript:void(0)" class="closebtn" style="color: var(--grundfarbe);" onclick="closeNav()">&times;</a>
				
				<div class="row" style="min-height: 100%;">				
					<div class="col-sm-6">	
						<a href="#auswahl_shisha" class="btn_nav" onclick="closeNav()">Shishas</a>
						<a href="#auswahl_getränke" class="btn_nav" onclick="closeNav()">Getränke/Snacks</a>
						<a href="#social-media" class="btn_nav" onclick="closeNav()">Social-Media</a>
						<a href="#lieferzeiten" class="btn_nav" onclick="closeNav()">Lieferzeiten</a>
						<a href="#kontakt" class="btn_nav" onclick="closeNav()">Kontakt</a>
						<a href="#anfahrt" class="btn_nav" onclick="closeNav()">Anfahrt</a>
							<div class="row" style="padding:20px;">
								<div class="col-sm-3" ></div>
								<div class="col-sm-6" style="display:unset;">
									<a class="btn_s" style="display:inline-block;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);padding: 0; height: 65px; width:65px;"
											href="https://wa.me/491787293347" target="_blank">
											<i class="fab fa-whatsapp" style="line-height: 65px;"></i>
										</a>
										<a class="btn_s" style="display:inline-block; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);padding: 0;height: 65px; width:65px;"
											href="https://www.instagram.com/shisha2you_de/?hl=de" target="_blank">
											<i class="fab fa-instagram" style="line-height: 65px;"></i>
										</a>
								</div>
								<div class="col-sm-3"></div>
							</div>
					</div>
					<div class="col-sm-6">
						<img class="bannerlogo" src="img/logo.png" />
					</div>
				</div>
			</div>
			</div>
			<!--<ul class="nav-links">
				<li><a class="btn_nav" href="#auswahl_shisha" onclick="closeNav()"><h3>Shishas</h3></a></li>
				<li><a class="btn_nav" href="#auswahl_getränke"><h3>Getränke/Snacks</h3></a></li>
				<li><a class="btn_nav" href="#social-media"><h3>Social-Media</h3></a></li>
				<li><a class="btn_nav" href="#lieferzeiten"><h3>Lieferzeiten</h3></a></li>
				<li><a class="btn_nav" href="#kontakt"><h3>Kontakt</h3></a></li>
				<li><a class="btn_nav" href="#anfahrt"><h3>Anfahrt</h3></a></li>
			</ul>
		-->
		

		<!-- <a class="btn_telefon slideanim2" href="tel:+51112345667" ><i class="material-icons">phone</i></a> -->
		<!-- <a class="btn_whatsapp slideanim2" href="https://api.whatsapp.com/send?phone=491762295702" ><i class="fab fa-whatsapp"></i></a> -->
		<a class="btn_lieferung slideanim2" href="#lieferzeiten" style="min-width: 20%; border-radius: 1rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
			<i class="material-icons">announcement</i></br>
			<?php while($row = $db_erg->fetch_assoc()) {
	echo "Bestellung" . $row["bestellung"]. "/ Datum: " . $row["Datum"] . "/ Index: "
	. $row["Index"]. "";
	}?>
			Wegen Coronavirus</br>
			liefern wir kontaktlos!</br></br>
			Shishas werden vor</br>
			Lieferung desinfiziert.</br></br>
			Zudem erhaltet ihr</br>
			Einweg-Schläuche.</br></a>
		<!--<a class="btn_lieferung slideanim2" href="#lieferzeiten" style="min-width: 20%; top: 130px;border-radius: 1rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);"></a>-->
		
		
		<!--
		<img class="slideanim3" src="img/shisha2.png" style="position: absolute;display: block;margin-left: auto;margin-right: auto;width: 100%;max-width: 70px;max-height: 100px;z-index: 2;top: 20%;right: 0px;left: 0px;"/>
		<img class="slideanim2" src="img/2u.png" style="position: absolute;display: block;margin-left: auto;margin-right: auto;width: 100%;max-width: 500px;height: auto;z-index: 2;top: 20%;right: 0px;left: 0px;"/>
			-->
		<div class="header-wrapper" style="min-height: 100%;">
			<div class="zoominheader" style="top: 65px; max-height: 85%; height: 85%;background: var(--secondary);">
					<span style="vertical-align: middle;"></span><img style="vertical-align: middle; max-width: 100%; max-height: 50%;" class="bannerlogo slideanim3" src="img/logo.png" />
						<div class="wiegehtdas fade"><h4><br>1.Shisha wählen</h4>
							<img class="wiegehtdasimg" src="img/wiegehtdas1.svg" />
							<div class="meter">
								<span style="width:100%;"><span class="progress1"></span></span>
							</div>
						</div>
						<div class="wiegehtdas fade" ><h4><br>2.WhatsApp-Bestellung</h4>
							<img class="wiegehtdasimg" src="img/wiegehtdas2.svg" />
							<div class="meter">
								<span style="width:100%;"><span class="progress1"></span></span>
							</div>
						</div>
						<div class="wiegehtdas fade" ><h4><br>3.Lieferung...</h4>
							<img class="wiegehtdasimg" src="img/wiegehtdas3.svg" />
							<div class="meter">
								<span style="width:100%;"><span class="progress1"></span></span>
							</div>
						</div>
						<div class="wiegehtdas fade" ><h4><br>4.Shisha genießen!</h4>
							<img class="wiegehtdasimg" src="img/wiegehtdas4.svg" />
							<div class="meter">
								<span style="width:100%;"><span class="progress1"></span></span>
							</div>
						</div>
				
			</div>
			<div id="section10" class="demo" style="height: 15%; background: var(--third); z-index: 1;">
				<a href="#auswahl_shisha" style="z-index: 3;"><span></span></a>
			</div>
		</div>
<!--
		<div id="wiegehtdas" class="container-fluid " style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)) no-repeat center center;">
	<h4 style="text-align: center; font-size: 40px;">Wie funktioniert Shisha2you?</h4>
	<div class="middle">
		<div class="row">
			<div class="col-sm-3">
				<div class="card bg-light"
					style="min-width: 100%; height: 90%; border-radius: 1rem;padding: 50px 5px 50px 5px; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<h4>
						<div style="background: var(--grundfarbe); color: white;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">1. </div><br>Shisha + Getränk/ Snack wählen und in
						den Warenkorb legen...
					</h4><br><img style="padding:10px 10px;object-fit: cover;" src="img/wiegehtdas1.svg" />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card bg-light"
					style="min-width: 100%; height: 90%; border-radius: 1rem;padding: 60px 5px 60px 5px; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<h4>
						<div style="background: var(--grundfarbe); color: white;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">2.</div><br>Standort freigeben und
						WhatsApp-Bestellung starten...
					</h4><br><img style="padding:10px 10px;object-fit: cover;" src="img/wiegehtdas2.svg" />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card bg-light"
					style="min-width: 100%; height: 90%; border-radius: 1rem;padding: 60px 5px 60px 5px; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<h4>
						<div style="background: var(--grundfarbe); color: white;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">3. </div><br>Wir machen uns sofort auf dem Weg zu
						dir mit der Shisha
					</h4><br><img style="padding:10px 10px;object-fit: cover;" src="img/wiegehtdas3.svg" />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card bg-light"
					style="min-width: 100%; height: 90%; border-radius: 1rem;padding: 50px 5px 50px 5px; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<h4>
						<div style="background: var(--grundfarbe); color: white;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">4. </div><br>Genieß die Shisha... Wir holen sie
						wieder bei dir ab.
					</h4><br><img style="padding:10px 10px;object-fit: cover;" src="img/wiegehtdas4.svg" />
				</div>
			</div>
		</div>
	</div>
</div>

	<section id="section06" class="demo" style="max-height: 15%; background: var(--third); z-index: 1;">
			<a href="#auswahl_shisha" ><span></span></a>
	</section>
	<hr class="style-two">
-->
<div id="auswahl_shisha" class="container-fluid " style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)) no-repeat center center;">
	<h4 class="">Unsere Shisha-Auswahl</h4>
	<div class="middle">
		<div class="row">
				<div class="col-sm-4">
						<div class="card bg-light" style="min-width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
							<img src="img/amy.svg" class="card-img-top" alt="..."
								style="margin: auto; margin-top: 20px; width: 70%;">
							<div class="card-body">
								<h5 class="card-title">Classic Shisha</h5>
								<p style="color: var(--grundfarbe);"><h3>Die allseits bekannten Klassiker des Shishatabaks.</h3></p>
								<div class="row" style="min-width: 100%;">
										<div class="col-sm-3" >
												<div class="form-group">
														<select class="selectpicker form-control" style="height: auto;border: 2px solid var(--grundfarbe);font-size: 14px;"
														onchange="classicshishaanzahl()" id="classicshishaanzahl" data-width="auto">
															<option selected>1</option>
															<option >2</option>
															<option >3</option>
															<option >4</option>
															<option >5</option>
															<option >6</option>
															<option >7</option>
															<option >8</option>
														</select>
												</div>
											</div>
									<div class="col-sm-9" >
										<div class="form-group">
											<select class="selectpicker form-control" style="height: auto;border: 2px solid var(--grundfarbe);font-size: 14px;"
												onchange="classicshishawahl()" id="classicshishaoutput" data-width="auto">
												<option data-img="img/amy.svg" id="platzhalter" disabled selected>Geschmack wählen</option>
												<option data-img="img/amy.svg" data-tabak="Al-Fakher">Doppel-Apfel(Al-Fakher)</option>
												<option data-img="img/amy.svg" data-tabak="Al-Fakher">Traube-Minze(Al-Fakher)</option>
												<option data-img="img/amy.svg" data-tabak="Kilim">Zitrone-Minze(Kilim)</option>
												<option data-img="img/amy.svg" data-tabak="Royal">Pintaya(Royal)</option>
												<option data-img="img/amy.svg" data-tabak="Gama">Cold-Peach(Gama)</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
										<div class="col-sm-6" style="max-width: 60%;">
												<h5><span id="classictabak" class="badge badge-info" style="color: (--third);
													background: var(--grundfarbe);"></span></h5>
										</div>
									<div class="col-sm-6" style="max-width: 30%;">
											<h5><span class="badge badge-info" id="classicanzahlpreis" style="color: (--third);
												background: var(--grundfarbe);">10.00 €</span></h5>
									</div>
								</div>
									<div class="row">
										<div class="col-sm-12" style="min-width: 100%;">
											<button href="#0" id="classicshishainput" disabled value="" style="min-width: 100%; background: var(--hellgrau);" class="cd-add-to-cart js-cd-add-to-cart"
												data-price="10.00" data-art="Classic-Shisha" data-anzahl="1" data-name="Classic-Shisha">In den Warenkorb</button>
										</div>
									</div>
									<!--
									<div class="row">
										<div class="col-sm-12" style="min-width: 100%;margin-top: 50px;">
											<div style="z-index: 2;" id="paypal-button-container"></div>
										</div>
									</div>
									-->
							</div>
						</div>
					</div>
			<div class="col-sm-4">
				<div class="card bg-dark" style="width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<img src="img/amy.svg" class="card-img-top" alt="..."
						style="margin: auto; margin-top: 20px; width: 70%;">
					<div class="card-body">
						<h5 class="card-title">Premium Shisha</h5>
						<p style="color: var(--grundfarbe);"><h3>Premiumtabak für einen unvergesslichen Geschmack.</h3></p>
						<div class="row">
							<div class="col-sm-3" >
									<div class="form-group">
											<select class="selectpicker form-control" style="height: auto;background-color: var(--hellgrau);color: var(--grundfarbe);border: 2px solid var(--grundfarbe);font-size: 14px;"
											onchange="premiumshishaanzahl()" id="premiumshishaanzahl" data-width="auto">
												<option selected>1</option>
												<option >2</option>
												<option >3</option>
												<option >4</option>
												<option >5</option>
												<option >6</option>
												<option >7</option>
												<option >8</option>
											</select>
									</div>
								</div>
								<div class="col-sm-9" >
								<div class="form-group" >
									<select class="selectpicker form-control" style="height: auto;background-color: var(--hellgrau);color: var(--grundfarbe);border: 2px solid var(--grundfarbe);font-size: 14px;"
										onchange="premiumshishawahl()" id="premiumshishaoutput" data-width="auto">
										<option data-img="img/product-preview.png" id="platzhalter" disabled selected>Geschmack wählen</option>
										<option data-img="img/amy.svg" data-tabak="TruePassion">Ringel-Rangel(TruePassion)</option>
										<option data-img="img/amy.svg" data-tabak="TruePassion">Okolom(TruePassion)</option>
										<!--<option data-img="img/amy.svg" data-tabak="187">Hamburg(187)</option>-->
										<!--<option data-img="img/amy.svg" data-tabak="Aqua Menta">Aqua-Black-Box(AquaMenta)</option>-->
										<option data-img="img/amy.svg" data-tabak="Dalia">Love66(Dalia)</option>
										<!--<option data-img="img/amy.svg" data-tabak="Dschinni">Lemon-Fresh(Dschinni)</option>-->
										<option data-img="img/amy.svg" data-tabak="Dschinni">Da-Bomb(Dschinni)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="max-width: 60%;">
									<h5><span id="premiumtabak" class="badge badge-info" style="color: var(--hellgrau);
										background: var(--grundfarbe);"></span></h5>
							</div>
							<div class="col-sm-3" style="max-width: 30%;">
									<h5><span class="badge badge-info" id="premiumanzahlpreis" style="color: var(--hellgrau);
										background: var(--grundfarbe);">13.00 €</span></h5>
								</div>
						</div>
						<div class="row" style="min-width: 100%;">
							<div class="col-sm-12" style="min-width: 100%;">
								<button href="#0" id="premiumshishainput" disabled style="min-width: 100%;  background: var(--grundfarbe);" value="" class="cd-add-to-cart js-cd-add-to-cart"
									data-price="13.00" data-art="Premium-Shisha" data-anzahl="1" data-name="Premium-Shisha">In den Warenkorb</button>
							</div>
						</div>
						<!--
						<div class="row">
							<div class="col-sm-6" style="min-width: 100%;">
							</div>
							<div class="col-sm-6" style="min-width: 100%; margin-top: 10px;"><a style="background: green; min-width: 100%;" class="cd-add-to-cart"
									id="premium-shisha"><i class="fab fa-whatsapp"></i>Sofort-Bestellung</a></div>
						</div>
						-->
					</div>
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="card" style="width: 100%; border-radius: 2rem; background: var(--grundfarbe); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<img src="img/amy.svg" class="card-img-top" alt="..."
						style="margin: auto; margin-top: 20px; width: 70%; color: var(--hellgrau);">
					<div class="card-body">
						<h5 class="card-title" style="color: var(--secondary);">Exclusiv Shisha</h5>
						<p ><h3 style="color: var(--secondary);">Nur das Beste vom Besten. Exklusiver Shishatabak.</h3></p>
						<div class="row" style="min-width: 100%;">
								<div class="col-sm-3" >
										<div class="form-group">
												<select class="selectpicker form-control" style="height: auto;background-color: var(--grundfarbe);color:white;border: 2px solid var(--secondary);font-size: 14px;"
												onchange="exclusivshishaanzahl()" id="exclusivshishaanzahl" data-width="auto">
													<option selected>1</option>
													<option >2</option>
													<option >3</option>
													<option >4</option>
													<option >5</option>
													<option >6</option>
													<option >7</option>
													<option >8</option>
												</select>
										</div>
									</div>
							<div class="col-sm-9">
								<div class="form-group">
									<select class="selectpicker form-control" style="height: auto;background-color: var(--grundfarbe);color:white;border: 2px solid var(--secondary);font-size: 14px;"
										onchange="exclusivshishawahl()" id="exclusivshishaoutput" data-width="auto">
										<option data-img="img/product-preview.png" id="platzhalter" disabled selected>Geschmack wählen</option>
										<option data-img="img/amy.svg" data-tabak="Social Smoke">Lemon-Chill(SocialSmoke)</option>
										<option data-img="img/amy.svg" data-tabak="Social Smoke">Watermelon-Chill(SocialSmoke)</option>
										<option data-img="img/amy.svg" data-tabak="Social Smoke">Wildberry-Chill(SocialSmoke)</option>
									</select>
								</div>
							</div>
						</div>
							<div class="row" >
									<div class="col-sm-6" style="max-width: 60%;">
											<h5><span id="exclusivtabak" class="badge badge-info" style="color: var(--grundfarbe);
												background: #fff;"></span></h5>
									</div>
									<div class="col-sm-3" style="max-width: 30%;">
											<h5><span class="badge badge-info" style="color: var(--grundfarbe);;
												background: #fff;" id="exclusivanzahlpreis">15.00 €</span></h5>
									</div>
							</div>
							
						
						<div class="row">
							<div class="col-sm-12" style="min-width: 100%;">
								<button href="#0" id="exclusivshishainput" value="" disabled style="min-width: 100%; background: var(--secondary); color: var(--grundfarbe);" class="cd-add-to-cart js-cd-add-to-cart"
									data-price="15.00" data-art="Exclusiv-Shisha" data-anzahl="1" data-name="Exclusiv-Shisha">In den Warenkorb</button>
							</div>
						</div>
						<!--
						<div class="row">
							<div class="col-sm-6" style="min-width: 100%;">
							</div>
							<div class="col-sm-6" style="min-width: 100%; margin-top: 10px;"><a style="background: green; min-width: 100%;" class="cd-add-to-cart"
									id="standard-shisha"><i class="fab fa-whatsapp"></i>Sofort-Bestellung</a></div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12" style="min-width: 100%;padding-left: 0px; padding-right: 0px;">
		<button href="#0"  disabled style="min-width: 100%; margin-top: 50px; margin-bottom: 0px; background: var(--hellgrau); color: var(--secondary);" class="cd-add-to-cart js-cd-add-to-cart">
			Was alles zur Shisha geliefert wird: Shisha-Set + 1x Anzünder + 9x Kohle Stücke + 20 Gramm Shishatabak (1x Kopf)
		</button>
	</div>
</div>
<section id="section06" class="demo" style="background: var(--third);">
	<a href="#auswahl_getränke"><span></span></a>
</section>
<hr class="style-two">

<!-- //// GETRÄNKE ///////-->
<div id="auswahl_getränke" class="container-fluid " style="background: linear-gradient(
rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)) no-repeat center center;">
	<h4 class="">Unsere Getränke- und Snack-Auswahl</h4>
	<div class="middle">
		<div class="row">
			<div class="col-sm-4">
				<div class="card bg-light"
					style="width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<img src="img/flasche.svg" id="softdrinksimg" class="card-img-top" alt="..." style="margin: auto; margin-top: 20px; width: 70%;">
					<div class="card-body">
						<h5 class="card-title">Softgetränke</h5>
						<div class="row" style="min-width: 100%;">
								<div class="col-sm-3" >
										<div class="form-group">
												<select class="selectpicker form-control" style="height: auto; border: 2px solid var(--grundfarbe);font-size: 14px;"
												onchange="softdrinksanzahl()" id="softdrinksanzahl" data-width="auto">
													<option selected>1</option>
													<option >2</option>
													<option >3</option>
													<option >4</option>
													<option >5</option>
													<option >6</option>
													<option >7</option>
													<option >8</option>
												</select>
										</div>
								</div>
							<div class="col-sm-9">
								<div class="form-group">
									<select class="selectpicker form-control" style="height: auto; border: 2px solid var(--grundfarbe);font-size: 14px;"
										onchange="softdrinkswahl()" id="softdrinksoutput" data-width="auto">
										<option id="platzhalter" disabled selected>Getränk wählen</option>
										<option value="1.50" data-img="img/cola.svg" data-name="Cola(0,33l)">Cola 0.33l</option>
										<option value="1.50" data-img="img/colazero.svg" data-name="Cola-Zero(0,33l)">Cola Zero 0.33l</option>
										<option value="1.50" data-img="img/fanta.svg" data-name="Fanta(0,33l)">Fanta 0.33l</option>
										<option value="1.50" data-img="img/sprite.svg" data-name="Sprite(0,33l)">Sprite 0.33l</option>
										<option value="1.50" data-img="img/gerolsteiner.svg" data-name="Gerolsteiner-Naturell(0,33l)">Gerolsteiner Naturell 0.33l</option>
										<option value="1.50" data-img="img/gerolsteinersprudel.svg" data-name="Gerolsteiner-Sprudel(0,33l)">Gerolsteiner Sprudel 0.33l</option>
										<option value="1.00" data-img="img/durstlöscher.svg" data-name="Durstloescher(0,33l)">Durstlöscher 0.5l</option>
										<option value="2.50" data-img="img/redbull.svg" data-name="RedBull(0,25l)">RedBull 0.25l</option>
										<option value="2.50" data-img="img/redbullzero.svg" data-name="RedBull-sugarfree(0,25l)">RedBull sugarfree 0.25l</option>
										<option value="2.50" data-img="img/schwarzedose.svg" data-name="SchwarzeDose(0,25l)">Schwarze Dose 0.25l</option>
										<option value="2.50" data-img="img/moloko.svg" data-name="Moloko(0,25l)">Moloko 0.25l</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="min-width: 100%;">
							<div class="col-sm-12">
								<h5><span id="softdrinksvalueinput" class="badge badge-info" style="background: var(--grundfarbe);"></span></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12" style="min-width: 100%;">
								<button href="#0" id="softdrinksinput" disabled style="min-width: 100%;  background: var(--grundfarbe);" value=""
									class="cd-add-to-cart js-cd-add-to-cart" data-anzahl="1" data-art="" data-img="" data-price="" data-name="Softdrink">In den
									Warenkorb</button>
							</div>
						</div>
						<!--
					<div class="row">
						<div class="col-sm-6" style="min-width: 100%;">
						</div>
						<div class="col-sm-6" style="min-width: 100%; margin-top: 10px;"><a style="background: green; min-width: 100%;" class="cd-add-to-cart"
								id="softdrinks"><i class="fab fa-whatsapp"></i>Sofort-Bestellung</a></div>
					</div>
					-->
					</div>
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="card bg-dark"
					style="width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<img src="img/alkohol.svg" id="alkoholimg" class="card-img-top" alt="..." style="margin: auto; margin-top: 20px; width: 70%;">
					<div class="card-body">
						<h5 class="card-title">Alkoholische Getränke</h5>
						<div class="row" style="min-width: 100%;">
								<div class="col-sm-3" >
										<div class="form-group">
												<select class="selectpicker form-control" style="height: auto; border: 2px solid var(--grundfarbe); font-size: 14px;"
												onchange="alkoholanzahl()" id="alkoholanzahl" data-width="auto">
													<option selected>1</option>
													<option >2</option>
													<option >3</option>
													<option >4</option>
													<option >5</option>
													<option >6</option>
													<option >7</option>
													<option >8</option>
												</select>
										</div>
								</div>
							<div class="col-sm-9">
								<div class="form-group">
									<select class="selectpicker form-control" style="height: auto; border: 2px solid var(--grundfarbe); font-size: 14px;"
										onchange="alkoholwahl()" id="alkoholoutput" data-width="auto">
										<option value="" id="platzhalter" disabled selected>Flasche wählen</option>
										<option value="18.50" data-img="img/threesixty.svg" data-name="ThreeSixty(0,7l)">Three Sixty Vodka 0,7 l</option>
										<option value="18.50" data-img="img/absolutvodka.svg" data-name="Absolout-Vodka(0,7l)">Absolut Vodka 0,7l</option>
										<option value="18.50" data-img="img/bacardi.svg" data-name="Bacardi(0,7l)">Bacardi 0,7l</option>
										<option value="18.50" data-img="img/jimbeam.svg" data-name="JimBeam(0,7l)">Jim Beam 0,7 l</option>
										<option value="24.50" data-img="img/jackdaniels.svg" data-name="JackDaniels(0,7l)">Jack Daniels 0,7 l</option>
									</select>
								</div>
							</div>
						</div>
							<div class="row" style="min-width: 100%;">
							<div class="col-sm-12">
								<h5><span id="alkoholvalueinput" class="badge badge-info" style="color: #fff;
									background: var(--grundfarbe);"></span></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12" style="min-width: 100%;">
								<button href="#0" id="alkoholinput" value="" disabled style="min-width: 100%; background: var(--grundfarbe);"
									class="cd-add-to-cart js-cd-add-to-cart" data-anzahl="1" data-art="" data-img="" data-price="" data-name="Flasche">In den
									Warenkorb</button>
							</div>
						</div>
					</div>
					<!--
					<div class="row">
						<div class="col-sm-6" style="min-width: 100%;">
						</div>
						<div class="col-sm-6" style="min-width: 100%; margin-top: 10px;"><a style="background: green;min-width: 100%;" class="cd-add-to-cart"
								id="classic-shisha"><i class="fab fa-whatsapp"></i>Sofort-Bestellung</a></div>
					</div>
					-->
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="card bg-light"
					style="width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
					<img src="img/snacks.svg" id="snacksimg" class="card-img-top" alt="..." style="margin: auto; margin-top: 20px; width: 70%;">
					<div class="card-body">
						<h5 class="card-title">Snacks</h5>
						<div class="row" style="min-width: 100%;">
								<div class="col-sm-3" >
										<div class="form-group">
												<select class="selectpicker form-control" style="height: auto;border: 2px solid var(--grundfarbe);font-size: 14px;"
												onchange="snacksanzahl()" id="snacksanzahl" data-width="auto">
													<option selected>1</option>
													<option >2</option>
													<option >3</option>
													<option >4</option>
													<option >5</option>
													<option >6</option>
													<option >7</option>
													<option >8</option>
												</select>
										</div>
								</div>
							<div class="col-sm-9">
								<div class="form-group">
									<select class="selectpicker form-control" style="height: auto;border: 2px solid var(--grundfarbe);font-size: 14px;"
										onchange="snackswahl()" id="snacksoutput" data-width="auto">
										<option id="platzhalter" disabled selected>Snack wählen </option>
										<option value="2.00" data-img="img/erdnüsse.svg" data-name="Erdnuesse(150g)">Erdnüsse 150g</option>
										<option value="3.00" data-img="img/nicnacs.svg" data-name="NicNac's(125g)">Nic Nac's 125g</option>
										<option value="3.00" data-img="img/salzbrezel.svg" data-name="Salzbrezel(250g)">Salzbrezel 250g</option>
										<option value="1.50" data-img="img/salzstangen.svg" data-name="Salzstangen(250g)">Salzstangen 250g</option>
										<option value="1.00" data-img="img/chipsfrisch.svg" data-name="Chipsfrisch(50g)">Chipsfrisch Ungarisch 50g</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="min-width: 100%;">
							<div class="col-sm-12">
								<h5><span id="snacksvalueinput" class="badge badge-info" style="background: var(--grundfarbe);"></span></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12" style="min-width: 100%;">
								<button href="#0" id="snacksinput" value="" disabled style="min-width: 100%;background: var(--grundfarbe);"
									class="cd-add-to-cart js-cd-add-to-cart" data-anzahl="1" data-art="" data-img="" data-price="" data-name="Snack">In den
									Warenkorb</button>
							</div>
						</div>
						<!--
					<div class="row">
						<div class="col-sm-6" style="min-width: 100%;">
						</div>
						<div class="col-sm-6" style="min-width: 100%; margin-top: 10px;"><a style="background: green; min-width: 100%;" class="cd-add-to-cart"
								id="snacks"><i class="fab fa-whatsapp"></i>Sofort-Bestellung</a></div>
					</div>
					-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<section id="section06" class="demo" style="background: var(--third);">
	<a href="#menu"><span></span></a>
</section>
<hr class="style-two">
-->
<!-- /////// MENU  /////////// -->
<!--
<div id="menu" class="container-fluid " style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url(img/shisha2.svg) no-repeat center center;">
	<br>
	<br>
	<br>
	<h4 class="">Unsere Gesamtauswahl zum Download oder zum Weitersagen!</h4>
	<div class="middle">
	<div class="row">
	<div class="col-sm-12 ">
		<br>
		<h5>Schau dir unser komplettes Angebot an:</h3>
		<a class="btn_menu" style="text-decoration-line: none; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" 
				href="img/Shisha2you.pdf" download><h3>Shishakarte</h3>
	      </a>
		  <a class="btn_menu" style="text-decoration-line: none; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" 
		  		href="img/Shisha2you.pdf" download><h3>Getränkekarte</h3>
	      </a>
	  </div>
	</div>
  </div>
</div>
-->
<section id="section06" class="demo" style="background: var(--third);">
		<a href="#social-media"><span></span></a>
</section>

<!-- /////// SOCIAL MEDIA  ///////////-->
<hr class="style-two">

<div id="social-media" class="container-fluid " style="background: linear-gradient(
rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url(img/people.svg) no-repeat center center;">
<br>
<br>
<br>
	<h4 >SOCIAL-MEDIA</h4>
	<div class="middle">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<p><a class="btn_s" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);"
						href="https://wa.me/491787293347">
						<i class="fab fa-whatsapp"></i>
					</a></p>
			</div>
			<div class="col-sm-3">
				<p>
					<a class="btn_s" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);"
						href="https://www.instagram.com/shisha2you_de/?hl=de">
						<i class="fab fa-instagram"></i>
					</a></p>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<!-- SnapWidget 
		<div class="middle">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<script src="https://snapwidget.com/js/snapwidget.js"></script>
					<iframe src="https://snapwidget.com/embed/808847" class="snapwidget-widget" 
					allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		-->
  </div>
</div>

<section id="section06" class="demo" style="background: var(--third);">
		<a href="#lieferzeiten"><span></span></a>
</section>

<!-- ///////// Lieferzeiten  /////// -->
<hr class="style-two">
<div id="lieferzeiten" class="container-fluid" style="background: linear-gradient(
	rgb(255, 255, 255, 0.7),rgba(255, 255, 255, 0.9)),url(img/moto.svg) no-repeat center center;">
		<br>
		<br>
  <h4>LIEFERZEITEN</h4>
  <div class="card" style="width: 100%; border-radius: 2rem; background: rgba(255, 255, 255, 0); box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
	<div class="card-body">
		<div style="text-align: center;">
			<p><h4>Montags - Donnerstag & Sonntags</h4></p>
			<p><h5><b>Vermietung ab 15:00 Uhr -  Abholung bis spätestens 23:00 Uhr</b></h5></p>
			<br>
			<hr class="style-two">
			<p><h4>Freitags - Samstags</h4></p>
			<p><h5><b>Vermietung ab 15:00 Uhr -  Abholung bis spätestens 02:00 Uhr am folgenden Tag</b></h5></p>
</div>
	</div>
</div>
</div>
<section id="section06" class="demo" style="background: var(--third);">
	<a href="#kontakt"><span></span></a>
</section>

<hr class="style-two">
<div id="kontakt" class="container-fluid " style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url(img/phone.svg) no-repeat center center;">
<h4 class="">KONTAKT</h4>
  <h5>Kontaktieren Sie uns per Telefon oder E-Mail.</h5>
  <div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-3"><p><a class="btn_s" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" href="tel:+49 178 7293347"><i class="material-icons">phone</i></a><h3>+49 178 7293347</h3></p></div>
	<div class="col-sm-3">
		<p><a class="btn_s" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" href="mailto:info@shisha2you.de?subject=Kontaktanfrage"><i class="material-icons">email</i> </a><h3>info@shisha2you.de</h3></p>
	</div>
		<div class="col-sm-3"></div>
	</div>

</div>
<section id="section06" class="demo" style="background: var(--third);">
	<a href="#anfahrt"><span></span></a>
</section>

<!-- ///////// ANFAHRT /////// -->
<hr class="style-two">
<div id="anfahrt" class="container-fluid " style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url(img/moto2.svg) no-repeat center center;">
	<h4 class="">Anfahrt</h4>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
					<a class="btn_s" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);" href="https://www.google.de/maps/dir//Marschnerstra%C3%9Fe+3,+Hannover/@52.3820933,9.7242013,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47b074a21a03ac51:0xf23719046d379c07!2m2!1d9.72639!2d52.38209!3e0"><i class="material-icons" size="large" >directions</i></a>
		</div>
		<div class="col-sm-3">	
			<a class="navi" href="https://www.google.de/maps/dir//Marschnerstra%C3%9Fe+3,+Hannover/@52.3820933,9.7242013,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47b074a21a03ac51:0xf23719046d379c07!2m2!1d9.72639!2d52.38209!3e0">Marschnerstraße 3 <br>30167 Hannover</a>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

<!--///////// FOOTER ///////////-->
<hr class="style-two">
<footer class="container-fluid text-center" style="background: linear-gradient(
	rgb(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)) no-repeat center center; color: var(--grundfarbe); padding-bottom: 20px;">
  <!-- <p><a style="font-size: 12px;" href="#myModal2" class="links" id="modal-trigger2" data-toggle="modal">Allgemeine Geschäftsbedingungen</a></p> -->
  <p><a style="font-size: 12px;" href="AGB.html" class="links" target="_blank">Allgemeine Geschäftsbedingungen</a></p>
  <p><a style="font-size: 12px;" href="Datenschutz.html" class="links" target="_blank">Datenschutzerklärung</a></p>
  <p><a style="font-size: 12px;" href="Impressum.html" class="links" target="_blank">Impressum</a></p>
  <hr class="style-two">
  <p style="margin-top: 20px;;">Copyright © 2020 <a style="color: var(--grundfarbe)" href="Impressum.html" target="_blank" title="shisha2you">shisha2you</a>. </br>Alle Rechte vorbehalten.</p>
</footer>

<!-- /////// NAVIGATE TOP BUTTON /////-->
<button class="back-to-top" id="myBtn" style="border: 1px solid var(--secondary);" title="Go to top"><i class="material-icons">vertical_align_top</i></button>

<!--////////// WARENKORB //////////-->
<div class="cd-cart cd-cart--empty js-cd-cart">
	<a href="#0" class="cd-cart__trigger text-replace">
		Warenkorb
		<ul class="cd-cart__count"> <!-- cart items count -->
			<li>0</li>
			<li>0</li>
		</ul> <!-- .cd-cart__count -->
	</a>

	<div class="cd-cart__content">
		<div class="cd-cart__layout">
			<header class="cd-cart__header">
				<h2 style="color: var(--grundfarbe);">Warenkorb</h2>
				<span class="cd-cart__undo" style="font-size: 14px;">Auswahl entfernt.<a href="#0">Rückgängig</a></span>
			</header>
			
			<div class="cd-cart__body">
				<ul id="warenkorb">
					<!-- products added to the cart will be inserted here using JavaScript -->
				</ul>
				
			</div>
			<div style="border:1px solid var(--grundfarbe);">
				<h5 style="margin-bottom: 0px; padding-left: 12.5px;padding-bottom: 5px; font-size:small;"><b style="text-decoration: line-through;">zzgl. Lieferkosten von 3.00 €</b> Aktion!</h5>
				<hr class="style-two">
					<form class="was-validated" action=" " style="padding-top: 5px;">
					 	<div class="form-group form-check">
						  <label class="form-check-label" style="font-size:small;" id="agb_label">
							<input class="form-check-input" style="margin: 0;position: relative;" id="agb" type="checkbox" name="remember" required> Ich akzeptiere die 
							<!--<a href="#myModal2" class="links" id="modal-trigger2" data-toggle="modal">AGBs von Shisha2you</a><div class="valid-feedback">AGBs akzeptiert.</div>-->
							<a href="AGB.html" class="links" target="_blank">AGBs.</a>
							<!--<div class="valid-feedback">AGBs akzeptiert.</div>
							<div class="invalid-feedback">AGBs müssen vor Bestellung akzeptiert werden.</div> -->
						  </label>
						</div>
					</form>
					<form class="was-validated" action=" ">
						<div class="form-group form-check">
							  <label class="form-check-label" style="font-size:small;" id="alter_label">
								<input class="form-check-input" style="margin: 0;position: relative;" id="alter" type="checkbox" name="remember" required> Ich bin 18 Jahre oder älter.
							<!--	<div class="invalid-feedback">Alter muss bestätigt werden</div>
								<div class="valid-feedback">Alter bestätigt.</div> -->
							  </label>
						</div>
					</form>
					<form class="was-validated" action=" ">
						<div class="form-group form-check">
							<label class="form-check-label" style="font-size:small;" id="widerruf_label">
									<input class="form-check-input" style="margin: 0;position: relative;" id="widerruf" type="checkbox" name="remember" required> Ich akzeptiere die 
									<!--<a href="#myModal2" class="links" id="modal-trigger2" data-toggle="modal">AGBs von Shisha2you</a>.<div class="valid-feedback">AGBs akzeptiert.</div>-->
									<a href="img/Widerrufsbelehrung_und_Formular_Shisha2you.pdf" class="links" target="_blank">Widerrufsbelehrung.</a>
								<!--	<div class="invalid-feedback">Widerrufsbelehrung muss bestätigt werden</div>
								<div class="valid-feedback">Widerrufsbelehrung bestätigt.</div> -->
							</label>
						</div>
					</form>
			</div>
			<footer class="cd-cart__footer" >
				
				<a style="font-size: 16px; background: #25d366;color: white;" class="cd-cart__checkout" target="_blank" id="warenkorb-whatsapp" onclick="return getWarenkorb()">
          <em><i class="fab fa-whatsapp"></i> WhatsApp-Bestellung - €<span>0</span><div class="icon"></div>
            <!--<svg class="icon icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
            </svg>-->
		  </em>
		</a>
			</footer>
		</div>
	</div> <!-- .cd-cart__content -->
</div> <!-- cd-cart -->

<!--####### POPUPs #######-->
<div class="cd-popup" id="cd-widerruf" role="alert">
	<div class="cd-popup-container">
	   <p>Bitte akzeptiere die Widerrufsbelehrung von Shisha2you, um die Bestellung fortzufahren.</p>
	   <ul class="cd-buttons">
		  <li><a href="#0" onclick="hidePopup('widerruf','bestätigen')">Bestätigen</a></li>
		  <li><a href="#0" onclick="hidePopup('widerruf','schließen')">Schließen</a></li>
	   </ul>
	   <a href="#0" class="cd-popup-close img-replace" onclick="hidePopup('widerruf','bestätigen')"></a>
	</div> <!-- cd-popup-container -->
 </div> <!-- cd-popup -->
 <div class="cd-popup" id="cd-alter" role="alert">
	<div class="cd-popup-container">
	   <p>Bitte bestätige dein Alter, um die Bestellung fortzufahren.</p>
	   <ul class="cd-buttons">
		  <li><a href="#0" onclick="hidePopup('alter','bestätigen')">Ich bin älter als 18 Jahre</a></li>
		  <li><a href="#0" onclick="hidePopup('alter','schließen')">Schließen</a></li>
	   </ul>
	   <a href="#0" class="cd-popup-close img-replace" onclick="hidePopup('alter','bestätigen')"></a>
	</div> <!-- cd-popup-container -->
 </div> <!-- cd-popup -->
 <div class="cd-popup" id="cd-agb" role="alert">
	<div class="cd-popup-container">
	   <p>Bitte akzeptiere die AGBs von Shisha2you, um die Bestellung fortzufahren.</p>
	   <ul class="cd-buttons">
		  <li><a href="#0" onclick="hidePopup('agb','bestätigen')">Bestätigen</a></li>
		  <li><a href="#0" onclick="hidePopup('agb','schließen')">Schließen</a></li>
	   </ul>
	   <a href="#0" class="cd-popup-close img-replace" onclick="hidePopup('agb','bestätigen')"></a>
	</div> <!-- cd-popup-container -->
 </div> <!-- cd-popup -->
</main>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/snap.svg-min.js"></script> 
<script src="js/main.js"></script> <!-- Resource jQuery -->

 <!-- 
<script type="text/javascript" id="cookieinfo"
src="js/cookieinfo.min.js"
data-bg="#645862"
data-fg="#FFFFFF"
data-link="#F1D600"
data-cookie="CookieInfoScript"
data-text-align="left"
data-close-text="Got it!">
</script>
-->


</body>
</html>

<!--///////// SCRIPTE ///////////-->
<script>
	// ##### Wiegehtdas SLIDER ######
	var slideIndex = 0;
	showSlides();
	
	function showSlides() {
	  var i;
	  var slides = document.getElementsByClassName("wiegehtdas");
	  for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	  }
	  slideIndex++;
	  if (slideIndex > slides.length) {slideIndex = 1}    
	  
	  slides[slideIndex-1].style.display = "block";  
	  setTimeout(showSlides, 4500); // Change image every 2 seconds
	}
	</script>

<script>
	// ##### NAVIGATE TOP BUTTON ######
	$(document).ready(function(){
	  // Add smooth scrolling to all links in navbar + footer link
	  $(".navbar a, footer a[href='#top']").on('click', function(event) {
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
		  // Prevent default anchor click behavior
		  event.preventDefault();
		  // Store hash
		  var hash = this.hash;
		  // Using jQuery's animate() method to add smooth page scroll
		  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
		  $('html, body').animate({
			scrollTop: $(hash).offset().top
		  }, 300, function(){
	   
			// Add hash (#) to URL when done scrolling (default click behavior)
			window.location.hash = hash;
		  });
		} // End if
	  });
	  
	  $(window).scroll(function() {
		$(".slideanim").each(function(){
		  var pos = $(this).offset().top;
		  var winTop = $(window).scrollTop();
			if (pos < winTop + 300) {
			  $(this).addClass("slide");
			}
		});
	  });
	})
</script>

	<script type="text/javascript">
	//#### COOKIE Meldung ######
		$(document).ready(function(){   
			var cookie = decodeURIComponent(document.cookie);
			if (cookie == "") {
				console.log(cookie);
				setTimeout(function () {
				$("#cookieConsent").fadeIn(200);
			 		}, 4000);
			 	$("#closeCookieConsent, .cookieConsentOK").click(function() {
					//document.cookie = "username=checked,Thu, 18 Dec 2019 12:00:00 UTC,path=/";
					$("#cookieConsent").fadeOut(200);
				});
				
			}
			else {console.log("else:" + cookie);}
			 
	}); 
	</script>

<!-- LOCATION SEND-->
<script type="text/javascript">
$(document).ready(function(){
	navigator.geolocation.getCurrentPosition(showPosition);
	function showPosition(position) {
		  positionx = position.coords.latitude; 
		  positiony = position.coords.longitude;
		}
});
</script>

<script>
		function getWarenkorb() {
			console.log("Funktion drin");
			var items = document.getElementsByClassName("cd-cart__product");
			var menge = document.getElementsByClassName("reset");
			var warenausgang = document.getElementById("warenkorb-whatsapp");
			var agbs = document.getElementById("agb");
			var alter = document.getElementById("alter");
			var widerruf = document.getElementById("widerruf");
			var x = 'https://wa.me/491787293347?text=Hallo%20Team%20Shisha2you,%20ich%20moechte%20gerne%20Folgendes%20bestellen:'; //"%201x%20Classic-Shisha%20Social-Smoke%20LemonFresh%20an%20folgende%20Adresse%20liefern:%20" + "https://maps.google.com/?q=" + position.coords.latitude + "," +  position.coords.longitude;
			var gesamtpreis = 0;
			lieferkosten = 0; 
			var shisha = "";
			document.getElementById("alter_label").style.color = "#FFFFFF";
			document.getElementById("agb_label").style.color = "#FFFFFF";
			document.getElementById("widerruf_label").style.color = "#FFFFFF";

			if (widerruf.checked){
				document.getElementById("widerruf_label").style.background = "#49b675";
			if (alter.checked){
				document.getElementById("alter_label").style.background = "#49b675";
			if (agbs.checked){
				document.getElementById("agb_label").style.background = "#49b675";
			for (i = 0; i < items.length; i++) {

				if (items[i].getAttribute('data-art') != ""  ){ 
					var shisha = "shisha"; 
				}else{}
				x = x + "%20" + menge[i].value + "x%20*" + items[i].getAttribute('data-art') + "*%20" + items[i].getAttribute('data-name') + "%20" + parseFloat(items[i].getAttribute('data-price')) + "€%20";
				console.log("Link: " + x);
				gesamtpreis = gesamtpreis + parseFloat(items[i].getAttribute('data-price')*menge[i].value);
				
				console.log("Gesamtpreis " + gesamtpreis);
				}
			
				if (shisha != ""){
				gesamtpreis = gesamtpreis + lieferkosten
				x = x + "für%20den%20Gesamtpreis:%20" + gesamtpreis + "€ inkl. Lieferkosten.%20";
				
				if (window.hasOwnProperty("positionx")) {
					x = x + "Bitte%20an%20folgenden%20Standort%20liefern:%20https://maps.google.com/?q=" + positionx + "," + positiony;
					x = x + "%20%20PayPal-Zahlung:%20https://www.paypal.me/shisha2you/" + gesamtpreis;
					x = x + "%20Bitte: würde mich freuen wenn du die Zahlung als „an Freunde“ tätigst. ";
					x = x + "%20Barzahlung bei Lieferung möglich.";
					warenausgang.href = x;
					console.log("Gesamtlink " + x);
					return true
				} else {
					x = x + "%20%20PayPal-Zahlung:%20https://www.paypal.me/shisha2you/" + gesamtpreis;
					x = x + "%20Bitte: würde mich freuen wenn du die Zahlung als „an Freunde“ tätigst. ";
					x = x + "%20Barzahlung bei Lieferung möglich. ";
					x = x + "Bitte%20an%20folgende%20Adresse%20liefern:%20%20%20%20%20";
					warenausgang.href = x;
					return true
					
				};
				function showPosition(position) {
					positionx= position.coords.latitude;
					positiony= position.coords.longitude;
					x = x + "Bitte%20an%20folgenden%20Standort%20liefern:%20https://maps.google.com/?q=" + positionx + "," + positiony;
					warenausgang.href = x;
					console.log("Gesamtlink " + x);
					return true
				}
				
				} else {
					alert("Bestellung erst bei mind. einer Shisha möglich.");
					return false
				}
			}else {
				document.getElementById("agb_label").style.background = "#DE1738";
				document.getElementById("cd-agb").style.visibility = "visible";
				document.getElementById("cd-agb").style.opacity = 1;
				// alert("Sie müssen die AGBs zustimmen, um die Bestellung aufzugeben.");
				return false
			}
			}else {
				if (agbs.checked){
					document.getElementById("agb_label").style.background = "#49b675";} 
				else {
					document.getElementById("agb_label").style.background = "#DE1738";}

				document.getElementById("alter_label").style.background = "#DE1738";
				document.getElementById("cd-alter").style.visibility = "visible";
				document.getElementById("cd-alter").style.opacity = 1;
				// alert("Sie müssen erst Bestätigen, dass Sie 18 Jahre oder älter sind.");
				return false
			}
			}else {
				if (alter.checked){
					document.getElementById("alter_label").style.background = "#49b675";}
				else {
					document.getElementById("alter_label").style.background = "#DE1738";}
				if (agbs.checked){
					document.getElementById("agb_label").style.background = "#49b675";} 
				else {
					document.getElementById("agb_label").style.background = "#DE1738";}

				document.getElementById("widerruf_label").style.background = "#DE1738";
				document.getElementById("cd-widerruf").style.visibility = "visible";
				document.getElementById("cd-widerruf").style.opacity = 1;
				// alert("Sie müssen erst die Widerufsbelehrung akzeptieren, um mit der Bestellung fortzufahren.");
				return false
			}
			
		}

</script>
<script>
	function hidePopup(typ, event) { 
			if(typ == 'widerruf') {
				if (event == 'bestätigen') {
					document.getElementById("widerruf").checked = true;
					document.getElementById("widerruf_label").style.background = "#49b675";
					document.getElementById("cd-widerruf").style.visibility = "hidden";
					document.getElementById("cd-widerruf").style.opacity = 0;
				}
				if (event == 'schließen') {
					document.getElementById("cd-widerruf").style.visibility = "hidden";
					document.getElementById("cd-widerruf").style.opacity = 0;
				}
			}
			if(typ == 'agb') {
				if (event == 'bestätigen') {
					document.getElementById("agb").checked = true;
					document.getElementById("agb_label").style.background = "#49b675";
					document.getElementById("cd-agb").style.visibility = "hidden";
					document.getElementById("cd-agb").style.opacity = 0;
				}
				if (event == 'schließen') {
					document.getElementById("cd-agb").style.visibility = "hidden";
					document.getElementById("cd-agb").style.opacity = 0;
				}
			}
			if(typ == 'alter') {
				if (event == 'bestätigen') {
					document.getElementById("alter").checked = true;
					document.getElementById("alter_label").style.background = "#49b675";
					document.getElementById("cd-alter").style.visibility = "hidden";
					document.getElementById("cd-alter").style.opacity = 0;
				}
				if (event == 'schließen') {
					document.getElementById("cd-alter").style.visibility = "hidden";
					document.getElementById("cd-alter").style.opacity = 0;
				}
			}
	}
</script>
<script>
		function classicshishawahl() {
		//Getting Value
		var selObj = document.getElementById("classicshishaoutput");
		var selObj2 = document.getElementById("classicshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj.options[selObj.selectedIndex].getAttribute("data-tabak");
		var selValue5 = selObj2.options[selObj2.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("classicshishainput").disabled = false;
		}
		console.log(selValue);
		//Setting Value
		document.getElementById("classicshishainput").value = selValue;
		document.getElementById("classicshishainput").setAttribute('data-img', selValue3);
		document.getElementById("classictabak").innerHTML = selValue4;
		document.getElementById("classicanzahlpreis").value = selValue*selValue5;
	}
	function classicshishaanzahl() { 
		var selObj = document.getElementById("classicshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		document.getElementById("classicshishainput").setAttribute('data-anzahl', selValue);
		document.getElementById("classicanzahlpreis").innerHTML = selValue*10.00 + " €";
	}
	function premiumshishawahl() {
		//Getting Value
		var selObj = document.getElementById("premiumshishaoutput");
		var selObj2 = document.getElementById("premiumshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj.options[selObj.selectedIndex].getAttribute("data-tabak");
		var selValue5 = selObj2.options[selObj2.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("premiumshishainput").disabled = false;
		}
		//Setting Value
		document.getElementById("premiumshishainput").value = selValue;
		document.getElementById("premiumshishainput").setAttribute('data-img', selValue3);
		document.getElementById("premiumtabak").innerHTML = selValue4;
		document.getElementById("premiumanzahlpreis").value = selValue*selValue5;
	}
	function premiumshishaanzahl() { 
		var selObj = document.getElementById("premiumshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		document.getElementById("premiumshishainput").setAttribute('data-anzahl', selValue);
		document.getElementById("premiumanzahlpreis").innerHTML = selValue*13.00 + " €";
	}
	function exclusivshishawahl() {
		//Getting Value
		var selObj = document.getElementById("exclusivshishaoutput");
		var selObj2 = document.getElementById("exclusivshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj.options[selObj.selectedIndex].getAttribute("data-tabak");
		var selValue5 = selObj2.options[selObj2.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("exclusivshishainput").disabled = false;
		}
		//Setting Value
		document.getElementById("exclusivshishainput").value = selValue;
		document.getElementById("exclusivshishainput").setAttribute('data-img', selValue3);
		document.getElementById("exclusivtabak").innerHTML = selValue4;
		document.getElementById("exclusivanzahlpreis").value = selValue*selValue5;
		
	}
	function exclusivshishaanzahl() { 
		var selObj = document.getElementById("exclusivshishaanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		document.getElementById("exclusivshishainput").setAttribute('data-anzahl', selValue);
		document.getElementById("exclusivanzahlpreis").innerHTML = selValue*15.00 + " €";
	}
	function checkexclusiv(){
		
	}
	function softdrinkswahl() {
		//Getting Value
		var selObj = document.getElementById("softdrinksoutput");
		var selObj2 = document.getElementById("softdrinksoutput").value;
		var selObj3 = document.getElementById("softdrinksanzahl");
		var selValue = selObj.options[selObj.selectedIndex].getAttribute("data-name");
		var selValue2 = selObj.options[selObj.selectedIndex].value;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj3.options[selObj3.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("softdrinksinput").disabled = false;
		}
		//Setting Value
		document.getElementById("softdrinksinput").value = selValue;
		document.getElementById("softdrinksvalueinput").innerHTML = selObj2*selValue4 + " €";
		document.getElementById("softdrinksinput").setAttribute('data-price', selValue2);
		document.getElementById("softdrinksinput").setAttribute('data-img', selValue3);
		document.getElementById("softdrinksimg").src = selValue3;
	}
	function softdrinksanzahl() { 
		var selObj = document.getElementById("softdrinksanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue2 = document.getElementById("softdrinksoutput").value;

		document.getElementById("softdrinksinput").setAttribute('data-anzahl', selValue);
		document.getElementById("softdrinksvalueinput").innerHTML = selValue*selValue2 + " €";
	}
	function alkoholwahl() {
		//Getting Value
		var selObj = document.getElementById("alkoholoutput");
		var selObj2 = document.getElementById("alkoholoutput").value;
		var selObj3 = document.getElementById("alkoholanzahl");
		var selValue = selObj.options[selObj.selectedIndex].getAttribute("data-name");
		var selValue2 = selObj.options[selObj.selectedIndex].value;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj3.options[selObj3.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("alkoholinput").disabled = false;
		}
		//Setting Value
		document.getElementById("alkoholinput").value = selValue;
		document.getElementById("alkoholvalueinput").innerHTML = selObj2*selValue4 + " €";
		document.getElementById("alkoholinput").setAttribute('data-price', selValue2);
		document.getElementById("alkoholinput").setAttribute('data-img', selValue3);
		document.getElementById("alkoholimg").src = selValue3;
	}
	function alkoholanzahl() { 
		var selObj = document.getElementById("alkoholanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue2 = document.getElementById("alkoholoutput").value;

		document.getElementById("alkoholinput").setAttribute('data-anzahl', selValue);
		document.getElementById("alkoholvalueinput").innerHTML = selValue*selValue2 + " €";
	}
	function snackswahl() {
		//Getting Value
		var selObj = document.getElementById("snacksoutput");
		var selObj2 = document.getElementById("snacksoutput").value;
		var selObj3 = document.getElementById("snacksanzahl");
		var selValue = selObj.options[selObj.selectedIndex].getAttribute("data-name");
		var selValue2 = selObj.options[selObj.selectedIndex].value;
		var selValue3 = selObj.options[selObj.selectedIndex].getAttribute("data-img");
		var selValue4 = selObj3.options[selObj3.selectedIndex].text;
		var selValue6 = selObj.options[selObj.selectedIndex].id;
		if (selValue6 != "platzhalter"){
			document.getElementById("snacksinput").disabled = false;
		}
		//Setting Value
		document.getElementById("snacksinput").value = selValue;
		document.getElementById("snacksvalueinput").innerHTML = selObj2*selValue4 + " €";
		document.getElementById("snacksinput").setAttribute('data-price', selValue2);
		document.getElementById("snacksinput").setAttribute('data-img', selValue3);
		document.getElementById("snacksimg").src = selValue3;
	}
	function snacksanzahl() { 
		var selObj = document.getElementById("snacksanzahl");
		var selValue = selObj.options[selObj.selectedIndex].text;
		var selValue2 = document.getElementById("snacksoutput").value;

		document.getElementById("snacksinput").setAttribute('data-anzahl', selValue);
		document.getElementById("snacksvalueinput").innerHTML = selValue*selValue2 + " €";
	}
</script>