function applyStyle(startId,endId,eventName,color){

	color = color = ("000000" + color).slice(-6);	
	var row = document.getElementById(startId);

	var totalColumns = row.cells.length;
		
	totalColumns++;
	//alert(eventName + "initial : " +totalColumns);
	var width = 100 / totalColumns;
	for(var i=0; i<(totalColumns-1); i++){
		var column = row.cells[i];
		var oldColor = column.style.backgroundColor;
		oldColor = colorToHex(oldColor);

		column.removeAttribute('style');
		column.setAttribute('style','width:'+width+'%;background:#'+oldColor+';border: 1px solid #'+oldColor+'; color:'+invertColor(oldColor) + '; text-style:bold; ');

	}
	
	var column = row.insertCell(-1);

	column.innerHTML = eventName;
	//column.setAttribute('id',startId);
	column.setAttribute('style','width:'+width+'%;background:#'+color+';border: 1px solid #'+color+'; color:'+invertColor(color) + '; text-style:bold; ');
	startId = startId + 1800;

	while(startId != endId){
		var row = document.getElementById(startId);
		if(row != null){

			var totalColumns = row.cells.length;
	
			totalColumns++;
			//alert(eventName + "loop : " +totalColumns);
			var width = 100 / totalColumns;

			for(var i=0; i<(totalColumns-1); i++){
					var column = row.cells[i];
					var oldColor = column.style.backgroundColor;
					oldColor = colorToHex(oldColor);
					column.removeAttribute('style');
					column.setAttribute('style','width:'+width+'%;background:#'+oldColor+';border: 1px solid #'+oldColor+'; color:'+invertColor(oldColor) + '; text-style:bold; font-size:15px');

			}
	


			var column = row.insertCell(-1);
			column.setAttribute('id',startId);
			column.setAttribute('style','width:'+width+'%;background:#'+color+';border: 1px solid #'+color+';');
			startId = startId + 1800;
		}else{
			break;
		}
	}
}

function colorToHex(color) {

    var digits = /(.*?)rgb\((\d+), (\d+), (\d+)\)/.exec(color);
    
    var red = parseInt(digits[2]);
    var green = parseInt(digits[3]);
    var blue = parseInt(digits[4]);
    
    var rgb = blue | (green << 8) | (red << 16);
    return rgb.toString(16);
}

function invertColor(hexTripletColor) {
    var color = hexTripletColor;
    color = parseInt(color, 16);          // convert to integer
    color = 0xFFFFFF ^ color;             // invert three bytes
    color = color.toString(16);           // convert to hex
    color = ("000000" + color).slice(-6); // pad with leading zeros
    color = "#" + color;                  // prepend #
    return color;
}
