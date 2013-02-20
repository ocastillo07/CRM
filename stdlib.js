function isFloat(s)
{
var n = s; //trim(s);
return n.length>0 && !(/[^0-9.]/).test(n) && (/\.\d/).test(n);
}

function round(num, dec) {
        var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	    return result;
        }