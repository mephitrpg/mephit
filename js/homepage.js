var homeMenu={
	playing:false,
	queue:[],
	current:'',
	over:function(q){
		if(!homeMenu.playing&&homeMenu.current!=q){
			homeMenu.current=q
			homeMenu.playing=true
			$$(".bigButton").each(function(b){
				b.hide();
			});
			Effect.BlindDown('scroller-'+q,{
				duration:0.5,
				from:((Prototype.Browser.IE)?0.1:0),
				afterFinish:function(e){
					homeMenu.playing=false
					if(homeMenu.queue.length!=0){
						eval(homeMenu.queue.pop())
					}
				}
			})
		}else{
			homeMenu.queue[0]=("homeMenu.over('"+q+"')")
		}
	},
	out:function(q){/*
		new Effect.BlindUp('scroller-'+q,{
			duration:0.5
		})
	*/}
}

