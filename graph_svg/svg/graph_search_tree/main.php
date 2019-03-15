<?php
$unit = 40;

function white($x, $y, $r) {
		echo "<circle cx='$x' cy='$y' r='$r' fill='white' stroke='white' />\n";
}

function redFrame($x, $y, $r) {
		echo "<circle cx='$x' cy='$y' r='$r' fill='none' stroke='red' stroke-width='8' />\n";
}

function path($sx, $sy, $ex, $ey) {
	echo "<path stroke='black' stroke-width='2' fill='none' d='M $sx $sy L $ex $ey' />\n";
}

function pathr($sx, $sy, $ex, $ey) {
	echo "<path stroke='red' stroke-width='8' fill='none' d='M $sx $sy L $ex $ey' />\n";
}

function dot_path($sx, $sy, $ex, $ey) {
	echo "<path stroke='black' stroke-width='2' stroke-dasharray='3' fill='none' d='M $sx $sy L $ex $ey' />\n";
}

function cross($x, $y, $r) {
	$sx = $x - $r;
	$sy = $y - $r;
	echo "<path stroke='red' stroke-width='8' fill='none' d='M $sx $sy L $x $y' />\n";
	$sx = $x + $r;
	$sy = $y - $r;
	echo "<path stroke='red' stroke-width='8' fill='none' d='M $sx $sy L $x $y' />\n";
	$sx = $x - $r;
	$sy = $y + $r;
	echo "<path stroke='red' stroke-width='8' fill='none' d='M $sx $sy L $x $y' />\n";
	$sx = $x + $r;
	$sy = $y + $r;
	echo "<path stroke='red' stroke-width='8' fill='none' d='M $sx $sy L $x $y' />\n";
}

function circle($x, $y, $label) {
	$type = "color";
	if ($type == "string") {
		echo "<circle cx='$x' cy='$y' r='15' fill='white' stroke='black' stroke-width='2' />\n";
		//echo "<text x='$x' y='$y' fill='black' font-size='26' stroke-width='1' text-anchor='middle' dominant-baseline='middle' >$label</text>\n";
		$y += 9;
		//echo "<text x='$x ' y='$y' fill='black' font-size='26' stroke-width='1' text-anchor='middle' >$label</text>\n";
		echo "<text x='$x' y='$y' fill='black' font-size='26' stroke-width='1' text-anchor='middle' dominant-baseline='middle' >$label</text>\n";
	} else { // color
		$list = [
			'A' => 'black',
			'B' => 'white',
			'C' => 'limegreen',
			'D' => 'yellow',
		];
		$color = $list[$label];
		echo "<circle cx='$x' cy='$y' r='15' fill='$color' stroke='black' stroke-width='2' />\n";
	}
}

function graph2($x, $y, $labels) {
	global $unit;
	$left = $x - $unit / 2;
	$right = $x + $unit / 2;
	path($left, $y, $right, $y);
	circle($left, $y, $labels[0]);
	circle($right, $y, $labels[1]);
}

function graph3($x, $y, $labels) {
	global $unit;
	$left = $x - $unit;
	$right = $x + $unit;
	path($left, $y, $right, $y);
	circle($left, $y, $labels[0]);
	circle($x, $y, $labels[1]);
	circle($right, $y, $labels[2]);
}

function graph4($x, $y, $labels) {
	global $unit;
	$x_arr[0] = $x - $unit * 1.5;
	$x_arr[1] = $x - $unit * 0.5;
	$x_arr[2] = $x + $unit * 0.5;
	$x_arr[3] = $x + $unit * 1.5;
	path($x_arr[0], $y, $x_arr[3], $y);
	for ($i = 0; $i < count($x_arr); $i++) {
		circle($x_arr[$i], $y, $labels[$i]);
	}
}

function graphT($x, $y, $labels) {
	global $unit;
	$left = $x - $unit;
	$right = $x + $unit;
	$bottom = $y + $unit;
	path($left, $y, $right, $y);
	path($x, $y, $x, $bottom);
	circle($left, $y, $labels[0]);
	circle($x, $y, $labels[1]);
	circle($right, $y, $labels[2]);
	circle($x, $bottom, $labels[3]);
}

function graphr($x, $y, $labels) {
	global $unit;
	$x_arr[0] = $x - $unit * 1.5;
	$x_arr[1] = $x - $unit * 0.5;
	$x_arr[2] = $x + $unit * 0.5;
	$x_arr[3] = $x + $unit * 1.5;
	$bx = $x_arr[2];
	$by = $y + 1.0 * $unit;
	path($x_arr[0], $y, $x_arr[3], $y);
	path($x_arr[2], $y, $bx, $by);
	for ($i = 0; $i < count($x_arr); $i++) {
		circle($x_arr[$i], $y, $labels[$i]);
	}
	circle($bx, $by, $labels[4]);
}

function graphP($x, $y, $labels) {
	global $unit;
	$left = $x - $unit;
	$right = $x + $unit;
	$bottom = $y + $unit;
	path($left, $y, $right, $y);
	path($x, $y, $x, $bottom);
	path($right, $y, $x, $bottom);
	circle($left, $y, $labels[0]);
	circle($x, $y, $labels[1]);
	circle($right, $y, $labels[2]);
	circle($x, $bottom, $labels[3]);
}

//graph2(100, 100, "AB");
//graph3(200, 200, "ABC");
//graph4(300, 300, "ABCA");
//graphT(400, 400, "ABCA");

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<svg xmlns="http://www.w3.org/2000/svg" width="1000px" height="800px" viewBox="0 0 2000 1000" >';
//circle(600, 450, "A");


$h[0] = 100;
$h[1] = 200;
$h[2] = 500;
$h[3] = 800;

$x[0] = 1000;
$y[0] = $h[0];
$x[1] = 500;
$y[1] = $h[1];
$x[2] = 200;
$y[2] = $h[2];
$x[3] = 400;
$y[3] = $h[2];
$x[4] = 600;
$y[4] = $h[2];
$x[5] = 800;
$y[5] = $h[2];
$x[6] = 200;
$y[6] = $h[3];
$x[7] = 400;
$y[7] = $h[3];
$x[8] = 600;
$y[8] = $h[3];
$x[9] = 800;
$y[9] = $h[3];

path($x[0], $y[0], $x[1], $y[1]);
path($x[1], $y[1], $x[2], $y[2]);
path($x[1], $y[1], $x[3], $y[3]);
path($x[1], $y[1], $x[4], $y[4]);
path($x[1], $y[1], $x[5], $y[5]);
path($x[4], $y[4], $x[6], $y[6]);
path($x[4], $y[4], $x[7], $y[7]);
path($x[4], $y[4], $x[8], $y[8]);
path($x[4], $y[4], $x[9], $y[9]);

white($x[ 1], $y[ 1], $unit * 1);
white($x[ 2], $y[ 2], $unit * 1.5);
white($x[ 3], $y[ 3], $unit * 1.5);
white($x[ 4], $y[ 4], $unit * 1.5);
white($x[ 5], $y[ 5], $unit * 1.5);
white($x[ 6], $y[ 6], $unit * 1.5);
white($x[ 7], $y[ 7], $unit * 2);
white($x[ 8], $y[ 8], $unit * 1.5);
white($x[ 9], $y[ 9], $unit * 2);

graph2($x[ 1], $y[ 1], "AB");
graph3($x[ 2], $y[ 2], "ABA");
graph3($x[ 3], $y[ 3], "ABB");
graph3($x[ 4], $y[ 4], "ABC");
graph3($x[ 5], $y[ 5], "ABD");
graphT($x[ 6], $y[ 6], "ABCA");
graph4($x[ 7], $y[ 7], "ABCB");
graphT($x[ 8], $y[ 8], "ABCC");
graph4($x[ 9], $y[ 9], "ABCD");

$offset = - 100;
$x[11] = $offset + 1500;
$y[11] = $h[1];
$x[12] = $offset + 1300;
$y[12] = $h[2];
$x[13] = $offset + 1200;
$y[13] = $h[3];
$x[14] = $offset + 1400;
$y[14] = $h[3];
$x[15] = $offset + 1700;
$y[15] = $h[2];
$x[16] = $offset + 1700;
$y[16] = $h[3];

path($x[0], $y[0], $x[11], $y[11]);
path($x[11], $y[11], $x[12], $y[12]);
path($x[12], $y[12], $x[13], $y[13]);
path($x[12], $y[12], $x[14], $y[14]);
path($x[11], $y[11], $x[15], $y[15]);
path($x[15], $y[15], $x[16], $y[16]);

white($x[11], $y[11], $unit * 1);
white($x[12], $y[12], $unit * 1.5);
white($x[13], $y[13], $unit * 2);
white($x[14], $y[14], $unit * 2);
white($x[15], $y[15], $unit * 1.5);
white($x[16], $y[16], $unit * 2);

graph2($x[11], $y[11], "BC");
graph3($x[12], $y[12], "BCB");
graph4($x[13], $y[13], "BCBA");
graph4($x[14], $y[14], "BCBD");
graph3($x[15], $y[15], "BCD");
graph4($x[16], $y[16], "ABCD");

cross($x[13], $y[13], $unit * 2);
cross($x[16], $y[16], $unit * 2);

dot_path($x[0], $y[0], 700, $h[1]);
dot_path($x[0], $y[0], 900, $h[1]);
dot_path($x[0], $y[0], 1100, $h[1]);

echo '</svg>'."\n";
