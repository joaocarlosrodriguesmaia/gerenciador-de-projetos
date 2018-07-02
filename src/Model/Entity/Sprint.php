<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sprint Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $initial_date
 * @property \Cake\I18n\FrozenTime $final_date
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Activity[] $activities
 */
class Sprint extends Entity
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
        'project_id' => true,
        'title' => true,
        'description' => true,
        'initial_date' => true,
        'final_date' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'project' => true,
        'activities' => true
    ];
}
