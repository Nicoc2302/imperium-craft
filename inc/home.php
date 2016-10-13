<div class="row">
    <div class="col-md-8">
        <p>
            <div class="alert alert-warning" role="alert">Système de news à venir</div>
        </p>
    </div>
    <div class="col-md-4">
        <p>
            <div class="alert alert-warning" role="alert">...</div>
        </p>
    </div>
</div>
<?php
    $filename = "files/test.txt";
    $data = "coucou";
    file_put_contents($filename, $data);
?>