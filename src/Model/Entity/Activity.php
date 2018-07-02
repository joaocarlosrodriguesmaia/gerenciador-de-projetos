<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $id
 * @property int $sprint_id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $initial_date
 * @property \Cake\I18n\FrozenTime $final_date
 * @property string $priority
 * @property int $progress
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\Sprint $sprint
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Activity extends Entity
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
        'sprint_id' => true,
        'user_id' => true,
        'title' => true,
        'description' => true,
        'initial_date' => true,
        'final_date' => true,
        'priority' => true,
        'progress' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'sprint' => true,
        'user' => true,
        'tickets' => true
    ];
}
