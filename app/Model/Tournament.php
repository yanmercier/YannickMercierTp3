<?php

App::uses('AppModel', 'Model');

/**
 * Tournament Model
 *
 * @property User $User
 * @property Golfclub $Golfclub
 * @property Participant $Participant
 */
class Tournament extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'tournamentsName';

    public function isOwnedBy($tournament, $user) {
        return $this->field('id', array('id' => $tournament, 'user_id' => $user)) !== false;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'tournamentsName' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'sponsor' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'file_name' => array(
            'uploadError-1' => array(
                'rule' => array('fileExtension', array('jpg', 'jpeg', 'png', 'gif')),
                'message' => 'Image must be jpg, jpeg, png or gif'
            ),
            'uploadError-2' => array(
                'rule' => array('fileSize', '<=', '1MB'),
                'message' => 'Image must be less than 1MB'
            )
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed


    public function fileExtension($check, $extensions, $allowEmpty = true) {
        $file = current($check);

        if ($allowEmpty && empty($file['tmp_name'])) {
            return true;
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        return in_array($extension, $extensions);
    }

    public function beforeDelete($cascade = true) {
        $oldextension = $this->field('filename');
        $oldfile = IMAGES . 'filenames' . DS . $this->id . '.' . $oldextension;

        if (file_exists($oldfile)) {
            unlink($oldfile);
        }
    }

    public function afterSave($created, $options = array()) {
        if (isset($this->data[$this->alias]['file_name'])) {
            $file = $this->data[$this->alias]['file_name'];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!empty($file['tmp_name'])) {
                $oldextension = $this->field('filename');
                $oldfile = IMAGES . 'filenames' . DS . $this->id . '.' . $oldextension;

                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }

                move_uploaded_file($file['tmp_name'], IMAGES . 'filenames' . DS . $this->id . '.' . $extension);
                $this->saveField('filename', $extension);
            }
        }
    }

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Golfclub' => array(
            'className' => 'Golfclub',
            'foreignKey' => 'golfclub_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Sponsor' => array(
                'className' => 'Sponsor',
                'foreignKey' => 'sponsor_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Participant' => array(
            'className' => 'Participant',
            'joinTable' => 'participants_tournaments',
            'foreignKey' => 'tournament_id',
            'associationForeignKey' => 'participant_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

}
