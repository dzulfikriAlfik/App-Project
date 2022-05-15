<?php

function trimVideoUrl($video_link): string
{
   $filterLink = str_replace(["https://", "www."], "", $video_link);
   $separateToArray = explode("?", $filterLink);
   // unset($separateToArray[1]);
   $filteredLink = implode("", array($separateToArray[0]));
   return $filteredLink;
}
