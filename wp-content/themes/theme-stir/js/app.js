$(document).ready(function() {



	$("button[rel=button], input[rel=button]").on('click',function(e){

		e.preventDefault();	



		try{

			

			$project.getMetodo($(this));

		} catch(e){

			console.log('problema metodo :( ');		

			console.log(e);

		}

		return false;

	});



	$project = new Object();

	$project.getMetodo = function($this){

			//console.log("$project." + $this.data('page') + "('"+$this.data('option')+"')");

			eval("$project." + $this.data('page') + "('"+$this.data('option')+"')");

	}

	

	// Metodo elegibility

	$project.elegibility = function($option){

		var checkboxes = $("input[name='checkboxes']");

		if(checkboxes.is(':checked')){

			$project.loading('show');	

			$.ajax({

			  method: "POST",

			  url:  $base_url+"/wp-admin/admin-ajax.php",

			  data: { action: "project_save", step: "elegibility"}

			}) .done(function( json ) {

				var code = jQuery.parseJSON(json);

				$project.loading('hidden');

		    	if(code.code=="01"){

		    		console.log('BD ==> 01');

		    		return false;

		    	}

		    	window.location.href= code.url;

		    	

		  	});

	  	} else{

	  		checkboxes.parent().addClass('error-caja');

	  	}

	};

	

	// Metodo Basic

	

	$project.basics = function($option){

		var checkboxes = $("input[name='checkboxes']");

		if(!checkboxes.is(':checked')) checkboxes.parent().addClass("error-caja"); 

		if(!$project.validate($('form[name="basics"]')) && checkboxes.is(':checked')) {

			var formObj = $('form[name="basics"]');

		  	var $data = $('form[name="basics"]').serialize();	

			var $datafile = "";

			$project.loading('show');	

			if(window.FormData !== undefined)  // for HTML5 browsers

			{

				var formData = new FormData(formObj[0]);

				

				$files = $.ajax({

		        	url:  $base_url+"/wp-admin/admin-ajax.php?action=upload_files",

					type: "POST",

					data:  formData,

					mimeType:"multipart/form-data",

					contentType: false,

		    	    cache: false,

					processData:false

			   }).done(function(json){

					var $datafile = "";

					var file = jQuery.parseJSON(json);

			   		$.each(file,function(i,item){

			   			$datafile = "&file[]="+item.name+$datafile;

			   			$("#logo-dinamico").html('<img src="'+$base_url+'/wp-content/files_mf/'+item.name+'" width="200">');	

			   		})

			   		setsend( $datafile );

			   });

		   } else {

		   		setsend( $datafile );

		   }

		  

		   setsend = function( $datafile ){ 

			   $data = $data+$datafile+"&action=project_save&step=basics&option="+$option;

				$.ajax({

				  method: "POST",

				  url:  $base_url+"/wp-admin/admin-ajax.php",

				  data: $data

				}) .done(function( json ) {

					var code = jQuery.parseJSON(json);

					$project.loading('hidden');	

			    	if(code.code=="01"){

			    		console.log('BD ==> 01');

			    		return false;

			    	} else if(code.url!=""){

			    			window.location.href= code.url;

			    	} 

			  	});

		  	}

		}

	};



	//Metodo Details



	$project.details=function($option){

		

		var project_old_people = $("input[name='detail_of_project_old_people[]']");

		var project_for = $("input[name='detail_of_project_for']");

		if(!project_old_people.is(':checked')) project_old_people.parent().addClass("error-caja");  

		if(!project_for.is(':checked')) project_for.parent().addClass("error-caja"); 

		tinyMCE.get('detail_of_project_detailed').save();

		if(!$project.validate($('form[name="details"]')) && project_old_people.is(':checked') && project_for.is(':checked')) {

			var $data = $('form[name="details"]').serialize()+'&action=project_save&step=details&option='+$option;

			$project.loading('show');	

			$.ajax({

				  method: "POST",

				  url:  $base_url+"/wp-admin/admin-ajax.php",

				  data: $data

			}) .done(function( json ) {

				var code = jQuery.parseJSON(json);

				$project.loading('hidden');	

		    	if(code.code=="01"){

		    		console.log('BD ==> 01');

		    		return false;

		    	} else if(code.url!=""){ 

		    		window.location.href= code.url;

		  		}

		  	});

		};

	};

	//metodo visual

	$project.visuals =function($option){

		if(!$project.validate($('form[name="visuals"]'))){

			var formObj = $('form[name="visuals"]');

		  	var $data = $('form[name="visuals"]').serialize();	

			var $datafile = "";

			$project.loading('show');	

			if(window.FormData !== undefined)  // for HTML5 browsers

			{

				var formData = new FormData(formObj[0]);

				

				$files = $.ajax({

		        	url:  $base_url+"/wp-admin/admin-ajax.php?action=upload_files",

					type: "POST",

					data:  formData,

					mimeType:"multipart/form-data",

					contentType: false,

		    	    cache: false,

					processData:false

			   }).done(function(json){

					var $datafile = "";

					var file = jQuery.parseJSON(json);

					$counthidden = $('.cache-image input[type="hidden"]').length;

			   		$.each(file,function(i,item){

			   			if(item.key_file=="visuals_project_display") {

			   				$('.cache-display').html('<img src="'+$base_url+'/wp-content/files_mf/'+item.name+'" width="200">');

			   			} else{

			   				$('.cache-image:eq('+$counthidden+')').html('<img src="'+$base_url+'/wp-content/files_mf/'+item.name+'" width="200">');

			   				$counthidden++;

			   			}

			   			//console.log(item);

			   			$datafile = $datafile+"&file["+item.key_file+"][]="+item.name;



			   		});

			   		

			   		setsend( $datafile );

			   });

		   } else {

		   		setsend( $datafile );

		   }

		   

		   setsend = function( $datafile ){ 

			   $data = $data+$datafile+"&action=project_save&step=visuals&option="+$option;

				$.ajax({

				  method: "POST",

				  url:  $base_url+"/wp-admin/admin-ajax.php",

				  data: $data

				}) .done(function( json ) {

					var code = jQuery.parseJSON(json);

					$project.loading('hidden');	

			    	if(code.code=="01"){

			    		console.log('BD ==> 01');

			    		return false;

			    	} else if(code.url!=""){

			    			window.location.href= code.url;

			    	} 

			  	});

		  	}

		}

	};



	// Metodo team 



	$project.team = function($option){

		if(!$project.validate($('form[name="team"]'))) {

			var formObj = $('form[name="team"]');

		  	var $data = $('form[name="team"]').serialize();	

			var $datafile = "";

			$project.loading('show');	

			if(window.FormData !== undefined)  // for HTML5 browsers

			{

				var formData = new FormData(formObj[0]);

				

				$files = $.ajax({

		        	url:  $base_url+"/wp-admin/admin-ajax.php?action=upload_files",

					type: "POST",

					data:  formData,

					mimeType:"multipart/form-data",

					contentType: false,

		    	    cache: false,

					processData:false

			   }).done(function(json){

					var $datafile = "";

					var file = jQuery.parseJSON(json);

			   		$.each(file,function(i,item){

			   			$datafile = $datafile+"&file["+item.key_file+"][]="+item.name;

			   			$('.cache[rel='+item.key_file+']').html('<img src="'+$base_url+'/wp-content/files_mf/'+item.name+'" width="200">');

			   			

			   		})

			   		setsend( $datafile );

			   });

		   } else {

		   		setsend( $datafile );

		   }

		   

		   setsend = function( $datafile ){ 

			   $data = $data+$datafile+"&action=project_save&step=team&option="+$option;

				$.ajax({

				  method: "POST",

				  url:  $base_url+"/wp-admin/admin-ajax.php",

				  data: $data

				}) .done(function( json ) {

					var code = jQuery.parseJSON(json);

					$project.loading('hidden');	

			    	if(code.code=="01"){

			    		console.log('BD ==> 01');

			    		return false;

			    	} else if(code.url!=""){

			    			window.location.href= code.url;

			    	} 

			  	});

		  	}

		}

	}

	//Metodo plan

	$project.plan = function($option){

		tinyMCE.get('plan_project_support').save();

		tinyMCE.get('plan_project_stir_money').save();

		tinyMCE.get('plan_project_future').save();

		if(!$project.validate($('form[name="plan"]'))) {

			$project.loading('show');	

			var formObj = $('form[name="plan"]');

		  	var $data = $('form[name="plan"]').serialize();	

		   $data = $data+"&action=project_save&step=plan&option="+$option;

			$.ajax({

			  method: "POST",

			  url:  $base_url+"/wp-admin/admin-ajax.php",

			  data: $data

			}) .done(function( json ) {

				var code = jQuery.parseJSON(json);

				$project.loading('hidden');	

		    	if(code.code=="01"){

		    		console.log('BD ==> 01');

		    		return false;

		    	} else if(code.url!=""){

		    			window.location.href= code.url;

		    	} 

		  	});

		  	

		}



	}

	$project.support = function($option){

		if(!$project.validate($('form[name="support"]'))) {

			var $data = $('form[name="support"]').serialize()+'&action=support';

			var $mensaje = $('form[name="support"]').find('div[rel=message]');

			$.ajax({

				  method: "POST",

				  url:  $base_url+"/wp-admin/admin-ajax.php",

				  data: $data

			}) .done(function( json ) {

				var code = jQuery.parseJSON(json);

				$mensaje.removeClass('error');

				$mensaje.removeClass('success');

		    	$mensaje.addClass(code.state).html(code.message);

		    	$('form[name="support"]')[0].reset();

		    	if(code.state=="success"){

		    		setTimeout(function() {

		    			$mensaje.removeClass('success');

					    $('#survey').removeClass('aparecido');

						$('#survey').addClass('desaparecido');

					  }, 1000);

				}

		  	});

		};

	}

	$project.preview = function($option){

		$data = 'action=project_save&step=preview&option='+$option;

		$.ajax({

			  method: "POST",

			  url:  $base_url+"/wp-admin/admin-ajax.php",

			  data: $data

		}) .done(function( json ) {

			var code = jQuery.parseJSON(json);

	    	if(code.code=="01"){

	    		console.log('BD ==> 01');

	    		return false;

	    	} else if(code.url!=""){

	    		$project.loading('show','Your project will be reviewed');	

	    		setTimeout(function() {

	    			$project.loading('hidden');	

	    			window.location.href= code.url;

	    		},5000)

	    		

	    	} 

	  	});

	}



	$project.validate= function($element){

		var $error = false;



		$element.find('*[rel=requerido]').each(function(){

			

			if($.trim($(this).val())==""){

				if($(this).hasClass('tinymce'))

					$(this).prev().addClass('error');

				else

					$(this).addClass('error');

				$error = true;

			}

		});

		return $error;

	}

	$project.loading = function($option,$text){ 

		var $mensaje = $("#mensaje");

		if($.trim($text) != ""){

			$mensaje.find('p').html($text);

		}

		if($option=='show'){

			$mensaje.slideDown();

			return true;

		}

		$mensaje.delay(500).slideUp()

		return true;

	}

	setTimeout(function() {
        if (location.href.indexOf("#welcome") != -1) {
        	$project.loading('show','Welcome to Stir');
        	setTimeout(function() {
				$project.loading('hide');	

			},3000);
        }
    }, 1);

});



function getDoc(frame) {

     var doc = null;

     

     // IE8 cascading access check

     try {

         if (frame.contentWindow) {

             doc = frame.contentWindow.document;

         }

     } catch(err) {

     }



     if (doc) { // successful getting content

         return doc;

     }



     try { // simply checking may throw in ie8 under ssl or mismatched protocol

         doc = frame.contentDocument ? frame.contentDocument : frame.document;

     } catch(err) {

         // last attempt

         doc = frame.document;

     }

     return doc;

 }



$("#multiform").submit(function(e)

{

	var formObj = $(this);

	var formURL = formObj.attr("action");



	if(window.FormData !== undefined)  // for HTML5 browsers

	{

	

		var formData = new FormData(this);

		$.ajax({

        	url: formURL,

			type: "POST",

			data:  formData,

			mimeType:"multipart/form-data",

			contentType: false,

    	    cache: false,

			processData:false,

			success: function(data, textStatus, jqXHR)

		    {

		    },

		  	error: function(jqXHR, textStatus, errorThrown) 

	    	{

	    	} 	        

	   });

        e.preventDefault();

   }

   else  //for olden browsers

	{

		//generate a random id

		var  iframeId = "unique" + (new Date().getTime());



		//create an empty iframe

		var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');



		//hide it

		iframe.hide();



		//set form target to iframe

		formObj.attr("target",iframeId);



		//Add iframe to body

		iframe.appendTo("body");

		iframe.load(function(e)

		{

			var doc = getDoc(iframe[0]);

			var docRoot = doc.body ? doc.body : doc.documentElement;

			var data = docRoot.innerHTML;

			//data return from server.

			

		});

	

	}



});

$("#multiform").submit();