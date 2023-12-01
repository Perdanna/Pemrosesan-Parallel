    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <form action="/upload" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" name="data_csv" id="data_csv">
            <input type="submit" value="Upload">
    </body>
    </html><?php /**PATH C:\laragon\www\pemrosesan-parallel\resources\views/upload-file.blade.php ENDPATH**/ ?>