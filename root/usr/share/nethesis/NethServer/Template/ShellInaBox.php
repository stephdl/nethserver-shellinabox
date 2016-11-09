<?php

/* @var $view Nethgui\Renderer\Xhtml */

echo $view->header()->setAttribute('template', $T('ShellInaBox_header'));

echo $view->panel()

    ->insert($view->fieldsetSwitch('status', 'enabled',$view::FIELDSETSWITCH_CHECKBOX | $view::FIELDSETSWITCH_EXPANDABLE)->setAttribute('uncheckedValue', 'disabled')
    ->insert($view->textInput('TCPPort'))

    ->insert($view->fieldsetSwitch('PublicAccess', 'private', $view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->fieldsetSwitch('WebAuth', 'enabled',$view::FIELDSETSWITCH_CHECKBOX | $view::FIELDSETSWITCH_EXPANDABLE)->setAttribute('uncheckedValue', 'disabled')
            ->insert($view->textArea('ShellUsers', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['ShellUsers_default']))))

    ->insert($view->fieldsetSwitch('PublicAccess', 'public', $view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->textArea('ShellUsers', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['ShellUsers_default'])))

    ->insert($view->fieldsetSwitch('PublicAccess', 'IP',$view::FIELDSETSWITCH_EXPANDABLE)
        ->insert($view->textArea('FixedIP', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['FixedIP_default']))
        ->insert($view->fieldsetSwitch('WebAuth', 'enabled',$view::FIELDSETSWITCH_CHECKBOX | $view::FIELDSETSWITCH_EXPANDABLE)->setAttribute('uncheckedValue', 'disabled')
            ->insert($view->textArea('ShellUsers', $view::LABEL_ABOVE)->setAttribute('dimensions', '5x30')->setAttribute('placeholder', $view['ShellUsers_default']))))

);

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
