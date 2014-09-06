<div class="text-center">
    <ul class="pagination">
    <li<?=disableFirst()?>><a href="all.php?word=<?=data("word")?>&page=<?=data("page")-1?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= data("maxpages"); $i++):?>
        <li<?=pageActive($i)?>><a href="all.php?word=<?=data("word")?>&page=<?=$i?>"><?=$i?><?=pageActiveSpan($i)?></a></li>
        <?php endfor ?>
        <li<?=disableLast()?>><a href="all.php?word=<?=data("word")?>&page=<?=data("page")+1?>">&raquo;</a></li>
    </ul>
</div>

<div class="table-responsive"><table class="table table-hover">
    <tr>
        <th></th>
        <th>Mots</th>
        <th>Racines</th>
        <th>Concepts</th>
   </tr>
    <?php foreach (limitedListWords(data("limit"), data("page")) as $thisword):?>
        <tr<?=isCurrentWord($thisword)?>>
            <td style="text-align: center">
                <a href="actions/remove.php?word=<?=$thisword?>" title="Supprimer">
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
    <li<?=disableFirst()?>><a href="all.php?word=<?=data("word")?>&page=<?=data("page")-1?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= data("maxpages"); $i++):?>
        <li<?=pageActive($i)?>><a href="all.php?word=<?=data("word")?>&page=<?=$i?>"><?=$i?><?=pageActiveSpan($i)?></a></li>
        <?php endfor ?>
        <li<?=disableLast()?>><a href="all.php?word=<?=data("word")?>&page=<?=data("page")+1?>">&raquo;</a></li>
    </ul>
</div>
