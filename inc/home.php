<div class="row">
    <div class="col-md-8">
        <p>
            <?php
                $filename = "files/test.txt";
                if($_SERVER['REQUEST_METHOD']=='POST'){

                    $titre = $_POST['titre'];
                    $message_news = $_POST['message_news'];
                    $open = fopen($filename, 'a');
                    // Creata table
                    $news = array();
                    $news['titre'] = $titre;
                    $news['message_news'] = $message_news;
                    // Write Table
                    fwrite($open,implode('|',$news).PHP_EOL);
                    fclose($open);

                }
                // Read table
                $open_read = fopen($filename, 'r');
                while($ligne=fgets($open_read))
                {
                    
                    $split =explode("|", $ligne);
                    echo "<h1>$split[0]</h1>";
                    echo "<p>$split[1]<p>";
                }

                fclose($open_read);
            
?>
        </p>
    </div>
    <div class="col-md-4">
        <form method="post">
            <div class="form-group">
              <label for="exampleInputtitre">Titre</label>
              <input type="email" class="form-control" id="exampleInputtitre" placeholder="Titre" required name = "titre">
            </div>
            <div class="form-group">
              <label for="exampleInputMessagenews">Message</label>
              <textarea class="form-control" id="exampleInputMessagenews" placeholder="Message" required name = "message_news"></textarea>
            </div>
            
            <input type="submit" class="btn btn-default"></input>
        </form>
    </div>
</div>
