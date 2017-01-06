var jPrototype = {
	Version: '0.251-fork',
	nightly: '20090902',
/*
	lc1:["à","á","è","é","ì","í","ò","ó","ù","ú","ç"],
	uc1:["À","Á","È","É","Ì","Í","Ò","Ó","Ù","Ú","Ç"],
	eq1:["a","a","e","e","i","i","o","o","u","u","c"],
	lc2:["š","œ" ,"ž","ÿ","â","ã","ä","å","æ" ,"ê","ë","î","ï","ð","ñ","ô","õ","ö","û","ü","ý","þ" ,"ß" ],
	uc2:["Š","Œ" ,"Ž","Ÿ","Â","Ã","Ä","Å","Æ" ,"Ê","Ë","Î","Ï","Ð","Ñ","Ô","Õ","Ö","Û","Ü","Ý","Þ" ,"ß" ],
	eq2:["s","oe","z","y","a","a","a","a","ae","e","e","i","i","d","n","o","o","o","u","u","y","th","ss"]
*/
	lc:[353,339,382,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,248,249,250,251,252,253,254,255],
	eq:["s","oe","z","ss","a","a","a","a","a","a","ae","c","e","e","e","e","i","i","i","i","d","n","o","o","o","o","o","d","u","u","u","u","y","th","y"]
}
jPrototype.lc.each(function(v,i){jPrototype.lc[i]=String.fromCharCode(v);});

// Retrocompatibility:
function byTag(q){return $$(q);}
function byClass(q){return $$("."+q);}
function byId(q){return $(q);}
// :Retrocompatibility

function dump(o){
	var level_current=arguments[1]||0;
	var level_next=level_current+1;
	var indent_single="    ";
	var indent_current="";
	var indent_next="";
	for(var i=0;i<level_current;i++)indent_current+=indent_single;
	var indent_next=indent_current+indent_single;
	var result = ''; 
	     if(is.Null(o))   result += '{ } null';
	else if(is.U(o)) result += '{ } undefined';
	else if(is.S(o)) result += '{s:'+o.length+'} "' + o.replace(/"/,'\\"') + '"' ;
	else if(is.B(o)) result += '{b} ' + (o?"true":"false") ;
	else if(is.N(o)) result += '{n} ' + o ;
	else if(is.F(o)) result += '{f} ' + String(o).split("\n").join("\n"+indent_current) ;
	else if(is.Date(o)) result += '{D} '+o.getFullYear().zeroFill()+'-'+(o.getMonth()+1).zeroFill()+'-'+o.getDate().zeroFill()+' '+o.getHours().zeroFill()+':'+o.getMinutes().zeroFill()+':'+o.getSeconds().zeroFill()+' '+o.getMilliseconds().zeroFill(3);
	else if(is.Array(o)){
		var l=o.length;
		result += '{a:'+l+') [';
		o.each(function(v,k){
			result += '\n'+indent_next+k+': ';
			result += dump(v,level_next) ;
			result += "," ;
		});
		if (l>0) result  = result.substr(0,result.length-1)+'\n';
		result += indent_current+']' ;
	}else if(is.Object(o)){
		if(is.Defined(o.tagName)){
			result += '{H} '+o.tagName;
		}else if(is.Defined(o.nodeName)){
			result += '{X} '+o.nodeName;
		}else{
			var l=$A(o).length;
			result += '{o:'+l+') {';
			for(k in o){
				v=o[k];
				result += '\n'+indent_next+k+': ';
				result += dump(v,level_next) ;
				result += "," ;
			}
			if (l>0) result  = result.substr(0,result.length-1)+'\n';
			result += indent_current+'}' ;
		}
	}
	return result;
}

function log(q){
	try{
		console.log(q);
	}catch(e){
		if(!$("jLog")){
			$$("BODY").first().insert({top:'<div id="jLog" style="float:right;"></div>'})
		}
		var jconsole=$("jLog"),d=new Date();
		if(jconsole){
			jconsole.insert(
				'<div>['+d.getHours().zeroFill()+':'+d.getMinutes().zeroFill()+':'+d.getSeconds().zeroFill()+']</div>'
				+'<xmp>'+dump(q)+'</xmp>'
			);
		}
	}
}

function trace(){alert($A(arguments))};

function ALLOF(check,values){
	result=true;
	values.each(function(v){if(check!=v)result=false;});
	return result;
}
function NONEOF(check,values){
	var result=true;
	values.each(function(v){if(check==v)result=false;});
	return result;
}
function ONEOF(check,values){
	var result=false;
	values.each(function(v){if(check==v)result=true;});
	return result;
}
function ONENOTOF(check,values){
	result=false;
	values.each(function(v){if(check!=v)result=true;});
	return result;
}

function wr(q){document.write(q)};
function wri(q){document.write(q)};
function xmp(q){wri("<xmp>"+q+"</xmp>")};
function div(q){wri("<div>"+q+"</div>")};
function ce(q){return document.createElement(q)};
function ac(q,p){p.appendChild(q)};
function rc(q,p){p.removeChild(q)};
function px(q){return parseInt(q)+"px"};
function ascii(q){return String.fromCharCode(q)};

function count(q){
	if(typeof q.length!="undefined")return q.length;
	var t,i=0;
	for(t in q)i++;
	return i;
};
function global(k){
	if(arguments.length>1)window[k]=arguments[1];
	return window[k];
};

// fix both IE and Opera (adjust when they implement this method properly)
// http://webbugtrack.blogspot.com/2007/08/bug-152-getelementbyid-returns.html
if(Prototype.Browser.IE||Prototype.Browser.Opera){
	document.nativeGetElementById = document.getElementById;
	document.getElementById = function(id){
		var elem = document.nativeGetElementById(id);
		if(elem){
			if(elem.id == id){
				return elem;
			}else{
				for(var i=1;i<document.all[id].length;i++){
					if(document.all[id][i].id == id){
						return document.all[id][i];
					}
				}
			}
		}
		return null;
	};
}

function $EX(element){
	// Extract Value
	element=$(element);
	if(is.formElement(element))					return $F(element);
	if(is.Defined(element.innerHTML))			return element.innerHTML;
	return element;
}
function $FGet(element){
	var isArrayOfFormElements=false;
	if(is.Defined(element.length)){
		if(element.length>0){
			if(is.Defined(element[0].tagName)){
				var tag=element[0].tagName.toUpperCase();
				isArrayOfFormElements=ONEOF(tag,["INPUT","TEXTAREA","SELECT"]);
			}
		}
	}
	if(isArrayOfFormElements){
		i=element;
	}else{
		q=$(element);
		// se non è l'elemento di una form: return false
		if(!is.formElement(element))return false;
		// se non ha un nome: return value
		if(is.Empty(q.name))return $F(q);
		// se invece ha un nome: recupero l'elemento tramite il suo nome
		var i=q.form.elements[q.name];
		// controllo se è un array di elementi
		if(!is.Defined(i.length)){
			// se non è un array: return value
			return $F(i);
		}else if(is.Defined(i.options)){
			// se è una select: return value
			return $F(i);
		}
	}
	if(i[0].type=="radio"){
		// se è un array di radio: return array value
		for(var j=0;j<i.length;j++){
			if(i[j].checked)return i[j].value;
		}
		return null;
	}else{
		// se è un array di input: return array value
		var r=[];
		if(i[0].type=="checkbox"){
			// array di checkbox
			for(var j=0;j<i.length;j++){
				if(i[j].checked)r.push(i[j].value);
			}
		}else{
			// array di input text o textarea
			for(var j=0;j<i.length;j++){
				r.push(i[j].value);
			}
		}
		return r;
	}
}
function $FSet(element,value){
	// build my own Array.indexOf
	// because actual Prototype version (1.6.0.2) uses "===" operator
	// instad of "==" operator
	function $FSet_indexOf(ago,pagliaio){
		var l=pagliaio.length;
		for(var i=0;i<l;i++)if(pagliaio[i]==ago)return i;
		return -1;
	}
	var isArrayOfFormElements=false;
	if(is.Defined(element.length)){
		if(element.length>0){
			if(is.Defined(element[0].tagName)){
				var tag=element[0].tagName.toUpperCase();
				isArrayOfFormElements=ONEOF(tag,["INPUT","TEXTAREA","SELECT"]);
			}
		}
	}
	if(isArrayOfFormElements){
		i=element;
	}else{
		q=$(element);
		if(!is.formElement(element))return false;
		if(!is.Empty(q.name))i=q.form.elements[q.name];
		else i=q;
	}
	if(is.Defined(i.options)){
		if(!is.Array(value))value=(function(){v=[];v[0]=value;return v;})();
		for(var j=0;j<q.options.length;j++){
			var o=q.options[j];
			o.selected=($FSet_indexOf(o.value,value)!=-1)?1:0;
		}
	}else if(!is.Defined(i.length)){
		i.value=value;
	}else if(i[0].type=="radio"){
		value=$A(value);
		for(var j=0;j<i.length;j++){
			var o=i[j];
			o.checked=($FSet_indexOf(o.value,value)!=-1)?1:0;
		}
	}else{
		value=$A(value);
		if(i[0].type=="checkbox"){
			for(var j=0;j<i.length;j++){
				var o=i[j];
				o.checked=($FSet_indexOf(o.value,value)!=-1)?1:0;
			}
		}else{
			for(var j=0;j<i.length;j++){
				var o=i[j];
				if(is.Defined(value[j]))o.value=value[j];
			}
		}
	}
	return $(element);
}

Element.addMethods({
	
	// Forms
	
	getFormElements:function(element){
		return [$(element).select("INPUT"),$(element).select("TEXTAREA"),$(element).select("SELECT")].flatten();
	},
	get:function(element){
		return $FGet(element);
	},
	set:function(element,value){
		return $FSet(element,value);
	},
	getIndex:function(element){
		// WORK IN PROGRESS: NON SOLO SELECT
		q=$(element);
		if(q.tagName!="SELECT")return -1;
		if(arguments.length==1)return q.options.selectedIndex;
		
		var value=arguments[1];
		var r=[];
		$A(q.options).each(function(o,i){
			if(o.value==value)r.push(i);
		});
		return (r.length==1)?r[0]:r;
		return q;
	},
	setIndex:function(element,index){
		// WORK IN PROGRESS: NON SOLO SELECT
		q=$(element);
		if(q.tagName!="SELECT")return -1;
		$A(index).each(function(v){
			q.options[v].selected=1;
		})
		return q;
	},
	
	// Checks
	
	is:function(element,what){
		switch(what){
			case"Num":			return is.Num($EX(element));			break;
			case"Int":			return is.Int($EX(element));			break;
			case"Float":		return is.Float($EX(element));			break;
			case"Empty":		return is.Empty($EX(element));			break;
			case"Email":		return is.Email($EX(element));			break;
			case"Url":			return is.Url($EX(element));			break;
			case"CreditCard":	return is.CreditCard($EX(element));		break;
			case"CodiceFiscale":return is.CodiceFiscale($EX(element));	break;
			case"PIVA":			return is.PIVA($EX(element));			break;
			case"Tel":			return is.Tel($EX(element));			break;
			case"formElement":	return is.formElement(element);			break;
			//	various
			case"positioned":	return is.positioned(element);			break;
		}
	},
	
	// Position
	
	setDimensions:function(element,dim){
		var d=$A(dim),element=$(element);
		$(element).style.width=px(d[0]);
		$(element).style.height=px(d[1]);
		return element;
	},
	setWidth:function(element,dim){
		$(element).style.width=parseInt(dim)+"px";
		return element;
	},
	setHeight:function(element,dim){
		$(element).style.height=parseInt(dim)+"px";
		return element;
	},
	setLeft:function(element,left){
		$(element).style.left=parseInt(left)+"px";
		return element;
	},
	setTop:function(element,top){
		$(element).style.top=parseInt(top)+"px";
		return element;
	},
	setMidLeft:function(element,left){
		$(element).style.left=(parseInt(left)-Element.getDimensions(element).width/2)+"px";
		return element;
	},
	setMidTop:function(element,top){
		$(element).style.top=(parseInt(top)-Element.getDimensions(element).height/2)+"px";
		return element;
	},
	setPos:function(element,pos){
		element=$(element);
		if(element.is("positioned")){
			pos=$A(pos);
			element.style.left=pos[0]+"px";
			element.style.top=pos[1]+"px";
		}
		return element;
	},
	setMid:function(element,pos){
		element=$(element);
		if(element.is("positioned")){
			pos=$A(pos);
			var dim=element.getDimensions();
			element.style.left=(pos[0]-dim.width/2)+"px";
			element.style.top=(pos[1]-dim.height/2)+"px";
		}
		return element;
	},
	getPos:function(element){
		element=$(element);
		if(element.is("positioned")){
			//return [parseInt(element.style.left),parseInt(element.style.top)];
			return element.cumulativeOffset();
		}else{
			return element.cumulativeOffset();
		}
	},
	getMid:function(element){
		element=$(element);
		var pos,dim=Element.getDimensions(element);
		if(element.is("positioned")){
			//pos=[parseInt(element.style.left),parseInt(element.style.top)];
			pos=element.cumulativeOffset();
		}else{
			pos=element.getOffsetParent().cumulativeOffset();
		}
		return [pos[0]+dim.width/2,pos[1]+dim.height/2];
	},
	
	// Flash
	
	swfobject:function(element,src,width,height){
		element=$(element);
		if(typeof swfobject!="undefined"){
			var o=arguments[4]||{};
			var id=element.identify();
			var version=is.Defined(o.version)?o.version:"9.0.0";
			var expressInstall=is.Defined(o.expressInstall)?o.expressInstall:false;
			var flashvars=is.Defined(o.flashvars)?o.flashvars:false;
			var params=is.Defined(o.params)?o.params:{};
			var attributes=is.Defined(o.attributes)?o.attributes:false;
			if(!is.Defined(params.wmode))params.wmode='opaque';
			swfobject.embedSWF(src,id,width,height,version,expressInstall,flashvars,params,attributes);
		}else{
			element.insert('<div><a href="http://code.google.com/p/swfobject/" target="_blank" style="color:#f00;">SWFOBJECT NOT FOUND</a></div>');
		}
		return element;
	},
	
	// Retrocompatibility
	
	byId:function(element,q){return element.select("#"+q);},
	byTag:function(element,q){return element.select(q);},
	byClass:function(element,q){return element.select("."+q);},

	// Miscellaneous
	
	index:function(element){
		return element.up().childElements().indexOf(element);
	}

}); 

var is = {
	// enviroment
	global:function(q){
		return window[q]!="undefined";
	},
	// browser
	IE: Prototype.Browser.IE,
	Opera: Prototype.Browser.Opera,
	WebKit: Prototype.Browser.WebKit,
	Gecko: Prototype.Browser.Gecko,
	Win:navigator.appVersion.toLowerCase().indexOf("win")!=-1,
	Mac:navigator.userAgent.indexOf("Mac")!=-1,
	// objects
	formElement: function(q){
		q=$(q);
		if(q)switch(q.tagName.toUpperCase()){case"TEXTAREA":case"INPUT":case"SELECT":return true;}
		return false;
	},
	// normal types
	S : function(q){ return typeof q == "string" },
	B : function(q){ return typeof q == "boolean" },
	N : function(q){ return typeof q == "number" },
	F : function(q){ return typeof q == "function" },
	O : function(q){ return typeof q == "object" },
	U : function(q){ return typeof q == "undefined" },
	// special types
	Date : function(q){
		return Object.prototype.toString.call(q) === '[object Date]'; 
	},
	Array   : function(q){
		return Object.prototype.toString.call(q) === '[object Array]'; 
	},
	Object  : function(q){ return !is.Array(q) && !is.Date(q) && is.O(q) },
	Defined : function(q){ return !is.U(q) },
	Null    : function(q){ return is.O(q) && q==undefined },
	// validation
	RealDate:function(yyyy,mm,gg){
		function y2k(q){return(q<1000)?q+1900:q;}
		var today=new Date();
		yyyy = ((!yyyy) ? y2k(today.getFullYear()):yyyy)
		mm = ((!mm) ? today.getMonth():mm-1)
		if (!gg) return false
		var test = new Date(yyyy,mm,gg)
		if ((y2k(test.getFullYear()) == yyyy) && (mm == test.getMonth()) && (gg == test.getDate()) ){
			return true
		}else{
			return false

		}
	},
	Num     : function(q){
		if(is.N(q))return true;
		var str=String(q);
		var re = /^[\-\+]{0,1}[0-9]+\.{0,1}[0-9]*$/;
		return re.test(str);
	},
	Int     : function(q){
		var str=String(q);
		var re = /^[\-]{0,1}[0-9]+$/;
		return re.test(str);
	},
	Float   : function(q){
		var str=String(q);
		var re = /^[\-]{0,1}[0-9]+\.[0-9]+$/;
		return re.test(str);
	},
	Empty	: function(q){
		var str=String(q);
		return (is.S(str)||is.N(str))?(String(str).trim()==""):false;
		
	},
	Email  : function(q){
		var str=String(q);
		var re = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\.\-]+$/i;
		return re.test(str);
	},
	Url    : function(q){
		var str=String(q);
		var re = /^((https?|ftp|news):\/\/)?([a-z]([a-z0-9\-]*\.)+([a-z]{2,6})|(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))(\/[a-z0-9_\-\.~]+)*(\/([a-z0-9_\-\.]*)(\?[a-z0-9+_\-\.%=&amp;]*)?)?(#[a-z][a-z0-9_]*)?$/i;
		return re.test(str);
	},
	CreditCard : function(q) {
		// Encoding only works on cards with less than 19 digits
		var str=String(q);
		if(typeof str!="string")return false;
		if (str.length > 19)return (false);
		var sum=0, mul=1, l=str.length;
		for (i = 0; i < l; i++) {
			var digit = str.substring(l-i-1,l-i);
			var tproduct = parseInt(digit ,10)*mul;
			sum += (tproduct >= 10) ? ((tproduct%10)+1) : tproduct ;
			mul += (mul == 1) ? 1 : -1 ;
		}
		return ((sum % 10)==0) ;
	},
	CodiceFiscale : function(q){
		var str=String(q);
		var re = /^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i;
		return re.test(str);
	},
	PIVA : function(q){
		var str=String(q);
		var re = /^\d{11}$/;
		return re.test(str);
	},
	Tel : function(q){
		var str=String(q);
		var re = /^\+{0,1}[\d\s\-\.\(\)\[\]]+$/;
		return re.test(str);
	},
	//	various
	positioned:function(element){
		element=$(element);
		var p=element.getStyle("position");
		return p=='absolute'||p=='relative';
	}
}

var Cookie = {
  set: function(name, value, o) {
	var daysToExpire,path;
	if(typeof o=="undefined"){
		daysToExpire=365*2;
		path="/";
	}else{
		if(is.Num(o))daysToExpire=o;
		else if(typeof o.expire!="undefined")daysToExpire=o.expire;
		else daysToExpire=365*2;
		if(is.Num(o))path="/";
		else if(typeof o.path!="undefined")path=o.path;
		else path="/";
	}
	
 	var expire = '';
	if (daysToExpire != undefined) {
      var d = new Date();
      d.setTime(d.getTime() + (86400000 * parseFloat(daysToExpire)));
      expire = '; expires=' + d.toGMTString();
    }
	var path = '; path='+path;
	
	
    return (document.cookie = escape(name) + '=' + escape(value || '') + expire + path);
  },
  get: function(name) {
    var cookie = document.cookie.match(new RegExp('(^|;)\\s*' + escape(name) + '=([^;\\s]*)'));
    return (cookie ? unescape(cookie[2]) : null);
  },
  del: function(name) {
    var cookie = Cookie.get(name) || true;
    Cookie.set(name, '', -1);
    return cookie;
  },
  isEnabled: function() {
    if (typeof navigator.cookieEnabled == 'boolean') {
      return navigator.cookieEnabled;
    }
    Cookie.set('_test', '1');
    return (Cookie.del('_test') === '1');
  },
  exists: function(name){
	return !(Cookie.get(name)===null);
  }
};

Object.extend(String.prototype, {
	find: function(q){return this.indexOf(q) != - 1;},
	zeroFill:function(){
		var q=arguments[0]||2;

		if(!is.Num(this))return this;
		else return (this*1).zeroFill(q);
	},
	timestamp2date:function(q){
		q=this.replace(/\D/g,"");
		return new Date(q.substr(0,4),q.substr(4,2)-1,q.substr(6,2),q.substr(8,2),q.substr(10,2),q.substr(12,2));
	},
	fileext:function(){
		var s = this;
		if(s.indexOf("?")!=-1)s=s.substr(0,s.indexOf("?"));
		if(s.indexOf("#")!=-1)s=s.substr(0,s.indexOf("#"));
		return (s.lastIndexOf(".")!=-1) ? s.substring(s.lastIndexOf(".")+1,s.length) : s ;
	},
	filename:function(){
		var s = this;
		if(s.indexOf("?")!=-1)s=s.substr(0,s.indexOf("?"));
		if(s.indexOf("#")!=-1)s=s.substr(0,s.indexOf("#"));
		return (s.lastIndexOf("/")!=-1) ? s.substring(s.lastIndexOf("/")+1,s.length) : s ;
	},
	trim:function(){
		  return this.replace(/^[\n\r\t\v\f\u00a0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000]+/, '').replace(/[\n\r\t\v\f\u00a0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000]+$/, '');
	},
	lower:function(){
		return this.toLowerCase();
/*
		var i,s=this.toLowerCase(),extended=arguments[0]||false;
		var from=(extended)?[jPrototype.uc1,jPrototype.uc2].flatten():jPrototype.uc1;
		var to=(extended)?[jPrototype.lc1,jPrototype.lc2].flatten():jPrototype.lc1;
		var q=from.lenght;
		for(i=0;i<q;i++)if(s.indexOf(from[i])!=-1)s=s.split(from[i]).join(to[i]);
		return s;
*/
	},
	upper:function(){
		return this.toUpperCase();
/*
		var i,s=this.toUpperCase(),extended=arguments[0]||false;
		var from=(extended)?[jPrototype.lc1,jPrototype.lc2].flatten():jPrototype.lc1;
		var to=(extended)?[jPrototype.uc1,jPrototype.uc2].flatten():jPrototype.uc1;
		var q=from.lenght;
		for(i=0;i<q;i++)if(s.indexOf(from[i])!=-1)s=s.split(from[i]).join(to[i]);
		return s;
*/
	},
	toPermalink:function(){
		var p=this.toLowerCase();
		var m=p.match(/[^0-9a-z]/g);
		if(!m)return p;
		m.uniq().each(function(v){
			var r=new RegExp("\\"+v,"g");
			var i=jPrototype.lc.indexOf(v);
			if(i!=-1){
				p=p.replace(r,jPrototype.eq[jPrototype.lc.indexOf(v)]);
			}else{
				p=p.replace(r,"-");
			}
		});
		
		while(p.indexOf("--")!=-1){
			p=p.replace(/--/,"-");
		}
		if(p.indexOf("-")==0)p=p.substring(1);
		if(p.lastIndexOf("-")==p.length-1)p=p.substring(0,p.length-1);
		if(p.length>255)p=p.substring(0,255);
		return p;
	},
	parseNumbers:function(){
		return this.match(/-{0,1}\d+(\.\d+)*/g);
	},
	parseIntegers:function(){
		var s=this.parseNumbers();
		var r=[]
		s.each(function(i){
			r.push(parseInt(i));
		})
		return r;
	},
	parseIDs:function(){
		var s=this.parseNumbers();
		var r=[]
		s.each(function(i){
			if( i*1>0 && i==parseInt(i) ){
				r.push(parseInt(i));
			}
		})
		return r;
	},
	parseEmails:function(){
		return this.match(/[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\.\-]+/g);
	},
	parseLinks: function(q){
		return this.match(/((https?|ftp|news):\/\/)?([a-z]([a-z0-9\-]*\.)+([a-z]{2,6})|(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))(\/[a-z0-9_\-\.~]+)*(\/([a-z0-9_\-\.]*)(\?[a-z0-9+_\-\.%=&amp;]*)?)?(#[a-z][a-z0-9_]*)?/g);
	}
});

// navigator.version
if(is.IE){
	navigator.version=navigator.userAgent.split("MSIE ")[1].split(" ")[0].replace(";","");
}else if(is.Opera){
	navigator.version=navigator.userAgent.substring(navigator.userAgent.lastIndexOf("/")+1).split(" ")[0];
}else if(is.Gecko){
	navigator.version=navigator.userAgent.split("; rv:")[1].split(")")[0];
}else if(is.WebKit){
	navigator.version=navigator.userAgent.split("AppleWebKit/")[1].split(" ")[0];
}else{
	navigator.version=navigator.userAgent.substring(navigator.userAgent.lastIndexOf("/")+1)
}
navigator.lowerThan=function(a){
	a=String(a).split(".");b=navigator.version.split(".");
	var q=Math.max(a.length,b.length);
	for(var i=0;i<q;i++){
		var v1=1*((typeof a[i]!="undefined")?a[i]:0);
		var v2=1*((typeof b[i]!="undefined")?b[i]:0);
		if(v1>v2)return true;
	}
	return false;
}
navigator.higherThan=function(a){
	a=String(a).split(".");b=navigator.version.split(".");
	var q=Math.max(a.length,b.length);
	for(var i=0;i<q;i++){
		var v1=1*((typeof a[i]!="undefined")?a[i]:0);
		var v2=1*((typeof b[i]!="undefined")?b[i]:0);
		if(v1>v2)return false;
	}
	return true;
}
navigator.equalTo=function(a){
	a=String(a).split(".");b=navigator.version.split(".");
	var q=Math.max(a.length,b.length);
	for(var i=0;i<q;i++){
		var v1=(typeof a[i]!="undefined")?a[i]:0;
		var v2=(typeof b[i]!="undefined")?b[i]:0;
		if(v1!=v2)return false;
	}
	return true;
}

Object.extend(Number.prototype, {
	prev: function(){return this - 1;},
	next: function(){return this + 1;},
	zeroFill:function(){
		var q=arguments[0]||2;
		var s=String(this);
		var isFloat=s.indexOf(".")!=-1;
		var isNegative=s.indexOf("-")==0;
		
		if(isFloat){
			var int=s.substring(isNegative?1:0,s.lastIndexOf("."));
			var float=s.substring(s.lastIndexOf(".")+1);
		}else{
			var int=s.substring(isNegative?1:0);
			var float="";
		}
		
		if(q>=0){
			if(int.length>=q)return s;
			var r=int;
			for(var i=int.length;i<q;i++)r="0"+r;
			if(isNegative)r="-"+r;
			if(isFloat)r+="."+float;
		}else{
			q*=-1;
			if(float.length>=q)return s;
			var r=((isNegative)?"-":"")+int+"."+float;
			for(var i=float.length;i<q;i++)r+="0";
		}
		return r;
	},
	timestamp2date:function(){
		q=this.replace(/\D/g,"");
		return new Date(q.substr(0,4),q.substr(4,2)-1,q.substr(6,2),q.substr(8,2),q.substr(10,2),q.substr(12,2));
	}
});

Object.extend(Math,{
	baseConvert:function(n,b1,b2){return parseInt(String(n),b1).toString(b2).toUpperCase();},
	gra2rad:function(G){return G*Math.PI/180;},
	rad2gra:function(R){return R*180/Math.PI;}
});

Object.extend(Form,{
	submit:function(form){
		form=$(form);
		if(form.onsubmit!=null){
			switch(form.onsubmit()){
				case true:case undefined:form.submit();
			}
		}else form.submit();
	}
});

Ajax.Request.prototype.abort = function() {
    // prevent and state change callbacks from being issued
    this.transport.onreadystatechange = Prototype.emptyFunction;
    // abort the XHR
    this.transport.abort();
    // update the request counter
    if(Ajax.activeRequestCount>0)Ajax.activeRequestCount--;
};

Function.prototype.name=function(q){
	// q can be a function or an "arguments.callee"
	var results = String(q).match(/function (\S+)\(/); // in Opera the regexp doesn't work if i put "^" at the beginning
	if(results)if(results.length>1)return results[1];
	return null;
}

Object.extend(window,{
	getScroll:function(){
		return document.viewport.getScrollOffsets();
	},
	getDimensions:function(){
		return document.viewport.getDimensions();
	},
	pop:function(){
		// pop ( href [,target] [,x] [,y] [,"maximized"] [,"fullscreen"] [,"noresize"] [,"nocenter"] [,"scroll"] [,"return"] )
		// eg: pop('http://www.google.com',400,300,'myTarget','scroll')
		if(arguments.length>0){
			_url=arguments[0];
			var x,y,o,_target="",_params=[],center=true,maximized=false,fullscreen=false,resizable=true,scroll=false,returnObj=false;
			if(!document.all || (document.all && navigator.userAgent.indexOf("Mac")!=-1) ){
				for(i=1;i<arguments.length;i++){
					if(arguments[i]=="fullscreen"){
						arguments[i]="maximized";
						break;
					}
				}
			}
			if(arguments.length>1){
				for(i=1;i<arguments.length;i++){
					if(isNaN(arguments[i])){
						switch(arguments[i]){
							case"nocenter":
								center=false;
							break;
							case"scroll":
								scroll=true;
							break;
							case"maximized":
								maximized=true;
								_params[_params.length]="left=0";
								_params[_params.length]="top=0";
								_params[_params.length]="width="+(screen.width-6);
								_params[_params.length]="height="+(screen.height-26);
							break;
							case"fullscreen":
								fullscreen=true;
								_params[_params.length]="fullscreen=yes";
								if(document.all)_params[_params.length]="channelmode=yes"; 
							break;
							case"noresize":
								resizable=false;
								_params[_params.length]="resizable=no";
							break;
							case"return":
								returnObj=true;
							break;
							default:
								_target=arguments[i];
							break;
						}
					}
				}
				if(!fullscreen && !window[_target])_params[_params.length]="scrollbars="+((scroll)?"yes":"no");
				if(!maximized && !fullscreen &&  !window[_target]){
					for(i=1;i<arguments.length;i++){
						if(!isNaN(arguments[i]) && !maximized){
							if(x==undefined){
								x=arguments[i];
								_params[_params.length]="width="+x;
							}else{
								y=arguments[i];
								_params[_params.length]="height="+y;
							}
						}
					}
					if(center && !window[_target]){
						_params[_params.length]="left="+((screen.width-x)/2);
						_params[_params.length]="top="+((screen.height-y)/2);
					}
				}
			}
			o=window.open(_url,_target,_params.join(","));
			if(o==undefined)alert("L'apertura della finestra è stata bloccata");
			if(returnObj)return o;
		}
	}
});

Object.extend(Date.prototype,{
	toTimestamp:function(){
		var Y=this.getFullYear();
		var m=(this.getMonth()+1).zeroFill();
		var d=(this.getDate()).zeroFill();
		var H=(this.getHours()).zeroFill();
		var i=(this.getMinutes()).zeroFill();
		var s=(this.getSeconds()).zeroFill();
		return ""+Y+m+d+H+i+s;
	}
});

function click(q){q.onclick();}

$_GET=location.href.toQueryParams();
$_SERVER={
	PHP_SELF:location.pathname,
	QUERY_STRING:location.search.substring(location.search.indexOf("?")==0?1:0)
};