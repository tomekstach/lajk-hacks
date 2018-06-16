jQuery().ready(function ($) {
    $("#arrow-right-1").click(function () {
        $("#slide1").animate({
            opacity: "toggle",
        }, {
            duration: 1000,
        });
        $("#slide2").animate({
            opacity: "toggle",
        }, {
            duration: 1000,
        });
    });
    $("#arrow-left-1").click(function () {
        $("#slide1").animate({
            opacity: "toggle",
        }, {
            duration: 1000,
        });
        $("#slide3").animate({
            opacity: "toggle",
        }, {
            duration: 1000,
        });
    });
    
    $("#arrow-right-2").click(function () {
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    $("#arrow-left-2").click(function () {
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    
    $("#arrow-right-3").click(function () {
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    $("#arrow-left-3").click(function () {
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    
    $("#slide1 #n2").click(function () {
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    $("#slide1 #n3").click(function () {
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    
    $("#slide2 #n1").click(function () {
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    $("#slide2 #n3").click(function () {
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    
    $("#slide3 #n1").click(function () {
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide1").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
    $("#slide3 #n2").click(function () {
        $("#slide3").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
        $("#slide2").animate({
            opacity: "toggle"
        }, {
            duration: 1000
        });
    });
});