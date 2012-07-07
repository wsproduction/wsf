/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var windowSizeArray = [ "width=600,height=400","width=300,height=400,scrollbars=no" ];

$(function(){
	
	$('.shared').click(function (event){
 
		var url = $(this).attr("href");
		var windowName = "popUp";//$(this).attr("name");
		var windowSize = windowSizeArray[$(this).attr("rel")];

		window.open(url, windowName, windowSize);

		event.preventDefault();

	});
});
