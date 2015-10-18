
<?php
namespace NethServer\Module\Dashboard\Applications;
/**
 * Shellinabox web interface
 *
 * @author stephane de labrusse
 */
class Shellinabox extends \Nethgui\Module\AbstractModule implements \NethServer\Module\Dashboard\Interfaces\ApplicationInterface
{
    public function getName()
    {
        return "Shellinabox";
    }
    public function getInfo()
    {
         $webapp = $this->getPlatform()->getDatabase('configuration')->getProp('transmission-daemon','Name');
         $host = explode(':',$_SERVER['HTTP_HOST']);
         return array(
            'Web_Terminal' => "https://".$host[0]."/$webapp",
         );
    }
