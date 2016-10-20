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
                
                $lines = file($filename);
                $lines = array_reverse($lines);
                $start = 0;
                define('NBLINE', 5);
                if(isset($_GET['start']) && (intval($_GET['start']))){
                    $start = $_GET['start'];
                    $start = $start>0 ? ($start-1) *NBLINE:0;
                }
                
                for($i=$start;$i<$start + NBLINE && $i<count($lines);$i++)
                {
                    $split =explode("|", $lines[$i]);
                    echo "<h1>$split[0]</h1>";
                    echo "<p>$split[1]<p>";
                }
                ?>
            <nav aria-label="Page navigation">
                <ul class="pager">
                    
                    
            <?php
            //Define number of pages
                $nbp = count($lines)%5 ==0 ? count($lines)/NBLINE:(ceil(count($lines)/NBLINE));// 10%5 = 0 => 10/5 = 2 // 11%5 == 1 => (11/5)+1
                $start = isset($_GET['start']) ? $_GET['start'] : 1;
                $previous = $start>1 ? $start-1:1;
                $next = $start< $nbp ? $start+1:$nbp;
            //iterate every page
                
                if($start!=1){
                echo'<li><a href="?page=home&start='.$previous.'">Previous</a></li>';
                }
                for($num=1;$num<=$nbp;$num++)// 1<=2
                {   if($num!=$start)
                    {
                        echo'<li><a href="?page=home&start='.$num.'">'.$num.'</a></li>';
                    }
                else
                {
                    echo'<li><a href="?page=home&start='.$num.'" class="not-active">'.$num.'</a></li>';
                }
                    
                }
                if($start!=$nbp){
                echo'<li><a href="?page=home&start='.$next.'">Next</a></li>';}
            ?>             
                    
                </ul>
           </nav>
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
