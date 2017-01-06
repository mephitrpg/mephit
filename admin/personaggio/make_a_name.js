/************************************************************************************************
*** Programmer: Jim Porter                                                                    ***
*** Email: spamerific@neo.rr.com                                                              ***
*** Webpage: http://www.thesoyokaze.net/thespamfiles/                                         ***
*** Copyright 1999 by Jim Porter. You may use this script providing you keep this header.     ***
************************************************************************************************/
var Letters=new Array();
Letters[0]=new Array('a','e','i','o','u','y','ae','ai','au','ea','ei','eu','ie','io','iu','oa','oi','ou','ui');
Letters[1]=new Array('b','c','d','f','g','h','j','k','l','m','n','p','r','s','t','v','w','x','z','bl','br','dr','fl','fr','cl','cr','gl','gr','kl','kr','pl','pr','qu','st','th','tr');
Letters[2]=new Array('-',' ');
var Style=new Array();
Style[0]=new Array(1,0,1);
Style[1]=new Array(0,1,0);
Style[2]=new Array(1,0,1,0);
Style[3]=new Array(0,1,0,1);
Style[4]=new Array(1,0,1,2,0,1,0);
Style[5]=new Array(1,0,1,2,1,0,1);
Style[6]=new Array(0,1,0,2,1,0,1);
Style[7]=new Array(0,1,0,2,0,1,0);
Style[8]=new Array(1,0,1,0,1);
Style[9]=new Array(0,1,0,1,0);
Style[10]=new Array(1,0,1,0,2,1,0,1);
Style[11]=new Array(1,0,1,0,2,0,1,0);
Style[12]=new Array(0,1,0,1,2,0,1,0);
Style[13]=new Array(0,1,0,1,2,1,0,1);
Style[14]=new Array(1,0,1,0,1,0);
Style[15]=new Array(0,1,0,1,0,1);
Style[16]=new Array(1,0,1,0,2,1,0,1,0);
Style[17]=new Array(1,0,1,0,2,0,1,0,1);
Style[18]=new Array(0,1,0,1,2,0,1,0,1);
Style[19]=new Array(0,1,0,1,2,1,0,1,0);

function MakeAName(q)
{NameType=Math.floor(Math.random()*100%Style.length);
Name1="";
Name2="";
for(i=0;i<(Style[NameType].length);i++)
{Name1+=Letters[Style[NameType][i]][(Math.floor(Math.random()*100%(Letters[Style[NameType][i]]).length))]; }
for(i=0;i<Name1.length;i++)
{if(Name1.charAt(i-1)=='-' || Name1.charAt(i-1)==' ')
{Name2+=(Name1.charAt(i)).toUpperCase(); }
else
{Name2+=Name1.charAt(i);
if(i==0)
{Name2=Name2.toUpperCase(); }
}
}
document.f.elements[q].value=Name2; 
}
