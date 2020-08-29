<script src="https://cdn.tiny.cloud/1/4vsfi8wc9vksipiksoyz2ksltbais7itz4otjihnkx8jf5ys/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> --}}
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    var editor_config = {
      path_absolute : '/',
      selector: "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern advcode autosave spellchecker"
      ],
      toolbar: "insertfile undo redo restoredraft | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media |forecolor backcolor | code | spellchecker ",
      convert_urls : false,
      height: 400,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute +'laravel-filemanager?field_name=' + field_name;
        console.log(cmsURL);
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
    tinymce.init(editor_config);

    var route_prefix = editor_config.path_absolute + 'laravel-filemanager';
    $('#logoctl').filemanager('image', {prefix:route_prefix} );
    $('#bannerctl').filemanager('image', {prefix:route_prefix} );
</script>

@if (! Request::is('templates/create'))
<script> 
window.onload = function () {

    var template={!! $template !!}
    tinymce.get('content').setContent(template.content);
    tinymce.get('logo').setContent(template.logo);
    tinymce.get('banner').setContent(template.banner);
};
</script>
@endif
 
    




