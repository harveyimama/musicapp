<?php

/**
 * Song form base class.
 *
 * @method Song getObject() Returns the current form's model object
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSongForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'album_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Album'), 'add_empty' => true)),
      'genre_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'song_nm'    => new sfWidgetFormInputText(),
      'music'      => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'album_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Album'), 'required' => false)),
      'genre_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'required' => false)),
      'song_nm'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'music'      => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('song[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Song';
  }

}
