
$(document).ready(function(){
	document.getElementById('out').setAttribute('style','background:#B8860B;');
	
	$('#out').click(function(){
		document.getElementById('out').setAttribute('style','background:#B8860B;');
		document.getElementById('send').setAttribute('style','background:transparent;');
		document.getElementById('write').setAttribute('style','background:transparent;');
		
	});
	$('#send').click(function(){
		
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
