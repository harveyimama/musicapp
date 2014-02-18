


<h3 class="letter">Play<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Name</th>
       <th>Action</th>
     </tr>
    </thead>
  <tbody>
    <?php foreach ($playlists as $playlist): ?>
    <tr>
      <td><a href="<?php echo url_for('@playlistid?module=Playlist&action=show&id='.$playlist->getId()) ?>"><?php echo $playlist->getName() ?></a></td>
      <td><a href="<?php echo url_for('@playlistsongid?module=PlaylistSong&action=index&id='.$playlist->getId()) ?>">View</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('playlist/new') ?>">Add</a>
