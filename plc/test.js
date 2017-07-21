var test = '00000163';
console.log(isHex(test));
console.log(parseInt(test,16));
var test = '43b18000';
console.log(isHex(test));
console.log(parseInt(test,16));

function parseFloat(str) {
    var float = 0, sign, order, mantiss, exp,
            int, checkexp = 0, multi = 1;
    if (/^0x/.exec(str)) {
        int = parseInt(str, 16);
    } else {
        for (var i = str.length - 1; i >= 0; i -= 1) {
            if (str.charCodeAt(i) > 255) {
                console.log('Wrong string parametr');
                return false;
            }
            int += str.charCodeAt(i) * multi;
            multi *= 256;
        }
    }
    sign = (int >>> 31) ? -1 : 1;
    exp = (int >>> 23 & 0xff) - 127;
    checkexp = exp;
    mantissa = ((int & 0x7fffff) + 0x800000).toString(2);
    for (i = 0; i < mantissa.length; i += 1) {
        float += parseInt(mantissa[i]) ? Math.pow(2, exp) : 0;
        exp--;
    }
    if (checkexp < 0) {
        return int;
    } else {
        return (float * sign).toFixed(2);
    }
}

function isHex(h) {
var a = parseInt(h,16);
return (a.toString(16) ===h.toLowerCase())
}

