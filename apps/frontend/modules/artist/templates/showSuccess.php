<table class="table">
  <tbody>
    
    <tr>
      <th>Artist:</th>
      <td><?php echo $artist->getArtistNm() ?></td>
    </tr>
    <tr>
      <th>Real Name:</th>
      <td><?php echo $artist->getRealNm() ?></td>
    </tr>
    <tr>
      <th>Dob:</th>
      <td><?php echo $artist->getDob() ?></td>
    </tr>
    <tr>
      <th>Country:</th>
      <td><?php echo $artist->getCountryId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $artist->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $artist->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('artist/edit?id='.$artist->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('artist/index') ?>">List</a>
