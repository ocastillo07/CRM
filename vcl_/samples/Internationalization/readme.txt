This sample shows how you can internationalize web pages easily.

If you want to localize a Delphi for PHP Page, just change the Language property
of the page, now, all changes your perform on the interface will be stored
separately, only changes will be stored, so, for example, if you don't change
your control positions, those changes won't be saved separately.

By working this way, if you want to change, for example, the Left property for a
Button and make that change in all your localized versions, if you didn't move
that Button on your localized version, when you switch to it, the button
will be on the new position, saving a lot of work.

This technique has the advantage that if you then choose to change, for example,
a property on a Button, all unchanged localized versions of the same page will
automatically inherit the changed Button property.

The IDE is aware of all the changes and create, apart of the .xml.php, a (your
language).xml.php were all your property changes are stored.

A page, when it loads, if the Language property is not the default value
(default), it will search for a [Language].xml.php after loading the default one
to set the properties to the localized values.

Delphi for PHP IDE automates the process of creating localized .xml.php files,
but nothing prevents you from coding that by hand. Also, these files are the ones
that contain the resources you might send to your translators, and it's XML format,
easy to read and modify.

To change the active Language for your page, just set Language property to the
language you want and if you created a valid [Language].xml.php, those properties
will be loaded and set.

Extracting resource strings
---------------------------
VCL for PHP uses the standard PHP method to localize string, which is using
gettext(). Delphi for PHP includes a wizard that runs gettext software over all
.php files on your project and creates the .po file.

That .po file includes all the strings found on your source code in this format:

          echo _("string to localize");

That is, are enclosed on a _() function, which is a special function that sends
the value you set as input to the gettext engine to look for a match for your
specific language.

Once you have a .po file for your strings, you need to edit them and create a
.mo file, which is a binary version of your translation.

Using the localized version
---------------------------
Delphi for PHP Internationalization wizard creates the folder structure required
by gettext() to find and read .mo files.

To switch to a runtime language, you have to do the same you do to change the
visual interface language, and it's to set the Language property, that change
also affects the gettext() engine to switch the active language and _()
functions will search on the .mo file for a match, if none is found, the
original input will be shown.
