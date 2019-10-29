(function ($) {
  $(document).ready(function(){
	/*
    // hide .navbar first
    $(".navbar2").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 40) {
                $('.navbar2').fadeIn();
            } else {
                $('.navbar2').fadeOut();
            }
        });
	});
	$(function () {
        
	});
	$(function() {
		$('a[href*=#]').on('click', function(e) {
		  e.preventDefault();
		  $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
		});
	  });
*/
});
  /*
  $(document).ready(function(){
  	// HIDE LOGO 

    // hide .navbar first
    $(".logo_mitte").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 40) {
                $('.logo_mitte').fadeIn();
                $('.logo_links').fadeOut();
            } else {
            	$('.logo_links').fadeIn();
                $('.logo_mitte').fadeOut();

            }
        });
    });

});*/
  }(jQuery));

(function ($) {
$(document).ready(function(){
	$(window).scroll(function () {

				// set distance user needs to scroll before we start fadeIn
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
		});
	// Funktionen für das Scroll-Verhalten
	$(function () {
		$('.cd-nav-trigger').click(function () { // Klick auf den Button
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	$(function () {
		$('.back-to-top').click(function () { // Klick auf den Button
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});

}(jQuery));

//// Modal NEU Funktionen /////
jQuery(document).ready(function(){
	var modalTriggerBts = $('a[data-type="cd-modal-trigger"]'),
		coverLayer = $('.cd-cover-layer');
	
	/*
		convert a cubic bezier value to a custom mina easing
		http://stackoverflow.com/questions/25265197/how-to-convert-a-cubic-bezier-value-to-a-custom-mina-easing-snap-svg
	*/
	var duration = 600,
		epsilon = (1000 / 60 / duration) / 4,
		firstCustomMinaAnimation = bezier(.63,.35,.48,.92, epsilon);

	modalTriggerBts.each(function(){
		initModal($(this));
	});

	function initModal(modalTrigger) {
		var modalTriggerId =  modalTrigger.attr('id'),
			modal = $('.cd-modal[data-modal="'+ modalTriggerId +'"]'),
			svgCoverLayer = modal.children('.cd-svg-bg'),
			paths = svgCoverLayer.find('path'),
			pathsArray = [];
		//store Snap objects
		pathsArray[0] = Snap('#'+paths.eq(0).attr('id')),
		pathsArray[1] = Snap('#'+paths.eq(1).attr('id')),
		pathsArray[2] = Snap('#'+paths.eq(2).attr('id'));

		//store path 'd' attribute values	
		var pathSteps = [];
		pathSteps[0] = svgCoverLayer.data('step1');
		pathSteps[1] = svgCoverLayer.data('step2');
		pathSteps[2] = svgCoverLayer.data('step3');
		pathSteps[3] = svgCoverLayer.data('step4');
		pathSteps[4] = svgCoverLayer.data('step5');
		pathSteps[5] = svgCoverLayer.data('step6');
		
		//open modal window
		modalTrigger.on('click', function(event){
			event.preventDefault();
			modal.addClass('modal-is-visible');
			coverLayer.addClass('modal-is-visible');
			animateModal(pathsArray, pathSteps, duration, 'open');
		});

		//close modal window
		modal.on('click', '.modal-close', function(event){
			event.preventDefault();
			modal.removeClass('modal-is-visible');
			coverLayer.removeClass('modal-is-visible');
			animateModal(pathsArray, pathSteps, duration, 'close');
		});
	}

	function animateModal(paths, pathSteps, duration, animationType) {
		var path1 = ( animationType == 'open' ) ? pathSteps[1] : pathSteps[0],
			path2 = ( animationType == 'open' ) ? pathSteps[3] : pathSteps[2],
			path3 = ( animationType == 'open' ) ? pathSteps[5] : pathSteps[4];
		paths[0].animate({'d': path1}, duration, firstCustomMinaAnimation);
		paths[1].animate({'d': path2}, duration, firstCustomMinaAnimation);
		paths[2].animate({'d': path3}, duration, firstCustomMinaAnimation);
	}

	function bezier(x1, y1, x2, y2, epsilon){
		//https://github.com/arian/cubic-bezier
		var curveX = function(t){
			var v = 1 - t;
			return 3 * v * v * t * x1 + 3 * v * t * t * x2 + t * t * t;
		};

		var curveY = function(t){
			var v = 1 - t;
			return 3 * v * v * t * y1 + 3 * v * t * t * y2 + t * t * t;
		};

		var derivativeCurveX = function(t){
			var v = 1 - t;
			return 3 * (2 * (t - 1) * t + v * v) * x1 + 3 * (- t * t * t + 2 * v * t) * x2;
		};

		return function(t){

			var x = t, t0, t1, t2, x2, d2, i;

			// First try a few iterations of Newton's method -- normally very fast.
			for (t2 = x, i = 0; i < 8; i++){
				x2 = curveX(t2) - x;
				if (Math.abs(x2) < epsilon) return curveY(t2);
				d2 = derivativeCurveX(t2);
				if (Math.abs(d2) < 1e-6) break;
				t2 = t2 - x2 / d2;
			}

			t0 = 0, t1 = 1, t2 = x;

			if (t2 < t0) return curveY(t0);
			if (t2 > t1) return curveY(t1);

			// Fallback to the bisection method for reliability.
			while (t0 < t1){
				x2 = curveX(t2);
				if (Math.abs(x2 - x) < epsilon) return curveY(t2);
				if (x > x2) t0 = t2;
				else t1 = t2;
				t2 = (t1 - t0) * .5 + t0;
			}

			// Failure
			return curveY(t2);

		};
	};
});

//// Modal Impressum Funktionen /////
jQuery(document).ready(function($){
	//trigger the animation - open modal window
	$('[data-type="modal-trigger"]').on('click', function(){
		var actionBtn = $(this),
			scaleValue = retrieveScale(actionBtn.next('.cd-modal-bg'));
		
		actionBtn.addClass('to-circle');
		actionBtn.next('.cd-modal-bg').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			animateLayer(actionBtn.next('.cd-modal-bg'), scaleValue, true);
		});

		//if browser doesn't support transitions...
		if(actionBtn.parents('.no-csstransitions').length > 0 ) animateLayer(actionBtn.next('.cd-modal-bg'), scaleValue, true);
	});

	//trigger the animation - close modal window
	$('.cd-section .cd-modal-close').on('click', function(){
		closeModal();
	});
	$(document).keyup(function(event){
		if(event.which=='27') closeModal();
	});

	$(window).on('resize', function(){
		//on window resize - update cover layer dimention and position
		if($('.cd-section.modal-is-visible').length > 0) window.requestAnimationFrame(updateLayer);
	});

	function retrieveScale(btn) {
		var btnRadius = btn.width()/2,
			left = btn.offset().left + btnRadius,
			top = btn.offset().top + btnRadius - $(window).scrollTop(),
			scale = scaleValue(top, left, btnRadius, $(window).height(), $(window).width());

		btn.css('position', 'fixed').velocity({
			top: top - btnRadius,
			left: left - btnRadius,
			translateX: 0,
		}, 0);

		return scale;
	}

	function scaleValue( topValue, leftValue, radiusValue, windowW, windowH) {
		var maxDistHor = ( leftValue > windowW/2) ? leftValue : (windowW - leftValue),
			maxDistVert = ( topValue > windowH/2) ? topValue : (windowH - topValue);
		return Math.ceil(Math.sqrt( Math.pow(maxDistHor, 2) + Math.pow(maxDistVert, 2) )/radiusValue);
	}

	function animateLayer(layer, scaleVal, bool) {
		layer.velocity({ scale: scaleVal }, 400, function(){
			$('body').toggleClass('overflow-hidden', bool);
			(bool) 
				? layer.parents('.cd-section').addClass('modal-is-visible').end().off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend')
				: layer.removeClass('is-visible').removeAttr( 'style' ).siblings('[data-type="modal-trigger"]').removeClass('to-circle');
		});
	}

	function updateLayer() {
		var layer = $('.cd-section.modal-is-visible').find('.cd-modal-bg'),
			layerRadius = layer.width()/2,
			layerTop = layer.siblings('.btn').offset().top + layerRadius - $(window).scrollTop(),
			layerLeft = layer.siblings('.btn').offset().left + layerRadius,
			scale = scaleValue(layerTop, layerLeft, layerRadius, $(window).height(), $(window).width());
		
		layer.velocity({
			top: layerTop - layerRadius,
			left: layerLeft - layerRadius,
			scale: scale,
		}, 0);
	}

	function closeModal() {
		var section = $('.cd-section.modal-is-visible');
		section.removeClass('modal-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			animateLayer(section.find('.cd-modal-bg'), 1, false);
		});
		//if browser doesn't support transitions...
		if(section.parents('.no-csstransitions').length > 0 ) animateLayer(section.find('.cd-modal-bg'), 1, false);
	}
});

/*
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
const lines = document.querySelectorAll('.line');

hamburger.addEventListener("click",  () => {
	navLinks.classList.toggle("open");
});

navLinks.addEventListener("click",  () => {
	navLinks.classList.toggle("open");
});
*/


// WARENKORB FUNKTIONEN
(function(){
	// Add to Cart Interaction - by CodyHouse.co
	var cart = document.getElementsByClassName('js-cd-cart');

	if(cart.length > 0) {
		var cartAddBtns = document.getElementsByClassName('js-cd-add-to-cart'),
			cartBody = cart[0].getElementsByClassName('cd-cart__body')[0],
			cartList = cartBody.getElementsByTagName('ul')[0],
			cartListItems = cartList.getElementsByClassName('cd-cart__product'),
			cartTotal = cart[0].getElementsByClassName('cd-cart__checkout')[0].getElementsByTagName('span')[0],
			cartCount = cart[0].getElementsByClassName('cd-cart__count')[0],
			cartCountItems = cartCount.getElementsByTagName('li'),
			/*menge = 1;
			item = 0;
			for (var i = 0; i < cartCountItems.length; i++) {
				
				var item = item + document.getElementById("menge" + menge).value;
				menge = menge + 1;
			}
			cartCountItems = cartCountItems*item;
			*/
			cartUndo = cart[0].getElementsByClassName('cd-cart__undo')[0],
			productIdId = 0, //this is a placeholder -> use your real product ids instead
			//productPrice =  document.getElementsByClassName('js-cd-add-to-cart');
			
			cartTimeoutId = false,
			animatingQuantity = false;
		  initCartEvents();
  
  
		  function initCartEvents() {
			  // add products to cart
			  for(var i = 0; i < cartAddBtns.length; i++) {(function(i){
				  cartAddBtns[i].addEventListener('click', addToCart);
			  })(i);}
  
			  // open/close cart
			  cart[0].getElementsByClassName('cd-cart__trigger')[0].addEventListener('click', function(event){
				  event.preventDefault();
				  toggleCart();
			  });
			  
			  cart[0].addEventListener('click', function(event) {
				  if(event.target == cart[0]) { // close cart when clicking on bg layer
					  toggleCart(true);
				  } else if (event.target.closest('.cd-cart__delete-item')) { // remove product from cart
					  event.preventDefault();
					  removeProduct(event.target.closest('.cd-cart__product'));
				  }
			  });
  
			  // update product quantity inside cart
			  cart[0].addEventListener('change', function(event) {
				  if(event.target.tagName.toLowerCase() == 'select') quickUpdateCart();
			  });
  
			  //reinsert product deleted from the cart
			  cartUndo.addEventListener('click', function(event) {
				  if(event.target.tagName.toLowerCase() == 'a') {
					  event.preventDefault();
					  if(cartTimeoutId) clearInterval(cartTimeoutId);
					  // reinsert deleted product
					  var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted')[0];
					  Util.addClass(deletedProduct, 'cd-cart__product--undo');
					  deletedProduct.addEventListener('animationend', function cb(){
						  deletedProduct.removeEventListener('animationend', cb);
						  Util.removeClass(deletedProduct, 'cd-cart__product--deleted cd-cart__product--undo');
						  deletedProduct.removeAttribute('style');
						  quickUpdateCart();
					  });
					  Util.removeClass(cartUndo, 'cd-cart__undo--visible');
				  }
			  });
		  };
  
		  function addToCart(event) {
			  event.preventDefault();
			  if(animatingQuantity) return;
			  var cartIsEmpty = Util.hasClass(cart[0], 'cd-cart--empty');
			  //update cart product list
			  addProduct(this);
			  //update number of items 
			  updateCartCount(cartIsEmpty);
			  //update total price
			  updateCartTotal(this.getAttribute('data-price')*this.getAttribute("data-anzahl"), true);
			  //show cart
			  Util.removeClass(cart[0], 'cd-cart--empty');
		  };
  
		  function toggleCart(bool) { // toggle cart visibility
			  var cartIsOpen = ( typeof bool === 'undefined' ) ? Util.hasClass(cart[0], 'cd-cart--open') : bool;
		  
			  if( cartIsOpen ) {
				  Util.removeClass(cart[0], 'cd-cart--open');
				  //reset undo
				  if(cartTimeoutId) clearInterval(cartTimeoutId);
				  Util.removeClass(cartUndo, 'cd-cart__undo--visible');
				  removePreviousProduct(); // if a product was deleted, remove it definitively from the cart
  
				  setTimeout(function(){
					  cartBody.scrollTop = 0;
					  //check if cart empty to hide it
					  if( Number(cartCountItems[0].innerText) == 0) Util.addClass(cart[0], 'cd-cart--empty');
				  }, 500);
			  } else {
				  Util.addClass(cart[0], 'cd-cart--open');
			  }
		  };
  
		  function addProduct(target) {
			  // this is just a product placeholder
			  // you should insert an item with the selected product info
			  // replace productId, productName, price and url with your real product info
			  // you should also check if the product was already in the cart -> if it is, just update the quantity
			  productIdId = productIdId + 1;
			  var productPrice = target.getAttribute('data-price');
			  var productName = target.getAttribute('data-name');
			  var productImg = target.getAttribute('data-img');
			  var productWahl = target.value;
			  var productId = target.getAttribute('data-art');
			  var productAnzahl = target.getAttribute('data-anzahl');
			  var productAdded = '<li class="cd-cart__product" id="warenkorb-element" data-art="' + productId + '" data-price="' + productPrice + '" data-name="'+ productWahl +'"><div class="cd-cart__image"><a href="#0"><img src="../shisha2you/' + productImg + '" alt="placeholder"></a></div><div class="cd-cart__details"><h3 class="truncate"><a href="#0">' + productName +'</a></h3><span class="cd-cart__price" data-price="' + productPrice + '" style="font-size: 12px;">' +productPrice +'</span><div  style="width: 70%;"><h3>' + productWahl +  '</h3></div><br><div class="cd-cart__actions" style="font-size: 12px;"><a href="#0" class="cd-cart__delete-item">Entfernen</a><div class="cd-cart__quantity" style="font-size: 12px;"><label for="cd-product-'+ productIdId +'">Menge</label><span class="cd-cart__select"><select class="reset" id="menge" name="quantity"><option selected value="' + productAnzahl +'">' + productAnzahl +'</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select><svg class="icon" viewBox="0 0 12 12"><polyline fill="none" stroke="currentColor" points="2,4 6,8 10,4 "/></svg></span></div></div></div></li>';
			  cartList.insertAdjacentHTML('beforeend', productAdded);
		  };
  
		  function removeProduct(product) {
			  if(cartTimeoutId) clearInterval(cartTimeoutId);
			  removePreviousProduct(); // prduct previously deleted -> definitively remove it from the cart
			  console.log(Number(product.getElementsByTagName('select')[0].value));
			  var topPosition = product.offsetTop,
				  productQuantity = 1 , //Number(product.getElementsByTagName('select')[0].value),
				  productQuantity2 = Number(product.getElementsByTagName('select')[0].value),
				  //productQuantity = document.getElementById("menge" + productIdId).value ;
				  //productQuantity = Number(cartCountItems[0].innerText);
				  //productTotPrice = Number((document.getElementById('warenkorb-element').getAttribute("data-price"))) * productQuantity;
				  productTotPrice = Number((product.getElementsByClassName('cd-cart__price')[0].innerText).replace('$', '')) * productQuantity2;
								
				  product.style.top = topPosition+'px';
			  Util.addClass(product, 'cd-cart__product--deleted');
  
			  //update items count + total price
			  updateCartTotal(productTotPrice, false);
			  updateCartCount(true, -productQuantity2);
			  Util.addClass(cartUndo, 'cd-cart__undo--visible');
  
			  //wait 8sec before completely remove the item
			  cartTimeoutId = setTimeout(function(){
				  Util.removeClass(cartUndo, 'cd-cart__undo--visible');
				  removePreviousProduct();
			  }, 8000);
		  };
  
		  function removePreviousProduct() { // definitively removed a product from the cart (undo not possible anymore)
			  var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted');
			  if(deletedProduct.length > 0 ) deletedProduct[0].remove();
		  };
  
		  function updateCartCount(emptyCart, quantity) {
			  if( typeof quantity === 'undefined' ) {
				  var actual = Number(cartCountItems[0].innerText) + 1;
				  console.log("actual:" + actual);
				  var next = actual + 1;
				  console.log("next:" + next);
				  if( emptyCart ) {
					  cartCountItems[0].innerText = actual;
					  cartCountItems[1].innerText = next;
					  animatingQuantity = false;
				  } else {
					  Util.addClass(cartCount, 'cd-cart__count--update');
  
					  setTimeout(function() {
						  cartCountItems[0].innerText = actual;
					  }, 150);
  
					  setTimeout(function() {
						  Util.removeClass(cartCount, 'cd-cart__count--update');
					  }, 200);
  
					  setTimeout(function() {
						  cartCountItems[1].innerText = next;
						  animatingQuantity = false;
					  }, 230);
				  }
			  } else {
				  var actual = Number(cartCountItems[0].innerText) + quantity;
				  var next = actual + 1;
				  
				  cartCountItems[0].innerText = actual;
				  cartCountItems[1].innerText = next;
				  animatingQuantity = false;
			  }
		  };
  
		  function updateCartTotal(price, bool) {
			  cartTotal.innerText = bool ? (Number(cartTotal.innerText) + Number(price)).toFixed(2) : (Number(cartTotal.innerText) - Number(price)).toFixed(2);
		  };
  
		  function quickUpdateCart() {
			  var quantity = 0;
			  var price = 0;

			  for(var i = 0; i < cartListItems.length; i++) {

				  if( !Util.hasClass(cartListItems[i], 'cd-cart__product--deleted') ) {
					  var singleQuantity = Number(cartListItems[i].getElementsByTagName('select')[0].value);
					  //var singleQuantity = 1;
					  console.log("Menge wenn nicht gelöscht:" + singleQuantity);
					  quantity = quantity + singleQuantity;
					  price = price + singleQuantity*Number((cartListItems[i].getElementsByClassName('cd-cart__price')[0].innerText).replace('€', ''));
					  //price = price + singleQuantity*Number((cartListItems[i].getElementsByClassName('cd-cart__product')[0].innerText).getAttribute("data-price"));
				  }
			  }
			  console.log("Menge wenn geändert:" + quantity);
			  cartTotal.innerText = price.toFixed(2);
			  cartCountItems[0].innerText = quantity;
			  cartCountItems[1].innerText = quantity+1;
		  };
	}
  })();