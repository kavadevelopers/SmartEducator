<script type="text/javascript">
	$(document).ready(function(){
		$("*").dblclick(function(e){
		    e.preventDefault();
		    return false;
		});

		$('.table-dt').DataTable({
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-4'i><'col-md-4 text-center'><'col-md-4'p>>",
            order : [],
            "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        });

        $('.table-dt10').DataTable({
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            order : [],
            "aLengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
        });

        $(document).on('click','.btn-delete', function(e){
			if(confirm('Are you sure you want to delete this?')){
				return true;
			}
			return false;
		});

		$(document).on('click','.btn-status', function(e){
			if(confirm('Are you sure you want to change status?')){
				return true;
			}
			return false;
		});

		$('.dtpickerdemo').flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i:S",
        });


		$(document).on('click','.btnTakeAttendance', function(e){
			openCalander();
        });

		$(document).on('click','.btn-bulk-status-change', function(e){
            e.preventDefault();
            if($(".checkSingle:checked").length > 0){
            	$('#changeStatusBulk').modal('show');
            	var list = $(".checkSingle:checked").map(function () {
                    return this.value;
                }).get();
                $('#changeStatusBulk input[name=leads]').val(list.toString());
            }else{
                PNOTY('please select at least one Lead','error');
                return false;
            }
        });

		$(document).on('click','.btn-statuschange', function(e){
            e.preventDefault();
            data = $(this).data('values');
            $('#changeStatus').modal('show');
            $("#changeStatus input[name=eid]").val(data.id);
            $("#changeStatus select[name=status]").val(data.status);
            if ($(this).data('adate') != "") {
                $(".apDateContainer input[name=date]").val($(this).data('adate'));
            }
            $('#changeStatus select[name=status]').trigger('change');
        });

        $(document).on('change','#changeStatus select[name=status]', function(e){
            if ($(this).val() == "Appointment fixed" || $(this).val() == "Reschedule") {
                $('.apDateContainer').show();
                $('.apDateContainer input[name=date]').attr('required',true);
            }else{
                $('.apDateContainer').hide();
                $('.apDateContainer input[name=date]').removeAttr('required');
                $('.apDateContainer input[name=date]').val('');
            }
        });    

        $(document).on('change','#changeStatusBulk select[name=status]', function(e){
            if ($(this).val() == "Appointment fixed" || $(this).val() == "Reschedule") {
                $('.apDateContainer').show();
                $('.apDateContainer input[name=date]').attr('required',true);
            }else{
                $('.apDateContainer').hide();
                $('.apDateContainer input[name=date]').removeAttr('required');
                $('.apDateContainer input[name=date]').val('');
            }
        });    

		$(document).on('click','.photo-swipe', function(event){
            var stringAr = $(this).data('photoswipe').split('+');
            for(var i = 0; i < stringAr.length; i++) { 
                
                var items = [];
                items.push({
                    src     : stringAr[i].split('=')[0], 
                    w       : parseInt(stringAr[i].split('=')[1].split(',')[0]),
                    h       : parseInt(stringAr[i].split('=')[1].split(',')[1])
                });
            }
            var pswpElement = document.querySelectorAll('.pswp')[0];
            var options = {
                // optionName: 'option value'
                // for example:
                shareEl:false,
                index: 0 // start at first slide
            };

            // Initializes and opens PhotoSwipe
            var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        });

		$(document).on('click','.read-more-popup-btn', function(event){
        	event.preventDefault();
        	$('#modalFullStringText').html($(this).data('full'));
        	$('#modalFullString').modal('show');
        });
    });

	function getHeightWidthFromUrl(url) {
		_width = 1024;
		_height = 1024;
	    $("<img/>",{	
	        load : function(){
	            _width = this.width;
	            _height = this.height;
	            alert(this.width);
	        },
	        src  : url
	    });
	    return {width : _width,height : _height};
	}

	function showAjaxLoader() {
		$('.ajaxLoader').show();
	}

	function hideAjaxLoader() {
		$('.ajaxLoader').hide();
	}

	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}

    function readImageCheckScr(input,id) {
	    if (input.files && input.files[0]) {
	        var FileSize = input.files[0].size / 1024 / 1024; // in MB
	        var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
	        if (FileSize > 2) {
	            PNOTY("Maxiumum Image Size Is 2 Mb.",'error');
	            input.value = '';
	            return false;
	        }
	        else{
	            if (extension == 'jpg' || extension == 'png' || extension == 'jpeg') {
	                var reader = new FileReader();
	                reader.onload = function (e) {
	                    $("#"+id).attr('src', e.target.result);
	                }
	                reader.readAsDataURL(input.files[0]);
	            }
	            else
	            {
	                PNOTY("Only Allowed '.jpg' OR '.png' OR '.jpeg'",'error');
	                input.value = '';
	                return false;
	            }
	        }
	    }
	}
</script>


