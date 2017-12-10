<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------- WITHOUT DIALOG ------------ */
if(!function_exists('print_rr')){
	function print_rr($array){
		$count = count($array);
		if(($count) > 0) {
			echo '<div title="Debugger datas parsing">';
			foreach($array as $key => $value){
				if(is_array($value)){
					$id = md5(rand());
					echo '[<a href="#" onclick="return expandParent(\''.$id.'\')">'.$key.'</a>]<br />';
					echo '<div id="'.$id.'" style="display:none;margin:10px;border-left:1px solid; padding-left:5px;">';
					print_rr($value, $count);
					echo '</div>';
				} else {
					echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;$key</b>: ".$value."<br />";
				}
			}
			echo '</div>';
			echo '
			<script language="Javascript">
				function expandParent(id){
					toggle="block";
					if(document.getElementById(id).style.display=="block"){
						toggle="none"
					}
					document.getElementById(id).style.display=toggle
					return false;
				};
			</script>
			';
		} else {
			echo "Empaty datas";
		}
	}
}

if(!function_exists('echo_rrr')){
	function echo_rrr($string){
		$html = '';
		$html .= '<div id="dialog-developer-debugger" style="" title="Debugger datas parsing">'.$string.'</div>';
		echo $html;
	}
}

/* --------------------- WITH DIALOG ------------ */
if(!function_exists('print_rrr')){
	function print_rrr($array){
		$count = count($array);
		if(($count) > 0) {
			echo '<div id="dialog-developer-debugger" style="" title="Debugger datas parsing">';
			foreach($array as $key=>$value){
				if(is_array($value)){
					$id = md5(rand());
					echo '[<a href="#" style="color:#0065ff;" onclick="return expandParent(\''.$id.'\')">'.$key.'</a>]<br />';
					echo '<div id="'.$id.'" style="display:none;margin:10px;border-left:1px solid; padding-left:5px; color:#a800fc;">';
					print_rrr($value, $count);
					echo '</div>';
				} else {
					echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;$key</b>: ".$value."<br />";
				}
			}
			echo '</div>';
			echo '
			<script language="Javascript">
				function expandParent(id){
					toggle="block";
					if(document.getElementById(id).style.display=="block"){
						toggle="none"
					}
					document.getElementById(id).style.display=toggle
					return false;
				};
			</script>
			';
		} else {
			echo '<font color="red">Empaty datas</font>';
		}
	}
}

if(!function_exists('print_rrrr')){
	function print_rrrr($array,$unusedfield, $ahref, $title, $color){
		$CI = & get_instance();
		$count = count($array);
		echo "<table border='0' align='center' style='font-size:11px;font-family:'Arial''>";
		echo "<tr align='center' valign='top'>";
		echo "<td align='center'><b>";
		echo $title;
		echo "</b></td>";
		echo "</tr>";
		echo "</table>";
		echo "<table border='1' align='center' style='font-size:11px;font-family:'Arial''>";
		echo "<tr align='center' valign='top'>";
		if(($count) > 0) {
			foreach($array as $key => $value) {
				if(!in_array($key, $unusedfield)) {
					echo "<td width='150px'>";
					echo "<table border='0' valign='top' width='100%' style='font-size:11px;font-family:'Arial''>";
					echo "<tr bgcolor='".$color."' valign='top' align='center'>";
					echo "<td width='100%'>";
					echo "<b>".$key."</b>";
					echo "</td>";
					echo "</tr>";
					echo "<tr align='center'>";
					echo "<td width='150px'>";
					if($key != "id") {
						echo $value;
					} else {
						echo "<a href='".site_url('testing_functions/'.$ahref.'/'.$value)."'>".$value."</a>";
					}
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</td>";
				}
			}
		}
		echo "</tr>";
		echo "</table>";
	}
}

if(!function_exists('in_object')) {
	function in_object($pebanding, $obj, $check_variable = "") {
		$status = 0;
		if($obj) {
			foreach($obj as $key => $val) {
				if(is_array($val)) {
					
					## Cek apakah yang di cari adalah variable tertentu ##
					if($check_variable != "") {
						if($pebanding == $val[$check_variable]) {
							$status = 1;
						} else {
							$status = 0;
						}
						
					## Cek untuk mencari keseluruhan field dalam array ##
					} else {
						if(in_array($pebanding, $val)) {
							$status = 1;
							break;
						} else {
							$status = 0;
						}
					}
					
					
				} else {
					$status = 0;
				}
			}

			if($status == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
}
?>