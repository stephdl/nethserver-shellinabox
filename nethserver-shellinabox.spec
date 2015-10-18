%define name nethserver-shellinabox
%define version 0.0.1
%define release 1
Summary: shellinabox is an ajax webbase terminal
Name: %{name}
Version: %{version}
Release: %{release}%{?dist}
Distribution: SME Server
License: GNU GPL version 2
Group: SMEserver/addon
Source: smeserver-shellinabox-%{version}.tar.gz
BuildArchitectures: noarch
BuildRoot: /var/tmp/%{name}-%{version}-buildroot
BuildRequires: nethserver-devtools
Requires: e-smith-release >= 9.0
Requires: shellinabox >= 2.14
Requires: nethserver-directory
AutoReqProv: no

%description
 shellinabox is an ajax web based terminal 

%changelog
* Thu Jun 25 2013  stephane de labrusse <stephdl@de-labrusse.fr> 0.0.1-1.sme
- initial release

%prep
%setup
#%patch0 -p1
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



