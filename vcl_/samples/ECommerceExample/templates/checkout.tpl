<p>Review the information below before you place your order:</p>
<form action="index.php"><input type="hidden" value="order" name="page" />
  <p>
    <table cellspacing="5" cellpadding="0" width="100%" border="0">
      <tbody>
        <tr>
          <td>Name</td>
          <td width="50">Price</td>
          <td width="50">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#000000" colspan="3" height="1"><img height="1" src="vcl/images/pixel_trans.gif" width="1" /></td>
        </tr>{%$CartContentsStr%}
        <tr>
          <td bgcolor="#000000" colspan="3" height="1"><img height="1" src="vcl/images/pixel_trans.gif" width="1" /></td>
        </tr>
        <tr>
          <td align="right">Subtotal:</td>
          <td>{%$SubtotalStr%}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">Total:</td>
          <td>{%$TotalStr%}</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </p>
  <p>&nbsp;</p>
  <p>Bill and ship to:</p>
  <table border="0">
    <tbody>
      <tr>
        <td width="50">&nbsp; </td>
        <td>{%$NameOutStr%}<br />{%$AddressStr%}<br />{%$CityStr%}, {%$StateStr%}, {%$CountryStr%}<br />{%$PostcodeStr%}<br />{%$PhoneStr%} </td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>
    <table border="0">
      <tbody>
        <tr>
          <td>{%$SubmitButton%} </td>
        </tr>
      </tbody>
    </table>
  </p>