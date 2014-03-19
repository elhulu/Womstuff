<?php

class User extends AppModel{

    public $hasOne = array('Fiche');

        /*
    public $hasOne = array(
        'Fiche' => array(
            'className' => 'Fiche',
            'conditions' => array('Fiche.user_id' => 'User.id'),
            'dependent' => true
        )
    );*/


    /*public $validate = array(
        'username' => array(
            array(
                'rule' => 'alphanumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => "Nom d'utilisateur invalide."
            ),
            array(
                'rule'=> 'isUnique',
                'message' => 'Ce pseudo est déjà pris'
            )
        ),
        'email' => array(
            array(
                'rule' => 'email',
                'required' => true,
                'allowEmpty' => false,
                'message' => "Email non valide."
            ),
            array(
                'rule'=> 'isUnique',
                'message' => 'Cet email est déjà utilisé.'
            )
        ),
        'password' => array(
                'rule'=> 'notEmpty',
                'message' => 'Merci de préciser un mot de passe.',
                'allowEmpty' => false
        )


    )*/

}

