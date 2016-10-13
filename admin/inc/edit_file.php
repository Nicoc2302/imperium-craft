  <style type="text/css" media="screen">
    .ace_editor {
        position: relative !important;
        border: 1px solid lightgray;
        margin: auto;
        height: 500px;
        width: 80%;
    }
    </style>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['editor'])){
        $content = (($_POST['editor']));
        $page = '../inc/' . $_GET['id'] . '.php';
        file_put_contents($page, $content) or die('error');
        echo "Page uploaded";
    }
}
if (isset($_GET['id'])){
    $id = '../inc/' . $_GET['id'] . '.php' ;
    if (file_exists($id)){
        ?>
<form method="POST">
    <textarea id='editor'>
        <?php
        echo file_get_contents($id );
        ?>
    </textarea>
    <textarea name="editor" style="display: none;" >
        <?php
        echo file_get_contents($id );
        ?></textarea>
    <input type="submit"/>
</form>
         <?php
    }
}
else die('Page not found');
?>


<!-- load ace -->
<script src="js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<!-- load ace language tools -->
<script src="js/ace/ext-language_tools.js"></script>
<script>
    // trigger extension
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/html");
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