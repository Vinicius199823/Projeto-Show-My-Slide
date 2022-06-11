
<html>
    
    <head>
        <title> Show My Slide </title>  
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    </head>
    <body>
      <div class="acima"></div>
        <header class="cabecalio">
           
            <div class="menu-user">
                <img src="../img/barnes-logo-color.png" class="img1">
                <a href="../HTML/login.php"><img src="../img/simboloUser-removebg-preview.png" class="img2"></a>
                
            </div>
            

        </header>
        <div class="abaixo"></div>
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 1</div>
              <img src="../img/barnes1.jpg" style="width:100%">
              <div class="text"></div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 2</div>
              <img src="../img/barnes2.png" style="width:100%">
              <div class="text"></div>
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="../img/barnes3.png" style="width:100%">
              <div class="text"></div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span>  
            </div>
            
            <script>
                let slideIndex = 0;
                showSlides();
                
                function showSlides() {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slideIndex++;
                  if (slideIndex > slides.length) {slideIndex = 1}    
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                  setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
                </script>
    </body>

    
</html>