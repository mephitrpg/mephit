<?php
$privilegi = array();
$lang = $_MEPHIT['lang'];

foreach($classe['livelli'] as $livello) {
	foreach($livello['special'] as $special) {
		$p = $special['fk_privilegio'];
		if (!isset($privilegi[$p])) $privilegi[$p] = array();
		$privilegi[$p][] = $special;
	}
}

foreach($privilegi as $privilegio) {
	$BODY .= '<br>';
	
	$BODY .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">';
	$BODY .= '<tr valign="top">';
	$BODY .= '<td width="49%">';
	foreach($privilegio as $i=>$special) {
		
		if ($i === 0) {
				
			$name  = $special['name_' .$lang];
			$table = $special['table_'.$lang];
			$type  = $special['type'];
			
			$selEx = $type === 'ex' ? ' selected' : '';
			$selSu = $type === 'su' ? ' selected' : '';
			$selSp = $type === 'sp' ? ' selected' : '';
			$selPs = $type === 'ps' ? ' selected' : '';
			$selNone = ($selEx || $selSu || $selSp || $selPs) ? '' : ' selected';
			
			$BODY.='<p><input name="name" value="'.htmlspecialchars($name).'" style="width: 100%;"></p>';
			$BODY.='<p><input name="table" value="'.htmlspecialchars($table).'" style="width: 100%;"></p>';
			$BODY.='<p><select name="type">
				<option value=""'.$selNone.'>'.''.'</option>
				<option value="ex"'.$selEx.'>'.$_LANG['ex_label_full'].'</option>
				<option value="su"'.$selSu.'>'.$_LANG['su_label_full'].'</option>
				<option value="sp"'.$selSp.'>'.$_LANG['sp_label_full'].'</option>
				<option value="ps"'.$selPs.'>'.$_LANG['ps_label_full'].'</option>
			</select></p>';

			$BODY .= '</td>';
			$BODY .= '<td width="2%">';
			$BODY .= '</td>';
			$BODY .= '<td width="49%">';
			
		}
		
		$l     = $special['fk_livello'];
		$desc  = $special['description_'.$lang];
		
		$BODY.='<table border="0" cellpadding="" cellspacing="" width="100%">';
			$BODY.='<tr valign="top">';
				$BODY.='<td width="1">';
					$BODY.='<select>';
						$BODY.='<option>'.'00'.'</option>';
						$BODY.='<option selected>'.htmlspecialchars($l).'</option>';
					$BODY.='</select>';
				$BODY.='</td>';
				$BODY.='<td width="4%"></td>';
				$BODY.='<td>';
					$BODY.='<textarea style="width: 100%; height: 10em;">'.htmlspecialchars($desc).'</textarea></p>';
				$BODY.='</td>';
			$BODY.='</tr>';
		$BODY.='</table>';
		
	}
	$BODY .= '</td>';
	$BODY .= '</tr>';
	$BODY .= '</table>';
	
	$BODY .= '<br>';
	$BODY .= '<div style="background:#ccc;">&nbsp;</div>';
}
?>