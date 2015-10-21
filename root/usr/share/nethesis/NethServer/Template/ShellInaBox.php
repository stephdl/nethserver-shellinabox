<?php

/* @var $view Nethgui\Renderer\Xhtml */

echo $view->header()->setAttribute('template', $T('ShellInaBox_header'));

echo $view->panel()

    ->insert($view->checkBox('status', 'enabled')->setAttribute('uncheckedValue', 'disabled'))
    ->insert($view->textInput('TCPPort'))
    ->insert($view->textInput('Name'))
        ->insert($view->radioButton('PublicAccess', 'public'))
        ->insert($view->radioButton('PublicAccess', 'private'))
        ->insert($view->radioButton('PublicAccess', 'IP'))
    ->insert($view->textArea('FixedIP', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['FixedIP_default']))
    ->insert($view->checkBox('WebAuth', 'enabled')->setAttribute('uncheckedValue', 'disabled'))
;

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
