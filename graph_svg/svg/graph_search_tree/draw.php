<?php

/* data.txt
name, x,   y , option
name,   x ,  y
$end_str
from_name, end_name
from_name   ,  end_name
 */
/**
 *
 * data.txt contents are node_datas and edge_datas
 * $end_str separates node_datas and edge_datas
 * space is ignored in anyplace, but empty line is not allowed
 *
 * -- node data option --
 * node has at most 1 option
 * empty : node is not drawn
 * root : root node, down_margin is 0 and not drawn
 *
 * -- edge_datas --
 * position of from_name is allways upper than position of end_name
 *
 *
 *
 */

function prefixEmpty($str) {
	$prefix = 'empty';
	return substr($str, 0, strlen($prefix)) == $prefix;
}


// setting
$up_margin = 50;
$down_margin = 90;
$end_str = 'end';

$file = file('data.txt');

// load node datas
foreach ($file as $line) {
	if (trim($line) == $end_str) {
		break;
	}
	$tmp = explode(',', $line);
	$one['name'] = trim($tmp[0]);
	$one['x'] = trim($tmp[1]);
	$one['y'] = trim($tmp[2]);
	$one['option'] =  empty($tmp[3]) ? '' : trim($tmp[3]);
	$nodes[$one['name']] = $one;
}

// load edge datas
$edges = [];
$read_flg = false;
foreach ($file as $line) {
	if (trim($line) == $end_str) {
		$read_flg = true;
		continue;
	}
	if ($read_flg == false) {
		continue;
	}
	$tmp = explode(',', $line);
	$one['from'] = trim($tmp[0]);
	$one['to'] = trim($tmp[1]);
	$edges[] = $one;
}

// draw edges
echo '<g stroke="black" stroke-width="3" >';
echo "\n";
foreach ($edges as $one) {
	$option_str = '';
	$from_node = $nodes[$one['from']];
	$from_x = $from_node['x'];
	$from_y = $from_node['y'] + $down_margin;
	$to_node = $nodes[$one['to']];
	$to_x = $to_node['x'];
	$to_y = $to_node['y'] - $up_margin;
	if ($from_node['option'] == 'root') {
		$from_y = $from_node['y'];
	}
	if ($to_node['option'] == 'empty') {
		$to_y = $to_node['y'];
		$option_str .= 'stroke-dasharray="9"';
	}
	echo <<< EOF
		<path d="M $from_x $from_y L $to_x $to_y" $option_str />

EOF;
}
echo '</g>';
echo "\n";

// draw nodes, node means subgraph
foreach ($nodes as $one) {
	if ($one['option'] == 'root' or $one['option'] == 'empty') {
		continue;
	}
	$name = $one['name'];
	$x = $one['x'];
	$y = $one['y'];
	echo <<< EOF
	<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#$name" x="$x" y="$y" />

EOF;
}

