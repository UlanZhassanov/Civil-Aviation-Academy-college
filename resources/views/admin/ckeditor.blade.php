<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.dtd.$removeEmpty['i'] = false;
    CKEDITOR.config.allowedContent = true
    CKEDITOR.replace('editor-ru', {
        filebrowserUploadUrl: "{{ route('admin.website.pages.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace('editor-kz', {
        filebrowserUploadUrl: "{{ route('admin.website.pages.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace('editor-en', {
        filebrowserUploadUrl: "{{ route('admin.website.pages.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });


    CKEDITOR.replace('editor-dep-page-ru', {
        filebrowserUploadUrl: "{{ route('admin.website.department-page.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace('editor-dep-page-kz', {
        filebrowserUploadUrl: "{{ route('admin.website.department-page.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace('editor-dep-page-en', {
        filebrowserUploadUrl: "{{ route('admin.website.department-page.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
    });

    /*  $(document).ready(function(){

    	 $('body').on('submit', '#submitform', function(e){
    		 e.preventDefault();

    		 $.ajax({
    			 url: $(this).attr('action'),
    			 data: new FormData(this),
    			 type: 'POST',
    			 contentType: false,
    			 cache: false,
    			 processData: false,
    			 success: function(data){
    				 alert(data.msg);
    			 }
    		 });
    	 });
     }); */
</script>
