<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $genre->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $genre->getName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $genre->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $genre->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('genre/edit?id='.$genre->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('genre/index') ?>">List</a>
