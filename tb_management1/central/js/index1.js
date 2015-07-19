$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.tbo_login').css('display', 'none');
  $('.user_login').fadeIn();
  $(this).toggleClass('green');
});



// $(document).mouseup(function (e)
// {
//     var container = $(".user_login");

//     if (container.is(e.target) // if the target of the click isn't the container...
//         && container.has(e.target).length === 0) // ... nor a descendant of the container
//     {
//         container.hide();
//         $('#loginform').removeClass('green');
//     }
// });

$('#tb_owner_login').click(function(){
  $('.user_login').css('display', 'none');
  $('.tbo_login').fadeIn();
  $(this).toggleClass('green');
});

// $(document).mouseup(function (e)
// {
//     var container = $(".tbo_login");

//     if (container.is(e.target) // if the target of the click isn't the container...
//         && container.has(e.target).length === 0) // ... nor a descendant of the container
//     {
//         container.hide();
//         $('#tb_owner_login').removeClass('green');
//     }
// });