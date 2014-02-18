<form action="<?php echo url_for('story/index') ?>" method="post" >
<input class="buttons"  type="text" name="search" <?php if(isset($search)){echo 'value="'.$search.'"';}?> />
<input style="width: 80px; font-weight: bolder;" class="buttons" type="submit" value="Search"/>
</form>

<h3 class="letter">Story<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>S/N  </th>
      <th>Head Line</th>
      <th>Artist</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager as $story): ?>
    <tr>
      <td><a href="<?php echo url_for('story/show?id='.$story->getId()) ?>"><?php echo $story->getId() ?></a></td>
      <td><?php echo $story->getTitle() ?></td>
      <td><?php echo $story->getArtist() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>



<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
<a href="<?php echo  url_for('@pagenation?module=Story&action=index&page=1') ?>">
<img src="/images/prettyPhoto/facebook/first.png" alt="First page" title="First page" />
</a>
<a href="<?php echo url_for('@pagenation?module=Story&action=index&page='.$pager->getPreviousPage())  ?>">
<img src="/images/prettyPhoto/facebook/previous.png"alt="Previous page" title="Previous page" />
</a>
<?php foreach ($pager->getLinks() as $page): ?>
<?php if ($page == $pager->getPage()): ?>
<?php echo $page ?>
<?php else: ?>
<a href="<?php echo url_for('story/index') ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
    <a href="<?php echo url_for('story/index') ?>?page=<?php echo
$pager->getNextPage() ?>">
<img src="/images/prettyPhoto/facebook/next.png" alt="Nextpage" title="Next page" />
</a>
<a href="<?php echo  url_for('@pagenation?module=Story&action=index&page='.$pager->getLastPage())  ?>">
<img src="/images/prettyPhoto/facebook/last.png" alt="Last page" title="Last page" />
</a>
</div>
<?php endif; ?>

<div class="pagination_desc">
<strong><?php echo count($pager) ?></strong> Stories displayed
<?php if ($pager->haveToPaginate()): ?>
- page <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
<?php endif; ?>
</div>

  <a href="<?php echo url_for('story/new') ?>">Add</a>
