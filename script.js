// Used to animate star rating selection

window.onload = function () {

    //RATING Variables
    var stars = document.querySelectorAll(".ratingsBlock__star");
    var rating = 0;

    var rate1 = document.querySelector('#rad1').checked;
    var rate2 = document.querySelector('#rad2').checked;
    var rate3 = document.querySelector('#rad3').checked;
    var rate4 = document.querySelector('#rad4').checked;
    var rate5 = document.querySelector('#rad5').checked;

    if (rate1) {
        rating = 1;
    }
    else if (rate2) {
        rating = 2;
    }
    else if (rate3) {
        rating = 3 ;
    }
    else if (rate4) {
        rating = 4;
    }
    else if (rate5) {
        rating = 5;
    }

    // - - - - - RATING EVENT LISTENERS - - - - -

    //RATING MOUSE OVER
    stars[0].addEventListener('mouseover', function () {
        clearStars();
        showStars(0);
    });
    stars[1].addEventListener('mouseover', function () {
        clearStars();
        showStars(1);
    });
    stars[2].addEventListener('mouseover', function () {
        clearStars();
        showStars(2);
    });
    stars[3].addEventListener('mouseover', function () {
        clearStars();
        showStars(3);
    });
    stars[4].addEventListener('mouseover', function () {
        clearStars();
        showStars(4);
    });

    //RATING MOUSE OUT
    stars[0].addEventListener('mouseout', function () {
        adjustStars();
    });
    stars[1].addEventListener('mouseout', function () {
        adjustStars();
    });
    stars[2].addEventListener('mouseout', function () {
        adjustStars();
    });
    stars[3].addEventListener('mouseout', function () {
        adjustStars();
    });
    stars[4].addEventListener('mouseout', function () {
        adjustStars();
    });

    //RATING SELECTION
    stars[0].addEventListener('click', function () {
        rating = 1;
        adjustStars();
    });
    stars[1].addEventListener('click', function () {
        rating = 2;
        adjustStars();
    });
    stars[2].addEventListener('click', function () {
        rating = 3;
        adjustStars();
    });
    stars[3].addEventListener('click', function () {
        rating = 4;
        adjustStars();
    });
    stars[4].addEventListener('click', function () {
        rating = 5;
        adjustStars();
    });


    // - - - - - STAR FUNCTIONS - - - - -
    //SHOWS STARS
    function showStars(num) {
        if (num === 0) {
            stars[0].src = "images/star.png";
        }
        else if (num === 1) {
            stars[0].src = "images/star.png";
            stars[1].src = "images/star.png";
        }
        else if (num === 2) {
            stars[0].src = "images/star.png";
            stars[1].src = "images/star.png";
            stars[2].src = "images/star.png";
        }
        else if (num === 3) {
            stars[0].src = "images/star.png";
            stars[1].src = "images/star.png";
            stars[2].src = "images/star.png";
            stars[3].src = "images/star.png";
        }
        else if (num === 4) {
            stars[0].src = "images/star.png";
            stars[1].src = "images/star.png";
            stars[2].src = "images/star.png";
            stars[3].src = "images/star.png";
            stars[4].src = "images/star.png";
        }
    }

    //CLEAR STARS
    function clearStars() {
        stars[0].src = "images/starBlank.png";
        stars[1].src = "images/starBlank.png";
        stars[2].src = "images/starBlank.png";
        stars[3].src = "images/starBlank.png";
        stars[4].src = "images/starBlank.png";
    }

    //HIDES STARS
    function adjustStars() {
        clearStars();

        if (rating === 1) {
            showStars(0);
        }
        else if (rating === 2) {
            showStars(1);
        }
        else if (rating === 3) {
            showStars(2);
        }
        else if (rating === 4) {
            showStars(3);
        }
        else if (rating === 5) {
            showStars(4);
        }
    }
};