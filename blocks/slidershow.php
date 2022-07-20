<div class="row mrb">
                    <div class="banner">
                        <img id="img" onclick="changeSlider()" src="img/slideshow/slideshow1.jpg" alt="">
                    </div>
                    <script>
                        var index = 1;
                            var changeSlider = function() {
                            var imgs = ["img/slideshow/slideshow1.jpg","img/slideshow/slideshow2.jpg","img/slideshow/slideshow3.jpg","img/slideshow/slideshow4.jpg"];
                            document.getElementById('img').src = imgs[index];
                            index++;
                            if(index == 4){
                                index = 0;
                            }
                        }
                        setInterval(changeSlider,2000);
                    </script>
            </div>