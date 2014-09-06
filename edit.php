<?php include_once "header.php"; ?>
<?php if($word == ""):?>
<h1>Pas de mot selectionné</h1>
<p>Utilisez le champs de recherche pour trouver un mot.</p>
<?php else:?>
<h1><?=$word?></h1>
<form action="save.php" method="GET" role="form">
    <div class="form-group">
            <label for="roots" class="control-label">Racines :</label><br>
            <textarea id="roots" name="roots" class="form-control" ROWS=5><?=
                rootsAsText(listRoots($word))
            ?></textarea>
    </div>
    <div class="form-group">
        <input type="Submit" value="Enregistrer" class="form-control">
    </div>
    <input type="text" value="<?=$word?>" name="word" readonly style="display:none;">
</form>
<?php endif?>
<?php include_once "footer.php"?>
