function f4(J) {
    A = J;
}

function f1(J) {
    return document.getElementById(J);
}

var B = 0.01 * 1.1 * 4;
var A = false;
var C = 1.5 + 1 / 6;
var D = f1("M").width;
var E = D / 75;
var F = 0;
var G = 2;
var H = true;
var I = 0;
var P = Math.PI;

function f3() {
    try {
        var u = (new Date()).getTime();
        var M = f1("M");
        M = M.getContext("2d");
        M.clearRect(0, 0, D, D);
        M.save();
        M.translate(D / 2, D / 2);
        f5(5, 0, 0);
        M.restore();
        f6(F, 0);
        f6(1 / 3 + F, 2 / 3 - I / 10);
        f6(2 / 3 + F, 4 / 3 + I / 10);
        if (!A && !H) {
            G = Math.max(0, G - 0.02);
        } else {
            G = Math.min(1, G + 0.04);
        }
        n = .95 * F + .05 * C;
        if (n > F + .02) {
            F = F + 0.02;
        } else {
            F = n;
        } if (F > C * .9999) {
            H = false;
        }
        if (F > C * .99999) {
            F = C;
        }
        I = I + 0.2;
        u = ((new Date()).getTime() - u) / 40;
        if (u < 0.7) {
            B = Math.max(0.01, B - 0.05);
        } else {
            B = Math.min(0.1, B + 0.005);
        }
    } catch (e) {}
}

function f5(J, K, L) {
    var k = Math.min(1, G);
    if (K == 0 && L == 0) {
        k = 1;
    }
    var M = f1("M");
    var M = M.getContext("2d");
    M.fillStyle = "#000000";
    M.beginPath();
    M.arc(K, L, J * E * k, 0, P * 2, true);
    M.closePath();
    M.fill();
}

function f6(J, K) {
    var M = f1("M");
    M = M.getContext("2d");
    J = J * P;
    M.save();
    M.translate(D / 2, D / 2);
    M.rotate(J);
    var lef = Math.cos(K + I);
    var top = Math.sin(K + I);
    f5(4, lef * 32 * 0.3 * E, top * 32 * E);
    M.lineWidth = 2.4 * E;
    M.beginPath();
    var d = 1 + 0.04;
    var lef = Math.cos(K + I - d * 2 * 3.1415);
    var top = Math.sin(K + I - d * 2 * 3.1415);
    M.beginPath();
    M.moveTo(lef * 32 * E * 0.3, top * 32 * E);
    while (d > 0.0) {
        lef = Math.cos(K + I - d * 2 * 3.1415);
        top = Math.sin(K + I - d * 2 * 3.1415);
        var a = lef * 32 * E * 0.3;
        var b = top * 32 * E;
        M.lineTo(a, b);
        d = d - B;
    }
    M.strokeStyle = "#000000";
    M.stroke();
    M.closePath();
    M.restore();
}