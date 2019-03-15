<?php
$unit = 40;

function white($x, $y, $r) {
		echo "<circle cx='$x' cy='$y' r='$r' fill='white' stroke='white' />\n";
}

function path($sx, $sy, $ex, $ey) {
	echo "<path stroke='black' stroke-width='2' fill='none' d='M $sx $sy L $ex $ey' />\n";
}

function dot_path($sx, $sy, $ex, $ey) {
	echo "<path stroke='black' stroke-width='2' stroke-dasharray='3' fill='none' d='M $sx $sy L $ex $ey' />\n";
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

//graph2(100, 100, "AB");
//graph3(200, 200, "ABC");
//graph4(300, 300, "ABCA");
//graphT(400, 400, "ABCA");

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<svg xmlns="http://www.w3.org/2000/svg" width="800px" height="450px" viewBox="0 0 600 450">';
//circle(600, 450, "A");


$x[0] = 430;
$y[0] = 50;
$x[1] = 350;
$y[1] = 100;
$x[2] = 500;
$y[2] = $y[1];
$x[3] = 200;
$y[3] = 200;
$x[4] = 400;
$y[4] = $y[3];
$x[5] = 100;
$y[5] = 300;
$x[6] = 300;
$y[6] = $y[5];

path($x[0], $y[0], $x[1], $y[1]);

path($x[0], $y[0], $x[2], $y[2]);
dot_path($x[2], $y[2], $x[2] + 50, $y[2] + 70);
dot_path($x[2], $y[2], $x[2] + 0, $y[2] + 70);

path($x[1], $y[1], $x[3], $y[3]);


path($x[1], $y[1], $x[4], $y[4]);
dot_path($x[4], $y[4], $x[4] + 30, $y[4] + 70);

path($x[3], $y[3], $x[5], $y[5]);
dot_path($x[5], $y[5], $x[5] - 50, $y[5] + 120);
dot_path($x[5], $y[5], $x[5] + 50, $y[5] + 120);

path($x[3], $y[3], $x[6], $y[6]);
dot_path($x[6], $y[6], $x[6] - 50, $y[6] + 120);
dot_path($x[6], $y[6], $x[6] + 50, $y[6] + 120);

white($x[2], $y[2], $unit * 1);
white($x[1], $y[1], $unit * 1);
white($x[3], $y[3], $unit * 1);
white($x[4], $y[4], $unit * 1);
white($x[5], $y[5], $unit * 1);
white($x[6], $y[6], $unit * 1.5);

graph2($x[1], $y[1], "AB");
graph2($x[2], $y[2], "AC");
graph3($x[3], $y[3], "ABC");
graph3($x[4], $y[4], "ABD");
graph4($x[5], $y[5], "ABCD");
graphT($x[6], $y[6], "AAAA");


echo '</svg>';
