<?php $activePage = "research-1.php"; ?>

<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/masonry.css">
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://use.typekit.net/jct1oia.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tinyPlayer.css" rel="stylesheet" type="text/css"> 
<!-- <script src="js/lightbox-plus-jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.fancybox.js"></script>



</head>

<body>


<section class="container"> 



<section class="item-c "> 
<section class ="section-5">
  <div class="box">
<div class="masonry-wrapper"><div class="masonry">




    <?php

$files = glob('stuff/*.{jpg,jpeg,png,gif,mp4,m4v,html}', GLOB_BRACE);

function sort_by_mtime($file1,$file2) {
    $time1 = filemtime($file1);
    $time2 = filemtime($file2);
    if ($time1 == $time2) {
        return 0;
    }
    return ($time1 < $time2) ? 1 : -1;
    }

usort($files,"sort_by_mtime");

foreach($files as $file) {
  $name = basename($file);


$file_path = $folder_path.$file;
$path_parts = pathinfo($file_path);
$extension = strtolower($path_parts['extension']);
$path_parts = preg_replace('/[0-9]+/', '', $path_parts);

if($extension=='jpg' || $extension=='jpeg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp'  ) 

{ echo  '<div class="align-img-caption gallery masonry-item" >';

    echo '<a data-fancybox="gallery" href="'.$file_path.'" data-lightbox="mygallery" data-caption="'.$path_parts['filename'].'"><img src="'.$file_path.'"/>'.$path_parts['filename'].'</a>';
    echo '</div>';

}
if($extension=='mp4' || $extension == 'm4v') 
{ echo  '<div  class="video-icon align-img-caption gallery masonry-item" >';



    echo '<a data-fancybox="gallery" href="'.$file_path.'"  data-lightbox="mygallery" data-caption="'.$path_parts['filename'].'"><video src="'.$file_path.'"></video>'.$path_parts['filename'].'</a>';
    echo '</div>';

}
}

  ?>


</div></div></div>
</div>

</section>
</section>

</body>