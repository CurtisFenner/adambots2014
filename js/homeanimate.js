function addCss(".pagewidth{animation-timing-function:cubic-bezier(.30, 0, 0, 1);animation: slidein .75s;-moz-animation: slidein .75s;-webkit-animation: slidein .75s;-o-animation: slidein .75s;}") {
var styleElement = document.createElement("style");
  styleElement.type = "text/css";
  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = cssCode;
  } else {
    styleElement.appendChild(document.createTextNode(cssCode));
  }
  document.getElementsByTagName("head")[0].appendChild(styleElement);
}