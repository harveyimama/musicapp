<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $country->getId() ?></td>
    </tr>
    <tr>
      <th>Country nm:</th>
      <td><?php echo $country->getCountryNm() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $country->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $country->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('country/edit?id='.$country->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('country/index') ?>">List</a>
