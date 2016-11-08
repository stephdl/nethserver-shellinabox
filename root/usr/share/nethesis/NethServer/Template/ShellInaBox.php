<?php

/* @var $view Nethgui\Renderer\Xhtml */

$host = explode(':',$_SERVER['HTTP_HOST']);
$url = "https://".$host[0]."/".$view['Name'];


echo $view->header()->setAttribute('template', $T('ShellInaBox_header'));

echo $view->panel()

    ->insert($view->checkBox('status', 'enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->textInput('TCPPort'))
    ->insert($view->textInput('Name'))

    ->insert($view->fieldsetSwitch('PublicAccess', 'private', $view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->checkBox('WebAuth', 'enabled')->setAttribute('uncheckedValue', 'disabled')))

    ->insert($view->radioButton('PublicAccess', 'public'))

    ->insert($view->fieldsetSwitch('PublicAccess', 'IP',$view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->textArea('FixedIP', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['FixedIP_default'])))

    ->insert($view->textArea('ShellUsers', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['ShellUsers_default']))
    
    ->insert($view->panel()->insert($view->literal("URL: <a href='$url' target='_blank'>$url</a>")->setAttribute('hsc', FALSE)))

;

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
