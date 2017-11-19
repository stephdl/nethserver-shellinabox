%define name nethserver-shellinabox
%define version 0.1.6
%define release 1
Summary: shellinabox is an ajax webbased terminal
Name: %{name}
Version: %{version}
Release: %{release}%{?dist}
Distribution: NethServer
License: GNU GPL version 2
Group: SMEserver/addon
Source: %{name}-%{version}.tar.gz
BuildArchitectures: noarch
BuildRoot: /var/tmp/%{name}-%{version}-buildroot
BuildRequires: nethserver-devtools
Requires: shellinabox >= 2.18
Requires:  nethserver-httpd
Requires: mod_authnz_pam
AutoReqProv: no

%description
 shellinabox is an ajax web based terminal

%prep
%setup
%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root ; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)
rm -f %{name}-%{version}-filelist
%{genfilelist} $RPM_BUILD_ROOT \
     > %{name}-%{version}-filelist

%clean
rm -rf $RPM_BUILD_ROOT

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)
%dir %{_nseventsdir}/%{name}-update
%doc COPYING
%pre

%post


%changelog
* Sun Nov 19 2017 stephane de labrusse <stephdl@de-labrusse.fr> 0.1.6-1.ns7
- added a reversed css to display shellinabox on a black background
- Thank to Ralf Jeckel

* Fri Aug 04 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.1.5-1.ns7
- Verify if the username and the IP/CIDR is good

* Wed Jun 28 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.1.4-1.ns7
- Follow the sshd port to expand templates and restart shellinaboxd
- Added description tag
- ShellInaBox.php changed to the Configuration category
- Shell.php changed to the Administration category

* Wed Mar 29 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.1.2-1.ns7
- Template expansion on trusted-network

* Sun Mar 12 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.1.1-2.ns7
- GPL license

* Fri Nov 11 2016 stephane de labrusse <stephdl@de-labrusse.fr> 0.1.1-1.ns7
- shellinabox is displayed in the server-manager

* Wed Nov 09 2016 stephane de labrusse <stephdl@de-labrusse.fr> 0.1.0-1.ns7
- NS7 adaptation

* Sun Jan 10 2016 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.8-1.sme
- Restrict the deamon to localhost and disable ssl
- Expand the httpd.conf following the shellinabox events

* Sun Oct 25 2015 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.7-1.sme
- Url in the menu and translation modified

* Fri Oct 23 2015 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.6-1.sme
- WebUI enhanced

* Fri Oct 23 2015 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.5-1.sme
- Help files created

* Tue Oct 20 2015 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.4-1.sme
- a panel in Nethgui for the shellinabox settings

* Tue Oct 20 2015 stephane de labrusse <stephdl@de-labrusse.fr> 0.0.3-1.sme
- first release to Nethserver

* Sun Oct 18 2015  stephane de labrusse <stephdl@de-labrusse.fr> 0.0.1-1.sme
- First commit
