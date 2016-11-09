<?php
namespace NethServer\Module;

use Nethgui\System\PlatformInterface as Validate;
/**
 * shellinabox integration
 *
 * @author stephane de Labrusse <stephdl@de-labrusse.fr>
 */
class Shell extends \Nethgui\Controller\AbstractController
{
    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Status');
    }
    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);
        $shellweb = $this->getPlatform()->getDatabase('configuration')->getKey('shellinaboxd');
        $host = explode(':',$_SERVER['HTTP_HOST']);
        $view['url'] = "/".$shellweb['alias'];
    }
}
