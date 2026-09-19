<?php 
function pick_image(array $images, int $index): string
{
	$image_index = $index % count($images);
	$image_path = $images[$image_index];

	return $image_path;
}

function render_arrow_link($category, $page, $ariaLabel, $iconName) 
{

    $array = http_build_query(  
        [
        	"category" => $category,
         	"page" => $page,
        ]
    ); 
    
    echo '
    <a href="?'.$array.'#recent" class="pagination-btn" aria-label="'.$ariaLabel.'">
    	<ion-icon name="'.$iconName.'" aria-hidden="true"></ion-icon>
	</a>';
}

function render_number_link($category, $page, $isActive = false)
{


        $array = http_build_query(  
            [
                "category" => $category,
                "page" => $page,
            ]
        ); 


        if ( $isActive ) 
        {
            echo "<a href='?$array#recent' class='pagination-btn active'>$page</a>";
        } 
        else 
        {
            echo "<a href='?$array#recent' class='pagination-btn'>$page</a>";
        }
}

?>