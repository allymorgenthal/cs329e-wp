var diffX, diffY, theElement;

function grabber(event) {

	theElement = event.currentTarget;

	var posX = parseInt(theElement.style.left);
	var posY = parseInt(theElement.style.top);

	diffX = event.clientX - posX;
	diffY = event.clinetY - posY;

	document.addEventListener("mousemove", mover, true);
 	document.addEventListener("mouseup", dropper, true);

 	event.stopPropagation();
  	event.preventDefault();
}

function mover(event) {

	theElement.style.left = (event.clientX - diffX) + "px";
  	theElement.style.top = (event.clientY - diffY) + "px";

  	event.stopPropagation();
}

function dropper(event) {

	document.removeEventListener("mouseup", dropper, true);
  	document.removeEventListener("mousemove", mover, true);

  	event.stopPropagation();
}