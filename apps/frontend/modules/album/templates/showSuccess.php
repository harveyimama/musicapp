<table>
  <tbody>
     <tr>
      <th>Album:</th>
      <td><?php echo $album->getAlbumNm() ?></td>
    </tr>
    <tr>
      <th>Artist:</th>
      <td><?php echo $album->getArtist() ?></td>
    </tr>
    <tr>
      <th>Release Date:</th>
      <td><?php echo $album->getReleaseDt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $album->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $album->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('album/edit?id='.$album->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('album/index') ?>">List</a>
