function updateGame(){
	processPlayerInput();
	updateGameLogic();
	draw();
	setTimeout(function(){updateGame();},25);
}
function draw(){
	var buffer=document.createElement('canvas');
	var canvas=document.getElementById('visible-canvas');
	buffer.width=canvas.width;
	buffer.height=canvas.height;
	var buffer_context=buffer.getContext('2d');
	var context=canvas.getContext('2d');
	
	//draw...
	
	context.drawImage(buffer,0,0);
}