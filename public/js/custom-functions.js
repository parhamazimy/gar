/*****************************************************************************************
 * Template Name: adbob - Admin Dashboard Based On Bootstrap
 * Template Version: 1.0
 * Author: HyperClass team
 * Note: In this file there are functions that by calling them you can do many things without coding.
		 It was explained at the top of each function.
*****************************************************************************************/



/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	By this functions you can save options in localstorage or set them in page elements
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function ToBoolean(v) {
	if (v == 'true') 	var x = 1;
	if (v == 'false')	var x = 0;

	return x;
}

function SetOptions() {

	if(typeof Storage !== "undefined" && localStorage.FirstSave == 'yes') { 


		// top bar color
		$('#top-navbar').removeClass (function (index, css) {
			return (css.match (/(^|\s)b#\S+/g) || []).join(' ');
		}).removeClass (function (index, css) {
			return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
		}).addClass(localStorage.TC);

		// top bar floating
		$('#topfix').prop( 'checked', ToBoolean(localStorage.TF) );


		// content
		$('#content').css({'background-image':localStorage.CB});
		$('body').css({'background-image':localStorage.BB});
		$('#box_option').prop( 'checked', ToBoolean(localStorage.BL) );
		$('#nightmode').prop( 'checked', ToBoolean(localStorage.NM) );


		// menu display
		if (localStorage.MD == 'open')
			$('#sidebar').removeClass('is-close').addClass('is-open');
		if (localStorage.MD == 'close')
			$('#sidebar').removeClass('is-open').addClass('is-close');

		// menu orientation
		$('#m_orient').val(localStorage.MP).change();

		// menu color
		$('.main_content, #sidebar, .StickySidebar, #cssmenu li').removeClass (function (index, css) {
			return (css.match (/(^|\s)b#\S+/g) || []).join(' ');
		}).removeClass (function (index, css) {
			return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
		}).addClass( localStorage.MC );
		$('.main_content').removeClass (function (index, css) {
			return (css.match (/(^|\s)t#\S+/g) || []).join(' ');
		});

		// menu floating
		$('#sidefix').prop( 'checked', ToBoolean(localStorage.SF) );

		// menu width
		$('#side_width_txt').html( localStorage.SW + 'px' );
		$('#sidebar, .theiaStickySidebar').css({'width': localStorage.SW});
		$('#side_width_slider').slider('value',localStorage.SW);


		// columns width
		$('#column2').width(localStorage.CW);

		var corner = localStorage.PC + 'px';
		$('#corners_txt').html( corner );
		$('.panel').css({'border-radius': corner});
		$('.panel-heading').css({'border-top-left-radius': corner, 'border-top-right-radius': corner});
		$('.panel-footer').css({'border-bottom-left-radius': corner, 'border-bottom-right-radius': corner});
		$('#corners_slider').slider('value',localStorage.PC);
	}
	else {
	  // please set cookie
	}

	// necessary functions
	Option_switches();
	SetPaddings();
	cc_fColorClass(6);
	$('#sidebar_toggle').trigger('click').trigger('click');
}

function SaveOptions(){

	if(typeof Storage !== "undefined") {

		// top bar
		localStorage.TC = $('#top-navbar').attr('class'); 					// topbar color
		localStorage.TF = $('#topfix').prop("checked");						// top fix

		// content
		localStorage.CB = $('#content').css('background-image');			// content background
		localStorage.BB = $('body').css('background-image');				// body background
		localStorage.BL = $('#box_option').prop("checked");					// boxed layout
		localStorage.NM = $('#nightmode').prop("checked");					// night mode

		// menu
		if ($('#sidebar').hasClass('is-open'))
			localStorage.MD = 'open';
		else
			localStorage.MD = 'close';										// menu display

		localStorage.MP = $('#m_orient').val();								// menu position
		localStorage.MC = $('#cssmenu li').attr('class');					// menu color
		localStorage.SF = $('#sidefix').prop("checked");					// sidebar fix
		localStorage.SW = $('#side_width_slider').slider('option','value');	// sidebar width

		// columns
		localStorage.CW = $('#column2').width();							// #column2 width
		localStorage.PC = $('#corners_slider').slider('option', 'value');	// panel corner

		// for first option saving
		localStorage.FirstSave = 'yes';
	}
	else {
	  // please set cookie
	}

};




/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	This function check the switch option's switch and regard to their states change the items on screen.
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function Option_switches() {
	// fixed top bar
    if($('#topfix').prop("checked")) {
		$('#top-navbar').css({'position':'fixed'});
    }else {
		$('#top-navbar').css({'position':'absolute'});
    };

	// sticky side bar
    if($('#sidefix').prop("checked") && $('.StickySidebar').attr('id')=='menu_ver' && $('#sidebar').hasClass("is-open")) {
		$('#sidebar').removeClass('no-sticky').css({'bottom':'0px'});
    }else {
		$('#sidebar').addClass('no-sticky').css({'bottom':'auto'}); 
	};

	// Boxet layout
    if($('#box_option').prop("checked")) {
		$('body').removeClass('container-fluid').addClass('container');
		var sb = Math.round(($('html').width() - $('body').width()) / 2 - 15);
		$('#sidebar').css({'right' : sb});
    }else {
		$('body').removeClass('container').addClass('container-fluid');
		$('#sidebar').css({'right' : '0px'});
    };

	// night mode colors
    if($('#nightmode').prop("checked")) {
    	$('body').addClass('night-mode');
    }else {
    	$('body').removeClass('night-mode');
    };
};




/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	By calling this function you can set distance header padding and sidebars in any situation.
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function SetPaddings() {
	var W = $(window).width();
	var S = $('#sidebar');
	var Sw = $('#sidebar').width();
	var T = $('#topfix');
	var SId = $('.StickySidebar').attr('id');

	// main content and body
	if ( SId == 'menu_ver' && S.hasClass("is-open") && W>992 ) {
		$('.main_content').css({'padding-right': Sw});
	}else {
		$('.main_content').css({'padding-right':'0px'});
	};

	// content
	if( S.hasClass("is-open") && SId=='menu_hor' ) {
		$('#content').css({'padding-top':'80px'});
	}else {
		$('#content').css({'padding-top':'40px'});
	};

	// sidebar
	if( !T.prop('checked') && S.hasClass("is-open") && SId=='menu_hor') {
		$('#sidebar').css({'margin-top':'0px'});
	}else {
		$('#sidebar').css({'margin-top':'50px'});
	};

	// header and side panel
	if ( !T.prop('checked') && S.hasClass("is-open") && SId=='menu_hor' && W>992 ) {
		$('header#top-navbar').css({'top':'42px','z-index':'90'});
		$('#side_panel').css({'top':'90px'});
	}else {
		$('header#top-navbar').css({'top':'0px','z-index':'93'});
		$('#side_panel').css({'top':'50px'});
	};


	if ( W > 970 ) {
		$('#menu_hor ul').removeAttr('style');
	}
};




/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	Toggle full screen mode
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function FullScreen() {
	document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : 
	document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : 
	document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : 
	document.cancelFullScreen ? document.cancelFullScreen() : 
	document.mozCancelFullScreen ? document.mozCancelFullScreen() : 
	document.webkitCancelFullScreen && document.webkitCancelFullScreen()
};




/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	This function scroll to the last chat message box at the right Thus,
	after loading each message must call this function.
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function ChatScroller() {
	var height = 0;
	$('#user_message>div').each(function(i, value) {
	    height += parseInt($(this).height());
	});
	height += '';
	$('.tower-body').animate({scrollTop: height});
};




/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	The function according to the type of Progress Bar and filling percentage 
	give appropriate color to the bootstrap progressbars.
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
function ProgressBars() {
	/* progress bar auto coloring */
	$( ".pr-good .progress-bar" ).each(function() {
		$(this).removeClass (function (index, css) {
			return (css.match (/(^|\s)progress-bar\S+/g) || []).join(' ');
		});
		var P = $(this).width() / $(this).parent().width() * 100;
		if (P <= 25) {
			$(this).addClass('progress-bar progress-bar-danger');
		};
		if (P > 25 && P <= 50) {
			$(this).addClass('progress-bar progress-bar-warning');
		};
		if (P > 50 && P <= 75) {
			$(this).addClass('progress-bar progress-bar-info');
		};
		if (P > 75) {
			$(this).addClass('progress-bar progress-bar-success');
		};
	});

	$( ".pr-bad .progress-bar" ).each(function() {
		var P = $(this).width() / $(this).parent().width() * 100;
		$(this).removeClass (function (index, css) {
			return (css.match (/(^|\s)progress-bar\S+/g) || []).join(' ');
		});
		if (P <= 25) {
			$(this).addClass('progress-bar progress-bar-success');
		};
		if (P > 25 && P <= 50) {
			$(this).addClass('progress-bar progress-bar-info');
		};
		if (P > 50 && P <= 75) {
			$(this).addClass('progress-bar progress-bar-warning');
		};
		if (P > 75) {
			$(this).addClass('progress-bar progress-bar-danger');
		};
	});

	/* progress bar auto active on hover */
	$('.pr-ac').mouseover(function() {
		$(this).addClass('active');
	});

	$('.pr-ac').mouseout(function() {
		$(this).removeClass('active');
	});
};
	



/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= 
	Multi level menu tree 
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */
$.fn.extend({
    treed: function (o) {

		var openedClass;
		var closedClass;

		openedClass = o.openedClass;
		closedClass = o.closedClass;

        var tree = $(this);
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator fa " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });

		tree.find('.branch .indicator').each(function(){
			$(this).on('click', function () {
				$(this).closest('li').click();
			});
		});

        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
