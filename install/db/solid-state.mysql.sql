CREATE TABLE `account` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('Individual Account','Business Account') NOT NULL default 'Business Account',
  `status` enum('Active','Inactive','Pending') NOT NULL default 'Active',
  `billingstatus` enum('Bill','Do Not Bill') NOT NULL default 'Bill',
  `billingday` int(11) NOT NULL default '0',
  `username` varchar(32) NOT NULL default '0',
  `businessname` varchar(255) default NULL,
  `contactname` varchar(255) NOT NULL default '',
  `contactemail` varchar(255) NOT NULL default '',
  `address1` varchar(255) default NULL,
  `address2` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `postalcode` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `mobilephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
CREATE TABLE `authorizeaim` (
  `transid` varchar(10) NOT NULL,
  `lastdigits` varchar(4) NOT NULL,
  PRIMARY KEY  (`transid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `businessname` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `address1` varchar(255) default NULL,
  `address2` varchar(255) default NULL,
  `address3` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `postalcode` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `mobilephone` varchar(255) default NULL,
  `fax` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
CREATE TABLE `cpanelserver` (
  `serverid` int(10) unsigned NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `accesshash` text NOT NULL,
  PRIMARY KEY  (`serverid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `domainservice` (
  `tld` varchar(255) NOT NULL default '',
  `modulename` varchar(255) default NULL,
  `description` blob,
  PRIMARY KEY  (`tld`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `domainserviceprice` (
  `tld` varchar(255) NOT NULL default '',
  `type` enum('Onetime','Recurring') NOT NULL default 'Onetime',
  `termlength` int(10) unsigned NOT NULL default '0',
  `price` decimal(20,2) NOT NULL default '0.00',
  `taxable` enum('Yes','No') NOT NULL default 'No',
  PRIMARY KEY  (`tld`,`type`,`termlength`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `domainservicepurchase` (
  `id` int(11) NOT NULL auto_increment,
  `accountid` int(11) NOT NULL default '0',
  `tld` varchar(255) NOT NULL default '',
  `term` int(11) default '0',
  `nextbillingdate` date default NULL,
  `previnvoiceid` int(11) default NULL,
  `domainname` varchar(255) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `expiredate` datetime NOT NULL default '0000-00-00 00:00:00',
  `secret` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
CREATE TABLE `hostingservice` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` blob,
  `uniqueip` enum('Required','Not Required') NOT NULL default 'Not Required',
  `domainrequirement` enum('Required','Not Required') NOT NULL default 'Required',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
CREATE TABLE `hostingserviceprice` (
  `serviceid` int(10) unsigned NOT NULL default '0',
  `type` enum('Onetime','Recurring') NOT NULL default 'Onetime',
  `termlength` int(10) unsigned NOT NULL default '0',
  `price` decimal(20,2) NOT NULL default '0.00',
  `taxable` enum('Yes','No') NOT NULL default 'No',
  PRIMARY KEY  (`serviceid`,`type`,`termlength`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `hostingservicepurchase` (
  `id` int(11) NOT NULL auto_increment,
  `accountid` int(11) NOT NULL default '0',
  `hostingserviceid` int(11) NOT NULL default '0',
  `serverid` int(11) default NULL,
  `term` int(11) default NULL,
  `domainname` varchar(255) default NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `nextbillingdate` date default NULL,
  `previnvoiceid` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL auto_increment,
  `accountid` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `periodbegin` datetime NOT NULL default '0000-00-00 00:00:00',
  `periodend` datetime NOT NULL default '0000-00-00 00:00:00',
  `note` blob,
  `terms` int(11) NOT NULL default '1',
  `outstanding` enum('yes','no') NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
CREATE TABLE `invoiceitem` (
  `id` int(11) NOT NULL auto_increment,
  `invoiceid` int(11) NOT NULL default '0',
  `taxitem` enum('No','Yes') NOT NULL default 'No',
  `quantity` int(11) default NULL,
  `unitamount` decimal(10,2) NOT NULL default '0.00',
  `text` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
CREATE TABLE `ipaddress` (
  `ipaddress` int(11) NOT NULL default '0',
  `serverid` int(11) NOT NULL default '0',
  `purchaseid` int(11) default NULL,
  PRIMARY KEY  (`ipaddress`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `log` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('notice','warning','error','critical','security') NOT NULL default 'notice',
  `module` varchar(255) NOT NULL default '',
  `text` varchar(255) NOT NULL default '',
  `username` varchar(255) NOT NULL default '0',
  `remoteip` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=433 DEFAULT CHARSET=latin1;
CREATE TABLE `module` (
  `name` varchar(255) NOT NULL default '',
  `enabled` enum('Yes','No') NOT NULL default 'No',
  `type` varchar(255) NOT NULL default '',
  `shortdescription` varchar(32) default NULL,
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `modulesetting` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `value` text,
  `modulename` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
CREATE TABLE `note` (
  `id` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated` datetime NOT NULL default '0000-00-00 00:00:00',
  `accountid` int(11) NOT NULL default '0',
  `username` varchar(32) NOT NULL default '',
  `text` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `datecreated` datetime NOT NULL default '0000-00-00 00:00:00',
  `datecompleted` datetime default NULL,
  `datefulfilled` datetime default NULL,
  `remoteip` int(11) NOT NULL default '0',
  `businessname` varchar(255) NOT NULL default '',
  `contactname` varchar(255) NOT NULL default '',
  `contactemail` varchar(255) NOT NULL default '',
  `address1` varchar(255) NOT NULL default '',
  `address2` varchar(255) default NULL,
  `city` varchar(255) NOT NULL default '',
  `state` varchar(255) NOT NULL default '',
  `country` char(3) NOT NULL default '',
  `postalcode` varchar(255) NOT NULL default '',
  `phone` varchar(255) NOT NULL default '',
  `mobilephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `username` varchar(10) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `note` text,
  `status` enum('Incomplete','Pending','Fulfilled') NOT NULL default 'Incomplete',
  `accountid` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
CREATE TABLE `orderdomain` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `orderid` int(10) unsigned NOT NULL default '0',
  `orderitemid` int(10) unsigned NOT NULL default '0',
  `type` enum('New','Transfer','Existing') NOT NULL default 'Existing',
  `status` enum('Rejected','Pending','Accepted','Fulfilled') NOT NULL default 'Pending',
  `tld` varchar(255) default NULL,
  `domainname` varchar(255) NOT NULL default '',
  `term` int(11) default NULL,
  `transfersecret` varchar(255) default NULL,
  `admincontactid` int(10) unsigned NOT NULL default '0',
  `billingcontactid` int(10) unsigned NOT NULL default '0',
  `techcontactid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
CREATE TABLE `orderhosting` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `orderid` int(10) unsigned NOT NULL default '0',
  `orderitemid` int(10) unsigned NOT NULL default '0',
  `status` enum('Rejected','Pending','Accepted','Fulfilled') NOT NULL default 'Pending',
  `serviceid` int(10) unsigned NOT NULL default '0',
  `term` int(11) default NULL,
  `domainname` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL auto_increment,
  `invoiceid` int(11) unsigned default NULL,
  `orderid` int(10) unsigned default NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `amount` decimal(10,2) NOT NULL default '0.00',
  `transaction1` varchar(255) default NULL,
  `transaction2` varchar(255) default NULL,
  `type` enum('Credit','Cash','Check','Module','Other') NOT NULL default 'Cash',
  `module` varchar(255) default NULL,
  `status` enum('Declined','Completed','Pending','Authorized','Refunded','Reversed','Voided') NOT NULL default 'Completed',
  `statusmessage` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` blob,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `productprice` (
  `productid` int(10) unsigned NOT NULL default '0',
  `type` enum('Onetime','Recurring') NOT NULL default 'Onetime',
  `termlength` int(10) unsigned NOT NULL default '0',
  `price` decimal(20,2) NOT NULL default '0.00',
  `taxable` enum('Yes','No') NOT NULL default 'No',
  PRIMARY KEY  (`productid`,`type`,`termlength`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `productpurchase` (
  `id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL default '0',
  `accountid` int(11) NOT NULL default '0',
  `term` int(11) default NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `nextbillingdate` date default NULL,
  `previnvoiceid` int(11) default NULL,
  `note` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
CREATE TABLE `server` (
  `id` int(11) NOT NULL auto_increment,
  `hostname` varchar(255) NOT NULL default '',
  `location` varchar(255) default NULL,
  `cpmodule` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
CREATE TABLE `settings` (
  `setting` varchar(255) NOT NULL default '',
  `value` text,
  PRIMARY KEY  (`setting`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `taxrule` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `country` char(2) NOT NULL default '',
  `state` varchar(255) default NULL,
  `rate` decimal(4,2) NOT NULL default '0.00',
  `allstates` enum('Yes','Specific') NOT NULL default 'Yes',
  `description` varchar(255) NOT NULL default 'Tax',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE `user` (
  `username` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `type` enum('Account Manager','Administrator','Client') NOT NULL default 'Client',
  `contactname` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `language` varchar(255) default NULL,
  `theme` varchar(255) NOT NULL default 'default',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `settings` VALUES ('welcome_subject', 'Welcome to Web Hosting Company!');
INSERT INTO `settings` VALUES ('welcome_email', 'This is the welcome email that can be sent to your new \r\ncustomers.');
INSERT INTO `settings` VALUES ('invoice_text', 'Invoice #{invoice_id}\r\n\r\n===================================================================\r\nItem                                    Price     Qty  Total\r\n===================================================================\r\n{invoice_items}===================================================================\r\n\r\nSub-Total: {invoice_subtotal}\r\nTaxes: {invoice_taxtotal}\r\nInvoice Total: {invoice_total}\r\nPayments Received: {invoice_payments}\r\nBalance: {invoice_balance}\r\nDate Due: {invoice_due}\r\n\r\nIf you have any questions about this Invoice, please contact\r\nbilling@example.com.  Thank you!\r\n\r\nWeb Hosting Company\r\n');
INSERT INTO `settings` VALUES ('payment_gateway_default_module', '');
INSERT INTO `settings` VALUES ('payment_gateway_order_method', 'Authorize Only');
INSERT INTO `settings` VALUES ('order_confirmation_email', '{contact_name},\r\n\r\nThank you for choosing SolidState!\r\n\r\nYour order has been received and we will contact you after one of our account representatives has reviewed it.\r\n\r\nOrder ID: {order_id}\r\nReceived from: {order_ip}');
INSERT INTO `settings` VALUES ('order_confirmation_subject', 'Thank you for your order!');
INSERT INTO `settings` VALUES ('order_notification_subject', 'SolidState Order Received');
INSERT INTO `settings` VALUES ('order_notification_email', 'A new order from {contact_name} has been received.\r\n\r\nRemote IP: ({order_ip})\r\nTimestamp: {order_datestamp}');
INSERT INTO `settings` VALUES ('invoice_subject', 'Your {company_name} Invoice for {period_begin_date} - {period_end_date}');
INSERT INTO `settings` VALUES ('order_accept_checks', '0');
INSERT INTO `settings` VALUES ('theme_manager', 'default');
INSERT INTO `settings` VALUES ('theme_order', 'default');
INSERT INTO `settings` VALUES ('order_title', 'Web Host Provider :: Order Page');
