ls *.svg | cut -d'.' -f 1  > list

for i in `cat list`
do
	convert ${i}.svg ${i}.png 
done
