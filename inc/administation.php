<div class="col-md-4">
    <form method="post">
        <div class="form-group">
          <label for="exampleInputidentifiants">Identifiants</label><br>
          <input type="text" class="form-control" id="exampleInputidentifiants" placeholder="Identifiants" required name = "Identifiant">
        </div>
        <div class="form-group">
            <label for="exampleInputpassword">Mot de passe</label><br>
          <input type="password" class="form-control" id="exampleInputpassword" placeholder="password" required name = "password">
        </div>

        <input type="submit" class="btn btn-default"></input>
    </form>
</div>
<?php
    $filename = "files/root.txt";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $lines = file($filename);
        $lines = array_reverse($lines);
        for($i=0;$i<count($lines);$i++)
        {
            $split =explode("|", $lines[$i]);
            echo "<h1>$split[0]</h1>";
            echo "<p>$split[1]<p>";
        }
    }
?>
   

