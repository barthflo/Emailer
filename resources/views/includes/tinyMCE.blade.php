{{-- <script src="https://cdn.tiny.cloud/1/4vsfi8wc9vksipiksoyz2ksltbais7itz4otjihnkx8jf5ys/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@if (Request::is('templates/create'))
<script>
    window.onload = function () {
        
        tinymce.init({
            selector: 'textarea',
            path_absolute:'http://flobarth.local/filemanager',
            height: 200,
            plugins: ['image link code'],
            toolbar: 'styleselect bold italic underline | image | code | undo redo | alignleft aligncenter alignright justify | bullist numlist | outdent indent ',
            branding: false,
            file_browser_callback: filemanager.tinyMceCallback,
            relative_urls: false
        });  
    };
  </script>
  
@else 
<script>
    window.onload = function () {
            
        tinymce.init({
            selector: 'textarea',
            path_absolute:'/',
            height: 200,
            plugins: ['image link code'],
            toolbar: 'styleselect bold italic underline | image | code | undo redo | alignleft aligncenter alignright | bullist numlist | outdent indent ',
            branding: false,
            file_browser_callback: filemanager.tinyMceCallback,
            relative_urls: false
        }); 
        
        var template = {!! json_encode($template ->toArray()) !!};
        tinymce.get('content').setContent(template['content']);
        tinymce.get('logo').setContent(template['logo']);
        tinymce.get('banner').setContent(template['banner']);
    };
</script> 
@endif

