<h1>Countrys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Country nm</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($countrys as $country): ?>
    <tr>
      <td><a href="<?php echo url_for('country/show?id='.$country->getId()) ?>"><?php echo $country->getId() ?></a></td>
      <td><?php echo $country->getCountryNm() ?></td>
      <td><?php echo $country->getCreatedAt() ?></td>
      <td><?php echo $country->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('country/new') ?>">New</a>
