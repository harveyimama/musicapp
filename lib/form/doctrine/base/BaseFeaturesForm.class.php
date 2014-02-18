<?php

/**
 * Features form base class.
 *
 * @method Features getObject() Returns the current form's model object
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFeaturesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'song_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Song'), 'add_empty' => true)),
      'artist_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Artist'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'song_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Song'), 'required' => false)),
      'artist_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Artist'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('features[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Features';
  }

}
