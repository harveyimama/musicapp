<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $features->getId() ?></td>
    </tr>
    <tr>
      <th>Song:</th>
      <td><?php echo $features->getSongId() ?></td>
    </tr>
    <tr>
      <th>Artist:</th>
      <td><?php echo $features->getArtistId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $features->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $features->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('features/edit?id='.$features->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('features/index') ?>">List</a>
