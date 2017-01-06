var IMGs=document.getElementById('devLogin').getElementsByTagName('img');
for(i=0;i<IMGs.length;i++){
	IMGs[i].onerror=function(){};
	IMGs[i].src="";
	IMGs[i].style.backgroundImage="";
}