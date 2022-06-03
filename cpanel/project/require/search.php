
<div class="pencarianWrapper">
    <button id="submitQuery" type="submit" name="submitQuery">
        <svg id="submitQuerySVG" style="width: 24px; height: 24px" viewBox="0 0 24 24">
            <path
                d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
        </svg>
    </button>
    <?php
    if (isset($_GET['search'])) {
        $query = $_GET['search'];
    } else {
        $query = "";
    }
    ?>
    <input value="<?php echo $query ?>"  id="inputQuery" type="text" name="inputQuery" placeholder="Search here..." onfocus="showClose()" onblur="hideClose()
						" onkeyup="inputQueryKeyUp(this.value)" />
	

       

    <button onclick="onfocusinput();clearSearch()" id="searchClose" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path
                d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
        </svg>
    </button>
</div>

<div id="suggestion">
    <!-- <a class="recipesuggest" href="#">
        <div class="fotosuggest">
            <img width="100%" src="../create/foto/626d439387839.jpg" alt="">
        </div>
        <div class="isisuggest">
            <h2>Strabwerry Cookies</h2>
            <p>Lorem ipsum dolor sit amet consectetur
                sss asdfkljhasd asl;dkfjh ;aksjdhf lkjghkjlfsadhfljk alksdjfhkjasldh kjhlkjhkjlasd
            </p>
        </div>
    </a>
    <a class="recipesuggest" href="#">
        <div class="fotosuggest">
            <img width="100%" src="../create/foto/626d439387839.jpg" alt="">
        </div>
        <div class="isisuggest">
            <h2>Strabwerry Cookies</h2>
            <p>Lorem ipsum dolor sit amet consectetur
                sss asdfkljhasd asl;dkfjh ;aksjdhf lkjghkjlfsadhfljk alksdjfhkjasldh kjhlkjhkjlasd
            </p>
        </div>
    </a>
    <a class="recipesuggest" href="#">
        <div class="fotosuggest">
            <img width="100%" src="../create/foto/626d439387839.jpg" alt="">
        </div>
        <div class="isisuggest">
            <h2>Strabwerry Cookies</h2>
            <p>Lorem ipsum dolor sit amet consectetur
                sss asdfkljhasd asl;dkfjh ;aksjdhf lkjghkjlfsadhfljk alksdjfhkjasldh kjhlkjhkjlasd
            </p>
        </div>
    </a> -->
</div>