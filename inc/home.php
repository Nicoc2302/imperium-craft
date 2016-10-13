<div class="row">
    <div class="col-md-8">
        <p>
            <div class="alert alert-warning" role="alert">Système de news à venir</div>
        </p>
    </div>
    <div class="col-md-4">
        <form method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Adresse Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required name = "email">
            </div>
            <div class="form-group">
              <label for="exampleInputPseudo">Pseudo</label>
              <input type="text" class="form-control" id="exampleInputPseudo" placeholder="Pseudo" required name = "pseudo">
            </div>
            <div class="form-group">
              <label for="exampleInputProbleme">Probleme</label>
              <input type="text" class="form-control" id="exampleInputProbleme" placeholder="Probleme" required name = "probleme">
            </div>
            <div class="form-group">
              <label for="exampleInputMessage">Message</label>
              <textarea class="form-control" id="exampleInputMessage" placeholder="Message" required name = "message"></textarea>
            </div>
            
            <input type="submit" class="btn btn-default">Submit</input>
        </form>
    </div>
</div>
<?php
    $filename = "files/test.txt";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $probleme = $_POST['probleme'];
        $message = $_POST['message'];
        $open = fopen($filename, 'a');
        fwrite($open,$email.PHP_EOL);
        fwrite($open,$pseudo.PHP_EOL);
        fwrite($open,$probleme.PHP_EOL);
        fwrite($open,$message.PHP_EOL);
        fclose($open);
        
    }
    $open_read = fopen($filename, 'r');
    $read = fread($open_read, filesize($filename));
    echo $read;
    fclose($open_read);
            
?>