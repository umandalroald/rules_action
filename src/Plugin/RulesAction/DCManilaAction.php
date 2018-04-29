<?php

namespace Drupal\dcmanila_rules\Plugin\RulesAction;

use Drupal\user\UserInterface;
use Drupal\rules\Core\RulesActionBase;

/**
 * Provides a 'custom action' action.
 * 
 * @RulesAction(
 *   id = "dcmanila_rules_action",
 *   label = @Translation("DCManila"),
 *   category = @Translation("DCManila"),
 *   context = {
 *     "user" = @ContextDefinition("entity:user", 
 *       label = @Translation("User"),
 *       description = @Translation("Specifies the user we are taking action on.")
 *     ),
 *   }
 * )
 */
class DCManilaAction extends RulesActionBase {
  /**
   * Flag that indicates if the entity should be auto-saved later.
   * 
   * @var bool
   */

   protected $saveLater = FALSE;

   /**
    * Does something to the user entity.
    *
    * @param \Drupal\user\UserInterface $account
    *   The user to take action on.
    */
    protected function doExecute(UserInterface $account) {
      \Drupal::logger('dcmanila_rules')->notice('Awesome it works!');
    }

    /**
     * {@inheritdoc}
     */
    public function autoSaveContext() {
        if ($this->saveLater) {
        return ['user'];
        }
        return [];
    }
}