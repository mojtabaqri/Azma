

$(document).ready(function () {
    //Student login form controller
    var exr=/[0-9]/;
    $("#stdSubmit").click(function () {
       var username=$("#stdUserName").val().trim();
       var password=$("#stdPassword").val().trim();
       if(username=="")
       {
           $("#std-err-box").slideDown();
           $("#std-err-txt").text("نام کاربری را باید وارد کنید !");
           setTimeout(function () {
               $("#std-err-box").slideUp();
           },1500);
           return false;
       }
       else if (password=="")
       {
           $("#std-err-box").slideDown();
           $("#std-err-txt").text("پسورد  را باید وارد کنید !");
           setTimeout(function () {
               $("#std-err-box").slideUp();
           },1500);
           return false;

       }
       else if(exr.test(username)==false)
       {
           $("#std-err-box").slideDown();
           $("#std-err-txt").text("شما فقط مجاز به وارد کردن اعداد میباشید !");
           setTimeout(function () {
               $("#std-err-box").slideUp();
           },1500);
           return false;
       }
       else if(exr.test(password)==false)
       {
           $("#std-err-box").slideDown();
           $("#std-err-txt").text("شما فقط مجاز به وارد کردن اعداد میباشید !");
           setTimeout(function () {
               $("#std-err-box").slideUp();
           },1500);
           return false;
       }

   });
   //end login form controller

    //Start Master Login Form controller

    $("#masterSubmit").click(function () {
        var Musername=$("#masterUserName").val().trim();
        var Mpassword=$("#masterPassword").val().trim();
        if(Musername=="")
        {
            $("#master-err-box").slideDown();
            $("#master-err-txt").text("نام کاربری را باید وارد کنید !");
            setTimeout(function () {
                $("#master-err-box").slideUp();
            },1500);
            return false;
        }
        else if (Mpassword=="")
        {
            $("#master-err-box").slideDown();
            $("#master-err-txt").text("پسورد  را باید وارد کنید !");
            setTimeout(function () {
                $("#master-err-box").slideUp();
            },1500);
            return false;

        }
        else if(exr.test(Musername)==false)
        {
            $("#master-err-box").slideDown();
            $("#master-err-txt").text("شما فقط مجاز به وارد کردن اعداد میباشید !");
            setTimeout(function () {
                $("#master-err-box").slideUp();
            },1500);
            return false;
        }
        else if(exr.test(Mpassword)==false)
        {
            $("#master-err-box").slideDown();
            $("#master-err-txt").text("شما فقط مجاز به وارد کردن اعداد میباشید !");
            setTimeout(function () {
                $("#master-err-box").slideUp();
            },1500);
            return false;
        }

    });
    //End  Master Login Form

    //admin panel login controller
    var adminRegxp=/[a-z-0-9]+\@[a-z-A-Z]+\.+[a-z]/;
     $("#adminSubmit").click(function () {
         var username=$("#adminLogin").val().trim();
         var password=$("#adminPass").val().trim();
         if(username=="")
         {
             $("#master-err-box").slideDown();
             $("#master-err-txt").text(" ایمیل  را باید وارد کنید !");
             setTimeout(function () {
                 $("#master-err-box").slideUp();
             },1500);
             return false;
         }
         else if(adminRegxp.test(username)==false)
         {
             $("#master-err-box").slideDown();
             $("#master-err-txt").text(" ایمیل وارد شده صحیح نیست ");
             setTimeout(function () {
                 $("#master-err-box").slideUp();
             },1500);
             return false;
         }
         else if (password=="")
         {
             $("#master-err-box").slideDown();
             $("#master-err-txt").text("پسورد  را باید وارد کنید !");
             setTimeout(function () {
                 $("#master-err-box").slideUp();
             },1500);
             return false;
         }
     });

    //end admin  panel login controller


});
