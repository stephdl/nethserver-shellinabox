%define name nethserver-shellinabox
%define version 0.0.10
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
Requires: nethserver-directory nethserver-httpd
Requires: pwauth mod_authnz_external
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
/sbin/e-smith/genfilelist $RPM_BUILD_ROOT \
     > %{name}-%{version}-filelist

%clean
rm -rf $RPM_BUILD_ROOT

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)
%doc COPYING
%pre

%post


%changelog
* Wed Jun 28 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.0.10-1.ns6
- Follow the sshd port to expand templates and restart shellinaboxd

* Wed Mar 29 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.0.9-1.ns6
- Template expansion on trusted-network

* Sun Mar 12 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.0.8-2.ns6
- GPL license

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
