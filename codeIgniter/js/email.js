//Show the element to html
function showElement(){
	
	document.getElementById('deleteImage').setAttribute('style','display:block;');

}

$(document).ready(function(){
	document.getElementById('out').setAttribute('style','background:#B8860B;');
	showElement();
	$('#out').click(function(){
		document.getElementById('out').setAttribute('style','background:#B8860B;');
		document.getElementById('send').setAttribute('style','background:transparent;');
		document.getElementById('write').setAttribute('style','background:transparent;');
		showElement();
	});
	$('#send').click(function(){
		showElement();
		document.getElementById('send').setAttribute('style','background:#B8860B;');
		document.getElementById('out').setAttribute('style','background:transparent;');
		document.getElementById('write').setAttribute('style','background:transparent;');
	});
	$('#write').click(function(){
		document.getElementById('write').setAttribute('style','background:#B8860B;');
		document.getElementById('send').setAttribute('style','background:transparent;');
		document.getElementById('out').setAttribute('style','background:transparent;');
		
		document.getElementById('deleteImage').setAttribute('style','display:none;');		
	});
});
