"use strict"

var themeOptionArr = {
			typography: '',
			version: '',
			layout: '',
			primary: '',
			headerBg: '',
			navheaderBg: '',
			sidebarBg: '',
			sidebarStyle: '',
			sidebarPosition: '',
			headerPosition: '',
			containerLayout: '',
			direction: '',
		};



(function($) {
	
	"use strict"
	
	var direction =  getUrlParams('dir');
	var theme =  getUrlParams('theme');
	
	/* Dz Theme Demo Settings  */
	
	var dzThemeSet0 = { /* Default Theme */
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_1",
		headerBg: "color_1",
		navheaderBg: "color_2",
		sidebarBg: "color_2",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	
    
	
		
	function themeChange(theme, direction){
		var themeSettings = {};
		themeSettings = eval('dzThemeSet'+theme);
		themeSettings.direction = direction;
		dzSettingsOptions = themeSettings; /* For Screen Resize */
		new dzSettings(themeSettings);
		
		setThemeInCookie(themeSettings);
	}
	
	function setThemeInCookie(themeSettings)
	{
		//console.log(themeSettings);
		jQuery.each(themeSettings, function(optionKey, optionValue) {
			setCookie(optionKey,optionValue);
		});
	}
	
	function setThemeLogo() {
		var logo = getCookie('logo_src');
		
		var logo2 = getCookie('logo_src2');
		
		if(logo != ''){
			jQuery('.nav-header .logo-abbr').attr("src", logo);
		}
		
		if(logo2 != ''){
			jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
		}
	}

	/*  set switcher option start  */
	function getElementAttrs(el) {
		return [].slice.call(el.attributes).map((attr) => {
			return {
				name: attr.name,
				value: attr.value
			}
		});
	}
	
	 
	
	function setThemeOptionOnPage()
	{
		if(getCookie('version') != '')
		{
			jQuery.each(themeOptionArr, function(optionKey, optionValue) {
				var optionData = getCookie(optionKey);
				themeOptionArr[optionKey] = (optionData != '')?optionData:dzSettingsOptions[optionKey];
			});
			//console.log(themeOptionArr);
			dzSettingsOptions = themeOptionArr;
			new dzSettings(dzSettingsOptions);
			
			setThemeLogo();
		}
	}
	
	jQuery(document).on('click', '.dz_theme_demo', function(){
		setTimeout(() => {
			var allAttrs = getElementAttrs(document.querySelector('body'));
			//allAttrs.forEach(handleSetThemeOption);
		},1500);

		var demoTheme = jQuery(this).data('theme');
		themeChange(demoTheme, 'ltr');
		$('.dz-demo-panel').removeClass('show');
		jQuery('.main-css').attr('href','css/style.css');
	});


	jQuery(document).on('click', '.dz_theme_demo_rtl', function(){
		var demoTheme = jQuery(this).data('theme');
		themeChange(demoTheme, 'rtl');
		$('.dz-demo-panel').removeClass('show');
		jQuery('.main-css').attr('href','css/style-rtl.css');
	});
	
	
	jQuery(window).on('load', function(){
		direction = (direction != undefined) ? direction : 'ltr';

		if(getCookie('direction') == 'rtl'){
			jQuery('.main-css').attr('href','css/style-rtl.css');
		}

		if(theme != undefined){
			if(theme == 'rtl'){
				themeChange(0, 'rtl');
				jQuery('.main-css').attr('href','css/style-rtl.css');
			}else {
				themeChange(theme, direction);
			}
		}
		else if(direction != undefined){
			if(getCookie('version') == ''){	
				themeChange(0, direction);
			}
		}
		
		setTimeout(() => {
			var allAttrs = getElementAttrs(document.querySelector('body'));
			//allAttrs.forEach(handleSetThemeOption);
		},1500);

		/* Set Theme On Page From Cookie */
		setThemeOptionOnPage();
	});
	jQuery(window).on('resize', function(){
		setThemeOptionOnPage();
	});
	

})(jQuery);