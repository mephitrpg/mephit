<?php
$BODY.='<style>
#theRule{background:#FFDBDB;padding:6px;}
#theRule .rulepart{display:block;display:inline-block;float:left;}
#theRule SELECT{display:block;display:inline-block;float:left;}
</style>';
$BODY.='<script>
var _MATERIALS_ = {
	metal:{iron:[],ironcold:[],mithral:[],silveralchemical:[],adamantium:[],steel:[]},
	wood:{wood:[],darkwood:[],},
	hide:{dragonhide:[],leather:[]},
}

function array_keys(q){
	// http://javascript.info/tutorial/type-detection
	var toClass={}.toString,type=toClass.call(q);
	if(type=="[object Array]"){
		var keys=[],l=q.length;
		for(var i=0;i<l;i++)keys.push(String(i));
		return keys;
	}else if(type=="[object Object]"){
		var keys=[];
		for(t in q)keys.push(t);
		return keys;
	}else{
		return null;
	}
}

var ruletree={
	proficiency:{
		weapons:{
			simple:{
				unarmed:_MATERIALS_,
				melee_light:_MATERIALS_,
				melee_onehanded:_MATERIALS_,
				melee_twohanded:_MATERIALS_,
				ranged:_MATERIALS_
			},
			martial:{
				melee_light:_MATERIALS_,
				melee_onehanded:_MATERIALS_,
				melee_twohanded:_MATERIALS_,
				ranged:_MATERIALS_
			},
			exotic:{
				melee_light:_MATERIALS_,
				melee_onehanded:_MATERIALS_,
				melee_twohanded:_MATERIALS_,
				ranged:_MATERIALS_
			}
		},
		armors:{
			light:_MATERIALS_,
			medium:_MATERIALS_,
			heavy:_MATERIALS_
		},
		shields:{
			generic:_MATERIALS_,
			buckler:_MATERIALS_,
			tower:_MATERIALS_,
		}
	}
};

function command(element){
	switch(element.value){
		case"add":
		case"remove":
		case"treat":
			filter_show(element)
		break;
	}
}
/*
function filter_show(element){
	var col=$(element).up(".rulepart");
	col.nextSiblings().each(function(el,i){el.remove();});
	var html=[];
	html.push(\'<div class="rulepart"><select size="10" class="ruletree" onchange="filter_show(this)">\');
	var keys=array_keys(ruletree),l=keys.length;
	for(var i=0;i<l;i++)html.push(\'<option value="\'+keys[i]+\'">\'+keys[i]+\'</option>\');
	html.push(\'</select></div>\');
	col.insert({after:html.join("")});
}
*/
function filter_show(element){
	var col=$(element).up(".rulepart");
	col.nextSiblings().each(function(el,i){el.remove();});
	var path=[];
	$$("#theRule .ruletree").each(function(el,i){path.push(el.value);});
	var path_ultimo=path.length>0?path[path.length-1]:null;
	var path_penulitimo=path.length>1?path[path.length-2]:null;
	if(path_ultimo!="all"&&path_penulitimo!="all"){
		var addAll=path.length!=0;
		var obj=ruletree;
		while(path.length){
			obj=obj[path[0]];
			path.splice(0,1);
		}
		var html=[];
		html.push(\'<div class="rulepart"><select size="10" class="ruletree" onchange="filter_show(this)">\');
		if(addAll)html.push(\'<option value="all">\'+\'all\'+\'</option>\');
		var keys=array_keys(obj),l=keys.length;
		for(var i=0;i<l;i++)html.push(\'<option value="\'+keys[i]+\'">\'+keys[i]+\'</option>\');
		html.push(\'</select></div>\');
		col.insert({after:html.join("")});
	}else{
		if(path_penulitimo=="all"&&path_ultimo=="choose"){
			// choose and numbers.
			// numbers means that the choice is of the player.
			var html=[];
			html.push(\'<div class="rulepart">\');
				html.push(\'<input type="text"><br>\');
				html.push(\'<select size="9" class="ruletree" onchange="filter_show(this)">\');
				html.push(\'</select>\');
			html.push(\'</div>\');
			col.insert({after:html.join("")});
		}else if(path_penulitimo!="all"){
			var html=[];
			html.push(\'<div class="rulepart"><select size="10" class="ruletree" onchange="filter_show(this)">\');
			html.push(\'<option value="all">\'+\'all\'+\'</option>\');
			html.push(\'<option value="choose">\'+\'choose\'+\'</option>\');
			for(var i=1;i<=10;i++)html.push(\'<option value="\'+i+\'">\'+i+\'</option>\');
			html.push(\'</select></div>\');
			col.insert({after:html.join("")});
		}else{
			// non fare nulla
		}
	}
}
</script>';
$BODY.='<br>';
$BODY.='<div id="theRule" class="row">';
	$BODY.='<div class="rulepart">';
		$BODY.='<select size="10" onchange="command(this);">
		<option value="add">'.$_LANG[add].'</option>
		<option value="remove">'.$_LANG[remove].'</option>
		<option value="treat">'.$_LANG[treat].'</option>
		</select>';
	$BODY.='</div>';
$BODY.='</div>';
$BODY.='<br>';
?>