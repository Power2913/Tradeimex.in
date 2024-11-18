"use strict";

$(document).ready(function() {
    // var testimonialsSlider = $("#testimonials-slider");
    // if (testimonialsSlider.length) {
    //     testimonialsSlider.slick({
    //         dots: false,
    //         arrows: true,
    //         infinite: false,
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //     });
    // }

    // var miniTestimonialsSlider = $(".mini-testimonials-slider");
    // if (miniTestimonialsSlider.length) {
    //     miniTestimonialsSlider.slick({
    //         dots: true,
    //         arrows: false,
    //         infinite: false,
    //         autoplay: true,
    //         speed: 200
    //     });
    // }

    // var infoSlider = $(".info-slider");
    // if (infoSlider.length) {
    //     infoSlider.slick({
    //         dots: true,
    //         arrows: false,
    //         infinite: false,
    //         autoplay: true,
    //         speed: 200
    //     });
    // }

    function validateform() {
        var isValid = true;
        var number = document.forms.myform.number.value;
        if (number.length < 10 || number.length > 20 || number.includes(" ")) {
            document.getElementById("error").innerHTML = "PHONE NUMBER IS INVALID";
            isValid = false;
        }
        return isValid;
    }

    $(window).on("load", function() {
        $(".slick-active > div:nth-child(1)", "#main-slider").addClass("animated");
        $(".slick-active > div:nth-child(2)", "#main-slider").addClass("animated animation-delay1");

        var planSlider = $("#c-plan");
        if (planSlider.length) {
            planSlider.slider({ tooltip: "always" });
            planSlider.on("slide", function(e) {
                $(".slider .tooltip-up", "#custom-plan").text(e.value / 20);
                $(".price", "#custom-plan").text($(this).data("currency") + e.value / 20);
                $(".feature1 span", "#custom-plan").text(e.value);
                $(".feature2 span", "#custom-plan").text(98 * e.value);
            });
            planSlider.value = planSlider.data("slider-value");
            $(".slider .tooltip", "#custom-plan").append('<div class="tooltip-up"></div>');
            $(".slider .tooltip-up", "#custom-plan").text(planSlider.value / 20);
            $(".slider .tooltip-inner", "#custom-plan").attr("data-unit", planSlider.data("unit"));
            $(".slider .tooltip-up", "#custom-plan").attr("data-currency", planSlider.data("currency"));
            $(".price", "#custom-plan").text(planSlider.data("currency") + planSlider.value / 20);
            $(".feature1 span", "#custom-plan").text(planSlider.value);
            $(".feature2 span", "#custom-plan").text(98 * planSlider.value);
        }

        var featureIcons = $(".feature-icon-holder", "#features-links-holder");
        featureIcons.on("click", function() {
            featureIcons.removeClass("opened");
            $(this).addClass("opened");
            $(".show-details", "#features-holder").removeClass("show-details");
            $(".feature-d" + $(this).data("id"), "#features-holder").addClass("show-details");
        });

        var featuresHolder = $("#features-holder");
        var showDetails = $(".show-details", "#features-holder");
        featuresHolder.css("height", showDetails.height() + 120);
        $(window).on("resize", function() {
            featuresHolder.css("height", showDetails.height() + 150);
            return false;
        });

        var appIcons = $(".app-icon-holder", "#apps");
        appIcons.on("mouseover", function() {
            appIcons.removeClass("opened");
            $(this).addClass("opened");
            $(".show-details", "#apps").removeClass("show-details");
            $(".app-details" + $(this).data("id"), "#apps").addClass("show-details");
        });

        var infoLinks = $(".info-link", "#more-info");
        infoLinks.on("mouseover", function() {
            infoLinks.removeClass("opened");
            $(this).addClass("opened");
            $(".show-details", "#more-info").removeClass("show-details");
            $(".info-d" + $(this).data("id"), "#more-info").addClass("show-details");
        });

        var locations = [
            ["California", 97, 48, "r"],
            ["Costa Rica", 212, 31, "l"],
            ["Vancouver", 136, 161, "r"],
            ["Brazil", 303, 233, "r"],
            ["Alexandria", 149, 349, "l"],
            ["Dubai", 174, 469, "l"],
            ["Delhi", 204, 605, "r"],
            ["Munich", 91, 417, "r"],
            ["Barcelona", 112, 279, "l"],
            ["Moscow", 41, 554, "r"],
            ["Hong Kong", 151, 663, "r"],
            ["Melbourne", 356, 688, "l"],
            ["Pulau Ujong", 265, 578, "l"]
        ];
        var serversLocationHolder = $(".servers-location-holder", "#serversmap");
        for (var i = 0; i < locations.length; i++) {
            var side = locations[i][3];
            var leftText = side === "r" ? "" : locations[i][0];
            var rightText = side === "r" ? locations[i][0] : "";
            serversLocationHolder.append(
                '<div class="server-marker" style="top:' + locations[i][1] + 'px;left:' + locations[i][2] + 'px;">' +
                '<span class="left-text">' + leftText + '</span>' +
                '<span class="marker-icon"></span>' +
                '<span class="right-text">' + rightText + '</span>' +
                '</div>'
            );
        }
    });

    $("#Message").on("paste", function(e) {
        e.preventDefault();
    });

    let questions = document.querySelectorAll(".question");
    questions.forEach(e => {
        e.addEventListener("click", a => {
            let activeQuestion = document.querySelector(".question.active");
            if (activeQuestion && activeQuestion !== e) {
                activeQuestion.classList.toggle("active");
                activeQuestion.nextElementSibling.style.maxHeight = 0;
            }
            e.classList.toggle("active");
            let answer = e.nextElementSibling;
            if (e.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = 0;
            }
        });
    });
});
