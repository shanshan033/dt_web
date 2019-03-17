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
    //         var data = $(this).serialize();    //序列化表单
    //         console.log(data);
    //                              //打印表单数据
    //         e = e || window.event;
    //         // e.preventDefault();                //阻止表单提交
    // });

    
    // jQury validation 
$().ready(function() {
    $("#registerForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                remote:{
                    type: "post",
                    url: "validation/checkDuplicateName.php",
                    dataType: "json", 
                    data: {username:function() {
                        return $("#username").val();}} 
                }
            },
            password: {
               required: true,
               minlength: 5
            },
            age: {
               required: true,
               maxlength: 2
            },
            repassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter user name",
                minlength: "the length of username must be greater than 5",
                remote: "Username have already exist"
            },
            password: {
                required: "Please enter password",
                minlength: "the length of password must be greater than 5"
            },
            age: {
                required: "Please enter age",
                maxlength: "Please enter valid age"
            },
            repassword: {
                required: "Please enter password",
                minlength: "the length of password must be greater than 5",
                equalTo: "The two passwords do not match"
            }
        }
    });
});
