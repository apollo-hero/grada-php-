// JavaScript Document

$(document).ready( function (){
	
	var server = window.location.toString();
	var tl = server.length;
	
	var parts = server.split(window.location.pathname.toString());
	server = parts[0];
	
	
	
	
	if(server=='http://localhost')
	{
		var url = 'http://localhost/ccp/';
	}
	else
	{
		var url = server+'/';
	}
	//var url = 'http://test.corporatecateringonline.com/
	//var url = 'http://corporatecateringonline.com/'
	
	$('#customizeOrderB').focus(function(){
		if($(this).val()=='e.g. light on mayo, no onion')
		{
			$('#customizeOrderB').removeClass('light');
			$('#customizeOrderB').val('');	
		}	
		
	});
	
	$('#customizeOrderB').blur( function(){
		var $custom_message = $(this);
		$custom_message.prevent_default;
		if($custom_message.val() && $.trim($custom_message.val())!='')
		{
			$custom_message.parent().find('.my-item-price').val(0);
			$custom_message.parent().find('.my-item-add').val(1);
			$custom_message.parent().find('.my-item-qty').val(1);
			$custom_message.parent().find('.my-item-name').val('Custom Kitchen Message:'+$custom_message.val());
		}
		else
		{
			$custom_message.parent().find('.my-item-price').val(0);
			$custom_message.parent().find('.my-item-add').val(0);
			$custom_message.parent().find('.my-item-qty').val(0);
			$custom_message.parent().find('.my-item-name').val('Custom Kitchen Message');
		}
	});	
	
	
	$('#checkbox').change(function(){
		var c = this.checked ? '#f00' : '#09f';
		$('p').css('color', c);
	});

	
	$('#chkMakeItMeal').change( function(){
		var $chkMakeItMeal = $(this);
		
		if(this.checked)
		{
			var price = $chkMakeItMeal.parent().find('#my-item-price-settings').val();
			$chkMakeItMeal.parent().find('.my-item-price').val(price);
			$chkMakeItMeal.parent().find('.my-item-add').val(1);
			$chkMakeItMeal.parent().find('.my-item-qty').val(1);
		}
		else
		{
			$chkMakeItMeal.parent().find('.my-item-price').val(0);
			$chkMakeItMeal.parent().find('.my-item-add').val(0);
			$chkMakeItMeal.parent().find('.my-item-qty').val(0);
		}
	});	
	
	$('#chkWrapMySandwich').change( function(){
		var $chkWrapIt = $(this);
		var $wrap_select = $chkWrapIt.parents('#makeItMeal').find('.second').find('.wrap');
		var $bread_select = $('#customizeLunchBoxMenuItem').find('.sandwich');
		var price = $chkWrapIt.parents('#customizeLunchBoxMenuItem').find('#my-item-price-settings-wrap').val();
		
		if(this.checked)
		{
			$wrap_select.removeAttr("disabled", "disabled");
			$bread_select.attr("disabled", "disabled");
			$bread_select.val("-1");
			$bread_select.change();
			$chkWrapIt.parent().parent().find('.my-item-price').val(price);
			$chkWrapIt.parent().parent().find('.my-item-add').val(1);
			$chkWrapIt.parent().parent().find('.my-item-qty').val(1);
		}
		else
		{
			$bread_select.removeAttr("disabled", "disabled");
			$wrap_select.val("-1");
			$wrap_select.attr("disabled", "disabled");
			$wrap_select.change();
			$chkWrapIt.parent().parent().find('.my-item-price').val(0);
			$chkWrapIt.parent().parent().find('.my-item-add').val(0);
			$chkWrapIt.parent().parent().find('.my-item-qty').val(0);
		}
	});
	
	
	
	$('#customizeOrderA').focus( function(){
		if($(this).val()=='Further instructions - customize your order here')
		{
			$(this).val('');
		}
		$(this).removeClass('light');
	});
	
	$('#customizeOrderA').blur( function(){
		updateKitchenMessage($(this));
	});
	
	
	
	
	
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
	
	
	$('.customize_meal').change( function(){
		
		var $select = $(this);
		var _id = $select.val();
		//check_mandatory_dropdowns();
		if(_id != '-1')
		{
			
			var request = $.ajax({
				url: url+'GetDropDownItemInfo.php',
				type: "POST",
				data: {id : _id},
				dataType: "html",
				beforeSend: function( xhr ) {
					
				}
			});
			
			request.done(function(msg) {
				if(msg!=='error')
				{
					var ItemProperties = msg.split('!&'); 
					$select.parent().find('.my-item-id').val(ItemProperties[0]);
					$select.parent().find('.my-item-name').val(ItemProperties[1]);
					$select.parent().find('.my-item-price').val(ItemProperties[2]);
					$select.parent().find('.my-item-parent-id').val($('#customizeLunchBoxMenuItem').find('.main').find('.my-item-id').val());
					$select.parent().find('.my-item-add').val(1);
					$select.parent().find('.my-item-qty').val($('#customizeLunchBoxMenuItem').find('.main').find('.my-item-qty').val());
					$select.parent().find('.drop-down-item-id').val(ItemProperties[0]);
				}
				
			});
			
			request.fail(function(jqXHR, textStatus) {
				alert( "Request failed: " + textStatus );
			});
		}
		else if(_id == '-1')
		{
			$select.parent().find('.my-item-id').val('');
			$select.parent().find('.my-item-name').val('');
			$select.parent().find('.my-item-price').val(0);
			$select.parent().find('.my-item-parent-id').val('');
			$select.parent().find('.my-item-add').val(0);
			$select.parent().find('.my-item-qty').val(0);
			$select.parent().find('.drop-down-item-id').val('');
		}
	});
	
	//Customize full catering menu item
	$('.customize_full_catering_meal').change( function(){
		var $select = $(this);
		var _id = $select.val();
		//check_mandatory_dropdowns();
		if(_id != '-1')
		{
			
			var request = $.ajax({
				url: url+'GetFullCateringDropDownItemInfo.php',
				type: "POST",
				data: {id : _id},
				dataType: "html",
				beforeSend: function( xhr ) {
					
				}
			});
			
			request.done(function(msg) {
				if(msg!=='error')
				{
					var ItemProperties = msg.split('!&'); 
					$select.parent().find('.my-item-id').val(ItemProperties[0]);
					$select.parent().find('.my-item-name').val(ItemProperties[1]);
					$select.parent().find('.my-item-price').val(ItemProperties[2]);
					
					var parent_id = $select.parents('.cat_tools').find('.order_full_cat_wrapper').find('.my-item-id').val();
					
					$select.parent().find('.my-item-parent-id').val(parent_id);
					$select.parent().find('.my-item-add').val(1);
					$select.parent().find('.my-item-qty').val(1);
					$select.parent().find('.full-catering-drop-down-item-id').val(ItemProperties[0]);
				}
				else
				{
					alert(msg);	
				}
				
			});
			
			request.fail(function(jqXHR, textStatus) {
				alert( "Request failed: " + textStatus );
			});
		}
		else if(_id == '-1')
		{
			$select.parent().find('.my-item-id').val('');
			$select.parent().find('.my-item-name').val('');
			$select.parent().find('.my-item-price').val(0);
			$select.parent().find('.my-item-parent-id').val('');
			$select.parent().find('.my-item-add').val(0);
			$select.parent().find('.my-item-qty').val(0);
			$select.parent().find('.drop-down-item-id').val('');
		}
	});
	
	
	
	//check_mandatory_dropdowns();
	
	
	function check_mandatory_dropdowns()
	{
		
		var $mand = 0;
		$('.mandatory').each(function(){
			if($(this).val()=='-1'){
				$mand++;	
			}
		});
	
		if($mand==0)
		{	
			$('.submit_customization').removeClass('disabled');
			$('.submit_customization').removeAttr('disabled');
			$('.submit_customization').attr('title','');	
		}else
		{
			$('.submit_customization').addClass('disabled');
			$('.submit_customization').attr('disabled','disabled');
			$('.submit_customization').attr('title','Please select your choices first!');	
		}
	}
	
	$('.decrease').click( function(){
		var minimum = $(this).siblings('.my-item-minimum').val();
		if(minimum==0)
		{
			minimum=1;
		}	
		var val = $(this).siblings('.my-item-qty').val();
		if(val>minimum)
		{
			val--;	
		}
		$(this).siblings('.my-item-qty').val(val);	
		if(val==1)
		{
			//$(this).siblings('.my-item-qty').css('background-color','#FFF');
		};
	});
			
	$('.increase').click( function(){
		var val = $(this).siblings('.my-item-qty').val();
		val ++;
		$(this).siblings('.my-item-qty').val(val);
		
		if(val>1)
		{
			//$(this).siblings('.my-item-qty').css('background-color','#CCCC00');
		};	
	});
	
	$('#decreaseLunchBox').click( function(){
		var val = $('.main').find('.my-item-qty').val();
		if(val>1)
		{
			val--;	
		}
		
		
		var $forms_lunch = $('#customizeLunchBoxMenuItem').find('form');
		
		$forms_lunch.each(function(index){
			if($($forms_lunch[index]).hasClass('main'))
			{
				$main = $($forms_lunch[index]);
				$main.find('.my-item-qty').val(val);
			}else
			{
				$form = $($forms_lunch[index]);
				if($form.find('.my-item-add').val()==1)
				{
					$form.find('.my-item-qty').val(val);
				}
			}
			
		});
		
		$(this).siblings('.lunchBoxQuantity').val(val);	
		if(val==1)
		{
			//$(this).siblings('.my-item-qty').css('background-color','#FFF');
		};
	});
			
	$('#increaseLunchBox').click( function(){
		var val = $('.main').find('.my-item-qty').val();
		val ++;
		
		
		
		var $forms_lunch = $('#customizeLunchBoxMenuItem').find('form');
		
		$forms_lunch.each(function(index){
			if($($forms_lunch[index]).hasClass('main'))
			{
				$main = $($forms_lunch[index]);
				$main.find('.my-item-qty').val(val);
			}else
			{
				$form = $($forms_lunch[index]);
				if($form.find('.my-item-add').val()==1)
				{
					$form.find('.my-item-qty').val(val);
				}
			}
			
		});
		
		$(this).siblings('.lunchBoxQuantity').val(val);
		
		if(val>1)
		{
			//$(this).siblings('.my-item-qty').css('background-color','#CCCC00');
		};	
	});
	
});