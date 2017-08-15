var createNewController  = {
	init:function(){
		createNewController.registerEvent();
	},
	registerEvent:function(){
		createNewController.validation();
	},
	validation:function(){
		
		//click create news
		$('#create').off('click').on('click',function(e){
			e.preventDefault();
			var title = $('#title').val();
			
			if(title == ""){
				$("#err_title").html("Please enter new title");
				$("#err_title").addClass('text-danger');
				$('#title').addClass('form-error');
				$('#title').focus();
				return false;
			}
			$('#frm_new').attr({
				'action':'/admin/new/create'
			});
			$('#frm_new').submit();
			return true;
		});	

		$('#update').off('click').on('click',function(e){
			e.preventDefault();
			var title = $('#title').val();
			var id = $(this).data('id');
			if(title == ""){
				$("#err_title").html("Please enter new title");
				$("#err_title").addClass('text-danger');
				$('#title').addClass('form-error');
				$('#title').focus();
				return false;
			}
			$('#frm_new').attr({
				'action':'/admin/new/edit/'+id
			});
			$('#frm_new').submit();
			return true;
		});	



		//Click on draft and move to draft 
		$('#draft').off('click').on('click',function(e){
			e.preventDefault();
			var title = $('#title').val();
			var desc = $('.desc').val();
			if(title == ""){
				$("#err_title").html("Please enter new title");
				$("#err_title").addClass('text-danger');
				$('#title').addClass('form-error');
				$('#title').focus();
				return false;
			}
			$('#frm_new').attr({
				'action':'/admin/new/draft'
			});
			$('#frm_new').submit();
			return true;
		});


		$('#title').keyup(function(){
				$("#err_title").html("Tiêu đề bản tin <small class=\"text-danger\">(*)</small>");
				$("#err_title").removeClass('text-danger');
				$('#title').removeClass('form-error');
		});
		$('.desc').keyup(function(){
				$("#err_desc").html("Lời dẫn của bản tin  <small class=\"text-danger\">(*)</small>");
				$("#err_desc").removeClass('text-danger');
				$('.desc').removeClass('form-error');
		});
	}
}

createNewController.init();