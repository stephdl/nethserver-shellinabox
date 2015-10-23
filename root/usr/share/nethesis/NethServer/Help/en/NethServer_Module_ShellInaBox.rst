
====================
Shellinabox Settings
====================

Manage the Shellinabox Access
=============================

Shellinabox is a web based terminal that uses Ajax technology to provide the look and feel of a native shell.

TCP Port
    Set the daemon TCP port.

Web Alias name
    Set the web alias name, by default shellinabox is reachable at  https://URL_OR_IP/shell

Force the user restricted access
    Apache is used to restrict access to users,  When  Shellinabox is  set to the private access, 
    the apache autentication is not a mandatory but you can force it here.
    A user needs to be allowed by apache, but it still needs a shell access to the system.

Private Access
    You can use shellinabox only on your Local network. The Apache authentication can be forced.

Public Access
    You can use shellinabox outside of your Local network. The Apache authentication is a mandatory.

IP Access
    The access is allowed only for the specified list of IP (one IP per line). The Apache authentication is a mandatory.
