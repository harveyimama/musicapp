<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $playlist_song->getId() ?></td>
    </tr>
    <tr>
      <th>Playlist:</th>
      <td><?php echo $playlist_song->getPlaylistId() ?></td>
    </tr>
    <tr>
      <th>Song:</th>
      <td><?php echo $playlist_song->getSongId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $playlist_song->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $playlist_song->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('playlistsong/edit?id='.$playlist_song->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('playlistsong/index') ?>">List</a>
