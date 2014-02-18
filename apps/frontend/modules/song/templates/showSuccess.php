<table>
  <tbody>
      <tr>
      <th>Album:</th>
      <td><?php echo $song->getAlbum() ?></td>
    </tr>
    <tr>
      <th>Song :</th>
      <td><?php echo $song->getSongNm() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $song->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $song->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('song/edit?id='.$song->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('song/index') ?>">List</a>
