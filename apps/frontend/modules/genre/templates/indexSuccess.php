<h1>Genres List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre): ?>
    <tr>
      <td><a href="<?php echo url_for('genre/show?id='.$genre->getId()) ?>"><?php echo $genre->getId() ?></a></td>
      <td><?php echo $genre->getName() ?></td>
      <td><?php echo $genre->getCreatedAt() ?></td>
      <td><?php echo $genre->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('genre/new') ?>">New</a>
