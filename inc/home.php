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
                    $news['message_news'] = $message_news;
                    // Write Table
                    fwrite($open,implode('|',$news).PHP_EOL);
                    fclose($open);

                }
                // Read table
                $open_read = fopen($filename, 'r');
                $temps_news = array();//[]
                $i=0;
                // 1| mess1
                // 2| mess2
                // 3| mess3
                
                while($ligne=fgets($open_read))
                {
                   
                    $split =explode("|", $ligne); //1,mess1 //2,mess2
                    $temps_news[$i] = array('titre'=>$split[0],'message'=>$split[1] );// [] => [[1,mess1],[2,mess2],[3,mess3]]
                    $i+=1;
                }
                fclose($open_read);
                $preserved = array_reverse($temps_news);//[[3,mess3],[2,mess2],[1,mess1]]
                for($j=0;$j<count($preserved) && $j<2;$j++)
                {
                    echo '<h1>'.$preserved[$j]['titre'].'</h1>';
                    echo '<p>'.$preserved[$j]['message'].'</p>';
                }
            
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
