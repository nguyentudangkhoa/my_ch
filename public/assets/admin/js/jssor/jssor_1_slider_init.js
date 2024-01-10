jssor_1_slider_init = function() {

 var jssor_1_SlideshowTransitions = [
 {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
 ];
 
 var jssor_1_options = {
  $AutoPlay: 1,
  $SlideDuration: 1000,
  $SlideEasing: $Jease$.$OutQuint,
  $SlideshowOptions: {
    $Class: $JssorSlideshowRunner$,
    $Transitions: jssor_1_SlideshowTransitions,
    $TransitionsOrder: 1
  },
  $ArrowNavigatorOptions: {
    $Class: $JssorArrowNavigator$
  },
  $BulletNavigatorOptions: {
    $Class: $JssorBulletNavigator$
  }
};

var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

function ScaleSlider() {
  var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
  if (refSize) {
    refSize = Math.min(refSize, 1920);
    jssor_1_slider.$ScaleWidth(refSize);
  }
  else {
    window.setTimeout(ScaleSlider, 30);
  }
}
ScaleSlider();
$Jssor$.$AddEvent(window, "load", ScaleSlider);
$Jssor$.$AddEvent(window, "resize", ScaleSlider);
$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
/*endregion responsive code end*/
};
