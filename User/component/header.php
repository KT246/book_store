<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body >

    <div class="h-[250px] w-full">

        <div class=" dot mySlides fade bg-red-500 h-full  w-1/2 mx-[28%] "  >
                <img src="./public/imgs/download1.jpeg"  class="w-full h-full">
        </div>
        <div class=" dot mySlides fade bg-red-500 h-full  w-1/2 mx-[28%] "  >
                <img src="./public/imgs/download2.jpeg"  class="w-full h-full">
        </div>
        <div class="dot mySlides fade bg-red-500 h-full  w-1/2 mx-[28%] "  >
                <img src="./public/imgs/download3.jpeg"  class="w-full h-full">
        </div>
        <!-- Repeat for other slides -->

    </div>
    
        <!-- -----------------------------js -------------------------------------------->

    <script src="https://cdn.tailwindcss.com"></script>
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
