<h3 class="letter">Features<strong> List</strong></h3>

<table>
  <thead>
    <tr>
      <th>Artist</th>
      <th>Song</th>
      <th>Action</th>
      
     </tr>
  </thead>
  <tbody>
    <?php foreach ($featuress as $features): ?>
    <tr>
      <td><?php echo $features->getArtist() ?></td>
      <td><?php echo $features->getSong() ?></td>
      <td><?php echo link_to('Delete', '@delete?module=Features&action=delete&id='.$features->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('song/index') ?>">Back</a>
