<?php

/**
 * features actions.
 *
 * @package    musicapp
 * @subpackage features
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class featuresActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->featuress = Doctrine_Core::getTable('Features')
      ->createQuery('a')
             ->Where('song_id = ?', $request->getParameter('id'))
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->features = Doctrine_Core::getTable('Features')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->features);
  }

  public function executeNew(sfWebRequest $request)
  {
      $feature = new Features();
        $feature->setSongId($request->getParameter('id')); 
        $feature->setArtistId($request->getParameter('artist_id'));
    //$this->form = new FeaturesForm(array(),array('song_id'=>$request->getParameter('id')));
    
         $this->form = new FeaturesForm($feature);
  }

  public function executeCreate(sfWebRequest $request)
  {
 
      
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FeaturesForm();

    $this->processForm($request, $this->form);
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($features = Doctrine_Core::getTable('Features')->find(array($request->getParameter('id'))), sprintf('Object features does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeaturesForm($features);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($features = Doctrine_Core::getTable('Features')->find(array($request->getParameter('id'))), sprintf('Object features does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeaturesForm($features);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($features = Doctrine_Core::getTable('Features')->find(array($request->getParameter('id'))), sprintf('Object features does not exist (%s).', $request->getParameter('id')));
    $features->delete();

    $this->redirect('features/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $features = $form->save();
     
      $this->redirect('features/edit?id='.$features->getId());
    }
  }
}
