<?php
echo $view->fieldset()->setAttribute('template', $T('ShellinaboxPermissionAccess_label'))
->insert($view->checkBox('ShellinaboxUser','enabled')->setAttribute('uncheckedValue', 'disabled'));
