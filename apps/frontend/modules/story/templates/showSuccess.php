<table>
  <tbody>
    <tr>
      <th>S/N:</th>
      <td><?php echo $story->getId() ?></td>
    </tr>
    <tr>
      <th>Artist:</th>
      <td><?php echo $story->getArtist() ?></td>
    </tr>
     <tr>
      <th>Head line:</th>
      <td><?php echo $story->getTitle() ?></td>
    </tr>
    <tr>
      <th>Story:</th>
      <td><?php echo $story->getStory() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $story->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $story->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('story/edit?id='.$story->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('story/index') ?>">List</a>
