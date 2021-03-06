<?php
/*
Whois.php        PHP classes to conduct whois queries

Copyright (C)1999,2005 easyDNS Technologies Inc. & Mark Jeftovic

Maintained by David Saez (david@ols.es)

For the most recent version of this package visit:

http://www.phpwhois.org

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

/* servers.whois	v18   Markus Welters	2004/06/25 */
/* servers.whois	v17	ross golder	2003/02/09 */
/* servers.whois	v16	mark jeftovic	2001/02/28 */

$this->DATA_VERSION = '18';

$this->DATA = array(
	'aero'		=> 'aero',
	'ag'		=> 'ag',
	'at'		=> 'at',
	'au'		=> 'au',
	'biz'		=> 'biz',
	'be'		=> 'be',
	'br'		=> 'br',
	'ca'		=> 'ca',
	'cat'		=> 'cat',
	'ch'		=> 'ch',
	'cn'		=> 'cn',
	'com'		=> 'gtld',
	'coop'		=> 'coop',
	'cz'		=> 'cz',
	'de'		=> 'de',
	'edu'		=> 'edu',
	'es'		=> 'es',
	'eu'		=> 'eu',
	'fm'		=> 'fm',
	'hu'		=> 'hu',
	'ie'		=> 'ie',
	'info'		=> 'info',
	'int'		=> 'int',
	'is'		=> 'is',
	'li'		=> 'ch',
	'lu'		=> 'lu',
	'lt'		=> 'lt',
	'mobi'		=> 'mobi',
	'museum'	=> 'museum',
	'mx'		=> 'mx',
	'name'		=> 'name',
	'net'		=> 'gtld',
	'nl'		=> 'nl',
	'nu'		=> 'nu',
	'nz'		=> 'nz',
	'org'		=> 'org',
	'pl'		=> 'pl',
	'pro'		=> 'pro',
	'sc'		=> 'sc',
	'se'		=> 'se',
	'travel'	=> 'travel',
	'tv'		=> 'gtld',
	'uk'		=> 'uk',
	'us'		=> 'us',
	'ws'		=> 'ws',
	'za.org'	=> 'za',
	'za.net'	=> 'za'
	);

/* If whois Server needs any parameters, enter it here */

$this->WHOIS_PARAM = array(
	'com.whois-servers.net' => '=',
	'net.whois-servers.net' => '=',
	'de.whois-servers.net'	=> '-T dn,ace '
	);

/* TLD's that have special whois servers or that can only be reached via HTTP */

$this->WHOIS_SPECIAL = array(
		'ad'	 => '',
		'ae'	 => 'http://www.nic.ae/english/whois/display.jsp?domain={domain}.{tld}&queryType=domain&check=on',
		'af'	 => 'whois.nic.af',
		'ai'	 => 'http://whois.offshore.ai/cgi-bin/whois.pl?domain-name={domain}.{tld}',
		'al'	 => '',
		'az'	 => '',
		'ba'	 => '',
		'bb'	 => 'http://domains.org.bb/regsearch/getdetails.cfm?DND={domain}.{tld}',
		'bg'	 => 'http://www.register.bg/bg-nic/displaydomain.pl?domain={domain}.{tld}&search=exist',
		'bi'	 => 'whois.nic.bi',
		'bj'	 => 'whois.nic.bj',
		'by'	 => '',
		'co.za'  => 'http://co.za/cgi-bin/whois.sh?Domain={domain}.{tld}',
		'cy'	 => '',
		'es'	 => '',
		'fm'     => 'http://www.dot.fm/query_whois.cfm?domain={domain}&tld=fm',
		'gs'     => 'http://www.adamsnames.tc/whois/?domain={domain}.{tld}',
		'in'     => 'whois.ncst.ernet.in',
		'mobi'	 => 'whois.dotmobiregistry.net',
		'ms'     => 'http://www.adamsnames.tc/whois/?domain={domain}.{tld}',
		'mt'	 => 'http://www.um.edu.mt/cgi-bin/nic/whois?domain={domain}.{tld}',
		'net.au' => 'whois.aunic.net',
		'pe'	 => 'http://nic.pe/detpublic.php?decid=B&ndom={domain}.{tld}',
		'pr'	 => 'whois.uprr.pr',
		'pro'	 => 'whois.registry.pro',
		'sc'     => 'whois2.afilias-grs.net',
		'tc'     => 'http://www.adamsnames.tc/whois/?domain={domain}.{tld}',
		'tf'     => 'http://www.adamsnames.tc/whois/?domain={domain}.{tld}',
		'travel' => 'http://www.whois.travel/whois.cgi?TLD={tld}&dn={domain}&TYPE=DOMAIN',
		'vg'     => 'http://www.adamsnames.tc/whois/?domain={domain}.{tld}',
		'za.net' => 'whois.za.net',
		'za.org' => 'whois.za.net'
		);
		
/* Non ICANN TLD's */

$this->WHOIS_NON_ICANN = array (
		'agent'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'agente'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'america'	=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'amor'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'amore'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'amour'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'arte'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'artes'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'arts'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'asta'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'auction'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'auktion'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'boutique'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'chat'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'chiesa'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'church'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'cia'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'ciao'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'cie'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'club'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'clube'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'com2'		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'deporte'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'ditta'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'earth'		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'eglise'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'enchere'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'escola'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'escuela'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'esporte'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'etc'		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'famiglia'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'familia'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'familie'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'family'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'free'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'hola'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'game'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'ges'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'gmbh'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'golf'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'gratis'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'gratuit'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'iglesia'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'igreja'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'inc'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'jeu'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'jogo'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'juego'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'kids'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'kirche'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'krunst'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'law'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'legge'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'lei'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'leilao'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'ley'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'liebe'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'lion'		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'llc'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'llp'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'loi'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'loja'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'love'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'ltd'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'makler'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'med'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'mp3'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'not'		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'online'	=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',
		'recht'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'reise'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'resto'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'school'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'schule'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'scifi'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'scuola'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'shop'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'soc'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'spiel'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'sport'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'subasta'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'tec'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'tech'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'tienda'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'travel'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'turismo'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'usa' 		=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}',		
		'verein'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'viaje'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'viagem'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'video'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'voyage'	=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'xxx'		=> 'http://www.new.net/search_whois.tp?domain={domain}&tld={tld}',
		'z'			=> 'http://www.adns.net/whois.php?txtDOMAIN={domain}.{tld}'
		);
?>
