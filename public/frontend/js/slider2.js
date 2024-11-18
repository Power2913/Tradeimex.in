const PartnersHeroGraphic = document.querySelector('.PartnersHeroGraphic');

const PartnersHeroGraphicLogo = document.querySelectorAll('.PartnersHeroGraphicLogo')

const PartnersHeroGraphicLogo__wrapper = document.querySelectorAll('.PartnersHeroGraphicLogo__wrapper');

// First Counter
var counter = 0
var counterSlider = counter;

// Second Counter
var secondLayerCounter = 9;
var secondLayerSliderCounter = secondLayerCounter;

// Third counter
var thirdLayerCounter = 16;
var thirdLayerSliderCounter = thirdLayerCounter;

setInterval(() => {

    // SOME PRE DEFINED VALUES WHICH WE USED TO ANIMANTE
    var pos = 0;
    var rightValue = 417.635;
    var value = -45;

    // FIRST SLIDER START POSITION
    counterSlider = counter;

    // SECOND SLIDER START POSITION
    secondLayerSliderCounter = secondLayerCounter;

    // THIRD SLIDER START POSITION
    thirdLayerSliderCounter = thirdLayerCounter;

    //RUNNING FOR LOOP TO INITIALIZE POS 
    for (let i = 0; i < 9; i++) {

        // SECOND LAYER INCREMENT
        var secondLayerRightValue = rightValue + 80;


        // THIRD LAYER INCREMENT
        var thirdRightValue = rightValue + 120 + 180;
        if (pos >= 3) {
            thirdRightValue += -40;
            // console.log('adding third layer')
        }

        function rotateSLide(pos, transition, opacity, left, top) {
            if (PartnersHeroGraphicLogo[pos] && PartnersHeroGraphicLogo__wrapper[pos]) {
                PartnersHeroGraphicLogo[pos].style.transition = `${transition}s`;
                PartnersHeroGraphicLogo[pos].style.transform = `translate3d(${left}px, ${top}px, 0px)`;
                PartnersHeroGraphicLogo__wrapper[pos].style.opacity = opacity;
            } else {
                console.error(`Element at index ${pos} is undefined`);
            }
        }

        // SECOND SLIDER ROTATOR
        if (pos < 7) {

            if (pos == 6) {
                rotateSLide(secondLayerSliderCounter, 0.8, 1, 600, 127)
                rotateSLide(secondLayerSliderCounter, 0, 1, 51, 652)

            } else {
                rotateSLide(secondLayerSliderCounter, 0.8, 1, secondLayerRightValue, value + 117)
            }
        }


        // THIRD SLIDER ROTATOR
        if (pos < 6) {

            if (pos == 1) {
                rotateSLide(thirdLayerSliderCounter, 0, 1, thirdRightValue, value + 127);
            } else {

                rotateSLide(thirdLayerSliderCounter, 0.8, 1, thirdRightValue, value + 137);
            }
        }

        // FIRST SLIDER ROTATOR
        if (i >= 6) {
            rotateSLide(counterSlider, 0, 1, 550, -120);
        } else {

            rotateSLide(counterSlider, 0.8, 1, rightValue, value);
        }

        pos++;
        if (pos >= 3) {
            rightValue = (rightValue / 1.5 - 18 * (pos + 0.4)) / 1.8;
            value += - 20
        } else {
            rightValue = rightValue / 1.5 - 18.1 * (pos + 0.4);
        }

        value += 42 * (pos)
        // console.log('counterSlider:' + counterSlider);
        counterSlider++


        if (counterSlider <= -1) {
            counterSlider = 8;
        }

        if (counterSlider >= 9) {
            counterSlider = 0;
        }

        // SECOND LAYER COUNTER INCREMENT
        secondLayerSliderCounter++
        // SECOND LAYER COUNTER
        if (secondLayerSliderCounter >= 16) {
            secondLayerSliderCounter = 9;
        }

        // THIRD LAYER COUNTER INCREMENT
        thirdLayerSliderCounter++
        // THIRD LAYER COUNTER
        if (thirdLayerSliderCounter <= 15) {
            thirdLayerSliderCounter = 20;

        }

        if (thirdLayerSliderCounter >= 21) {
            thirdLayerSliderCounter = 16;

        }
    }

    // FIRST LAYER COUNTER
    counter--
    if (counter <= -1) {
        counter = 8;
    }

    if (counter >= 9) {
        counter = 1;
    }

    // SECOND LAYER COUNTER
    secondLayerCounter++
    if (secondLayerCounter >= 16) {
        secondLayerCounter = 9;
    }

    // THIRD LAYER COUNTER
    thirdLayerCounter--
    if (thirdLayerCounter <= 15) {
        thirdLayerCounter = 20;
    }

    if (thirdLayerCounter >= 21) {
        thirdLayerSliderCounter = 16;

    }


}, 1000);