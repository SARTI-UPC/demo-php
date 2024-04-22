<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form id="miForm" action="profile.php" method="post" ENCTYPE="multipart/form-data">
            <input type="text" name="nombre" id="nomber" placeholder="Introducir tu nombre"><br>
            <!-- <input type ="hidden" name="MAX_FILE_SIZE" value="204800"> -->
            <input type="file" name="cv" id="cv"><br>
            <br>
            <input type="submit" value="Send" name="send">
        </form>
    </body>

</html>