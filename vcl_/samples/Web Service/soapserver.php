<?php
/**
*  This file is part of the VCL for PHP project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/


//        ini_set("display_errors",1);
//        error_reporting(E_ALL);

require_once("vcl/vcl.inc.php");
//Includes
use_unit("webservices.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

/*
* Returns the input
*/
function serviceEcho($input)
{
   return($input);
}

/*
* Converts the input array, which are strings, to an array of integers
*/
function StringArrayToIntArray($inputarray)
{
   $result = array();
   reset($inputarray);
   while(list($key, $val) = each($inputarray))
   {
      $result[] = (int)$val;
   }

   return($result);
}

//Class definition
class DmSoapServer extends DataModule
{
   public $MyWebService = null;
   function MyWebServiceAddComplexTypes($sender, $params)
   {
      //Add the complex type array of strings
      $this->MyWebService->addComplexType
      (
      'ArrayOfstring',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'string[]')),
      'xsd:string'
      );

      //Add the complex type array of integers
      $this->MyWebService->addComplexType
      (
      'ArrayOfinteger',
      'complexType',
      'array',
      '',
      'SOAP-ENC:Array',
      array(),
      array(array('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'integer[]')),
      'xsd:integer'
      );
   }

   function MyWebServiceRegisterServices($sender, $params)
   {
      //Register the echo service
      $this->MyWebService->register(
      "serviceEcho",
      array('input' => 'xsd:string'),
      array('return' => 'xsd:string'),
      'http://localhost/'
      );


      //Register the conversion service
      $this->MyWebService->register(
      "StringArrayToIntArray",
      array('input' => 'tns:ArrayOfstring'),
      array('return' => 'tns:ArrayOfinteger'),
      'http://localhost/'
      );

   }
}

global $application;

global $DmSoapServer;

//Creates the form
$DmSoapServer = new DmSoapServer($application);

//Read from resource file
$DmSoapServer->loadResource(__FILE__);

?>