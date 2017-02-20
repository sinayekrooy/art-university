// JavaScript Document


$(document).ready(function ($) {
    $('.wrapper .content .right .content #news1').click(function () {
        $('.wrapper .content .right .content .right').addClass('active');
        $('.wrapper .content .right .content .left').removeClass('active');
        $('.wrapper .content .right .content .news2').fadeOut();
        $('.wrapper .content .right .content .news1').delay(500).fadeIn(200);
    });
    $('.wrapper .content .right .content #news2').click(function () {
        $('.wrapper .content .right .content .left').addClass('active');
        $('.wrapper .content .right .content .right').removeClass('active');
        $('.wrapper .content .right .content .news1').fadeOut();
        $('.wrapper .content .right .content .news2').delay(500).fadeIn(200);
    });
    $('.wrapper .sidebar ul li ul').slideUp(0);
    $('.wrapper .sidebar ul li').hover(
  function () {
      $(this).children('.wrapper .sidebar ul li ul').slideDown(250);
  }, function () {
      $(this).children('.wrapper .sidebar ul li ul').slideUp(250);
  }
);
});
