<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->hasOne('Profile');
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name',"** please fill first narrrme")
            // ->ascii('first_name' , 'ashaksd');
            ->add('first_name',[
                'first_name'=>["rule" => array('custom', '/^[A-Za-z_]*$/'),
                "message" => "only charecters"
                ]
            ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('phone_number')
            ->minLength('phone_number', 10)
            ->maxLength('phone_number', 10)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->minLength('password', 8,'at least 8 characters')
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password',
            [
                'password-1'=>array("rule" => array('custom', '/[A-Z]/'),
                "message" => "at least one capital letter"
            ),
            'password-2'=>array("rule" => array('custom', '/[0-9]/'),
            "message" => "at least one digit"
        ),
        'password-3'=>array("rule" => array('custom', '/[@#$&_!]/'),
            "message" => "at least one special character "
        ),
        'password-4'=>array("rule" => array('custom', '/^\S+$/'),
            "message" => "no space please "
        )
            ]);
            // ->add('password',[
            //     'password'=>["rule" => array('custom', '/[0-9]/'),
            //     "message" => "at least one digit "
            //     ]
            // ]);


            $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 50)
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password')
            ->sameAs('confirm_password','password','password does not match');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 25)
            ->minLength('gender', 3)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

         $validator
            ->notEmpty('email', 'An email is required')
            ->email('email',true,'please enter valid email')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'    
            ]);
            $validator
            ->notEmptyFile('images')
            ->add( 'images', [
            'mimeType' => [
                'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                'message' => 'Please upload only jpg and png.',
            ],
            'fileSize' => [
                'rule' => [ 'fileSize', '<=', '1MB' ],
                'message' => 'Image file size must be less than 1MB.',
            ],
        ] );
        $validator
            ->notEmptyFile('change_image')
            ->add( 'change_image', [
            'mimeType' => [
                'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                'message' => 'Please upload only jpg and png.',
            ],
            'fileSize' => [
                'rule' => [ 'fileSize', '<=', '1MB' ],
                'message' => 'Image file size must be less than 1MB.',
            ],
        ] );
            // $validator
            // ->notEmptyFile('image')
            // ->uploadedFile('image', [
            //     // 'types' => ['image/png'], // only PNG image files
            //     'minSize' => 1024, // Min 1 KB
            //     'maxSize' => 1024 * 1024 // Max 1 MB
            // ]);
            


        // $validator
        //     ->scalar('created_date')
        //     ->maxLength('created_date', 20)
        //     ->requirePresence('created_date', 'create')
        //     ->notEmptyString('created_date');

        // $validator
        //     ->scalar('modified_date')
        //     ->maxLength('modified_date', 20)
        //     ->allowEmptyString('modified_date');

        // $validator
        //     ->scalar('token')
        //     ->maxLength('token', 250)
        //     ->allowEmptyString('token');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
