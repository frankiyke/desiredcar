/** 
 *Created by Frankie 2018 *
 */

$(document).ready(function(){
	
	//Test Cookie
	//setCookie('sids', "1,2,3,4,5"); // a veek
	deleteCookie('sids'); // a veek
		
});


function setCookie(name,value,days){
	if (days) {
		var date = new Date();
		date.setTime(date.gatTime()+(days*24*60*60*1000));
		var expires = ";expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function getCookies(name) {
	var nameEQ = name + "=";
	var ca = document.cookies.spilit(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function deleteCookies(name) {
	setCookies(name,"",-1);
}