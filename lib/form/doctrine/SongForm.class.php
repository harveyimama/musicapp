<?php

/**
 * Song form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SongForm extends BaseSongForm
{
  public function configure()
  {
      unset(
        $this['created_at'],$this['updated_at']
        );
      
      $this->widgetSchema['music'] = new sfWidgetFormInputFile();
      
      $this->validatorSchema['music'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir').'/songs',
            'mime_types' => array('audio/mpeg'),
            ));
      
     $this->widgetSchema['song_nm'] = new sfWidgetFormInputText(array('label' => 'Title',));
        
      
   
      
     /*  $subForm = new sfForm();

   for ($i = 0; $i < 1; $i++)
  {
    $features = new Features();
    $features->Artist = $this->getObject();
 
    $form = new FeaturesForm($features);
 
    $subForm->embedForm($i, $form);
  }
  $this->embedForm('newFeatures', $subForm);*/
      
      
  }
}
