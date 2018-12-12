//load the html document before loading this file
$(document).ready(function() {

    //change background color onfocus and on blur for memberData
    $(".memberData").focus(function() {
        $(this).css({ "background-color": "lightblue", "color": "red" });
    });
    $(".memberData").blur(function() {
        $(this).css({ "background-color": "inherit", "color": "inherit" });
    });

    //get keypress from textarea
    $("textarea").keypress(function() {
        let words = $("textarea").val().split(" ").length;
        return words <= 100 ? $("#wordsLeft").text(`${100 - words} words left`) : false;
    });

    //add hobbies
    $("#add").click(function() {
        let numInput = $("label + input").length;
        let content = `<label>Hobbly ${numInput + 1}</label><input type="text"></input><br>`;
        if (numInput < 10) {
            $("#hobbies").append(content);
        }
    });

    $("#remove").click(function() {
        $("div input:last").remove();
        $("div label:last").remove();
        $("div br:last").remove();
    });
});