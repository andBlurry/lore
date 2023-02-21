<head>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/masonry.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/tinyPlayer.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
  <script src="js/custom.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.fancybox.js"></script>
 


</head>

<body>



<div class="grid" >
    <!-- .grid-sizer empty element, only used for element sizing -->
    <div class="grid-sizer"></div>
    <?php

$files = glob('stuff/*.{jpg,jpeg,png,gif,mp4,m4v,html}', GLOB_BRACE);

function sort_by_number($file1, $file2)
{
  preg_match('/\d+/', $file1, $match1);
  preg_match('/\d+/', $file2, $match2);
  
  $num1 = (int)$match1[0];
  $num2 = (int)$match2[0];

  if ($num1 == $num2) {
    return 0;
  }

  return ($num1 > $num2) ? 1 : -1;
}

usort($files, "sort_by_number");

foreach ($files as $file) {
  $name = basename($file);

  $folder_path = '/';
  $file_path = $folder_path . $file;
  $path_parts = pathinfo($file_path);
  $extension = strtolower($path_parts['extension']);
  $path_parts = preg_replace('/[0-9]+/', '', $path_parts);

  if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
    echo  '<div class="grid-item" >';

    echo '<a data-fancybox="gallery" href="' . $file_path . '" data-lightbox="mygallery" data-caption="' . $path_parts['filename'] . '"><img src="' . $file_path . '"/>' . $path_parts['filename'] . '</a>';
    echo '</div>';
  }
  if ($extension == 'mp4' || $extension == 'm4v') {
    echo  '<div class="grid-item" >';

    echo '<a data-fancybox="gallery" href="' . $file_path . '"  data-lightbox="mygallery" data-caption="' . $path_parts['filename'] . '"><video src="' . $file_path . '"></video>' . $path_parts['filename'] . '</a>';
    echo '</div>';
  }
}

?>

  </div>


</body>