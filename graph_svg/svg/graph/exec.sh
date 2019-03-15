ls g[0-9][0-9].svg | cut -d'.' -f 1 | cut -d'g' -f 2 > list

for i in `cat list`
do
	cat g${i}.svg | sed -e 's/stroke="black"/stroke="red"/' > g${i}r.svg
	cat g${i}.svg | sed -e 's/stroke="black"/stroke="blue"/' > g${i}b.svg
	convert g${i}.svg g${i}.png 
	convert g${i}r.svg g${i}r.png 
	convert g${i}b.svg g${i}b.png 
done
