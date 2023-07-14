<!DOCTYPE html>
<html>
<head>


</head>
<body>
    <?php
    require 'header.html';
    ?>

<section id='about-cards-section'>

    <div class="column-3-div">
        <div id='card1' class="card-close" onclick="openCard1();event.stopPropagation();">
            <a id="close-btn1" class="close-btn-class dis-none" onclick="closeCard1();event.stopPropagation();" >Close</a>
            <br>
            <img class='image-about-card' src="website_img/Touch & Huyak logo HD.png">
            <h2>NFC Business Card</h2>
            <p>Business card for business people, with a small addition of whole NFC chip insides.</p>
            <div id="wrap-card-bot1" class="dis-none">
                <h3>Price</h3>
                <p>1 Card = $15/months</p>
                <br>
                <a class="prcd-to-shp-btn">Proceed to Shop</a>
            </div>
        </div>
    </div>
    <div class="column-3-div">
        <div id='card2' class="card-close" onclick="openCard2();event.stopPropagation();">
            <a id="close-btn2" class="close-btn-class dis-none" onclick="closeCard2();event.stopPropagation();" >Close</a>
            <br>
            <img style="height: 150px; margin-top: 30px" src="website_img/KeyFobs_NoBG.png">
            <h2>NFC Tags</h2>
            <a>NFC tags are small fobs which you can attach to your car keys, home keys or
                you can glue them to yourself, if you into that.
            </a>
            <div id="wrap-card-bot2" class="dis-none">
                <h3>Price</h3>
                <p>1 Tag = $7/months</p>
                <br>
                <a class="prcd-to-shp-btn">Proceed to Shop</a>
            </div>
        </div>
    </div>
    <div class="column-3-div">
        <div id='card3' class="card-close" onclick="openCard3();event.stopPropagation();">
             <a id="close-btn3" class="close-btn-class dis-none" onclick="closeCard3();event.stopPropagation();" >Close</a>
            <br>
            <img class='image-about-card' src="website_img/SmartButton_iphone12w_NoBG.png">
            <h2>NFC Case</h2>
            <a>NFC case is must have thing, if you constantly lose your phone. When someone finds your phone
                they instantly can find your address and bring it back to you(not guaranteed).
            </a>
            <div id="wrap-card-bot3" class="dis-none">
                <h3>Price</h3>
                <p>1 Case = $10/months</p>
                <br>
                <a class="prcd-to-shp-btn">Proceed to Shop</a>
            </div>
        </div>
    </div>


</section>

<!-- <div class="card-open">
            <img class='logo-footer' src="website_img/Touch & Huyak logo HD.png">
            <p>Our company is all about bringing new technologies to simple things and combining them for fun </p>
        </div> -->

<script>

function openCard1() {
        //making card 1 appear in center
        var card1 = document.getElementById("card1");
        card1.classList.remove("card-close");
        card1.classList.add("card-open");
        //making close button 1 appear in center
        var closeBtn = document.querySelectorAll("#close-btn1, #wrap-card-bot1");
        for (var i = 0; i < closeBtn.length; i++){
            closeBtn[i].classList.remove("dis-none");
        }
}

function closeCard1() {
        //making card 1 go back
        var card1_Open = document.getElementById("card1");
        card1_Open.classList.remove("card-open");
        card1_Open.classList.add("card-close");
        //making close button 1 disappear
        var closeBtn = document.querySelectorAll("#close-btn1, #wrap-card-bot1");
        for (var i = 0; i < closeBtn.length; i++){
            closeBtn[i].classList.add("dis-none");
        }

}

function openCard2() {
        //making card 2 appear in center
        var card1 = document.getElementById("card2");
        card1.classList.remove("card-close");
        card1.classList.add("card-open");
        //making close button 2 appear in center
        var closeBtn = document.getElementById("close-btn2");
        closeBtn.classList.remove("dis-none");
}

function closeCard2() {
        //making card 2 go back
        var card1_Open = document.getElementById("card2");
        card1_Open.classList.remove("card-open");
        card1_Open.classList.add("card-close");
        //making close button 2 disappear
        var closeBtn = document.getElementById("close-btn2");
        closeBtn.classList.add("dis-none");
}
function openCard3() {
        //making card 3 appear in center
        var card1 = document.getElementById("card3");
        card1.classList.remove("card-close");
        card1.classList.add("card-open");
        //making close button 3 appear in center
        var closeBtn = document.getElementById("close-btn3");
        closeBtn.classList.remove("dis-none");
}

function closeCard3() {
        //making card 3 go back
        var card1_Open = document.getElementById("card3");
        card1_Open.classList.remove("card-open");
        card1_Open.classList.add("card-close");
        //making close button 3 disappear
        var closeBtn = document.getElementById("close-btn3");
        closeBtn.classList.add("dis-none");
}


</script>


<?php
require 'footer.php';
?>
</body>
</html>