This sample shows how to use the ZAuth component to perform user authentication
in your applications.

It uses ZAuth and ZAuthDigest. ZAuth is the main component to perform authentication
while ZAuthDigest is an adapter that allows the ZAuth component to validate against
a digest file where usernames and passwords are stored.

ZAuth and ZAuthDigest are placed on a DataModule, so are accesible to the whole
application and you can include them on any page you require to be authenticated.

zauthsample.php is the page to be authenticated, and you can do that, just simply
by adding a call to Execute in the OnBeforeShow event of the Page, so the authentication
is performed before dump any output to the browser.

When the ZAuth component cannot validate the user, it fires the OnLogin event, which
you can use to redirect the browser to your login page and request credentials.

The login.php is a simply page with two Edit boxes and a Button, so when the user
clicks the button or submits the page, the values entered by the user are set on the
UserName and UserPassword properties of the ZAuth component and the browser is redirected
back the original page to perform authentication.

If authentication is successful, you will see the page contents, if not, you will be
redirected back to the login page.