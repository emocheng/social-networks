$(function(){
    $(".login_btn a").hover(function(){
       var $b = $(this);

           var a = $b.index();
            console.log(a);
           var $i =$(".form").children().eq(a);
           if(!$i.is(":animated")) {
               $i.show(300);
               $i.siblings().hide(300);
           }
    })

    $('#font_login').click(function(){
        $('.login_band').show();
    })

    $("#login").click(function(){
        var email = $("#Email").val();
        var psw = $("#psw").val();
        if(!email || !psw)
        {
            return false;
        }
        $.ajax({
          url:"/font/ajaxLogin",
          type:"post",
          dataType: 'json',
          data : {'email':email,
                  'psw':psw,
                },
          success: function(data){
              console.log(data);
              if(data.code == -2)
              {
                alert('no user')
              }else if(data.code == -1)
              {
                alert('infomation unable');
              }else{
                window.location.href="/home/index"; 
              }
          }
      });


    })
})
