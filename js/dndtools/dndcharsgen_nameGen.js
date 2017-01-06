var vowels = new Array(
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"a", "e", "i", "o", "u",
"ae", "ai", "ao", "au", "aa",
"ea", "eo", "eu", "ee",
"ia", "io", "iu", "ii",
"oa", "oe", "oi", "ou", "oo",
"eau",
"'",
"y")

var consonants = new Array(
["b", 3],  ["c", 3],  ["d", 3],  ["f", 3],  ["g", 3],  ["h", 3], 
["j", 3],  ["k", 3],  ["l", 3],  ["m", 3],  ["n", 3],  ["p", 3], 
["qu", 2],  ["r", 3], ["s", 3],  ["t", 3],  ["v", 3],  ["w", 3],
["x", 3],  ["y", 3],  ["z", 3], 

["sc", 3],
["ch", 3],  ["gh", 3],  ["ph", 3], ["sh", 3],  ["th", 3], ["wh", 2],
["ck", 1],  ["nk", 1],  ["rk", 1], ["sk", 3],  ["wk", 0],
["cl", 2],  ["fl", 2],  ["gl", 2], ["kl", 2],  ["ll", 2], ["pl", 2], ["sl", 2],
["br", 2],  ["cr", 2],  ["dr", 2],  ["fr", 2],  ["gr", 2],  ["kr", 2], 
["pr", 2],  ["sr", 2],  ["tr", 2],
["ss", 1],
["st", 3],  ["str", 2],

["b", 3],  ["c", 3],  ["d", 3],  ["f", 3],  ["g", 3],  ["h", 3], 
["j", 3],  ["k", 3],  ["l", 3],  ["m", 3],  ["n", 3],  ["p", 3], 
["r", 3], ["s", 3],  ["t", 3],  ["v", 3],  ["w", 3],
["b", 3],  ["c", 3],  ["d", 3],  ["f", 3],  ["g", 3],  ["h", 3], 
["j", 3],  ["k", 3],  ["l", 3],  ["m", 3],  ["n", 3],  ["p", 3], 
["r", 3], ["s", 3],  ["t", 3],  ["v", 3],  ["w", 3],
["br", 2],  ["dr", 2],  ["fr", 2],  ["gr", 2],  ["kr", 2]
)


function rolldie(minvalue, maxvalue) {
var result;
while (1) {
 result = Math.floor(Math.random() * (maxvalue-minvalue+1)+minvalue);
 if ((result >= minvalue) && (result <= maxvalue)) { return result;}
}
}

function RandomName(minsyl, maxsyl) {
var data = "";
var genname = "";
var leng = rolldie(minsyl, maxsyl);
var isvowel = rolldie(0, 1);
for (var i = 1; i <= leng; i++) {
 if (isvowel) {
   data = vowels[rolldie(0, vowels.length - 1)];
   if ( (data == "'") && ((i == 1) || (i == leng))) { data = "e";};
   genname += data;
 } else {
   do {
     data = consonants[rolldie(0, consonants.length - 1)];
     if ( i == 1) {
       if (data[1] & 2) {break;}
     } else if (i == leng) {
       if (data[1] & 1) {break;}
     } else {break;};
   } while (1)
   genname += data[0];
 }
 isvowel = 1 - isvowel;
}
genname = (genname.slice(0,1)).toUpperCase() + genname.slice(1);
return genname;
}

function FillRandomName(nameform) {
var finalvalue = "";
var minsyl = parseInt(nameform.minsyl.value, 10);
var maxsyl = parseInt(nameform.maxsyl.value, 10);

if (typeof(minsyl) != "number") {
 window.alert("Error, Minsyl invalid type.");
 return;
} else if (typeof(maxsyl) != "number") {
 window.alert("Error, Maxsyl invalid type.");
 return;
} else if (minsyl < 1) {
 window.alert("Error, Minsyl < 1.");
 return;
} else if (maxsyl < 1) {
 window.alert("Error, Maxsyl < 1.");
 return;
} else if (maxsyl < minsyl) {
 window.alert("Error, Requested maximum is smaller than minimum. Please change either the minimum or maximum to correct this.");
 return;
}

for (var i = 0; i < 10; i++) {
 var nameTemp=RandomName(minsyl,maxsyl);
 var o=new Option();
 o.text=nameTemp;
 o.value=nameTemp;
 document.f.namesSel.options[i]=o;
}
document.f.namesSel.options.selectedIndex=0;
}

function InitForm(nameform) {
FillRandomName(nameform);
}

function event_seen(evnt) {
 alert("Got event: " +  evnt.type);
}

function showstuff(info) {
 window.alert("Info is: " + info);
}
