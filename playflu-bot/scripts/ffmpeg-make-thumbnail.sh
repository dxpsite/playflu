#!/bin/bash

## Outputs the duration of the clip
#ffmpeg -i $1 2>&1 | grep Duration | awk '{print $2}' | tr -d ,

## Generates a thumbnail using ffmpeg (thanks to: http://stackoverflow.com/questions/8287759/extracting-frames-from-mp4-flv)
ffmpeg -ss 00:15 -y -i $1 -frames:v 1 -an $2
#ffmpeg -i $1 -f mp4 -b 2048k -vcodec libx264 -preset medium -acodec libfaac -ar 44100 -ab 96k -threads 1 $2
