<?php include_once "header.php"; 
function isCurrentWord($w) {
    global $word;
    if ($w == $word) return " class=\"info\"";
    return "";
}
if (array_key_exists("page", $_GET)) {
        $page = standardize($_GET["page"]);
} else {
        $page = 1;
}
if (array_key_exists("limit", $_GET)) {
        $limit = standardize($_GET["limit"]);
} else {
        $limit = 10;
}

$maxpages = getPagesForLimit($limit);

function pageActive($n) {
    global $page;
    if ($n == $page) return " class=\"active\"";
    return "";
}

function pageActiveSpan($n) {
    global $page;
    if ($n == $page) return " <span class=\"sr-only\">(current)</span>";
    return "";
}

function disableFirst() {
    global $page;
    if ($page == 1) return " class=\"disabled\"";
    return "";
}

function disableLast() {
    global $page, $maxpages;
    if ($page == $maxpages) return " class=\"disabled\"";
    return "";
}
?>

<div class="text-center">
    <ul class="pagination">
    <li<?=disableFirst()?>><a href="all.php?word=<?=$word?>&page=<?=$page-1?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= $maxpages; $i++):?>
        <li<?=pageActive($i)?>><a href="all.php?word=<?=$word?>&page=<?=$i?>"><?=$i?><?=pageActiveSpan($i)?></a></li>
        <?php endfor ?>
        <li<?=disableLast()?>><a href="all.php?word=<?=$word?>&page=<?=$page+1?>">&raquo;</a></li>
    </ul>
</div>

<div class="table-responsive"><table class="table table-hover">
    <tr>
        <th></th>
        <th>Mots</th>
        <th>Racines</th>
        <th>Concepts</th>
   </tr>
    <?php foreach (limitedListWords($limit, $page) as $thisword):?>
        <tr<?=isCurrentWord($thisword)?>>
            <td style="text-align: center">
                <a href="remove.php?word=<?=$thisword?>" title="Supprimer">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
            <td>
                <a href="view.php?word=<?=$thisword?>"><?=$thisword?></a></td>
            <td>
                <?php foreach (listRoots($thisword) as $root):?>
                    <a href="view.php?word=<?=$root?>"><?=$root?></a>
                <?php endforeach;?>
            </td>
            <td>
                <?php foreach (explodeWord($thisword) as $root):?>
                    <a href="view.php?word=<?=$root?>"><?=$root?></a>
                <?php endforeach;?>
            </td>
        </tr>
    <?php endforeach;?>
</table></div>

<div class="text-center">
    <ul class="pagination">
    <li<?=disableFirst()?>><a href="all.php?word=<?=$word?>&page=<?=$page-1?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= $maxpages; $i++):?>
        <li<?=pageActive($i)?>><a href="all.php?word=<?=$word?>&page=<?=$i?>"><?=$i?><?=pageActiveSpan($i)?></a></li>
        <?php endfor ?>
        <li<?=disableLast()?>><a href="all.php?word=<?=$word?>&page=<?=$page+1?>">&raquo;</a></li>
    </ul>
</div>

<?php include_once "footer.php"; ?>
