<h3 class="letter">Song<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Playlist</th>
      <th>Song</th>
      <th>Play</th>
      <th>Action</th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($playlist_songs as $playlist_song): ?>
    <tr>
        <td><?php echo $playlist_song->getPlaylist() ?></td>
      <td><?php echo $playlist_song->getSong() ?></td>  
      <td><embed src="/uploads/songs/<?php echo $playlist_song->getSong()->getMusic() ?>" width="200" height="60" autostart="false" type="application/x-mplayer2">
<noembed><img src="/images/prettyPhoto/facebook/next.png" ></noembed>
</embed>
         </td>
      <td><?php echo link_to('Delete', 'playlistsong/delete?id='.$playlist_song->getId().'&playlist='.$playlist_song->getPlaylistId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
    </tr>
    <?php $list = $playlist_song->getPlaylistId()?>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('playlistsong/new?id='.$list) ?>">Add</a>
