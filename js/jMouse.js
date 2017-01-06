var jMouse = {
	Version: '0.14-fork',
	nightly: '20080427',
	onMove:function(f){
		var useCapture=arguments[1]||true;
		Event.observe(window,"load",f,useCapture);
		Event.observe(document,"mousemove",f,useCapture);
	},
	onWheel:function(f){
		var e=arguments[1]||document;
		var useCapture=arguments[2]||true;
		Event.observe(e,"mousewheel",f,useCapture);
		Event.observe(e,"DOMMouseScroll",f,useCapture); // Firefox
	},
	x:-1,
	y:-1,
	getCoords:function(e){
		jMouse.x=Event.pointerX(e);
		jMouse.y=Event.pointerY(e);
	},
	fromElement:function(e){
		if (!e) var e = window.event;
		var relTarg = e.relatedTarget || e.fromElement;
		return relTarg;
	},
	toElement:function(e){
		if (!e) var e = window.event;
		var relTarg = e.relatedTarget || e.toElement;
		return relTarg;
	}
};

jMouse.onMove(jMouse.getCoords);

var jTooltip = {
	ajaxCall:null,
	ajaxReloadEveryMouseover:false,
	show:function(){
		var t=$("jTooltip");
		if(t){
			jTooltip.move();
			if(arguments.length>0){
				t.innerHTML=arguments[0];
			}
			t.show();
		}
	},
	hide:function(){
			var t=$("jTooltip");
			if(t){
				t.hide();
			}
	},
	move:function(){
		
		                        var opt=arguments[0]||{};
		if(!is.Object(opt))     var opt={};
		                            opt.coords=[jMouse.x,jMouse.y];
		if(!is.Defined(opt.pos))    opt.pos="rm";
		var t=$("jTooltip");
		
		if(t){if(t.visible()){
			var xy = opt.coords ;
			var wh = Object.values(t.getDimensions());
			var WH = Object.values(window.getDimensions());
			
			var x = parseInt(xy[0]);
			var y = parseInt(xy[1]);
			var w = parseInt(wh[0]);
			var h = parseInt(wh[1]);
			var W = parseInt(WH[0]);
			var H = parseInt(WH[1]);
			
			var pos=String(opt.pos);
			var left = pos.charAt(0);
			var top  = pos.charAt(1);
			var margin = 6  ;
			var cursor = 16 ;
			
			switch(left){
				case"l":			x=x-w-margin;		break;
				case"c":			x=x-w/2;			break;
				case"r":default:	x=x+cursor+margin;	break;
			}
			switch(top){
				case"t":			y=y-h-margin;		break;
				case"b":			y=y+cursor+margin;	break;
				case"m":default:	y=y-h/2;			break;
			}
			
			var scrollAmount=Object.values(document.viewport.getScrollOffsets());
			
			if(x<0)x=0;
			else if(x+w-scrollAmount[0]>W)x=W+scrollAmount[0]-w;
			if(y<0)y=0;
			else if(y+h-scrollAmount[1]>H)y=H+scrollAmount[1]-h;
			t.setStyle({left:x+"px",top:y+"px"});
			
		}}
	},
	observe:function(e,txt){
		var opt=arguments[2]||{};
		if(typeof opt.align=="undefined")opt["align"]="rm";
		if(typeof opt.parameters=="undefined")opt["parameters"]={};
		if(typeof opt.parameters_callback=="undefined")opt["parameters_callback"]=[];
		Event.observe(e,is.IE?'mouseenter':'mouseover',function(ev){
			try{jTooltip.ajaxCall.abort();}catch(e){}
			if(opt.ajax){
				jTooltip.show("<em>Loading...</em>");
				if(opt.parameters_callback.length>0){
					for(var i=0;i<opt.parameters_callback.length;i++){
						var newParam=opt.parameters_callback[i].func(opt.parameters_callback[i].args);
						opt.parameters[newParam.key]=newParam.value;
					}
				}
				jTooltip.ajaxCall=new Ajax.Updater("jTooltip",txt,opt);
			}else{
				jTooltip.show(txt);
				jTooltip.move({pos:opt.align});
			}
		});
		Event.observe(e,is.IE?'mouseleave':'mouseout',function(ev){
			jTooltip.hide();
		});
		Event.observe(e,'mousemove',function(ev){
			jTooltip.move({pos:opt.align});
		});
	},
	create:function(){
		if(!$("jTooltip")){
			var body=$$("body")[0];
			var div=ce("div");
			div.id="jTooltip";
			div.style.display="none";
			div.style.position="absolute";
			ac(div,body);
			jTooltip.observe(div);
		}
	}
}

Object.extend(Event, {
	wheel:function (event){
		var delta = 0;
		if (!event) event = window.event;
		if (event.wheelDelta) {
			delta = event.wheelDelta/120; 
			if (window.opera) delta = -delta;
		} else if (event.detail) { delta = -event.detail/3;	}
		if(event.preventDefault)event.preventDefault();
		return Math.round(delta); //Safari Round
	}
});

Element.addMethods({
	onWheel:function(element,f){
		jMouse.onWheel(f,element);
	},
	tooltip:function(element,txt){
		var opt=arguments[2]||{};
		jTooltip.observe(element,txt,opt);
	}
});

Object.extend(is,{
	leftClick:function(e){
		return Event.isLeftClick(e);
	},
	middleClick:function(e){
		var middleclick;
		if (!e) var e = window.event;
		if (e.which) middleclick = (e.which == 2);
		else if (e.button) middleclick = (e.button == 4);
		return 	middleclick;
	},
	rightClick:function(e){
		var rightclick;
		if (!e) var e = window.event;
		if (e.which) rightclick = (e.which == 3);
		else if (e.button) rightclick = (e.button == 2);
		return 	rightclick;
	}
});

document.observe("dom:loaded",jTooltip.create);