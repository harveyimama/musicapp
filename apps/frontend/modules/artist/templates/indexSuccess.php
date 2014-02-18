<form action="<?php echo url_for('artist/index') ?>" method="post" >
<input class="buttons"  type="text" name="search" <?php if(isset($search)){echo 'value="'.$search.'"';}?> />
<input style="width: 80px; font-weight: bolder;" class="buttons" type="submit" value="Search"/>
</form>


<h3 class="letter">Artists<strong> List</strong></h3>



<table class="table">
  <thead align="left">
    <tr>
     
      <th><a href="<?php echo url_for('@sort?module=Artist&action=index&sort=artist_nm&sort_type='.$sortType) ?>">Artist</a></th>
      <th><a href="<?php echo url_for('@sort?module=Artist&action=index&sort=real_nm&sort_type='.$sortType) ?>">Real Name</a></th>
      <th><a href="<?php echo url_for('@sort?module=Artist&action=index&sort=dob&sort_type='.$sortType) ?>">Dob</a></th>
      <th><a href="<?php echo url_for('@sort?module=Artist&action=index&sort=country_id&sort_type='.$sortType) ?>">Country</a></th>
      <th>Albums</th>
      <th>Stories</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager as $artist): ?>
    <tr>
      <td><a href="<?php echo url_for('@artistid?module=Artist&action=show&id='.$artist->getId()) ?>"><?php echo $artist->getArtistNm() ?></a></td>
      <td><?php echo $artist->getRealNm() ?></td>
      <td><?php echo $artist->getDob() ?></td>
      <td><?php echo $artist->getCountry() ?></td>
      <td><?php echo html_entity_decode($artist->getAlbumCount()->render());?><a href="<?php echo  url_for('@addalbum?module=Album&action=newbyid&artist_id='.$artist->getId()) ?>">
add
</a>
      <a href="<?php echo  url_for('@albumdel?module=Album&action=indexdel&artist_id='.$artist->getId()) ?>">
          &nbsp;remove
</a>    
      </td>
      <td><a href="<?php echo url_for('@storyid?module=Artist&action=index&id='.$artist->getId()) ?>"><?php echo $artist->getStoryCount() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
<div class="pagination">
<a href="<?php echo  url_for('@pagenation?module=Artist&action=index&page=1') ?>">
<img src="/images/prettyPhoto/facebook/first.png" alt="First page" title="First page" />
</a>
<a href="<?php echo url_for('@pagenation?module=Artist&action=index&page='.$pager->getPreviousPage())  ?>">
<img src="/images/prettyPhoto/facebook/previous.png"alt="Previous page" title="Previous page" />
</a>
<?php foreach ($pager->getLinks() as $page): ?>
<?php if ($page == $pager->getPage()): ?>
<?php echo $page ?>
<?php else: ?>
<a href="<?php echo url_for('artist/index') ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
    <a href="<?php echo url_for('artist/index') ?>?page=<?php echo
$pager->getNextPage() ?>">
<img src="/images/prettyPhoto/facebook/next.png" alt="Nextpage" title="Next page" />
</a>
<a href="<?php echo  url_for('@pagenation?module=Artist&action=index&page='.$pager->getLastPage())  ?>">
<img src="/images/prettyPhoto/facebook/last.png" alt="Last page" title="Last page" />
</a>
</div>
<?php endif; ?>

<div class="pagination_desc">
<strong><?php echo count($pager) ?></strong> artists displayed
<?php if ($pager->haveToPaginate()): ?>
- page <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
<?php endif; ?>
</div>

  <a href="<?php echo url_for('@new?module=Artist') ?>">Add</a>
