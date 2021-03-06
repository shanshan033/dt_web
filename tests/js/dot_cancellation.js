var clicks = [];
// Constructor
function ClickStats(click_id, err, time){
    this.click_id = click_id;
    this.time = time;
    this.err = err;
}


$(document).ready(function(){
  var correctNumber = 0;
  var errorNumber = 0;
  var totalCorrectNumber = 0;
  var startTime = new Date();
  var lastTime = new Date();
  // Initiaize answer flag
  var flag = 0;
  var click_id = 0;
  var username = $('#nameFooter').html();

  // Create a 10x10 table containing images
  var generate = function (){
    var tableData = "";
    for (var j=0; j<10; j++){
        tableData+="<tr style = 'width : 20%'>";
        for(var i=0;i<10;i++){
          // Images are randomly distributed into the table
          var id=Math.round(Math.random()*6)+1;
          var data = "<input type='image' src=images/img"+id+".png class = 'imgClass' id='img"+id+"' >";
          tableData+="<td >"+data+"</td>";
          if (id == 0 || id == 3 || id == 4){
            totalCorrectNumber +=1;
          }

        }
        tableData+="</tr>";
    }

    return tableData;
}

// Show table into web page
$("#tbody1").html(generate());
$("#question_id").html("Total Correct Images: " + totalCorrectNumber + 
                           "</br> </br> Correct Clicks: " + correctNumber +
                           "</br> </br> Wrong Clicks: " + errorNumber);

/* Check whether the choice is right (this alert will not be shown in ths final version)
 * Obtain the id of the image and check the correction
 */
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

$("table tr td").on("click", function () {
    var currentTime = new Date();
    var time = ((currentTime - lastTime) / 1000).toFixed(2);
    click_id = click_id + 1;

    var tdidx = $(this).index();
    var td = $(this).find("td:eq("+tdidx+")").context.childNodes[0].id;
    $(this).find("input").addClass("darken");
    $(this).find('input').attr('disabled', true);
          
    if (td == "img0" || td == "img3" || td == "img4"){
         correctNumber +=1;
         flag = 1;
    }
    else{            	
         errorNumber +=1;
         flag = 0;
    }

    lastTime = new Date();
    console.log(totalCorrectNumber + " " + correctNumber + " " +totalTime() + " " + time);
    $("#question_id").html("Total Correct Images: " + totalCorrectNumber + 
                           "</br> </br> Correct Clicks: " + correctNumber +
                           "</br> </br> Wrong Clicks: " + errorNumber);

    click = new ClickStats(click_id, flag, time);

    // Push click into clicks array
    clicks.push(click);
            
    for(var i = 0; i < clicks.length; i++){
        console.log(clicks[i].click_id + " " + clicks[i].time + " " + clicks[i].err);
    }

    if(correctNumber >= totalCorrectNumber){
       // Add information into ClickStats constructor 
        $.ajax({
        type: "POST",
        url: "dot_cancellation_store.php",
        dataType: "json",
        data: {username: username,
                clicks: clicks,
                total_correct_number: totalCorrectNumber,
                total_answer_time: totalTime()},
        }).done(function(result){
                if(result){
                  // alert(result);
                  setTimeout("window.location.href='intro_schulte.html'", 500);
                }else{
                  setTimeout("window.location.href='dot_cancellation.php'", 500);
                }
          }); 
    }

  });
});