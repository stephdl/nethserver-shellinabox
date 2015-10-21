<?php
namespace NethServer\Module;


use Nethgui\System\PlatformInterface as Validate;

/**
 * Control shellinabox access to the system
 * 
 * @author stephane de Labrusse <stephdl@de-labrusse.fr>
 */
class ShellInaBox extends \Nethgui\Controller\AbstractController
{

    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Security', 6);
    }

    public function initialize()
    {
        parent::initialize();
        $this->declareParameter('FixedIP', Validate::ANYTHING, array('configuration', 'shellinaboxd', 'FixedIP'));
        $this->declareParameter('Name', Validate::ANYTHING, array('configuration', 'shellinaboxd', 'Name'));
        $this->declareParameter('TCPPort', Validate::PORTNUMBER, array('configuration', 'shellinaboxd', 'TCPPort'));
        $this->declareParameter('status', Validate::SERVICESTATUS, array('configuration', 'shellinaboxd', 'status'));
        $this->declareParameter('WebAuth', Validate::SERVICESTATUS, array('configuration', 'shellinaboxd', 'WebAuth'));
        $this->declareParameter('PublicAccess', $this->createValidator()->memberOf('private','public','IP'), array('configuration', 'shellinaboxd', 'PublicAccess'));
    }

    protected function onParametersSaved($changedParameters)
    {
        parent::onParametersSaved($changedParameters);
        $this->getPlatform()->signalEvent('nethserver-shellinabox-save');
    }

}
