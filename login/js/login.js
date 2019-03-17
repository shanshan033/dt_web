/**
* detect IE
* returns version of IE or false, if browser is not Internet Explorer
*/
function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }
        return false;
}

  // $('form').submit(function(e){
  //           var data = $(this).serialize();    //serialize form
  //           console.log(data);
  //                                //打印表单数据
  //           e = e || window.event;
  //           // e.preventDefault();                //阻止表单提交
  //   });

// // jQury validation 
$().ready(function() {
    $("#loginForm").validate({
    rules: {
        username: {
            required: true,
            minlength: 5,
            remote:{
                type: "post",
                url: "validation/userValidate.php",
                dataType: "json", 
                data: {username:function() {
                        return $("#username").val();}}}        
            },
            password: {
                required: true,
                minlength: 5,
                remote:{
                    type:"post",
                    url: "validation/passwordValidate.php",
                    dataType: "json", 
                    data:{
                        username:function() {
                            return $("#username").val();},
                        password:function () {
                            return $("#password").val();}}}  
            }
        },
    messages: {
        username: {
            required: "Please enter user name",
            minlength: "the length of username must be greater than 5",
            remote: "Username doesn't exist, please enter valid name"
        },
        password: {
            required: "Please enter password",
            minlength: "the length of password must be greater than 5",
            remote: "Wrong Password, please enter valid password"
        }
    }
    });
}); 