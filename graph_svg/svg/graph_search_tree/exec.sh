sh make_def.exec
php draw.php > tree.svg

f=graph_search_tree.svg # file
rm -f $f
touch $f
cat base/bef_def >> $f
cat def.svg >> $f
cat base/aft_def >> $f
cat tree.svg >> $f
cat base/end >> $f
