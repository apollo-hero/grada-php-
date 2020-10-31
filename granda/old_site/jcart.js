
// jCart v1.3
// http://conceptlogic.com/jcart/
$(document).ready( function (){
		
		
	// enter down add to cart
	
	$('#cateringPopup').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$('.submit_customization').trigger('click');
		}
	});
	
	//lunch enter down add
	$('.increase').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.lunch_row_wrapper').find('.submit_quick_order').trigger('click');
		}
	});
	$('.decrease').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.lunch_row_wrapper').find('.submit_quick_order').trigger('click');
		}
	});
	
	$('.my-item-qty').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.lunch_row_wrapper').find('.submit_quick_order').trigger('click');
		}
	});
	
	//catering enter down add
	$('.cat_tools .increase').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.cat_tools').find('.submit_full_catering_order').trigger('click');
		}
	});
	$('.cat_tools .decrease').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.cat_tools').find('.submit_full_catering_order').trigger('click');
		}
	});
	
	$('.my-item-qty').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.cat_tools').find('.submit_full_catering_order').trigger('click');
		}
	});
	
	$('.customize_full_catering_meal').keydown(function(e) {
		$(this).change();
		if(e.which === 13) {
			$(this).parents('.cat_tools').find('.submit_full_catering_order').trigger('click');
		}		
	});
	
	$('.lunch_row_wrapper .my_item_qty').keydown(function(e) {
		if(e.which === 13) {
			e.preventDefault();
			$(this).parents('.lunch_row_wrapper').find('.submit_quick_order').trigger('click');
		}
	});	
		
		
		//minimum order popup
		
		function updateKitchenMessage($custom_message)
		{
			$custom_message.prevent_default;
			if($custom_message.val() && $.trim($custom_message.val())!='')
			{
				$custom_message.parent().find('.my-item-add').val(1);
				$custom_message.parent().find('.my-item-qty').val(1);
				$custom_message.parent().find('.my-item-name').val('Custom Kitchen Message:'+$custom_message.val());
			}
			else
			{
				$custom_message.parent().find('.my-item-add').val(0);
				$custom_message.parent().find('.my-item-qty').val(0);
				$custom_message.parent().find('.my-item-name').val('');
			}	
		}
		
		$('.submit_customization_catering').click( function(){
			$sender = $(this);
			$(this).attr("disabled", "true");
			/*if($('#close_fbox').length==0)
			{
				
				$('.thanks').attr('id','close_fbox');
			}
			
			*/
			
			addCatering($('#customizeLunchBoxMenuItem').find('form'),$sender);
			
			if($('#close_fbox').length==0)
			{
				$sender.after('<div id="close_fbox" class="ajax-loader"></div>');
			}
			$('.thanks').fadeIn('100');
			$('#close_fbox').fadeIn('100');
			
		});
		
		var catering_forms_num = 0;
		var catering_forms_done = 0;
		function addCatering($forms, sender) {
			
			var qty = Number($('.min12').val());
			
			if(qty.toString()=="NaN" || qty.toString()=="")
			{
				$('.min12').val(15);
			}
			
			var path = 'include/cateringOrder/jcart',
			container = $('#jcart'),
			token = $('[name=cateringOrder]').val(),
			tip = $('#jcart-tooltip'),
			typeUser = $('#typeUserField').val();
			
			catering_forms_num = $forms.length;
			$forms.each(function(index){
				if($($forms[index]).hasClass('main'))
				{
					$main = $($forms[index]);
					updateKitchenMessage($main.find('#customizeOrderA'));	
				}
				
			});
			
			
			if($main.length>0)
			{
				$.ajax({
					url: path + '/relay.php',
					data: $main.serialize() + '&typeUser='+typeUser,
					success: function(response) {
						catering_forms_done++;
						submitAllForms($forms, sender);
					},
					fail: function(response) 
					{
						alert(response);
					}
				});	
			}	
		}
		
		function submitAllForms($forms, sender) {
			var path = 'include/cateringOrder/jcart',
				container = $('#jcart'),
				token = $('[name=cateringOrder]').val(),
				tip = $('#jcart-tooltip'),
				typeUser = $('#typeUserField').val();
				
			$forms.each(function(index){
				$form = $($forms[index]);
				if(!$form.hasClass('main'))
				{
					var itemQty = $form.find('[name="my_item_qty"]');
					if(itemQty.val()>0)
					{
						$.ajax({
							url: path + '/relay.php',
							data: $form.serialize() + '&typeUser='+typeUser,
							success: function(response) {
								
								container.html(response);
								catering_forms_done++;
								if(catering_forms_done==catering_forms_num)
								{
									var time = 1000;
									setTimeout('parent.$.fancybox.close()', time); 
								}
							},
							fail: function(response) 
							{
								alert(response);
							}
						});
					}
					else
					{
						catering_forms_done++;
						if(catering_forms_done==catering_forms_num)
						{
							var time = 1000;
							setTimeout('parent.$.fancybox.close()', time); 
						}
					}	
				}
			});
		}
		
});
$(function() {
	
	var JCART = (function() {
	
	
		function validateEmail(email) { 
			var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return re.test(email);
		} 
		
		// This script sends Ajax requests to config-loader.php and relay.php using the path below
		// We assume these files are in the 'jcart' directory, one level above this script
		// Edit as needed if using a different directory structure
		var path = 'include/cateringOrder/jcart',
			container = $('#jcart'),
			token = $('[name=cateringOrder]').val(),
			tip = $('#jcart-tooltip');
		
		var config = (function() {
			var config = null;
			
			$.ajax({
				url: path + '/config-loader.php',
				data: {
					"ajax": "true"
				},
				dataType: 'json',
				async: false,
				success: function(response) {
					config = response;
				},
				error: function() {
					alert('Ajax error: Edit the path in jcart.js to fix.');
				}
			});
			return config;
		}());
		
		var setup = (function() {
			
			/*if(config.tooltip === true) {
				tip.text(config.text.itemAdded);
	
				// Tooltip is added to the DOM on mouseenter, but displayed only after a successful Ajax request
				$('.jcart [type=submit]').mouseenter(
					function(e) {
						var x = e.pageY + 25,
							y = e.pageX + -10;
						$('body').append(tip);
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mousemove(
					function(e) {
						var y = e.pageY + 25,
						x = e.pageX + -10;
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mouseleave(
					function() {
						tip.hide();
					}
				);
			}*/

			// Remove the update and empty buttons since they're only used when javascript is disabled
			$('#jcart-buttons').remove();

			// Default settings for Ajax requests
			$.ajaxSetup({
				type: 'POST',
				url: path + '/relay.php',
				global: false,

				success: function(response) {
					// Refresh the cart display after a successful Ajax request
					if(response.substring(13,31)=='jcart_head_wrapper')
					{
						container.html(response);
					}
					$('#jcart-buttons').remove();
				},
				// See: http://www.maheshchari.com/jquery-ajax-error-handling/
				error: function(x, e) {
					var s = x.status, 
						m = 'Ajax error: ' ; 
					if (s === 0) {
						m += 'Check your network connection.';
					}
					if (s === 404 || s === 500) {
						m += s;
					}
					if (e === 'parsererror' || e === 'timeout') {
						m += e;
					}
					alert(m);
				}
			});
		}());
		
		// Check hidden input value
		// Sent via Ajax request to jcart.php which decides whether to display the cart checkout button or the PayPal checkout button based on its value
		// We normally check against request uri but Ajax update sets value to relay.php

		// If this is not the checkout the hidden input doesn't exist and no value is set
		var isCheckout = $('#jcart-is-checkout').val();
		
		function add(form, sender) {
			// Input values for use in Ajax post
			//poziva add_item($id, $name, $price, $qty = 1, $url, $parentId, $type = 'adddon') iz jcart.php
			var 
				itemQty = form.find('[name="my_item_qty"]'),
				typeUser = $('#typeUserField').val();
				
				val = itemQty.val();
				
			// Add the item and refresh cart display
			
			if(val>0)
			{
				$.ajax({
					data: form.serialize() + '&typeUser='+typeUser,
					success: function(response) {
						container.html(response);
						$('#jcart-buttons').remove();
						sender.removeAttr("disabled");
						
						form_num_done++;
						//proverava da li su izvrsene sve forme koje postoje
						if(form_num_done==form_num)
						{
							var time = 1000;
							setTimeout('parent.$.fancybox.close()', time); 
						}
						
					},
					fail: function(response) 
					{
						alert(response);
					}
				});
			}
			else
			{
				form_num_done++;	
				//proverava da li su izvrsene sve forme koje postoje
				if(form_num_done==form_num)
				{
						var time = 1000;
						setTimeout('parent.$.fancybox.close()', time); 
				}
			}
		}


		function addQuickOrder(form, sender) {
			// Input values for use in Ajax post
			//poziva add_item($id, $name, $price, $qty = 1, $url, $parentId, $type = 'adddon') iz jcart.php
			var 
				itemQty = form.find('[name="my_item_qty"]'),
				typeUser = $('#typeUserField').val();
				
				val = itemQty.val();
				
			// Add the item and refresh cart display
			
			if(val>0)
			{
				$.ajax({
					data: form.serialize() + '&typeUser='+typeUser+'&jcartIsCheckout='+isCheckout,
					success: function(response) {
						container.html(response);
						$('#jcart-buttons').remove();
						sender.removeAttr("disabled");
						
						form_num_done++;
						//proverava da li su izvrsene sve forme koje postoje
						if(form_num_done==form_num)
						{
							var time = 1000;
							setTimeout('$("#close_fbox").remove()', time);
							sender.parent().find('.my-item-qty').val(1);
						}
						
					},
					fail: function(response) 
					{
						alert(response);
					}
				});
			}
			else
			{
				form_num_done++;	
				//proverava da li su izvrsene sve forme koje postoje
				if(form_num_done==form_num)
				{
						var time = 1000;
							setTimeout('$("#close_fbox").remove()', time); 
							sender.parent().find('.my-item-qty').val(1);
				}
			}
		}

		
		function applyCouponFn(form, sender) {
			var email = $('#emailchkout').val();
			if($('#couponId').val()!='')
			{
				if(validateEmail(email))
				{
					$.ajax({
						data: form.serialize()+"&jcartIsCheckout="+isCheckout+"&coupon_email="+email,
						success: function(response) {
							container.html(response);
							sender.removeAttr("disabled");
						},
						fail: function(response) 
						{
							alert(response);
							sender.removeAttr("disabled");
						}
					});
				}
				else
				{
					alert('Please enter a valid email address.');
					$('#emailchkout').focus();
					sender.removeAttr("disabled");
				}
			}else
			{
				alert('Please enter a coupon code.');
				$('#couponId').focus();
				sender.removeAttr("disabled");
			}

		}
		
		function setTip(value) {
			$.ajax({
				data: 
				{
					'set_tip':true,
					'value':value,
					'jcartIsCheckout':isCheckout
				},
				type:'POST',
				success: function(response) {
					container.html(response);
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		function addAddonGoods(sender) {
			
			var id = sender.attr('id');
			var value = sender.val();
			
			$.ajax({
				data: 
				{
					'addAddonGoods':true,
					'value':value,
					'id':id,
					'jcartIsCheckout':isCheckout
				},
				type:'POST',
				success: function(response) {
					container.html(response);
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		
		function removeAddon(sender) {
			
			var id = sender.attr('id');
			var value = sender.val();
			
			$.ajax({
				data: 
				{
					'removeAddonGoods':true,
					'value':value,
					'id':id,
					'jcartIsCheckout':isCheckout
				},
				type:'POST',
				success: function(response) {
					container.html(response);
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		

		function update(input) {
			// The id of the item to update
			var updateId = input.attr('id'),
				typeUser = $('#typeUserField').val();
			// The new quantity
			var newQty = input.val();
			//alert(typeUser);
			// As long as the visitor has entered a quantity
			
			if (newQty) {

				$.ajax({
					data: 'jcartUpdate=1&itemId='+updateId+'&itemQty='+newQty+'&jcartIsCheckout='+isCheckout+'&typeUser='+typeUser,
					success: function(response) {
						container.html(response);
					},
					fail: function(response) 
					{
						alert(response);
					}
				});			


			}

			// If the visitor presses another key before the timer has expired, clear the timer and start over
			// If the timer expires before the visitor presses another key, update the item
			/*input.keydown(function(e){
				if (e.which !== 9) {
					window.clearTimeout(updateTimer);
				}	
			});*/
		}

		function remove(link) {
			// Get the query string of the link that was clicked
			var queryString = link.attr('href');
			queryString = queryString.split('=');

			// The id of the item to remove
			var removeId = queryString[1];

			// Remove the item and refresh cart display
			$.ajax({
				type: 'GET',
				data: {
					"jcartRemove": removeId,
					"jcartIsCheckout": isCheckout
				},
				success: function(response) {
					container.html(response);
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		var form_num = 0;
		var form_num_done = 0;
		
		function emptyCart()
		{
			$.ajax({
				type: 'POST',
				data: {
					"jcartEmpty": 1
				},
				success: function(response) {
					container.html(response);
					window.location.replace("index.php?order_option=choose");
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		// Add an item to the cart
		//new
		
		
		$('.submit_customization').click( function(event){
			
			event.preventDefault();
			$sender = $(this);
			$(this).attr("disabled", "true");
			form_num_done = 0;
			form_num = $('#customizeLunchBoxMenuItem').find('form').length;
			
			$('#customizeLunchBoxMenuItem').find('form').each(function(index) {
    			if($(this).hasClass('main'))
				{
					addMain($(this), $sender)	
				}
			});
			
			if($('#close_fbox').length==0)
			{
				$sender.after('<div id="close_fbox" class="ajax-loader"></div>');
				$('.thanks').fadeIn(200);
				//$('.thanks').attr('id','close_fbox');
				$('#close_fbox').fadeIn('100');
			}
		});
		
		
		function addMain(form, sender) {
			// Input values for use in Ajax post
			//poziva add_item($id, $name, $price, $qty = 1, $url, $parentId, $type = 'adddon') iz jcart.php
			var 
				itemQty = form.find('[name="my_item_qty"]'),
				typeUser = $('#typeUserField').val();
				
				val = itemQty.val();
				
			// Add the item and refresh cart display
			
			if(val>0)
			{
				$.ajax({
					data: form.serialize() + '&typeUser='+typeUser,
					success: function(response) {
						container.html(response);
						$('#jcart-buttons').remove();
						
						form_num_done++;
						$('#customizeLunchBoxMenuItem').find('form').each(function(index) {
							if(!$(this).hasClass('main'))
							{
								add($(this), sender);
							}
						});
	
					},
					fail: function(response) 
					{
						alert(response);
					}
				});
			}
			else
			{
				form_num_done++;	
				//proverava da li su izvrsene sve forme koje postoje
				if(form_num_done==form_num)
				{
						var time = 1000;
						setTimeout('parent.$.fancybox.close()', time); 
				}
			}
		}
		
		//****************************************** ADD FULL CATERING ITEM ****************************************
			
		function addMainFullCatering(form, sender) {
			// Input values for use in Ajax post
			//poziva add_item($id, $name, $price, $qty = 1, $url, $parentId, $type = 'adddon') iz jcart.php
			var 
				itemQty = form.find('[name="my_item_qty"]'),
				//typeUser = $('#typeUserField').val();
				
				val = itemQty.val();
				
			// Add the item and refresh cart display
			
			if(val>0)
			{
				$.ajax({
					data: form.serialize(),// + '&typeUser='+typeUser,
					success: function(response) {
						container.html(response);
						$('#jcart-buttons').remove();
						
						form_num_done++;
						
						if(form_num_done==form_num)
						{
							var time = 1000;
							setTimeout('$("#close_fbox").remove()', time);
						}
						else{
							$forms = $sender.parents('.itemList').find('form');
							$forms.each(function(index) {
								if(!$(this).hasClass('main'))
								{
									
									addFullCatering($(this), sender);	
								}
							});
						}
	
					},
					fail: function(response) 
					{
						alert(response);
					}
				});
			}
			else
			{
				form_num_done++;	
				//proverava da li su izvrsene sve forme koje postoje
				if(form_num_done==form_num)
				{
						var time = 1000;
							setTimeout('$("#close_fbox").remove()', time);
				}
			}
		}
		
		/***** ADD FULL CATERING **********/
		
		function addFullCatering(form, sender) {
			// Input values for use in Ajax post
			//poziva add_item($id, $name, $price, $qty = 1, $url, $parentId, $type = 'adddon') iz jcart.php
			var itemQty = form.find('[name="my_item_qty"]');
				//typeUser = $('#typeUserField').val();
			var	val = itemQty.val();
				
			// Add the item and refresh cart display
			
			if(val>0)
			{
				
				$.ajax({
					data: form.serialize(), //+ '&typeUser='+typeUser,
					success: function(response) {
						container.html(response);
						$('#jcart-buttons').remove();
						//sender.attr("disabled", "false");
						//sender.removeAttr("disabled");
						
						form_num_done++;
						//proverava da li su izvrsene sve forme koje postoje
						if(form_num_done==form_num)
						{
							var time = 1000;
							setTimeout('$("#close_fbox").remove()', time);
							sender.parent().find('.my-item-qty').val(1);
						}
						
					},
					fail: function(response) 
					{
						alert(response);
					}
				});
			}
			else
			{
				form_num_done++;	
				//proverava da li su izvrsene sve forme koje postoje
				if(form_num_done==form_num)
				{
						var time = 1000;
						setTimeout('$("#close_fbox").remove()', time);
						if(Number(sender.parent().find('.my-item-minimum').val()==0))
						{
							sender.parent().find('.my-item-qty').val(1);
						}else
						{
							sender.parent().find('.my-item-qty').val(sender.parent().find('.my-item-minimum').val());
						}
				}
			}
		}

		
		
			// Add an item to the cart
			//new
			$('.submit_full_catering_order').click( function(event){
				event.preventDefault();
				$sender = $(this);
				//$(this).attr("disabled", "true");
				form_num_done = 0;
				$forms = $sender.parents('.itemList').find('form');
				
				form_num = $forms.length;
				$forms.each(function(index) {
					if($(this).hasClass('main'))
					{
						addMainFullCatering($(this), $sender);
					}
				});
				
				if($('#close_fbox').length==0)
				{
					$sender.after('<div id="close_fbox" class="ajax-loader"></div>');
				}
			});
		
		
		//**********************************************************************************************************
		container.delegate('.applyCoupon', 'click', function(e){
			e.preventDefault();	
			$sender = $(this);
			$sender.attr("disabled", "true");
			applyCouponFn($sender.parent('form'),$sender);	
		});
		
		//EMPTY CART
		container.delegate('.empty_cart', 'click', function(e){	
			if(confirm('Changing delivery option will empty your shopping cart and erase your current orders. Do you want to continue?'))
			{
				emptyCart();
			}
		});			
		
		$('.min12').focus(function(){
			var int = $(this).val();
			
			if(Number(int).toString()=='NaN')
			{
				$(this).val('');	
			}
		});
		
		$('.min12').blur(function(){
			var int = $(this).val();
			if(Number(int).toString()=='NaN')
			{
				$(this).val('15');
			
			}
			else if($(this).val()<15)
			{
				
				$(this).val(15);
			}
	
		});
		
		
		// FULL CATERING MENU MINIMUM
		$('.minFull').focus(function(){
			var int = $(this).val();
			if(Number(int).toString()=='NaN')
			{
				$(this).val('');	
			}
		});
		
		$('.qty_input').blur(function(){
			var int = $(this).val();
			var minimum = $(this).siblings('.my-item-minimum').val();
			if (minimum==0)
			{
				minimum=1;	
			}
			if(Number(int).toString()=='NaN' || Number(int)==0)
			{
				$(this).val(minimum);	
			}
		});
		
		$('.minFull').blur(function(){
			var int = Number($(this).val());
			var minimum = $(this).siblings('.my-item-minimum').val();
			if(Number(int).toString()=='NaN')
			{
				$(this).val(minimum);
			}
			else if(int<minimum)
			{
				$(this).val(minimum);
			}

		});
		
		
	    //QUICK ORDER NA LUNCH BOXU
		$('.submit_quick_order').click( function(){
			form_num=1;
			form_num_done=0;
			$sender = $(this);
			if(!$sender.attr("disabled"))
			{
				$sender.attr("disabled", "true");
				addQuickOrder($(this).parents('form'), $(this));
				if($sender.parent().find('#close_fbox').length==0)
				{
					$sender.after('<div id="close_fbox" class="ajax-loader"></div>');
					//$('.thanks').attr('id','close_fbox');
					$('#close_fbox').fadeIn('100');
				}
			}
		});	
		
			
		//old
		/*$('.jcart').submit(function(e) {
			e.preventDefault();
		});*/

		// Prevent enter key from submitting the cart
		container.keydown(function(e) {
			if(e.which === 13) {
				e.preventDefault();
			}
		});


		/*// Update an item in the cart
		container.delegate('[name="jcartItemQty[]"]', 'keyup', function(){
			
			update($(this));
		});
		*/

		// Remove an item from the cart
		container.delegate('.jcart-remove', 'click', function(e){
			remove($(this));
			e.preventDefault();
		});
		
		
		function getMinimumOrder()
		{
			
			$.ajax({
				type: 'POST',
				url: 'GetMinimumOrderInfo.php',
				data: {
					"get_min_order": 1
				},
				success: function(response) {
					var min_order = 0;
					min_order = response;
					alert('Minimum order is $'+min_order+'.00');
				},
				fail: function(response) 
				{
					alert(response);
				}
			});
		}
		
		container.delegate('.minimum_odred_popup', 'click', function(e){
			e.preventDefault();
			getMinimumOrder();	
		});
		
		container.delegate('#driversTipSelect', 'change', function(e){
			setTip($(this).val());
		});
		
		container.delegate('.chk_addon', 'change', function(e){
			
			if( $(this).is(':checked') )
			{
				addAddonGoods($(this));
	
			} else
			{
				removeAddon($(this));
			}
			
		});
		
		
		
		container.delegate('.update_quantity', 'change', function(e){
			update($(this));
			e.preventDefault();
		});		

	}()); // End JCART namespace

}); // End the document ready function