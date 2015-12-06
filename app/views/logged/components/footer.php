		</div>
    	<!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/public/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/public/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/public/admin/bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/public/admin/dist/js/sb-admin-2.js"></script>

    <?php if (isset($js_array)): ?>
        <?php foreach ($js_array as $js): ?>
        <script src="/public/admin/<?php echo $js; ?>" type="text/javascript"></script>
           <?php endforeach?>
        <?php endif?>
        <?php if (isset($js_array) && in_array('bower_components/tinymce/tinymce.min.js', $js_array)): ?>
        <script type="text/javascript">
        tinymce.init({
            selector: ".tinymce",
            height: '300px',
            theme: "modern",
            plugins: [
                "advlist autolink lists link image charmap anchor",
                "wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "template paste textcolor textpattern imagetools"
            ],
            toolbar1: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | forecolor backcolor emoticons",
            image_advtab: true,
            // templates: [
                // {title: 'Test template 1', content: 'Test 1'},
                // {title: 'Test template 2', content: 'Test 2'}
            // ]
            relative_urls: false,
            // remove_script_host : false,
        });
        </script>
    <?php endif?>

    <script src="/public/admin/dist/js/common.js" type="text/javascript"></script>

</body>

</html>
