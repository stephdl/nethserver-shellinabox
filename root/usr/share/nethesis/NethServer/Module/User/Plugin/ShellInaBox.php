<?php
namespace NethServer\Module\User\Plugin;
use Nethgui\System\PlatformInterface as Validate;
use Nethgui\Controller\Table\Modify as Table;
/**
 * shellinabox user plugin
 * 
 * @author Stephane de Labrusse <stephdl@de-labrusse.fr> 
 */
class ShellInaBox extends \Nethgui\Controller\Table\RowPluginAction
{
    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Service', 10);
    }
    public function initialize()
    {
        $this->setSchemaAddition(array(
            array('ShellinaboxUser', Validate::SERVICESTATUS , Table::FIELD),
        ));
        $this->setDefaultValue('ShellinaboxUser', 'disabled');

        parent::initialize();
    }
}
