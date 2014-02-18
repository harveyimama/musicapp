

<h3 class="letter">Album<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Album</th>
      <th>Artist</th>
      <th>Release Date</th>
      <th>Action</th>
    </tr>
  </thead>  
  <tbody>
    <?php foreach ($albums as $album): ?>
    <tr>
      <td><?php echo $album->getAlbumNm() ?></td>
      <td><?php echo $album->getArtist() ?></td>
      <td><?php echo $album->getReleaseDt() ?></td>
      <td><?php echo link_to('Delete', '@mydelete?module=Album&action=deleteartist&id='.$album->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


  <a href="<?php echo url_for('artist/index') ?>">Back</a>
