%define name nethserver-shellinabox
%define version 0.0.2
%define release 1
Summary: shellinabox is an ajax webbased terminal
Name: %{name}
Version: %{version}
Release: %{release}%{?dist}
Distribution: SME Server
License: GNU GPL version 2
Group: SMEserver/addon
Source: %{name}-%{version}.tar.gz
BuildArchitectures: noarch
BuildRoot: /var/tmp/%{name}-%{version}-buildroot
BuildRequires: nethserver-devtools
Requires: shellinabox >= 2.14
Requires: nethserver-directory nethserver-httpd
Requires: pwauth mod_authnz_external
AutoReqProv: no

%description
 shellinabox is an ajax web based terminal 

%prep
%setup
%build
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

%pre

%post


%changelog
* Thu Jun 25 2013  stephane de labrusse <stephdl@de-labrusse.fr> 0.0.1-1.sme
- initial release
