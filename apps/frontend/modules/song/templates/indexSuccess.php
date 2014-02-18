<form action="<?php echo url_for('song/index') ?>" method="post" >
<input class="buttons"  type="text" name="search" <?php if(isset($search)){echo 'value="'.$search.'"';}?> />
<input style="width: 80px; font-weight: bolder;" class="buttons" type="submit" value="Search"/>
</form>

<h3 class="letter">Songs<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Song</th>
      <th>Album</th>
      <th>Artist</th>
      <th>Featuring</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($pager as $song): ?>
    <tr>    
      <td ><a href="<?php echo url_for('@songid?module=Song&action=show&id='.$song->getId()) ?>"><?php echo $song->getSongNm() ?></td>
      <td  ><?php echo $song->getAlbum() ?></td>
      <td ><?php echo $song->getAlbum()->getArtist()->getArtistNm() ?></td>
      <td><?php echo html_entity_decode($song->getFeatureCount()->render());?> <a href="<?php echo  url_for('@addfeature?module=Features&action=new&id='.$song->getId().'&artist_id='. $song->getAlbum()->getArtist()->getId()) ?>">
add
</a>
      <a href="<?php echo  url_for('@features?module=Features&action=index&id='.$song->getId()) ?>">
          &nbsp;remove
</a>
      </td>
      <td><embed src="/uploads/songs/<?php echo $song->getMusic() ?>" width="200" height="60" autostart="false" type="application/x-mplayer2">
<noembed><img src="/images/prettyPhoto/facebook/next.png" ></noembed>
</embed>
          <a href="/uploads/songs/<?php echo $song->getMusic() ?>">download</a>  </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>  



<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
<a href="<?php echo  url_for('@pagenation?module=Song&action=index&page=1') ?>">
<img src="/images/prettyPhoto/facebook/first.png" alt="First page" title="First page" />
</a>
<a href="<?php echo url_for('@pagenation?module=Song&action=index&page='.$pager->getPreviousPage())  ?>">
<img src="/images/prettyPhoto/facebook/previous.png"alt="Previous page" title="Previous page" />
</a>
<?php foreach ($pager->getLinks() as $page): ?>
<?php if ($page == $pager->getPage()): ?>
<?php echo $page ?>
<?php else: ?>
<a href="<?php echo url_for('song/index') ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
    <a href="<?php echo url_for('song/index') ?>?page=<?php echo
$pager->getNextPage() ?>">
<img src="/images/prettyPhoto/facebook/next.png" alt="Nextpage" title="Next page" />
</a>
<a href="<?php echo  url_for('@pagenation?module=Song&action=index&page='.$pager->getLastPage())  ?>">
<img src="/images/prettyPhoto/facebook/last.png" alt="Last page" title="Last page" />
</a>
</div>
<?php endif; ?>

<div class="pagination_desc">
<strong><?php echo count($pager) ?></strong> songs displayed
<?php if ($pager->haveToPaginate()): ?>
- page <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
<?php endif; ?>
</div>

  <a href="<?php echo url_for('@new?module=Song') ?>">Add</a>
