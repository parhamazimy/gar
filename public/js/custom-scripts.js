/*****************************************************************************************
 * Template Name: adbob - Admin Dashboard Based On Bootstrap
 * Template Version: 1.0
 * Author: HyperClass team
*****************************************************************************************/


$(document).ready(function() {


	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		ON-LOAD CODES
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		/* Custom Scroll bar */
		$('#side_panel').mCustomScrollbar({
			theme:"minimal-dark",
		});
		$('#sidebar').mCustomScrollbar({
			theme:"minimal",
		});



		/* bootstrap tooltip and popover */
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();




		/* content columns resize */
	    $('#column2').resizable({ handles: 'e' });
	    $('#column0').resizable({ handles: 's' });



		/* Panels drag and drop */
		$("#column1, #column2, #column0").sortable({
			placeholder: "ui-state-highlight",
			handle: ".sort-hand",
		  	connectWith: ".connectcolumn",
		  	cursor: "grabbing",
		}); 



		/* Scrol to top */
		$('#ToTop').click(function(){
			$('body, html').animate({scrollTop: 0});
		});



		/* Blink alerts */
		setInterval(function(){ 
			$('.blink').removeClass('blink', function(){
				$(this).addClass('blink');
			});
		}, 30000);





	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		SIDEBAR
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		/* sidebar on window load */
		$(window).load( function() {
		    var BrWidth = $(window).width();
		    if (BrWidth <= 992) {
				$('#sidebar').addClass('is-close');
				$('#sidebar_toggle').removeClass('fa-outdent').addClass('fa-indent');
		    }
		    else {
				$('#sidebar').addClass('is-open');
		    };
		});


		/* sidebar on window resize */
		$(window).resize( function() {
		    SetPaddings(); // custom-functions.js
		});


		/* sidebar toggle on click */
		$('#sidebar_toggle').click(function () {
			var SD = $("#sidebar").css('display');
		    if(SD == 'block'){
				$('#sidebar').removeClass('is-open').addClass('is-close');
			}
		    else {
				$('#sidebar').removeClass('is-close').addClass('is-open');
		    };
			$(this).toggleClass('fa-outdent').toggleClass('fa-indent');
			SetPaddings(); // custom-functions.js
		});


		/* sidebar accordion */
		$('#cssmenu li.has-sub>a').click(function(){
			var element = $(this).parent('li');
		    var BrWidth = $(window).width();
			if ($('.StickySidebar').attr('id') == 'menu_ver' || BrWidth <= 992) {
				if (element.hasClass('open')) {
					element.removeClass('open');
					element.find('li').removeClass('open');
					element.find('ul').slideUp();
				}
				else {
					element.addClass('open');
					element.children('ul').slideDown();
					element.siblings('li').children('ul').slideUp();
					element.siblings('li').removeClass('open');
					element.siblings('li').find('li').removeClass('open');
					element.siblings('li').find('ul').slideUp();
				}
			};
		});






	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		PANEL CONTROL BUTTONS
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		/* Put buttons */
		$('.pan-btn.min').append('<span class="minimize_btn fa fa-chevron-up"></span>');
		$('.pan-btn.expand').append('<span class="fullsize_btn fa fa-expand"></span>');
		$('.pan-btn.reload').append('<span class="reload_btn fa fa-refresh"></span>');


		/* Minimize btn */
		$(".minimize_btn").click(function(event){
			$(this).parents(".panel").find(".panel-body, .list-group, .table").slideToggle(200);
			$(this).toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
		}); 


		/* Expand btn */
		$('.fullsize_btn').click(function(){ 
			$(this).parents(".panel").toggleClass('fullscreen-panel');
			$(this).parents('.panel').find('.sort-hand, .drag-hand').toggleClass('sort-hand').toggleClass('drag-hand');

		    $('.fullscreen-panel').mousedown(function(){
		      	$('.fullscreen-panel').css({"z-index" : "98"});
		      	$(this).css({"z-index" : "99"});
		    });

			if ($(this).parents('.panel').hasClass("fullscreen-panel")) {
				$(this).parents('.fullscreen-panel').draggable({
					handle: ".drag-hand",
				  	cursor: "grabbing"
				}).resizable({ 
					handles: 'w' 
				});
				$(this).parents('.panel').find('.ui-resizable-handle').show();
			}
			else {
				$(this).parents('.panel').removeAttr('style').removeClass('ui-resizable').removeClass('ui-draggable');
				$(this).parents('.panel').find('.ui-resizable-handle').hide();
				$('.panel').css({'border-radius': $('#corners_slider').slider('option', 'value')});
			};

			$(this).toggleClass('fa-compress').toggleClass('fa-expand');

		});


		/* Reload btn */
		$('.reload_btn').click(function(){
			var loadable = $(this).parents('.panel').find('.panel-body');
			$(loadable).animate({opacity: "0.3"});
			setTimeout(function(){ $(loadable).animate({opacity: "1"}); }, 800);
		});




	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		TOP NAVBAR
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		// Open and close top help panel
		$('#top_panel_slide').click(function(){
			$("#top_panel").slideToggle(900, 'easeOutBounce');
			$(this).find('i').toggleClass('fa-question-circle-o').toggleClass('fa-toggle-up');
		});


		// Full screen 
		$('#full_screen').click(function(){
			FullScreen();
		});


		// Mega menu toggle
		$('#mega_menu_btn > a').click(function(){
			$("#mega_menu").slideToggle(300, 'easeOutCubic');
		});


		// Close all sidebars and menus by overlay click 
		$('#content, #sidebar, #first-navbar .navbar-nav > li').click(function(){
			if ($(this).attr('id') != 'mega_menu_btn') {
				$("#mega_menu").slideUp(400, 'easeOutCubic');
			};
			$("#top_panel").slideUp(700, 'easeOutBounce');
			$('#top_panel_slide i').removeClass('fa-toggle-up').addClass('fa-question-circle-o');
			$('#side_panel').hide();
		});






	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		SIDE PANEL
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		/* toggle of side fast panel */
		$('.side_panel_toggle_1, .side_panel_toggle_2').click(function () {
			$('#side_panel').toggle();
		});


		/* slide of chat list and chat messages */
		$('#chat_users .media-body').click(function () {
			$('#chat_users').toggle("slide", { direction: "left" }, 200);
			setTimeout(function(){ $('#user_message').toggle("slide", { direction: "right" }, 200); }, 200);
			setTimeout(function(){ $('.back-to i').toggle(200); }, 300);
			$("#chats_btn, #messages_btn").toggle();
			$('#chat_header').html('لورم ایپسوم');
		});
		$('.back-to i').click(function () {
			setTimeout(function(){ $('#chat_users').toggle("slide", { direction: "left" }, 200); }, 200);
			$('#user_message').toggle("slide", { direction: "right" }, 200);
			$('.back-to i').toggle();
			$("#chats_btn, #messages_btn").toggle();
			$('#chat_header').html('انتخاب کنید');
		});


		/* auto coloring of side panel progress Bars */
		$('#taskbtn').click(function () {
			setTimeout(function(){ ProgressBars(); }, 200); // custom-functions.js
		});


		/* adding arrow at the end of chat items */
		$('<div class="media-right"><span class="my-arrow-right"></span></div>').insertAfter("#chat_users .media-body");


		/* chat auto scrol to bottom */
		$('#send_btn').click(function () { ChatScroller(); }); // custom-functions.js
		$('#chat_users .media-body').click(function () { 
			setTimeout(function(){ ChatScroller(); }, 400); // custom-functions.js
		});
			

		/* chat box and sidebar height control */
		function chat_height() {
		    var Brheight = $(window).height();
		    $('.tower-body.js-control').css({'height':Brheight-300});
		}
		$(window).resize(chat_height);
		$(window).load(chat_height);


		/* on and off log out button in chat */
		$("#log_outer").click(function () {
			$(this).find('i').toggleClass('t#f07').toggleClass('t#444');
			cc_fColorClass(2);
		});






	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		THEME OPTIONS
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

		/* font size control */ 
	    $('#smaller.fontsize').click(function() {
			$('section, p, h1, h2, h3, h4, h5, h6').each(function() {
		    	var nums = parseFloat($(this).css('font-size'));
		        $(this).css('font-size', nums * 0.980392157 );
			});
	    });
	    $('#larger.fontsize').click(function() {
			$('section, p, h1, h2, h3, h4, h5, h6').each(function() {
		    	var nums = parseFloat($(this).css('font-size'));
		        $(this).css('font-size', nums * 1.02 );
			});
	    });



		/* theme colors */
	    $('.top-color-changer button').click(function(){
			$('#top-navbar').removeClass (function (index, css) {
				return (css.match (/(^|\s)b#\S+/g) || []).join(' ');
			}).removeClass (function (index, css) {
				return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
			}).addClass( $(this).attr('class') );
	        cc_fColorClass(6);
	    });
        $('#top-navbar').addClass('b#098 t#fff');
        $('#first-navbar .nav > li').addClass('b#bbb b%0=2');


	    $('.menu-color-changer button').click(function(){
			$('.main_content, #sidebar, .StickySidebar, #cssmenu li').removeClass (function (index, css) {
				return (css.match (/(^|\s)b#\S+/g) || []).join(' ');
			}).removeClass (function (index, css) {
				return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
			}).addClass( $(this).attr('class') );
			$('.main_content').removeClass (function (index, css) {
				return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
			});
	    	cc_fColorClass(6);
	    });
		$('#sidebar, .StickySidebar, #cssmenu li').addClass('b#fff t#777');
		$('.main_content').addClass('b#fff');
		$('#cssmenu li a').addClass('b#333 b%0=05');



		/* Option switches */
		$('#options input[type=checkbox]').click(function(){
			Option_switches(); // custom-functions.js
			SetPaddings(); // custom-functions.js
		});




		/* sidebar horizontal and vertical */
		$('#user_btn, #admin_close').click(function(){
			$('#menu_hor .administrator').slideToggle(100);
		});

		$('#m_orient').change(function () {
			var o = $('#m_orient').val();
			if (o=='vertical') {
				$('.StickySidebar').removeAttr('id').attr('id','menu_ver');
				$('#sidebar').css({'bottom':'0'});
			}
			if (o=='horizontal') {
				$('.StickySidebar').removeAttr('id').attr('id','menu_hor');
				$('#menu_hor ul').removeAttr('style');
				$('#sidebar').css({'bottom':'100%'});
			}
			SetPaddings(); // custom-functions.js
		});




		/* background patterns */
		$('#patt_btn').click(function(){
			$("#wait").show();
			$('#pattern_thumb').load('assets/patterns.html');
			// please open assets/patterns.html for jquery codes
		});




		/* sidebar corners */
		$( "#corners_slider" ).slider({
			value:0,
			min: 0,
			max: 20,
			slide: function( event, ui ) {
				$('#corners_txt').html( ui.value + 'px' );
				$('.panel').css({'border-radius': ui.value});
				$('.panel-heading').css({'border-top-left-radius': ui.value, 'border-top-right-radius': ui.value});
				$('.panel-footer').css({'border-bottom-left-radius': ui.value, 'border-bottom-right-radius': ui.value});
			}
		});
		$('#corners_slider').on('slidestart', function( event, ui ) {$('.panel').css({'border': '1px solid red'});} );
		$('#corners_slider').on('slidestop', function( event, ui ) {$('.panel').css({'border': '1px solid rgba(0,0,0,0.2)'});} );




		/* change sidebar width */
		$( "#side_width_slider" ).slider({
			value:230,
			min: 190,
			max: 310,
			slide: function( event, ui ) {
				$('#side_width_txt').html( ui.value + 'px' );
				$('#sidebar, .theiaStickySidebar').css({'width': ui.value});
				SetPaddings();
			}
		});




		/* save options */
		$('#save_options').click(function(){
			SaveOptions(); // custom-functions.js
			$('#ChangesSaved').show();
			setTimeout(function(){
				$('#ChangesSaved').hide();
			} , 1000);
		});






	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		PANEL MANAGER
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
		$('#find_panels').click(function(){
			$('.hide-panel, .show-panel').remove();
			$('td>.panel, #content>.panel').each(function() {
				var id = $(this).attr('id');
				var tx = $(this).find('>.panel-heading').text();
				if($(this).css('display') == 'none'){
					$('#all_panels').append('<li class="show-panel" save="'+id+'"><a class="t#21cb16">نمایش دادن'+tx+'</a></li>');
					$('.show-panel').click(function(){
				    	var pID = $(this).attr('save');
				    	$('#'+pID).fadeTo(200, 0.8).fadeTo(400, 0.3).fadeTo(100, 1);
						cc_fColorClass(4);
					});
				}
				else {
					$('#all_panels').append('<li class="hide-panel" save="'+id+'"><a class="t#ff3e3e">پنهان کردن'+tx+'</a></li>');
					$('.hide-panel').click(function(){
				    	var pID = $(this).attr('save');
				    	$('#'+pID).slideUp();
						cc_fColorClass(4);
					});
				}
			});
			cc_fColorClass(2);
		});





	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		SCROLL TO PANELS 
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
		$('#scroll_to_panels').click(function(){
			$('.scrol-to').remove();
			$('td>.panel, #content>.panel').each(function() {
				var id = $(this).attr('id');
				var tx = $(this).find('>.panel-heading').text();
				if($(this).css('display') == 'block'){
					$('#panels_to_scroll').append('<li class="scrol-to" save="'+id+'"><a>'+tx+'</a></li>');
				}
			});
			$('.scrol-to').click(function(){
				var pID = $(this).attr('save');
				if(pID == 'undefined') {
					toastr.warning('This panel has not ID!');
				}
				else {
					var x = $('#'+pID).offset().top;
					var SId = $('.StickySidebar').attr('id');

					if($('#topfix').prop("checked") && SId == 'menu_hor') {
						$('body, html').animate({scrollTop: x-97});
					}
					else if(!$('#topfix').prop("checked") && SId == 'menu_ver') {
						$('body, html').animate({scrollTop: x-5});
					}
					else {
						$('body, html').animate({scrollTop: x-55});
					};
				};
				setTimeout(function(){ $('#'+pID).fadeTo(200, 0).fadeTo(100, 1); },500);
				cc_fColorClass(4);
			});
		});





	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		COLOR PICKER WITH SLIDER
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
		function hexFromRGB(r, g, b) {
			var hex = [
				r.toString( 16 ),
				g.toString( 16 ),
				b.toString( 16 )
			];
			$.each( hex, function( nr, val ) {
				if ( val.length === 1 ) {
					hex[ nr ] = "0" + val;
				}
			});
			return hex.join( "" ).toUpperCase();
		}
		function refreshSwatch() {
			var red = $("#reds").slider("value"),
			green = $("#greens").slider("value"),
			blue = $("#blues").slider("value"),
			hex = hexFromRGB( red, green, blue );
			$("#swatch").css("background-color","#"+hex).html('RGB('+red+','+green+','+blue+')'+'<br>#'+hex);
		}
		$(function() {
			$("#reds, #greens, #blues").slider({
				orientation: "horizontal",
				range: "min",
				max: 255,
				slide: refreshSwatch,
				change: refreshSwatch
			});
			$("#reds").slider("value", 190);
			$("#greens").slider("value", 10);
			$("#blues").slider("value", 2);
		});






	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		WIDGETS
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
		/* todo task list */
		$('.todo>ul>li').click(function(){
			$(this).toggleClass('todo-done');
		});


		/* Input Validation + Colorful Input Groups */
	    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
			var $form = $(this).closest('form'),
	            $group = $(this).closest('.input-group'),
				$addon = $group.find('.input-group-addon'),
				$icon = $addon.find('span'),
				state = false;
	            
	    	if (!$group.data('validate')) {
				state = $(this).val() ? true : false;
			} else if ($group.data('validate') == "email") {
				state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
			} else if($group.data('validate') == 'phone') {
				state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
			} else if ($group.data('validate') == "length") {
				state = $(this).val().length >= $group.data('length') ? true : false;
			} else if ($group.data('validate') == "number") {
				state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
			}

			if (state) {
				$addon.removeClass('danger').addClass('success');
				$icon.attr('class', 'fa fa-check');
			} else {
				$addon.removeClass('success').addClass('danger');
				$icon.attr('class', 'fa fa-remove');
			}
	        
	        if ($form.find('.input-group-addon.danger').length == 0) {
	            $form.find('[type="submit"]').prop('disabled', false);
	        } else {
	            $form.find('[type="submit"]').prop('disabled', true);
	        }
		});
	    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
	    

		/* Orders - task list */
		$('.orders').sortable({
			cursor: "grabbing",
		});
		$('.add-task-btn').click(function(){
			var t = $('.add-task-input').val();
			$('.list-group.orders').append('<li class="list-group-item">'+t+'</li>');
			$('.list-group.orders li').dblclick(function(){
				$(this).remove();
			});
		});





	/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
		KEYBOARD SHORTCUTS
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
		var M = Mousetrap;
		M.addKeycodes({
			// http://keycode.info
			83:'s',84:'t',82:'r',66:'b',77:'m',78:'n',86:'v',72:'h',76:'l',79:'o',67:'c',75:'k',
		});
		M.bind('t', function() { $('#top_panel_slide').trigger('click')});		// top panel
		M.bind('r', function() { $('.side_panel_toggle_1').trigger('click')});	// right sidebar
		M.bind('b', function() { $('#box_option').trigger('click') });			// boxed layout
		M.bind('m', function() { $('#sidebar_toggle').trigger('click')});		// menu
		M.bind('n', function() { $('#nightmode').trigger('click') });			// night mode
		M.bind('v', function() { $('#m_orient').val('vertical').change()});		// vertical menu
		M.bind('h', function() { $('#m_orient').val('horizontal').change()});	// horizontal menu
		M.bind('l o c k', function() { $('#lockscreen').toggle()});				// lock screen



});
/* End document ready */






/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	Page Loading
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
$(window).load(function() {

	ProgressBars(); // custom-functions.js
	SetOptions(); // custom-functions.js

	$(".page-loading").fadeOut(800);

	// waves click effect
	Waves.attach('.btn, #cssmenu ul li a');
	Waves.attach('.pan-btn span', ['waves-circle']);
	Waves.init();

});
