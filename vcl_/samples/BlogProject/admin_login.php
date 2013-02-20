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


require_once("blog_db.php");

class AdminLogin
{
   function EnsureLogin()
   {
      global $BlogDB;

      $loginid = $_COOKIE['loginid'];

      if(!empty($loginid) && preg_match('/^[a-z0-9]{1,}$/i', $loginid))
      {
         $BlogDB->Query1->close();
         $BlogDB->Query1->SQL = "SELECT * FROM admins WHERE LoginID = '" . mysql_real_escape_string($loginid) . "'";
         $BlogDB->Query1->open();

         if($BlogDB->Query1->RecordCount == 1)
            return;
      }

      header('Location: admin_do_login.php');
   }

   function TryLogin($username, $password)
   {
      global $BlogDB;

      if(!empty($username) && !empty($password) && preg_match('/^[a-z0-9]{1,}$/i', $username) && preg_match('/^[a-z0-9]{1,}$/i', $password))
      {
         $BlogDB->Query1->close();
         $BlogDB->Query1->SQL = "SELECT * FROM admins " .
         "WHERE Username = '" . mysql_real_escape_string($username) . "' AND " .
         "Password = '" . mysql_real_escape_string($password) . "'";
         $BlogDB->Query1->open();

         if($BlogDB->Query1->RecordCount == 1)
         {
            $loginid = md5(uniqid(rand(), true ) . time());

            $BlogDB->Query1->close();
            $BlogDB->Query1->LimitStart = - 1;
            $BlogDB->Query1->LimitCount = - 1;
            $BlogDB->Query1->SQL = "UPDATE admins SET LoginID = '" . mysql_real_escape_string($loginid) . "' " .
            "WHERE Username = '" . mysql_real_escape_string($username) . "' AND " .
            "Password = '" . mysql_real_escape_string($password) . "'";

            $BlogDB->Query1->open();

            setcookie('loginid', $loginid);

            return true;
         }
      }

      return false;
   }
}

global $AdminLogin;

$AdminLogin = new AdminLogin();

function GetAdminLogin()
{
   global $AdminLogin;

   return $AdminLogin;
}
?>