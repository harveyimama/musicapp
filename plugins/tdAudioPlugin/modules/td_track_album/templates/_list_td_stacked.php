<td colspan="6">
  <?php echo __('<img src="/uploads/td/cover/%%file_cover%%" /><br /><strong>Nazwa</strong>: <i>%%name%%</i><span id="audio_is_active_column_'.$td_track_album->getId().'">%%active%%</span><br /><strong>Autor</strong>: <i>%%author%%</i><br /><strong>Wydano</strong>: <i>%%released_at%%</i><br /><strong>Opis</strong>: <div class="text_box">%%description_short%%</div><br /><strong>Utworzono</strong>: <i>%%created_at%%</i><br /><strong>Zmieniono</strong>: <i>%%updated_at%%</i>', array('%%file_cover%%' => $td_track_album->getFileCover(), '%%name%%' => $td_track_album->getName(), '%%active%%' => get_partial('td_track_album/list_field_boolean', array('value' => $td_track_album->getActive())), '%%author%%' => $td_track_album->getAuthor(), '%%released_at%%' => false !== strtotime($td_track_album->getReleasedAt()) ? format_date($td_track_album->getReleasedAt(), "f") : '&nbsp;', '%%description_short%%' => $td_track_album->getDescriptionShort(), '%%created_at%%' => false !== strtotime($td_track_album->getCreatedAt()) ? format_date($td_track_album->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($td_track_album->getUpdatedAt()) ? format_date($td_track_album->getUpdatedAt(), "f") : '&nbsp;'), 'sf_admin') ?>
</td>