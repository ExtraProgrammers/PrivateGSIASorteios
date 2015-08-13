<?php include("header.php");?>
<div id="msgholder-alt"></div>
    <h1>Painel Admin RGC Brasil</h1>
    <p class="info">Please enter your valid username and password to login into your account. Fields marked  are required (*)</p>
    <div class="box">
      <form action="valida.php" method="post" id="form" name="form">
        <table width="100%" border="0" cellpadding="3" cellspacing="0" class="display">
          <thead>
            <tr>
              <th colspan="2" class="left">Account Login</th>
            </tr>
          </thead>
          <tr>
            <th width="200"><strong><span style="color: #FF0000">*</span>Usuario: </strong></th>
            <td><input type="text" name="usuario" size="45" id="usuario" maxlength="20" placeholder="Your Username" class="inputbox" /></td>
          </tr>
          <tr>
            <th><strong><span style="color: #FF0000">*</span>Senha: </strong></th>
            <td><input type="password" name="senha" size="45"  id="senha" maxlength="20" placeholder="Your Password" class="inputbox" /></td>
          </tr>
          <tr>
            <td><input type="submit" name="logar" id="logar" value="Login now" class="button"/></td>
            <td align="right">&nbsp;</td>
          </tr>
        </table>
        <input name="doLogin" type="hidden" value="1" />
      </form>
    </div>
    <br />
<?php include("footer.php");?>