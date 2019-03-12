<?php
$menu = 'article';
include('header.php');

if (isset($_POST['title']) && isset($_POST['content'])) {
    $instance = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
    $reponse = $instance->prepare('INSERT INTO article (title, content) VALUES(:title, :content)');
    $reponse->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
    ]);
    echo "Article bien ajouté";
}

?>
<div class="container">
    <?php include('menu.php'); ?>
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
