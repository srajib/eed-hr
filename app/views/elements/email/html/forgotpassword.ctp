
<table width="80%" border="0" cellspacing="2" cellpadding="3">
  <tr>
    <td>Hello <?php echo $user['User']['firstname']; ?> <?php echo $user['User']['lastname']; ?></td>
  </tr>
  <tr>
    <td>
	This is an auto generated E-Mail for retrieving forgotton username and password <br />
	Please change your password after login
	
	</td>
  </tr>
  <tr>
    <td>User Name = <?php echo $user['User']['email_address']; ?> <br />
      Password = <?php echo $user['User']['password']; ?> </td>
  </tr>
  <tr>
    <td>##This is automaton mail,send from prettyhomesdfw.com server Pls Don’t Reply##</td>
  </tr>
  <tr>
    <td>
	Regards,<br />
	support@progatibd.org
	
	</td>
  </tr>
</table>
