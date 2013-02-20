<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>{%$PageTitleStr%} Administration Panel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <!-- page main table -->
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3">
        <!-- title bar -->
        <div id="title">
          <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td id="titletext">
                <!-- Page title -->
                {%$PageTitle%} Administration Panel
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td id="navigation" valign="top">
        <!-- site navigation -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td class="boxheader" align="center">Navigation</td>
          </tr>
          <tr>
            <td class="boxcontent" align="center" valign="top">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="navlink">
                    <a href="admin.php">Admin Home</a>
                  </td>
                </tr>
                <tr>
                  <td class="navlink">
                    <a href="admin.php?page=catalog">Admin Catalog</a>
                  </td>
                </tr>
                <tr>
                  <td class="navlink">
                    <a href="admin.php?page=orders">Admin Orders</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <img src="vcl/images/pixel_trans.gif" width="200" height="1" />
            </td>
          </tr>
        </table>
      </td>
      <td id="content" valign="top">
        <!-- actual page content -->
        {%$PageContent%}
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <!-- footer -->
        <div id="footer">
          Copyright &copy; MyCompany 2007. All Rights Reserved.
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
