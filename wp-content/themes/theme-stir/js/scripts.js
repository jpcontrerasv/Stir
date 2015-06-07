// Create the dropdown base
$("<select />").appendTo("nav");

// Create default option "Go to..."
$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Go to..."
}).appendTo("nav select");

// Populate dropdown with menu items
$("nav a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("nav select");
});
$("nav select").change(function() {
  window.location = $(this).find("option:selected").val();
});

$(window).load(function(){
  $('#slider-featured').flexslider({
	animation: "slide",
	controlNav: false, 
  });
  $('#slider-toolshed').flexslider({
	animation: "slide",
	controlNav: false, 
	smoothHeight: true,
  });
  $('#slider-home-text').flexslider({
	animation: "slide",
	controlNav: false,
	directionNav:false,
	smoothHeight: true,
	slideshowSpeed: 7000,      
	animationSpeed: 600,
  });

  
});

$('a').click(function(){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 1000);
    return false;
});

$(document).ready(function() {
    var s = $("#sticker");
    var pos = s.position();                    
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        if (windowpos >= pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick"); 
        }
    });
});


$("button.support").click(function(){
	$('body').addClass('overflow-hidden');
	if($('#fund').hasClass('desaparecido'))
	{
		$('#fund').removeClass('desaparecido');
		$('#fund').addClass('aparecido');
	}
	$('.donation_box').addClass('animated');
	$('.donation_box').addClass('bounceInDown');
});
$("button.cerrar").click(function(){
	$('body').removeClass('overflow-hidden');
	if($('#fund').hasClass('aparecido'))
	{
		$('#fund').removeClass('aparecido');
		$('#fund').addClass('desaparecido');
	}
	$('.donation_box').removeClass('animated');
	$('.donation_box').removeClass('bounceInDown');
});
/*$('.logo-head').hide();
$(window).resize(function() {
  if ($(this).width() > 1550) {
    $('.logo-head').fadeOut();
  } else {
    $('.logo-head').fadeIn();
	$('.logo-head').show();
    }
});
*/

tinymce.init({
	theme: "modern",
    skin: 'lightgray',
	 menubar : false,
	selector:'textarea.details',
	mode : "exact",
	toolbar_items_size: 'small',
	plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
});


/*imagenes*/
$("#insert-more").click(function () {
	$("#mytable").each(function () {
		 var tds = '<tr class="nueva">';
		 jQuery.each($('tr:last td', this), function () {
		 	 $this = $(this).clone();
		 	 $this.find('img').remove();
		 	 $this.find('input[type="hidden"]').remove()
			 tds += '<td>' + $this.html() + '</td>';
		 });
		 tds += '</tr>';
		 if ($('tbody', this).length > 0) {
			 $('tbody', this).append(tds);
		 } else {
			 $(this).append(tds);
		 }
	});
	$("#grouptable").each(function(){
		var $this = $(this);
		$clone = $this.find('tbody:first tr').clone();
		$clone.find('input').removeAttr('value');
		$clone.find('option').removeAttr('selected');
		$this.find('tbody:first').append('<tr class="nueva">'+$clone.html()+'</tr>');

	});
});
$( "#remove-more" ).click(function() {
  $(".nueva:last-child").remove();
});




/*links*/
$("#insert-more-links").click(function () {
	$("#mytable-links").each(function () {
		 var tds = '<tr class="nueva-link">';
		 jQuery.each($('tr:last td', this), function () {
		 	$this = $(this).clone();
		 	$this.find('input').attr('value','');
			tds += '<td>' + $this.html() + '</td>';
		 });
		 tds += '</tr>';
		 if ($('tbody', this).length > 0) {
			 $('tbody', this).append(tds);
		 } else {
			 $(this).append(tds);
		 }
	});
});
$( "#remove-more-links" ).click(function() {
  $(".nueva-link:last-child").remove();
});


$('.mySelect').selectpicker();


/*function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$('.blah').attr('src', e.target.result);
		}	
		reader.readAsDataURL(input.files[0]);
	}
}

$(".imgInp").change(function(){
	readURL(this);
});
*/

if($("#video_1").is(':checked')==false){
	$('#video-si').hide();
}
$('#video_1').click(function() {
	$('#video-si').show();
});
$('#video_0').click(function() { 
	$('#video-si').hide().find('input').val('');
});

if($('#yes-team').is(':checked')==false){
	$('.team-members').hide();
}
$('#no-team').click(function() {
	$('.team-members').hide();
});
$('#yes-team').click(function() {
	$('.team-members').show();
});


$("#color_me").change(function(){
    var color = $("option:selected", this).attr("class");
    $("#color_me").attr("class", color);
});



$("textarea").mouseover(function(event){
	if($(this).hasClass('error'))
	{
		$(this).removeClass('error');
	}
});
$(".check-caja").mouseover(function(event){
	if($(this).hasClass('error-caja'))
	{
		$(this).removeClass('error-caja');
	}
});
$(".contenedor-textarea").mouseover(function(event){
	if($("#mceu_15").hasClass('error'))
	{
		$("#mceu_15").removeClass('error');
	}
});
$(".contenedor-textarea").mouseover(function(event){
	if($("#mceu_43").hasClass('error'))
	{
		$("#mceu_43").removeClass('error');
	}
});
$(".contenedor-textarea").mouseover(function(event){
	if($("#mceu_71").hasClass('error'))
	{
		$("#mceu_71").removeClass('error');
	}
});
$(".check-inicio").mouseover(function(event){
	if($("label").hasClass('error-caja'))
	{
		$("label").removeClass('error-caja');
	}
});

$("input").mouseover(function(event){
	if($(this).hasClass('error'))
	{
		$(this).removeClass('error');
	}
});   



