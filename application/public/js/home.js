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
})