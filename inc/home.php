<div class="row">
    <div class="col-md-8">
        <p>
            <?php
                $filename = "files/test.txt";
                if($_SERVER['REQUEST_METHOD']=='POST'){

                    $titre = $_POST['titre'];
                    $message_news = $_POST['message_news'];
                    $open = fopen($filename, 'a');
                    // Creat a table
                    $news = array();
                    $news['titre'] = $titre;
                    $news['message_news'] = str_replace(array("\r\n", "\r", "\n"), "<br />",$message_news);
                    // Write Table
                    fwrite($open,implode('|',$news).PHP_EOL);
                    fclose($open);

                }
                
                $lignes = file($filename);
                $lignes = array_reverse($lignes);
                if(isset($_GET['start']) && is_int($_GET['start'])){
                    $start = $_GET['start'];
                    $start = $start>0 ? ($start-1) *5:1;
                }
                
                for($i=$start;$i<5 && $i<count($lignes);$i++)
                {
                    $split =explode("|", $lignes[$i]);
                    echo "<h1>$split[0]</h1>";
                    echo "<p>$split[1]<p>";
                }
                ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="?page=home&start=1">1</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php
            
?>
        </p>
    </div>
    <div class="col-md-4">
        <form method="post">
            <div class="form-group">
              <label for="exampleInputtitre">Titre</label>
              <input type="text" class="form-control" id="exampleInputtitre" placeholder="Titre" required name = "titre">
            </div>
            <div class="form-group">
              <label for="exampleInputMessagenews">Message</label>
              <textarea class="form-control" id="exampleInputMessagenews" placeholder="Message" required name = "message_news"></textarea>
            </div>
            
            <input type="submit" class="btn btn-default"></input>
        </form>
    </div>
</div>
