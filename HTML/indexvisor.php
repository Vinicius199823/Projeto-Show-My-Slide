<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div class="container-fluid">
         <div class="side-body">
            <br><br>
            <fieldset>
               <legend>Minhas Imagens</legend>

               <div id="myCarousel" class="carousel slide" data-ride="carousel">

                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                     <?php foreach($imagens as $indice => $img): ?>
                     <?php if($indice == 0): ?>
                        <li data-target="#myCarousel" data-slide-to=<?php echo $indice?> class="active"/>
                     <?php else: ?>
                        <li data-target="#myCarousel" data-slide-to=<?php echo $indice?> />
                     <?php endif; ?>
                     <?php endforeach; ?>
                  </ol>
                  <!-- Wrapper for slides -->

                  <div class="carousel-inner">
                     <?php foreach($imagens as $indice => $img): ?>
                     <?php if($indice == 0): ?>
                        <div class="item active">
                           <img src=<?= base_url("imagens/").$img["nome_img"]?> style="width:100%;">
                        </div>
                        <?php else: ?>
                           <div class="item">
                              <img src=<?= base_url("imagens/").$img["nome_img"]?> style="width:100%;">
                           </div>
                     <?php endif; ?>
                     <?php endforeach; ?>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>

         </div>
      </div>
      </fieldset>
   </body>
</html>