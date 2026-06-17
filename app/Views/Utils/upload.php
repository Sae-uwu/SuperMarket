<form action="<?php echo site_url('import/upload') ?>"
    method="post"
    enctype="multipart/form-data">
    <input type="file" name="csv_file">
    
    <button type="submit">
        Importer
    </button>
</form>