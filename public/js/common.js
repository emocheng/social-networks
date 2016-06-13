
$(function(){
    $('#reg_submit').click(function(){
        var Email = $('#reg_email').val();
        var regPsw = $('#reg_psw').val();
        var repRegPsw = $('#rep_reg_psw').val();
        if(!Email || !regPsw || !repRegPsw)
        {
            alert('填写信息不完整');
            return false;
        }
        if( regPsw.length < 8)
        {
          alert('密码长度要大于8个字符');
            return false;
        }
        if(regPsw != repRegPsw)
        {
          alert('密码不一致');
          return false;
        }

        $.ajax({
        url:"/reg/ajaxReg",
        type:"post",
        dataType: 'json',
        data : {'Email':Email,
                'regPsw':regPsw,
                'repRegPsw':repRegPsw
              },
        success: function(data){
            console.log(data);
            if(data.code==-4)
            {
                alert("邮箱已被注册");

            }else if(data.code==1) 
            {
              window.location.href="/font/index"; 
            }else
            {
              alert("出现错误");
            }
        }
      });
    });

    $("#login").click(function(){
            var email = $("#Email").val();
            var psw = $("#psw").val();
            if(!email || !psw)
            {
                return false;
            }
            $.ajax({
              url:"/severlogin/ajaxLogin",
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
                    window.location.href="/server/index"; 
                  }
              }
          });
    })
});





