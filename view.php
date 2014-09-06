<?php include_once "header.php"; ?>
<?php if($word == ""):?>
<h1>Pas de mot selectionné</h1>
<p>Utilisez le champs de recherche pour trouver un mot.</p>
<?php else:?>
<h1><?=$word?></h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Racines :</h2>
    </div>
    <div class="panel-body">
        <ul class="list-inline">
        <?php foreach(listRoots($word) as $root):?>
            <li><a href="view.php?word=<?=$root?>"><?=$root?></a></li>
        <?php endforeach?>
        </ul>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Concepts de ce mot :</h2>
    </div>
    <div class="panel-body">
        <ul class="list-inline">
        <?php foreach(explodeWord($word) as $root):?>
            <li><a href="view.php?word=<?=$root?>"><?=$root?></a></li>
        <?php endforeach?>
        </ul>
    </div>
</div>
<?php endif?>
<?php include_once "footer.php"?>
