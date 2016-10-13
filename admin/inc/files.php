<style type="text/css" media="screen">
    .ace_editor {
        border: 1px solid lightgray;
        margin: auto;
        height: 500px;
        width: 100%;
    }
</style>
        <?php
/* Save File */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['editor'])){
        $content = $_POST['editor'];
        $page = '../inc/' . $_GET['id'] . '.php';
        file_put_contents($page, $content);
        echo '<div class="col-md-12">';
        echo '<div class="alert alert-success" role="alert">Page uploaded</div>';
        echo '</div>';
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// TODO: Add a list of files in ../../inc

$files = array_diff(scandir('../inc'), array('..', '.'));
echo '<div class="col-md-2">';
echo "<ul>";
foreach ($files as $file){
    $link = str_replace('.php', '', $file);
    echo "<li><a href=?page=files&id=$link>$file</a></li>";
}
echo "</ul>"
. "</div>"
. "<div class=\"col-md-10\">";

/* EDITOR */
if (isset($_GET['id'])){
    $id = '../inc/' . $_GET['id'] . '.php' ;
    if (file_exists($id)){
        ?>
<form method="POST">
    <textarea id='editor'><?php echo file_get_contents(($id)); ?></textarea>
    <textarea name="editor" style="display: none;"><?php echo file_get_contents($id ); ?></textarea>
    <input type="submit" class="btn btn-primary"/>
</form>

<!-- load ace -->
<script src="js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<!-- load ace language tools -->
<script src="js/ace/ext-language_tools.js"></script>
<script>
    // trigger extension
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/javascript");
    editor.setTheme("ace/theme/monokai");
    // enable autocompletion and snippets
    
    editor.getSession().on("change", function () {
        var textarea = $('textarea[name="editor"]');
        textarea.val(editor.getValue());
    });
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: false
    });
</script>
         <?php
    }
}
else die('Page not found');
echo "</div>";
