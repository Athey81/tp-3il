<?php
$menu = 'article';
include('header.php');

$message = null;
if (isset($_POST['title']) && isset($_POST['content'])) {

    $reponse = $repository->prepare('INSERT INTO article (title, content) VALUES(:test, :content)', [
        'test' => $_POST['title'],
        'content' => $_POST['content'],
    ]);
    
    $message =  "Article bien ajouté";
}

?>
<div class="container">
    <?php include('menu.php'); ?>
    <?php
    if ($message !== null) {
        echo "<div class='alert alert-success'>";
        echo $message;
        echo "</div>";
    }
    ?>
    <div class="header">
       <form method="post">
           <div class="row">
               <div class="col">
                   <label>Titre :</label>
                   <input type="text" name="title">
               </div>
           </div>
           <div class="row">
               <div class="col">
                   <label>Content</label>
                    <textarea name="content"></textarea>
               </div>
           </div>
           <button>Ajouter</button>
       </form>
    </div>
</div>
</body>
</html>
