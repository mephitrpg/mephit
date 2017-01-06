function deg2rad(q){return q/180*Math.PI;}
function rad2deg(q){return q/Math.PI*180;}

function tiraNaRigaRossa(AX,AY,BX,BY){
	buffer_ctx.lineWidth=1;
	buffer_ctx.strokeStyle = "rgb(255,0,0)" ;
	buffer_ctx.beginPath();
	buffer_ctx.moveTo(AX,AY);
	buffer_ctx.lineTo(BX,BY);
	buffer_ctx.stroke();
}

function vector_direction(startX,startY,endX,endY){
	// calculate the direction of the ray (linear algebra)
	var dirX = (endX - startX);
	var dirY = (endY - startY);
	var length = Math.sqrt(dirX * dirX + dirY * dirY);
	dirX /= length; // normalize the direction vector
	dirY /= length;
	//cardinal direction
	var name;
	if(dirY<0){
		if(dirX<0)name="NW";
		else if(dirX>0)name="NE";
		else name="N";
	}else if(dirY>0){
		if(dirX<0)name="SW";
		else if(dirX>0)name="SE";
		else name="S";
	}else{
		if(dirX<0)name="W";
		else name="E";
	}
	
	//equazione della retta
	if(arguments.length>4){
		var a=arguments[4];
		while(a<0)a+=360;
		var m=tan[a];
	}else{
		var m=dirY/dirX;
		var a=rad2deg(Math.atan(m));
		while(a<0)a+=360;
	}
	
	var q=startY-m*startX;
		
	return {
		name:name,
		m:m,q:q,a:a,
		dirX:dirX,dirY:dirY,
		startX:startX,startY:startY,
		endX:endX,endY:endY
	};
}

function castRaysFrom(x,y){
	
	var sight={}
	var sight_cw={}
	var start={
		x:Math.round(PG.x*cside+cside_half),
		y:Math.round(PG.y*cside+cside_half)
	};
	for(var alpha=0;alpha<3600;alpha+=rayCastingPrecision){
//	for(var alpha=0;alpha<3600;alpha+=rayCastingPrecision){
/*
		if(alpha<10){
			var angle=("0."+alpha)*1;
		}else{
			var angle=alpha+"",l=angle.length-1;
			angle=(angle.substr(0,l)+"."+angle.substr(l,1))*1;
		}
*/
		var angle=alpha/10;
		var end={
			x:Math.round(start.x+vision*cside*cos[angle]),
			y:Math.round(start.y+vision*cside*sin[angle])
		}
		var vector=los(start.x,start.y,end.x,end.y,angle);
		var dir=vector_direction(start.x,start.y,end.x,end.y,angle);
		var l=vector.length;
		for(var i=0;i<l;i++){
			var p=vector[i],draw=false;
			if(typeof sight[p.x]=="undefined")sight[p.x]={};
			if(typeof sight[p.x][p.y]=="undefined")sight[p.x][p.y]=0;
			if(sight[p.x][p.y]==1){
				draw=false;
			}else{
				var cw=checkWall(p.x,p.y,dir,vector,i);
				draw=cw.show||cw.visibleBorders!='0000';
			}
			if(draw){
				if(typeof sight_cw[p.x]=="undefined")sight_cw[p.x]={};
				if(typeof sight_cw[p.x][p.y]=="undefined")sight_cw[p.x][p.y]={};
				sight_cw[p.x][p.y]=cw;
				
				sight[p.x][p.y]=cw.show?1:0;
				
				var cwid=cw.id*1;
				/*
				if(cwid<10)var cwids="0000"+cwid;
				else if(cwid<100)var cwids="000"+cwid;
				else if(cwid<1000)var cwids="00"+cwid;
				else if(cwid<10000)var cwids="0"+cwid;
				else*/
				var cwids= cw.id;
				
				//if(cw.id!=0)console.log("B",dir.name,cwids,cw.id)
									
				var cell_x=(p.x-origin.x)*cside;
				var cell_y=(p.y-origin.y)*cside;
				
				if(cw.show){
					if(cwids[0]=='0'){
						buffer_ctx.fillStyle = "rgb(200,200,200)" ;
						buffer_ctx.fillRect(cell_x+screenGap,cell_y+screenGap,cside,cside);
					}else{
						buffer_ctx.fillStyle = "rgb(0,255,255)";
						buffer_ctx.fillRect(cell_x+screenGap,cell_y+screenGap,cside,cside);
					}
				}
				
				//console.log(cwid,cwids,cwids[0],cwids[1],cwids[2],cwids[3],cwids[4])
/*				var drawBorders=cw.visibleBorders!='00000';
//					if(drawBorders)console.log(dir)
				if(drawBorders){
					buffer_ctx.lineWidth=wallLineWidth;
					buffer_ctx.strokeStyle = "rgb(0,255,255)" ;
					buffer_ctx.beginPath();
				}
				
				//console.log(cwids,cwids[2]=='1')
				if(cw.visibleBorders[0]=='1'&&cwids[1]=='1'){
					buffer_ctx.moveTo(cell_x,cell_y);
					buffer_ctx.lineTo(cell_x+cside,cell_y);
				}
				if(cw.visibleBorders[1]=='1'&&cwids[2]=='1'){
					buffer_ctx.moveTo(cell_x+cside,cell_y);
					buffer_ctx.lineTo(cell_x+cside,cell_y+cside);
				}
				if(cw.visibleBorders[2]=='1'&&cwids[3]=='1'){
					buffer_ctx.moveTo(cell_x+cside,cell_y+cside);
					buffer_ctx.lineTo(cell_x,cell_y+cside);
				}
				if(cw.visibleBorders[3]=='1'&&cwids[4]=='1'){
					buffer_ctx.moveTo(cell_x,cell_y+cside);
					buffer_ctx.lineTo(cell_x,cell_y);
				}
				if(drawBorders){
					buffer_ctx.stroke();
				}
*/				
			}
		}
/*		
		if(angle>311&&angle<317){
			console.log("RigaRossa",dir,vector)
			tiraNaRigaRossa(start.x-mapToWorld(origin.x),start.y-mapToWorld(origin.y),end.x-mapToWorld(origin.x),end.y-mapToWorld(origin.y))
			ctx.drawImage(buffer,0,0);
			alert('');
		}
*/
//		tiraNaRigaRossa(start.x-mapToWorld(origin.x),start.y-mapToWorld(origin.y),end.x-mapToWorld(origin.x),end.y-mapToWorld(origin.y))
//		ctx.drawImage(buffer,0,0);alert('');
	}
	
	for(a in sight_cw)if(sight_cw.hasOwnProperty(a)){
		for(b in sight_cw[a])if(sight_cw[a].hasOwnProperty(b)){
			a*=1;b*=1;
			//console.log(a,b)cw.visibleBorders!='0000';
			
				
				var cell_x=(a-origin.x)*cside;
				var cell_y=(b-origin.y)*cside;
				
				var sight_cell_N=typeof sight[a][b-1]!="undefined"?sight[a][b-1]:0;
				var sight_cell_E=typeof sight[a+1]   !="undefined"?sight[a+1][b]:0;
				var sight_cell_S=typeof sight[a][b+1]!="undefined"?sight[a][b+1]:0;
				var sight_cell_W=typeof sight[a-1]   !="undefined"?sight[a-1][b]:0;
				
				if(map[a][b].charAt(0)=='1'){
					hasBorders={N:1,E:1,S:1,W:1}
				}else{
					hasBorders={N:map[a][b].charAt(1)*1,E:map[a][b].charAt(2)*1,S:map[a][b].charAt(3)*1,W:map[a][b].charAt(4)*1}
				}
				visBorders={
					N:sight_cw[a][b].visibleBorders.charAt(0)*1,
					E:sight_cw[a][b].visibleBorders.charAt(1)*1,
					S:sight_cw[a][b].visibleBorders.charAt(2)*1,
					W:sight_cw[a][b].visibleBorders.charAt(3)*1
				}
				
				if(hasBorders.N&&visBorders.N){
					buffer_ctx.lineWidth=wallLineWidth;
					buffer_ctx.strokeStyle = "rgb(0,255,255)" ;
					buffer_ctx.beginPath();
					buffer_ctx.moveTo(cell_x,cell_y);
					buffer_ctx.lineTo(cell_x+cside,cell_y);
					buffer_ctx.stroke();
				}
				if(hasBorders.E&&visBorders.E){
					buffer_ctx.lineWidth=wallLineWidth;
					buffer_ctx.strokeStyle = "rgb(0,255,255)" ;
					buffer_ctx.beginPath();
					buffer_ctx.moveTo(cell_x+cside,cell_y);
					buffer_ctx.lineTo(cell_x+cside,cell_y+cside);
					buffer_ctx.stroke();
				}
				if(hasBorders.S&&visBorders.S){
					buffer_ctx.lineWidth=wallLineWidth;
					buffer_ctx.strokeStyle = "rgb(0,255,255)" ;
					buffer_ctx.beginPath();
					buffer_ctx.moveTo(cell_x+cside,cell_y+cside);
					buffer_ctx.lineTo(cell_x,cell_y+cside);
					buffer_ctx.stroke();
				}
				if(hasBorders.W&&visBorders.W){
					buffer_ctx.lineWidth=wallLineWidth;
					buffer_ctx.strokeStyle = "rgb(0,255,255)" ;
					buffer_ctx.beginPath();
					buffer_ctx.moveTo(cell_x,cell_y+cside);
					buffer_ctx.lineTo(cell_x,cell_y);
					buffer_ctx.stroke();
				}
			
		}
	}
}