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
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Configuration', 6);
    }

    public function initialize()
    {
        parent::initialize();
        $this->declareParameter('FixedIP', Validate::ANYTHING, array('configuration', 'shellinaboxd', 'FixedIP'));
        $this->declareParameter('TCPPort', Validate::PORTNUMBER, array('configuration', 'shellinaboxd', 'TCPPort'));
        $this->declareParameter('status', Validate::SERVICESTATUS, array('configuration', 'shellinaboxd', 'status'));
        $this->declareParameter('WebAuth', Validate::SERVICESTATUS, array('configuration', 'shellinaboxd', 'WebAuth'));
        $this->declareParameter('ShellUsers', Validate::ANYTHING, array('configuration', 'shellinaboxd', 'ShellUsers'));
        $this->declareParameter('PublicAccess', $this->createValidator()->memberOf('private','public','IP'), array('configuration', 'shellinaboxd', 'PublicAccess'));
    }


    public static function splitLines($text)
    {
        return array_filter(preg_split("/[,;\s]+/", $text));
    }

    public function readFixedIP($dbList)
    {
        return implode("\r\n", explode(',' ,$dbList));
    }

    public function writeFixedIP($viewText)
    {
        return array(implode(',', self::splitLines($viewText)));
    }

    public function readShellUsers($dbList)
    {
        return implode("\r\n", explode(',' ,$dbList));
    }

    public function writeShellUsers($viewText)
    {
        return array(implode(',', self::splitLines($viewText)));
    }

    public function validate(\Nethgui\Controller\ValidationReportInterface $report)
    {
        parent::validate($report);

        $itemValidator = $this->getPlatform()->createValidator()
            ->orValidator($this->createValidator(Validate::IP), 
            $this->createValidator(Validate::CIDR_BLOCK));
        foreach (self::splitLines($this->parameters['FixedIP']) as $v) {
            if ( ! $itemValidator->evaluate($v)) {
                $report->addValidationErrorMessage($this, 'FixedIP', 'Not_An_IP', array($v));
                break;
            }
        }

        $itemValidator = $this->getPlatform()->createValidator(Validate::USERNAME);
        foreach (self::splitLines($this->parameters['ShellUsers']) as $v) {
            if ( ! $itemValidator->evaluate($v)) {
                $report->addValidationErrorMessage($this, 'ShellUsers', 'Not_A_Valid_User', array($v));
                break;
            }
        }
    }


    protected function onParametersSaved($changedParameters)
    {
        parent::onParametersSaved($changedParameters);
        $this->getPlatform()->signalEvent('nethserver-shellinabox-save');
    }

}
