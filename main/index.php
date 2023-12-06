<?php 
  define('SITE_URL',"https://equable.ddns.net");

  function listFolderFiles($dir, $nested = " id='myUL'"){
    $fileFolderList = scandir($dir);
    
    echo '<ul'.$nested.'>';
    foreach($fileFolderList as $fileFolder){
        if($fileFolder != '.' && $fileFolder != '..'){
            if(!is_dir($dir.'/'.$fileFolder)){
                echo '<li><a target="_blank" href="'.SITE_URL.'/'.ltrim($dir.'/'.$fileFolder,'./').'">'.$fileFolder.'</a>';
            } else {
                echo '<span class="caret">'.$fileFolder.'</span>';
            }
            if(is_dir($dir.'/'.$fileFolder)) listFolderFiles($dir.'/'.$fileFolder, ' class="nested"');
                echo '</li>';
            }
    }
    echo '</ul>';
  }
?>
<html>
  <head>
    <link rel="stylesheet" href="main.css"> 
  </head>
  <body>
    
    <?php 

      $directory = 'list/';

      listFolderFiles($directory); // function call with directory path (e.g. : upload/) 
    ?>
    <script>
      var toggler = document.getElementsByClassName("caret");
      var i;

      for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
          this.parentElement.querySelector(".nested").classList.toggle("active");
          this.classList.toggle("caret-down");
        });
      }
    </script>
  </body>
</html>