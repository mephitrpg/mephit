function signum(q){if(q>0)return 1;if(q<0)return -1;return 0;}
function worldToMap(q){return Math.floor(q/cside);}
function mapToWorld(q){return q*cside;}

function los(startX,startZ,endX,endZ/*jure:accepts angle too:jure*/){
	
	var coords=[];
	if(arguments.length>4){
		var dir=vector_direction(startX,startZ,endX,endZ,arguments[4]);
	}else{
		var dir=vector_direction(startX,startZ,endX,endZ);
	}
	var dirX=dir.dirX,dirY=dir.dirY;
	
	var tDeltaX = cside / Math.abs(dirX); // how far we must move in the ray direction before we encounter a new voxel in x-direction
	var tDeltaY = cside / Math.abs(dirY); // same but y-direction
	
	// start voxel coordinates
	var x = worldToMap(startX);  // use your transformer function here
	var y = worldToMap(startZ);
	coords.push({x:x,y:y});
	
	// end voxel coordinates
	var endX1 = worldToMap(endX);
	var endY1 = worldToMap(endZ);
	
	// decide which direction to start walking in
	var stepX = signum(dirX);
	var stepY = signum(dirY);
	
	var tMaxX, tMaxY;
	// calculate distance to first intersection in the voxel we start from
	if(dirX < 0)tMaxX = (mapToWorld(x)-startX) / dirX;
	else tMaxX = (mapToWorld(x+1)-startX) / dirX;
	
	if(dirY < 0)tMaxY = (mapToWorld(y)-startZ) / dirY;
	else tMaxY = (mapToWorld(y+1)-startZ) / dirY;
	
	// check if first is occupied
	var cw=checkWall(x,y,dir);
	if(cw.stop)return coords;
	
	var reachedX = false, reachedY = false, stop=false;//var debug=0;
	while(true){
		
	 if (tMaxX < tMaxY) { tMaxX += tDeltaX; x += stepX;}
	 else { tMaxY += tDeltaY; y += stepY; }
	
	 if (stepX > 0){ if (x >= endX1)reachedX = true; }
	 else if (x <= endX1){ reachedX = true; }
	
	 if (stepY > 0){ if (y >= endY1)reachedY = true; }
	 else if (y <= endY1){ reachedY = true; }
	
	 coords[coords.length]={x:x,y:y}
	 
	 if(stop)break;
	 var cw=checkWall(x,y,dir);
	 if(cw.stop==1)return coords;
	 else if(cw.stop==2)stop=true;
	 
	 if(reachedX && reachedY)break;
	 
//	 debug++;if(debug>100){console.log("DEBUG STOP");break;}
	 
	}
	//console.log(coords)
	return coords;
	
}