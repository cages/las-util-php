<div style="display:block;padding:40px;margin:40px;border:1px solid #ccc">
<!-- <form action="receive-file.php" method="post"  enctype="multipart/form-data"> -->
<form action="receive" method="post"  enctype="multipart/form-data">
  <p>
    Log Ascii Standard file to upload: 
    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
    <input type="file" name="fileToUpload" id="fileToUpload" />
  </p>
  <p><input type="submit" value="Upload" /></p>
</form>
</div>
