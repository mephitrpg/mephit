<?php
require_once(dirname(__FILE__)."/include/mysql2i/mysql2i.class.php");
require_once(dirname(__FILE__)."/include/db_connect.php");

switch($_GET[act]){
	case "select":
		header("Content-type: application/json");
		$f = (int) $_GET[f];
		$c = (int) $_GET[c];
		$l = (int) $_GET[l];
		$query = "
			SELECT *
			FROM srd35_class_feature_level
			WHERE fk_privilegio = $f
			AND fk_classe = $c
			AND fk_livello = $l
		";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$json = array(
				num => mysql_num_rows($result),
				json => $row[json],
				table_it => $row[table_it],
				table_en => $row[table_en],
			);
			break;
		}
		
		$query = "
			SELECT *
			FROM srd35_class_feature_level
			WHERE fk_classe = $c
			ORDER BY fk_livello
		";
		$result = mysql_query($query);
		$json[levels] = array();
		while($row = mysql_fetch_assoc($result)){
			$l = $row[fk_livello];
			if(!isset($json[levels][$l])) {
				$json[levels][$l] = array();
			}
			$json[levels][$l][] = array(
				"f" => $row[fk_privilegio],
				"table_it" => $row[table_it],
				"table_en" => $row[table_en],
			);
		}
		
		echo json_encode($json);
		exit;
	break;
}

switch($_POST[act]){
	case "save":
		header("Content-type: application/json");
		$f = (int) $_POST[f];
		$c = (int) $_POST[c];
		$l = (int) $_POST[l];
		$table_it = mysql_real_escape_string($_POST[table_it]);
		$table_en = mysql_real_escape_string($_POST[table_en]);
		$json = mysql_real_escape_string($_POST[json]);
		$query = "
			SELECT *
			FROM srd35_class_feature_level
			WHERE fk_privilegio = $f
			AND fk_classe = $c
			AND fk_livello = $l
		";
		$result = mysql_query($query);
		if(mysql_num_rows($result)===0) {
			$query = "
				INSERT INTO srd35_class_feature_level
				(fk_privilegio,fk_classe,fk_livello,table_it,table_en,json)
				VALUES
				($f,$c,$l,'$table_it','$table_en','$json')
			";
		} else {
			$query = "
				UPDATE srd35_class_feature_level
				SET table_it = '$table_it',table_en = '$table_en',json = '$json'
				WHERE fk_privilegio = $f
				AND fk_classe = $c
				AND fk_livello = $l
			";
		}
		$result = mysql_query($query);
		echo json_encode(array(
			"errors" => array(mysql_error()),
			"num" => 1,//mysql_affected_rows($result),
			"query" => $query
		));
		exit;
	break;
	case "delete":
		header("Content-type: application/json");
		$f = (int) $_POST[f];
		$c = (int) $_POST[c];
		$l = (int) $_POST[l];
		$query = "
			DELETE FROM srd35_class_feature_level
			WHERE fk_privilegio = $f
			AND fk_classe = $c
			AND fk_livello = $l
		";
		$result = mysql_query($query);
		echo json_encode(array(
			"errors" => array(mysql_error()),
			"num" => 0,//mysql_affected_rows($result),
			"query" => $query
		));
		exit;
	break;
}

function options($what){
	$items = array();
	switch($what){
		case "classes":
			$q = 'SELECT * FROM srd35_class ORDER BY name_en';
			$result = mysql_query($q);
			while($row = mysql_fetch_assoc($result)){
				$items[] = array($row[id], $row[name_en]);
			}
		break;
		case "features":
			$q = 'SELECT * FROM srd35_class_feature ORDER BY name_en';
			$result = mysql_query($q);
			while($row = mysql_fetch_assoc($result)){
				$items[] = array($row[id], $row[name_en]);
			}
		break;
		case "levels":
			for($i = 1; $i < 21; $i++){
				$items[] = array($i, $i);
			}
		break;
	}
	$o = '';
	foreach($items as $row){
		$value = $row[0];
		$text = $row[1];
		$o .= "<option value=\"$value\">$text</option>";
	}
	echo $o;
	return;
}

?>
<style>
body{margin: 0;}
body,input,textarea,select,button,pre,td{font: 14px Courier New;}

h3{margin: 0; padding: 0.5em 0; }
.row{display: flex; width:100%; background: white;border-bottom:1px solid #ccc;}
table tr:nth-child(2n) td{background:#eee;}
.row > * {width:33%;box-sizing:border-box;flex-grow:1}
.json{min-height:33vw;display: block; margin: 0;}
.json.preview{background: #eee;}
.json.levels a{color: #333; text-decoration: none; padding: 0 0.5em;white-space: nowrap;}
.json.levels a.active{font-weight:bold;color:#00f;}
.json.levels a.table_f{border-left: 2px solid #333;}
.json.levels a:hover{color: #000; background: #99D1D5; }
#delete{color:white;background:red;border-color:red;}
.ok{color: green;}
.ko{color: red;}
</style>
<!doctype html><html><head>
	<title>CLASS FEATURES</title>
</head><body>
	<div style="position: fixed; width: 100%; background: white;">
		<div style="border-bottom: 1px solid #ccc; padding: 1em 0;">
			<div style="float: right; padding-right: 1em;">
				<a id="phpmyadmin_edit" href="#" target="_blank">Edit in phpMyAdmin</a>
				<button id="save">Save</button>
				<button id="delete">Delete</button>
			</div>
			<div style="padding-left: 1em;">
				<select id="c"><?= options('classes') ?></select>
				<select id="l"><?= options('levels') ?></select>
				<select id="f"><?= options('features') ?></select>
				<span id="loading"></span>
			</div>
		</div>
		<div class="row" style="text-align: center;">
			<h3>it</h3>
			<h3 style="background-color: #eee;">en</h3>
			<h3>class</h3>
		</div>
		<div class="row">
			<input class="table_desc" id="table_it">
			<input class="table_desc" id="table_en">
			<div><b>&nbsp;=== Class table ===</b></div>
		</div>
	</div>
	<div style="height: 7.7em;"></div>
	<div class="row">
		<textarea class="json db"></textarea>
		<pre class="json preview"></pre>
		<pre class="json levels"></pre>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.1.1/he.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
	var editUrl = "/phpmyadmin/tbl_change.php?db=mephit_test&table=srd35_class_feature_level&where_clause=%60srd35_class_feature_level%60.%60fk_privilegio%60+%3D+{f}+AND+%60srd35_class_feature_level%60.%60fk_classe%60+%3D+{c}+AND+%60srd35_class_feature_level%60.%60fk_livello%60+%3D+{l}&clause_is_unique=1&sql_query=SELECT+%2A++FROM+%60srd35_class_feature_level%60+WHERE+%60fk_classe%60+%3D+{c}+ORDER+BY+%60fk_livello%60+ASC+&goto=sql.php&default_action=update";
	
	function phpmyadmin_edit_update(fcl){
		
		if (fcl) {
			var f = fcl[0];
			var c = fcl[1];
			var l = fcl[2];
		} else {
			var f = $('#f').val();
			var c = $('#c').val();
			var l = $('#l').val();
		}
		
		var url = editUrl;
		url = url.replace(/\{f\}/g, f);
		url = url.replace(/\{c\}/g, c);
		url = url.replace(/\{l\}/g, l);
		
		$('#phpmyadmin_edit').attr('href', url);
		
	}
	
	phpmyadmin_edit_update();
	
	function selectText(container) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(container);
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(container);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }  
  
	$(".json.db").on('input',function(event){
		var ugly = event.target.value;
		if(!ugly){
			$(".json.preview").html('');
			return;
		}
		try {
			var obj = JSON.parse(ugly);
			var pretty = JSON.stringify(obj, undefined, 4);
			$(".json.preview").html(pretty);
		} catch(e) {
			var m = e.message;
			
			var html = '';
			
			var pos, match_pos = m.match(/ position (\d+)/);
			if (match_pos) {
				pos = match_pos[1] * 1;
				html = '<div class="ko">' + ugly.substr(0, pos) + '</div>';
			}
			
			if (!html) html = '<div class="ko">' + m + '</div>';
			
			$(".json.preview").html(html);
		}
	});
  
	var fcl = localStorage.getItem('fcl');
	if(fcl){
		let [f,c,l] = fcl.split(',');
		$('#f').val(f);
		$('#c').val(c);
		$('#l').val(l);
	}
	
	function changeSelect(event){
		$("#loading").html("Loading...");
		setTimeout(() => {
			var f = $('#f').val();
			var c = $('#c').val();
			var l = $('#l').val();
			localStorage.setItem('fcl',[f,c,l].join());
			$.get(location.pathname, {
				act: 'select',
				f: f,
				c: c,
				l: l,
			}).done(function(data){
				
				data = data || {};
				
				var F = $('#f').val();
				var C = $('#c').val();
				var L = $('#l').val();
				
				if(data.levels !== undefined){
					var tbl = '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
					for(l in data.levels){
						var arr = data.levels[l];
						var activeClassName = (l === L) ? 'active' : '';
						tbl += '<tr>';
						tbl += '<td width="1"><a href="javascript:;" onclick="c(this,'+l+')" class="'+activeClassName+'">'+l+'</a></td>';
						tbl += '<td>';
						var p = [];
						for(var i = 0; i < arr.length; i++){
							var f = arr[i].f;
							var activeClassName = (f === F && c === C && l === L) ? 'active' : '';
							p.push('<a href="javascript:;" onclick="c(this,'+l+','+f+');" class="table_f '+activeClassName+'">' +
								arr[i].table_en +
							'</a>');
						}
						tbl += p.join('');
						tbl += '</td>';
						tbl += '</tr>';
					}
					tbl += '</table>';
					$(".json.levels").html(tbl);
				}else{
					$(".json.levels").html('');
				}
				
				if (data.num !== undefined) {
					$("#loading").html('<span class="ok">' + data.num + ' found.</span>');
				} else {
					$("#loading").html('<span class="ok">' + 0 + ' found.</span>');
				}
				
				if( data.table_it !== undefined ) {
					$("#table_it").val(data.table_it);
					$("#table_en").val(data.table_en);
				} else {
					$("#table_it").val('');
					$("#table_en").val('');
				}
				
				if( data.json !== undefined ) {
					$(".json.db").val(he.decode(data.json));
					$(".json.db").trigger("input");
					phpmyadmin_edit_update([f,c,l]);
				} else {
					$(".json.db").val('');
					$(".json.preview").html('');
				}
				
				phpmyadmin_edit_update();
				
			}).fail(function(){
				$("#loading").html('<span class="ko">Error</span>');
				phpmyadmin_edit_update();
			});
		}, 100);
	}
	$('select').on('change', changeSelect);
	$('.json.preview').on('click', function(){
		selectText(this);
	});
	
	$('select').eq(0).trigger('change');
	
	$("#save").on("click", function(event){
		$("#loading").html("Loading...");
		setTimeout(() => {
			var f = $('#f').val();
			var c = $('#c').val();
			var l = $('#l').val();
			var table_it = $('#table_it').val();
			var table_en = $('#table_en').val();
			var json = $('.json.preview').html();
			$.post(location.pathname, {
				act: 'save',
				f: f,
				c: c,
				l: l,
				table_it: table_it,
				table_en: table_en,
				json: json
			}).done(function(data,args){
				if(data.errors && data.errors.length){
					$("#loading").html('<span class="ko">' + data.errors.join('<br>') + '</span>');
					console.log(data.query)
				}else{
					$("#loading").html('<span class="ok">' + data.num + ' found.</span>');
				}
				console.log(data,...args)
			}).fail(function(...args){
				$("#loading").html('<span class="ko">Error</span>');
				console.log(...args)
			});
		}, 100);
	});
	
	$("#delete").on("click", function(event){
		$("#loading").html("Loading...");
		setTimeout(() => {
			var f = $('#f').val();
			var c = $('#c').val();
			var l = $('#l').val();
			$.post(location.pathname, {
				act: 'delete',
				f: f,
				c: c,
				l: l
			}).done(function(data){
				$("#loading").html('<span class="ok">' + data.num + ' found.</span>');
			}).fail(function(){
				$("#loading").html('<span class="ko">Error</span>');
			});
		}, 100);
	});
	
	function c(a,l,f){
		if(f)$('#f').val(f);
		$('#l').val(l).trigger('change');
	}
  </script>
</body></html>