#!/bin/bash
for i in $(seq 9 21)
do
	if [ $i -lt 10 ]; then
		i="0$i"
	fi
	echo $i
	wget "http://qipu.games.sports.cn/images_small/img$i.jpg"
done

