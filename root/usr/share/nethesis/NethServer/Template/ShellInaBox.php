<?php
/* @var $view Nethgui\Renderer\Xhtml */
$host = explode(':',$_SERVER['HTTP_HOST']);
$url = "https://".$host[0]."/".$view['Name'];
echo $view->header()->setAttribute('template', $T('ShellInaBox_header'));
echo $view->panel()
    ->insert($view->checkBox('status', 'enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->textInput('TCPPort'))

    ->insert($view->fieldsetSwitch('PublicAccess', 'private', $view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->checkBox('WebAuth', 'enabled')->setAttribute('uncheckedValue', 'disabled')))

    ->insert($view->radioButton('PublicAccess', 'public'))

    ->insert($view->fieldsetSwitch('PublicAccess', 'IP',$view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->checkBox('WebAuth', 'enabled')->setAttribute('uncheckedValue', 'disabled'))
        ->insert($view->textArea('FixedIP', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['FixedIP_default'])))
;
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
