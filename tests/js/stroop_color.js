var clicks = [];
// Constructor
function ClickStats(question, time, err){
    this.question = question;
    this.time = time;
    this.err = err;
}

/* if one of button is clicked
* Check whether the choice is correct
* Then the page automatically jump to the next question 
*/
$(document).ready(function () { 
    var TestNumber = 0;
    var startTime = new Date();
    var lastTime = new Date();
    var flag = 0;
    var userName = $('#nameFooter').html();


    var randomTest = function(){
        var list = ["Red", "Grey", "Blue", "Green", "Purple", "Black", "Orange", "Pink" ];
        var btn = new Array();
        //Create new button to store button's color
        var button = [];

        // Create ransom button
        for (var i = 0; i < 4; i++){
            var random = Math.floor(Math.random() * list.length + 1)-1;
            btn.push(list[random]);
            button[i] = list[random];
            list.splice(random, 1);
        }

        // Create the heading 
        var random = Math.floor(Math.random() * 4 + 1)-1;
        var h1_color = btn[random];
        var h1_text = list[random];

        return {
            button,
            h1_color: h1_color,
            h1_text: h1_text
        };
    }

    function generate(){

        var Test = randomTest();
        var headingData = "<div class='row clearfix'><div class='col-md-12 column'><h1 class='display-1' style='color:"+Test.h1_color+"'>"+Test.h1_text+"</h1></div></div>";
        var buttonData = "<div class='row clearfix'><div class='col-md-6 column'><button id = 'btn1' style = 'background:"+Test.button[0]+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button[0]
        +"</button></div><div class='col-md-6 column'><button id = 'btn2' style = 'background:"+Test.button[1]+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button[1]
        +"</button></div></div><div class='row clearfix'><div class='col-md-6 column'><button id = 'btn3' style = 'background:"+Test.button[2]+"' type='button' class='btn btn-lg btn-block btn-info'>"+Test.button[2]
        +"</button></div><div class='col-md-6 column'><button id = 'btn4' style = 'background:"+Test.button[3]+"' type='button' class='btn btn-info btn-lg btn-block'>"+Test.button[3]+"</button></div></div>";

        var formData = headingData+buttonData;

        $("#formSC").html(formData);

        TestNumber = TestNumber+1;
    }

    // Generate random test
    generate();

    var totalTime = function(){
        var diff = lastTime - startTime;
        diff = diff / 1000;
        var seconds = Math.floor(diff % 60);
        diff = diff / 60;
        var minutes = Math.floor(diff % 60);
        diff = diff / 60;
        var hours = Math.floor(diff % 24);

        var totalTime =  ("0" + hours).slice (-2) + ':' + ("0" + minutes).slice (-2) + ':' + ("0" + seconds).slice (-2);
        // console.log( " "+totalTime);
        return totalTime;
    }

        
    $(document).on('click', "button", function() {
        var currentTime = new Date();
        var time = ((currentTime - lastTime) / 1000).toFixed(2);

        var id = event.target.id
        var string = "#" + id;
        // Obtain color from heading and button
        var heading_color = $("h1").css("color");
        var button_choice = $(string).css("background-color");


        // Alert whether the answer is correct (it will not be shown in the final version)
        var flag = 0;
        if (heading_color == button_choice){
            flag = 1;
        }else{
            flag = 0;
        }
        
        // Add information into ClickStats constructor 
        click = new ClickStats(TestNumber, time, flag);
        console.log(click.question + " " + click.time + " " + click.err);
        // Push click into clicks array
        clicks.push(click);
            
        for(var i = 0; i < clicks.length; i++){
            console.log(clicks[i].question);
        }

        lastTime = new Date();
        generate();

        if(TestNumber > 10){
            $.ajax({
                type: "POST",
                url: "stroop_color_store.php",
                // dataType: "json",
                data: {username: userName,
                    clicks: clicks,
                    total_answer_time: totalTime()},
                succuss: function(msg){
 
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // 状态码
                    console.log(XMLHttpRequest.status);
                    // 状态
                    console.log(XMLHttpRequest.readyState);
                    // 错误信息   
                    console.log(textStatus);
                }
            });
            window.location.href="intro_dot.html";
        }    

    });

});
