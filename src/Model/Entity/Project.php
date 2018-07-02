<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $initial_date
 * @property \Cake\I18n\FrozenTime $final_date
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\ProjectUser[] $project_users
 * @property \App\Model\Entity\Sprint[] $sprints
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'initial_date' => true,
        'final_date' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'messages' => true,
        'project_users' => true,
        'sprints' => true
    ];
}
