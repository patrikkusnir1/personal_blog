<?php 
function pick_image(array $images, int $index): string
{
	$image_index = $index % count($images);
	$image_path = $images[$image_index];

	return $image_path;
}


?>