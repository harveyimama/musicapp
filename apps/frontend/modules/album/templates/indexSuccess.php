<form action="<?php echo url_for('album/index') ?>" method="post" >
<input class="buttons"  type="text" name="search" <?php if(isset($search)){echo 'value="'.$search.'"';}?> />
<input style="width: 80px; font-weight: bolder;" class="buttons" type="submit" value="Search"/>
</form>


<h3 class="letter">Album<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Album</th>
      <th>Artist</th>
      <th>Release Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager as $album): ?>
    <tr>
      <td><a href="<?php echo url_for('@albumid?module=Album&action=show&id='.$album->getId()) ?>"><?php echo $album->getAlbumNm() ?></td>
      <td><?php echo $album->getArtist() ?></td>
      <td><?php echo $album->getReleaseDt() ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
<a href="<?php echo  url_for('@pagenation?module=Album&action=index&page=1') ?>">
<img src="/images/prettyPhoto/facebook/first.png" alt="First page" title="First page" />
</a>
<a href="<?php echo url_for('@pagenation?module=Album&action=index&page='.$pager->getPreviousPage())  ?>">
<img src="/images/prettyPhoto/facebook/previous.png"alt="Previous page" title="Previous page" />
</a>
<?php foreach ($pager->getLinks() as $page): ?>
<?php if ($page == $pager->getPage()): ?>
<?php echo $page ?>
<?php else: ?>
<a href="<?php echo url_for('album/index') ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
    <a href="<?php echo url_for('album/index') ?>?page=<?php echo
$pager->getNextPage() ?>">
<img src="/images/prettyPhoto/facebook/next.png" alt="Nextpage" title="Next page" />
</a>
<a href="<?php echo  url_for('@pagenation?module=Album  &action=index&page='.$pager->getLastPage())  ?>">
<img src="/images/prettyPhoto/facebook/last.png" alt="Last page" title="Last page" />
</a>
</div>
<?php endif; ?>

<div class="pagination_desc">
<strong><?php echo count($pager) ?></strong> albums displayed
<?php if ($pager->haveToPaginate()): ?>
- page <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
<?php endif; ?>
</div>

  <a href="<?php echo url_for('@new?module=Album') ?>">Add</a>
