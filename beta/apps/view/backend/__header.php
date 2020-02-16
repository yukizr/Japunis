<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Panel | Fujitsu Guide Japanese</title>

	<meta name="description" content="Fujitsu Guide Japanese" />
  <meta name="keywords" content="fujitsu, japanese, nihongo" />
  <meta name="author" content="yukizr" />

	<link rel="icon" type="image/png" href="<?php echo base_url('favicon.png'); ?>" />

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/foundation.css'); ?>" />

  <!-- Fonts Option -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/open_sans.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/roboto.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/foundation-icons.css'); ?>">

	<!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">

  <script src="<?php echo base_url('assets/js/vendor/modernizr.js'); ?>"></script>

  <script type="text/javascript" src="<?php echo base_url("assets/js/tinymce/tinymce.min.js"); ?>"></script>
  <script type="text/javascript">
  tinymce.init({
  selector: "textarea",
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  conten_css:'//fonts.googleapis.com/earlyaccess/sawarabigothic.css',
  font_formats: 'Roboto=roboto,sans-serif;Open Sans=open sans,sans-serif;Andale Mono=andale mono,times;Sawarabi Gothic=sawarabi gothic,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
 toolbar1: 'mybutton, undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | styleselect formatselect fontselect fontsizeselect',
 toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
 image_advtab: true,
height:400,
setup: function(editor) {
    editor.addButton('mybutton', {
        text:"IMAGE",
        icon: false,
        onclick: function(e) {
            console.log($(e.target));
            if($(e.target).prop("tagName") == 'BUTTON'){
console.log($(e.target).parent().parent().find('input').attr('id'));                    if($(e.target).parent().parent().find('input').attr('id') != 'tinymce-uploader') {
            $(e.target).parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                }
            $('#tinymce-uploader').trigger('click');
            $('#tinymce-uploader').change(function(){
             var input, file, fr, img;

        if (typeof window.FileReader !== 'function') {
            write("The file API isn't supported on this browser yet.");
            return;
        }

        input = document.getElementById('tinymce-uploader');
        if (!input) {
            write("Um, couldn't find the imgfile element.");
        }
        else if (!input.files) {
            write("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input.files[0]) {
            write("Please select a file before clicking 'Load'");
        }
        else {
            file = input.files[0];
            fr = new FileReader();
            fr.onload = createImage;
            fr.readAsDataURL(file);
        }

        function createImage() {
            img = new Image();
            img.src = fr.result;
             editor.insertContent('<img src="'+img.src+'"/>');

        }

            });

        }
                     if($(e.target).prop("tagName") == 'DIV'){
                         if($(e.target).parent().find('input').attr('id') != 'tinymce-uploader') {
console.log($(e.target).parent().find('input').attr('id'));
            $(e.target).parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                         }
            $('#tinymce-uploader').trigger('click');
            $('#tinymce-uploader').change(function(){
             var input, file, fr, img;

        if (typeof window.FileReader !== 'function') {
            write("The file API isn't supported on this browser yet.");
            return;
        }

        input = document.getElementById('tinymce-uploader');
        if (!input) {
            write("Um, couldn't find the imgfile element.");
        }
        else if (!input.files) {
            write("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input.files[0]) {
            write("Please select a file before clicking 'Load'");
        }
        else {
            file = input.files[0];
            fr = new FileReader();
            fr.onload = createImage;
            fr.readAsDataURL(file);
        }

        function createImage() {
            img = new Image();
            img.src = fr.result;
             editor.insertContent('<img src="'+img.src+'"/>');

        }

            });

        }
                    if($(e.target).prop("tagName") == 'I'){
console.log($(e.target).parent().parent().parent().find('input').attr('id')); if($(e.target).parent().parent().parent().find('input').attr('id') != 'tinymce-uploader') {               $(e.target).parent().parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                                                                       }
            $('#tinymce-uploader').trigger('click');
            $('#tinymce-uploader').change(function(){
             var input, file, fr, img;

        if (typeof window.FileReader !== 'function') {
            write("The file API isn't supported on this browser yet.");
            return;
        }

        input = document.getElementById('tinymce-uploader');
        if (!input) {
            write("Um, couldn't find the imgfile element.");
        }
        else if (!input.files) {
            write("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input.files[0]) {
            write("Please select a file before clicking 'Load'");
        }
        else {
            file = input.files[0];
            fr = new FileReader();
            fr.onload = createImage;
            fr.readAsDataURL(file);
        }

        function createImage() {
            img = new Image();
            img.src = fr.result;
             editor.insertContent('<img src="'+img.src+'"/>');

        }

            });

        }

        }
    });
}});

	</script>

</head>

<body>
