<?php

/**
 * playlistsong actions.
 *
 * @package    musicapp
 * @subpackage playlistsong
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class playlistsongActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->playlist_songs = Doctrine_Core::getTable('PlaylistSong')
      ->createQuery('a')
      ->Where('playlist_id ='.$request->getParameter('id'))
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->playlist_song = Doctrine_Core::getTable('PlaylistSong')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->playlist_song);
  }

  public function executeNew(sfWebRequest $request)
  {
      $playlistsong = new PlaylistSong();
        $playlistsong->setPlaylistId($request->getParameter('id')); 
    $this->form = new PlaylistSongForm($playlistsong);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PlaylistSongForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($playlist_song = Doctrine_Core::getTable('PlaylistSong')->find(array($request->getParameter('id'))), sprintf('Object playlist_song does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlaylistSongForm($playlist_song);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($playlist_song = Doctrine_Core::getTable('PlaylistSong')->find(array($request->getParameter('id'))), sprintf('Object playlist_song does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlaylistSongForm($playlist_song);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($playlist_song = Doctrine_Core::getTable('PlaylistSong')->find(array($request->getParameter('id'))), sprintf('Object playlist_song does not exist (%s).', $request->getParameter('id')));
    $playlist_song->delete();

    $this->redirect('playlistsong/index?id='.$request->getParameter('playlist'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $playlist_song = $form->save();

      $this->redirect('playlistsong/edit?id='.$playlist_song->getId());
    }
  }
}
